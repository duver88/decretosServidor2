<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Document;
use App\Models\DocumentType;
use Illuminate\Http\Request;
use App\Models\DocumentTheme;
use Illuminate\Support\Facades\Storage;

class DocumentController extends Controller
{
    // Método para la vista pública
 // Método para la vista pública con filtros mejorados
public function listPublic(Request $request)
{
    // IMPORTANTE: Incluir las relaciones en el with()
    $query = Document::with(['category', 'documentType', 'documentTheme']);

    // Filtro por tipo de documento (decreto/resolución)
    if ($request->filled('tipo')) {
        $query->where('tipo', $request->tipo);
    }

    // Filtro por número (búsqueda parcial mejorada)
    if ($request->filled('numero')) {
        $numero = trim($request->numero);
        $query->where('numero', 'LIKE', '%' . $numero . '%');
    }

    // Filtro por nombre (incluye búsqueda en tipo también)
    if ($request->filled('nombre')) {
        $nombre = trim($request->nombre);
        $query->where(function($q) use ($nombre) {
            $q->where('nombre', 'LIKE', '%' . $nombre . '%')
              ->orWhere('tipo', 'LIKE', '%' . $nombre . '%');
        });
    }

    // Filtro por categoría
    if ($request->filled('category_id')) {
        $query->where('category_id', $request->category_id);
    }

    // 🔥 FILTROS PRINCIPALES QUE ESTABAN FALTANDO O MAL CONFIGURADOS:

    // Filtro por DocumentType (CORREGIDO)
    if ($request->filled('document_type_id')) {
        $query->where('document_type_id', $request->document_type_id);
    }

    // Filtro por DocumentTheme (CORREGIDO)
    if ($request->filled('document_theme_id')) {
        $query->where('document_theme_id', $request->document_theme_id);
    }

    // Filtros de fecha mejorados
    if ($request->filled('fecha_desde')) {
        $query->whereDate('fecha', '>=', $request->fecha_desde);
    }

    if ($request->filled('fecha_hasta')) {
        $query->whereDate('fecha', '<=', $request->fecha_hasta);
    }

    // Filtro por fecha exacta (mantener compatibilidad)
    if ($request->filled('fecha') && !$request->filled('fecha_desde') && !$request->filled('fecha_hasta')) {
        $query->whereDate('fecha', $request->fecha);
    }

    // Filtro por año ahora filtra por nombre del documento
    if ($request->filled('año')) {
        $año = trim($request->año);
        $query->where('nombre', 'LIKE', '%' . $año . '%');
    }

    // Filtro por mes (usar fecha de publicación)
    if ($request->filled('mes') && $request->filled('año')) {
        $mes = (int) $request->mes;
        $año = trim($request->año);
        
        if ($mes >= 1 && $mes <= 12 && !empty($año)) {
            $query->whereMonth('fecha', $mes)
                  ->where('nombre', 'LIKE', '%' . $año . '%');
        }
    }

    // Búsqueda general (busca en nombre, número, descripción y tipo)
    if ($request->filled('busqueda_general')) {
        $busqueda = trim($request->busqueda_general);
        $query->where(function($q) use ($busqueda) {
            $q->where('nombre', 'LIKE', '%' . $busqueda . '%')
              ->orWhere('numero', 'LIKE', '%' . $busqueda . '%')
              ->orWhere('descripcion', 'LIKE', '%' . $busqueda . '%')
              ->orWhere('tipo', 'LIKE', "%{$busqueda}%");
        });
    }

    // Ordenamiento mejorado
    $orden = $request->get('orden', 'fecha_desc');
    switch ($orden) {
        case 'numero_asc':
            $query->orderBy('numero', 'asc');
            break;
        case 'numero_desc':
            $query->orderBy('numero', 'desc');
            break;
        case 'nombre_asc':
            $query->orderBy('nombre', 'asc');
            break;
        case 'nombre_desc':
            $query->orderBy('nombre', 'desc');
            break;
        case 'fecha_asc':
            $query->orderBy('fecha', 'asc');
            break;
        case 'tipo_asc':
            $query->orderBy('tipo', 'asc')->orderBy('fecha', 'desc');
            break;
        case 'categoria_asc':
            $query->join('categories', 'documents.category_id', '=', 'categories.id')
                  ->orderBy('categories.nombre', 'asc')
                  ->orderBy('documents.fecha', 'desc')
                  ->select('documents.*');
            break;
        case 'document_type_asc':
            $query->join('document_types', 'documents.document_type_id', '=', 'document_types.id')
                  ->orderBy('document_types.nombre', 'asc')
                  ->orderBy('documents.fecha', 'desc')
                  ->select('documents.*');
            break;
        case 'document_theme_asc':
            $query->join('document_themes', 'documents.document_theme_id', '=', 'document_themes.id')
                  ->orderBy('document_themes.nombre', 'asc')
                  ->orderBy('documents.fecha', 'desc')
                  ->select('documents.*');
            break;
        default: // fecha_desc
            $query->orderBy('fecha', 'desc');
    }

    // Paginación
    $documents = $query->paginate(9)->withQueryString();

    // Datos adicionales para los filtros
    $categories = Category::orderBy('nombre')->get();
    
    // Tipos de documento (decreto/resolución)
    $tipos = Document::distinct()
                    ->whereNotNull('tipo')
                    ->where('tipo', '!=', '')
                    ->pluck('tipo')
                    ->sort()
                    ->values();
    
    // Obtener años únicos del nombre del documento
    $años = Document::selectRaw('SUBSTRING(nombre, LOCATE("2", nombre), 4) as año')
                   ->distinct()
                   ->whereRaw('nombre REGEXP "[0-9]{4}"')
                   ->orderBy('año', 'desc')
                   ->pluck('año')
                   ->filter()
                   ->unique()
                   ->values();

    // DocumentTypes y DocumentThemes
    $documentTypes = \App\Models\DocumentType::orderBy('nombre')->get();
    $documentThemes = \App\Models\DocumentTheme::with('documentType')->orderBy('nombre')->get();
    
    // Si hay un tipo seleccionado, filtrar temas por ese tipo
    $temasFiltered = collect();
    if ($request->filled('document_type_id')) {
        $temasFiltered = \App\Models\DocumentTheme::where('document_type_id', $request->document_type_id)
                                    ->orderBy('nombre')
                                    ->get();
    }

    // Estadísticas
    $stats = [
        'total' => Document::count(),
        'por_tipo' => Document::selectRaw('tipo, COUNT(*) as count')
                             ->groupBy('tipo')
                             ->pluck('count', 'tipo'),
        'por_categoria' => Category::withCount('documents')->get(),
        'por_document_type' => \App\Models\DocumentType::withCount('documents')->get(),
        'por_año' => Document::selectRaw('SUBSTRING(nombre, LOCATE("2", nombre), 4) as año, COUNT(*) as count')
                           ->whereRaw('nombre REGEXP "[0-9]{4}"')
                           ->groupBy('año')
                           ->orderBy('año', 'desc')
                           ->pluck('count', 'año'),
        'ultimos_30_dias' => Document::where('fecha', '>=', now()->subDays(30))->count(),
    ];

    return view('public.documents', compact(
        'documents', 
        'categories', 
        'tipos', 
        'años', 
        'stats',
        'documentTypes',
        'documentThemes',
        'temasFiltered'
    ));
}

public function getThemesByType($typeId)
{
    $themes = DocumentTheme::where('document_type_id', $typeId)
                          ->orderBy('nombre')
                          ->get(['id', 'nombre']);
    return response()->json($themes);
}

    // Dashboard - listado de documentos para admin
public function index(Request $request)
{
    $query = Document::with('category');

    /* --- FILTROS (mismos que listPublic()) --- */
        if ($request->filled('document_type_id')) {
        $query->where('document_type_id', $request->document_type_id);
    }

    // Filtro por DocumentTheme (NUEVO)
    if ($request->filled('document_theme_id')) {
        $query->where('document_theme_id', $request->document_theme_id);
    }
    // Filtro por tipo de documento
    if ($request->filled('tipo')) {
        $query->where('tipo', $request->tipo);
    }

    // Filtro por número (búsqueda parcial mejorada)
    if ($request->filled('numero')) {
        $numero = trim($request->numero);
        $query->where('numero', 'LIKE', '%' . $numero . '%');
    }

    // Filtro por nombre (incluye búsqueda en tipo también)
    if ($request->filled('nombre')) {
        $nombre = trim($request->nombre);
        $query->where(function($q) use ($nombre) {
            $q->where('nombre', 'LIKE', '%' . $nombre . '%')
              ->orWhere('tipo', 'LIKE', '%' . $nombre . '%');
        });
    }

    // Filtro por categoría
    if ($request->filled('category_id')) {
        $query->where('category_id', $request->category_id);
    }

    // Filtros de fecha mejorados
    if ($request->filled('fecha_desde')) {
        $query->whereDate('fecha', '>=', $request->fecha_desde);
    }

    if ($request->filled('fecha_hasta')) {
        $query->whereDate('fecha', '<=', $request->fecha_hasta);
    }

    // Filtro por fecha exacta (mantener compatibilidad)
    if ($request->filled('fecha') && !$request->filled('fecha_desde') && !$request->filled('fecha_hasta')) {
        $query->whereDate('fecha', $request->fecha);
    }

    // Filtro por año (filtra por nombre del documento)
    if ($request->filled('año')) {
        $año = trim($request->año);
        $query->where('nombre', 'LIKE', '%' . $año . '%');
    }

    // Filtro por mes (usar fecha de publicación)
    if ($request->filled('mes') && $request->filled('año')) {
        $mes = (int) $request->mes;
        $año = trim($request->año);
        
        // Validar que mes esté entre 1 y 12
        if ($mes >= 1 && $mes <= 12 && !empty($año)) {
            $query->whereMonth('fecha', $mes)
                  ->where('nombre', 'LIKE', '%' . $año . '%');
        }
    }

    // Búsqueda general (busca en nombre, número, descripción y tipo)
    if ($request->filled('busqueda_general')) {
        $busqueda = trim($request->busqueda_general);
        $query->where(function($q) use ($busqueda) {
            $q->where('nombre', 'LIKE', '%' . $busqueda . '%')
              ->orWhere('numero', 'LIKE', '%' . $busqueda . '%')
              ->orWhere('descripcion', 'LIKE', '%' . $busqueda . '%')
              ->orWhere('tipo', 'LIKE', "%{$busqueda}%");
        });
    }

    /* --- ORDENAMIENTO --- */
    $orden = $request->get('orden', 'fecha_desc');
    switch ($orden) {
        case 'numero_asc':
            $query->orderBy('numero', 'asc');
            break;
        case 'numero_desc':
            $query->orderBy('numero', 'desc');
            break;
        case 'nombre_asc':
            $query->orderBy('nombre', 'asc');
            break;
        case 'nombre_desc':
            $query->orderBy('nombre', 'desc');
            break;
        case 'fecha_asc':
            $query->orderBy('fecha', 'asc');
            break;
        case 'tipo_asc':
            $query->orderBy('tipo', 'asc')->orderBy('fecha', 'desc');
            break;
        case 'categoria_asc':
            $query->join('categories', 'documents.category_id', '=', 'categories.id')
                  ->orderBy('categories.nombre', 'asc')
                  ->orderBy('documents.fecha', 'desc')
                  ->select('documents.*');
            break;
        default: // fecha_desc
            $query->orderBy('fecha', 'desc');
    }

    /* --- PERMISOS (solo si no es admin) --- */
    if (!auth()->user()->is_admin) {
        $allowed = auth()->user()->categoryPermissions()->pluck('category_id');
        $query->whereIn('category_id', $allowed);
    }

    // Paginación con número configurable de elementos
    $perPage = $request->get('per_page', 9); // Por defecto 9

    // Si se selecciona "todos", obtener todos los documentos sin paginar
    if ($perPage === 'todos') {
        $documents = $query->get();
        // Crear un objeto paginador falso para compatibilidad con la vista
        $documents = new \Illuminate\Pagination\LengthAwarePaginator(
            $documents,
            $documents->count(),
            $documents->count(),
            1,
            ['path' => $request->url(), 'query' => $request->query()]
        );
    } else {
        // Validar valores permitidos
        $perPage = in_array($perPage, [9, 18, 27, 36, 50, 100]) ? $perPage : 9;
        $documents = $query->paginate($perPage)->withQueryString();
    }

    // Datos adicionales para los filtros
    $categories = Category::orderBy('nombre')->get();
    $tipos = Document::distinct()->pluck('tipo')->filter()->sort()->values();
    
    // Obtener años únicos del nombre del documento
    $años = Document::selectRaw('SUBSTRING(nombre, LOCATE("2", nombre), 4) as año')
                   ->distinct()
                   ->whereRaw('nombre REGEXP "[0-9]{4}"')
                   ->orderBy('año', 'desc')
                   ->pluck('año')
                   ->filter()
                   ->unique()
                   ->values();

    // Estadísticas para que coincidan con la vista
    $stats = [
        'total' => Document::count(),
        'por_tipo' => Document::selectRaw('tipo, COUNT(*) as count')
                             ->groupBy('tipo')
                             ->pluck('count', 'tipo'),
        'por_categoria' => Category::withCount('documents')->get(),
        'por_año' => Document::selectRaw('SUBSTRING(nombre, LOCATE("2", nombre), 4) as año, COUNT(*) as count')
                           ->whereRaw('nombre REGEXP "[0-9]{4}"')
                           ->groupBy('año')
                           ->orderBy('año', 'desc')
                           ->pluck('count', 'año'),
        'ultimos_30_dias' => Document::where('fecha', '>=', now()->subDays(30))->count(),
    ];

    $documentTypes = DocumentType::orderBy('nombre')->get();  
    $documentThemes = DocumentTheme::with('documentType')->orderBy('nombre')->get();  

    return view('admin.dashboard', compact(
        'documents', 
        'categories', 
        'tipos', 
        'años', 
        'stats','documentTypes', 'documentThemes'
    ));
}


    // Formulario para crear documento
public function create()
{
    if (auth()->user()->is_admin) {  
        $categories = Category::all();  
        $documentTypes = \App\Models\DocumentType::orderBy('nombre')->get();  // AGREGAR ESTA LÍNEA
        return view('admin.create_document', compact('categories', 'documentTypes'));  
    } else {  
        $categoryIds = auth()->user()->categoryPermissions()  
                              ->where('can_create', true)  
                              ->pluck('category_id')  
                              ->toArray();  
        $categories = Category::whereIn('id', $categoryIds)->get();  
        $documentTypes = \App\Models\DocumentType::orderBy('nombre')->get();  // AGREGAR ESTA LÍNEA
          
        if ($categories->isEmpty()) {  
            return redirect()->route('user.dashboard')  
                           ->with('error', 'No tienes permiso para crear documentos');  
        }  
          
        return view('users.create_document', compact('categories', 'documentTypes'));  
    }  
}

    // Guardar documento
public function store(Request $request)
{
    $request->validate([
        'archivo' => 'required|file|mimes:pdf,doc,docx,xls,xlsx|max:51200',
        'nombre' => 'required|string|max:255',
        'numero' => 'required|string|max:50',
        'tipo' => 'required|string',
        'descripcion' => 'nullable|string',
        'fecha' => 'required|date|date_format:Y-m-d|after:1990-01-01|before:2050-12-31', // ✅ VALIDACIÓN MÁS ESTRICTA
        'category_id' => 'required|exists:categories,id',
        'document_type_id' => 'required|exists:document_types,id',
        'document_theme_id' => 'required|exists:document_themes,id',
    ]);

    // ✅ VALIDACIÓN ADICIONAL PARA FECHA (OPCIONAL - EXTRA SEGURIDAD)
    $fecha = $request->fecha;
    if (!preg_match('/^\d{4}-\d{2}-\d{2}$/', $fecha)) {
        return redirect()->back()
                        ->withErrors(['fecha' => 'Formato de fecha inválido. Use YYYY-MM-DD'])
                        ->withInput();
    }

    if ($request->hasFile('archivo')) {
        $archivo = $request->file('archivo');
        $nombreOriginal = $archivo->getClientOriginalName();
        $nombreLimpio = time() . '_' . str_replace(' ', '_', $nombreOriginal);

        $ruta = $archivo->storeAs('documents', $nombreLimpio, 'public');

        $documento = new Document();
        $documento->nombre = $request->nombre;
        $documento->numero = $request->numero;
        $documento->tipo = $request->tipo;
        $documento->fecha = $request->fecha;
        $documento->category_id = $request->category_id;
        $documento->document_type_id = $request->document_type_id;
        $documento->document_theme_id = $request->document_theme_id;
        $documento->descripcion = $request->descripcion;
        $documento->archivo = $ruta;
        $documento->save();
        
        // ✅ REDIRECT CORRECTO SEGÚN TIPO DE USUARIO
        if (auth()->user()->is_admin) {
            return redirect()->route('dashboard')->with('success', 'Documento subido correctamente.');
        } else {
            return redirect()->route('user.dashboard')->with('success', 'Documento subido correctamente.');
        }
    }

    // ✅ REDIRECT CORRECTO TAMBIÉN EN CASO DE ERROR
    if (auth()->user()->is_admin) {
        return redirect()->route('document.create')->with('error', 'Error al subir el documento.');
    } else {
        return redirect()->route('user.document.create')->with('error', 'Error al subir el documento.');
    }
}

    // Formulario para editar documento
public function edit($id)
{
    $document = Document::findOrFail($id);  
    
    if (auth()->user()->is_admin) {  
        $categories = Category::all();  
        $documentTypes = \App\Models\DocumentType::orderBy('nombre')->get();  // AGREGAR
        return view('admin.edit_document', compact('document', 'categories', 'documentTypes'));  
    } else {  
        if (!auth()->user()->hasPermissionFor($document->category_id, 'edit')) {  
            return redirect()->route('user.dashboard')  
                           ->with('error', 'No tienes permiso para editar documentos en esta categoría');  
        }  
          
        $categoryIds = auth()->user()->categoryPermissions()  
                              ->where('can_edit', true)  
                              ->pluck('category_id')  
                              ->toArray();  
        $categories = Category::whereIn('id', $categoryIds)->get();  
        $documentTypes = \App\Models\DocumentType::orderBy('nombre')->get();  // AGREGAR
          
        return view('users.edit_document', compact('document', 'categories', 'documentTypes'));  
    }  
}

    // Actualizar documento
    public function update(Request $request, $id)
{
    $document = Document::findOrFail($id);  
  
    // Validate request data - AGREGAMOS los nuevos campos pero mantenemos todo lo demás
    $request->validate([  
        'nombre' => 'required|string|max:255',  
        'numero' => 'required|string|max:50',  
        'tipo' => 'required|in:decreto,resolución',  
        'fecha' => 'required|date',  
        'archivo' => 'nullable|file|mimes:pdf,doc,docx',  
        'descripcion' => 'nullable|string',  
        'category_id' => 'required|exists:categories,id',
        // 🆕 NUEVOS CAMPOS - pero opcionales para no romper documentos existentes
        'document_type_id' => 'nullable|exists:document_types,id',
        'document_theme_id' => 'nullable|exists:document_themes,id',
    ]);  
      
    if (!auth()->user()->is_admin) {  
        // Check if user has edit permission for this document's category  
        if (!auth()->user()->hasPermissionFor($document->category_id, 'edit')) {  
            return redirect()->route('user.dashboard')  
                           ->with('error', 'No tienes permiso para editar documentos en esta categoría');  
        }  
          
        // Check if user has permission for the new category if it's being changed  
        if ($document->category_id != $request->category_id &&   
            !auth()->user()->hasPermissionFor($request->category_id, 'edit')) {  
            return redirect()->route('user.dashboard')  
                           ->with('error', 'No tienes permiso para mover documentos a esta categoría');  
        }  
    }  
      
    // Continue with document update logic - AGREGAMOS los nuevos campos
    $data = $request->only([
        'nombre', 
        'numero', 
        'tipo', 
        'fecha', 
        'descripcion', 
        'category_id',
        'document_type_id',    // 🆕 NUEVO
        'document_theme_id'    // 🆕 NUEVO
    ]);  
      
    // Handle file upload if present - SIN CAMBIOS
    if ($request->hasFile('archivo')) {  
        // Delete old file  
        if (Storage::disk('public')->exists($document->archivo)) {  
            Storage::disk('public')->delete($document->archivo);  
        }  
        $data['archivo'] = $request->file('archivo')->store('documents', 'public');  
    }  
      


    // Update document - SIN CAMBIOS
    $document->update($data);  
      
    // Redirect logic - SIN CAMBIOS
    if (auth()->user()->is_admin) {  
        return redirect()->route('dashboard')->with('success', 'Documento actualizado correctamente');  
    } else {  
        return redirect()->route('user.dashboard')->with('success', 'Documento actualizado correctamente');  
    }  
}

public function show($id)
{
    $document = Document::with(['category', 'documentType', 'documentTheme'])
                       ->findOrFail($id);
    
    return view('public.document_detail', compact('document'));
}

    // Eliminar documento
    public function destroy($id)
    {
         $document = Document::findOrFail($id);  
      
    if (!auth()->user()->is_admin) {  
        // Check if user has delete permission for this document's category  
        if (!auth()->user()->hasPermissionFor($document->category_id, 'delete')) {  
            return redirect()->route('user.dashboard')  
                           ->with('error', 'No tienes permiso para eliminar documentos en esta categoría');  
        }  
    }  
      
    // Delete the file  
    if (Storage::disk('public')->exists($document->archivo)) {  
        Storage::disk('public')->delete($document->archivo);  
    }  
      
    // Delete the document  
    $document->delete();  
      
    if (auth()->user()->is_admin) {  
        return redirect()->route('dashboard')->with('success', 'Documento eliminado correctamente');  
    } else {  
        return redirect()->route('user.dashboard')->with('success', 'Documento eliminado correctamente');  
    }  
    }


public function userDashboard(Request $request)  
{  
    // Verificar que el usuario esté autenticado
    if (!auth()->check()) {
        return redirect()->route('login');
    }

    $user = auth()->user();  
    
    // Obtener documentos según permisos del usuario CON FILTROS
    $query = Document::with(['category', 'documentType', 'documentTheme'])
        ->whereHas('category', function($q) use ($user) {  
            $q->whereIn('id', $user->categoryPermissions()->pluck('category_id'));  
        });

    // APLICAR FILTROS SIMILARES AL ADMIN
    
    // Filtro por búsqueda general
    if ($request->filled('busqueda_general')) {
        $busqueda = trim($request->busqueda_general);
        $query->where(function($q) use ($busqueda) {
            $q->where('nombre', 'LIKE', '%' . $busqueda . '%')
              ->orWhere('numero', 'LIKE', '%' . $busqueda . '%')
              ->orWhere('descripcion', 'LIKE', '%' . $busqueda . '%')
              ->orWhere('tipo', 'LIKE', "%{$busqueda}%");
        });
    }

    // Filtro por tipo de documento
    if ($request->filled('tipo')) {
        $query->where('tipo', $request->tipo);
    }

    // Filtro por categoría (solo las que tiene permisos)
    if ($request->filled('category_id')) {
        $allowedCategories = $user->categoryPermissions()->pluck('category_id')->toArray();
        if (in_array($request->category_id, $allowedCategories)) {
            $query->where('category_id', $request->category_id);
        }
    }

    // Filtro por número
    if ($request->filled('numero')) {
        $numero = trim($request->numero);
        $query->where('numero', 'LIKE', '%' . $numero . '%');
    }

    // Filtros de fecha
    if ($request->filled('fecha_desde')) {
        $query->whereDate('fecha', '>=', $request->fecha_desde);
    }

    if ($request->filled('fecha_hasta')) {
        $query->whereDate('fecha', '<=', $request->fecha_hasta);
    }

    // Ordenamiento
    $orden = $request->get('orden', 'fecha_desc');
    switch ($orden) {
        case 'nombre_asc':
            $query->orderBy('nombre', 'asc');
            break;
        case 'fecha_asc':
            $query->orderBy('fecha', 'asc');
            break;
        default: // fecha_desc
            $query->orderBy('fecha', 'desc');
    }

    // Obtener documentos
    $documents = $query->get();
      
    return view('users.dashboard', compact('documents'));  
}

public function getThemes($typeId)  
{  
    $themes = DocumentTheme::where('document_type_id', $typeId)->get();  
    return response()->json($themes);  
}
}

