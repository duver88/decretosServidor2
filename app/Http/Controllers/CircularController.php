<?php

namespace App\Http\Controllers;

use App\Models\Circular;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class CircularController extends Controller
{
    /**
     * Display a listing of circulares for admin.
     */
    public function index()
    {
        $circulares = Circular::orderBy('fecha', 'desc')
            ->orderBy('created_at', 'desc')
            ->paginate(20);

        return view('admin.circulares.index', compact('circulares'));
    }

    /**
     * Show the form for creating a new circular.
     */
    public function create()
    {
        \Log::info('=== CircularController@create ===');
        \Log::info('Usuario ID: ' . Auth::id());
        \Log::info('Usuario Email: ' . Auth::user()->email);
        \Log::info('Es Admin: ' . (Auth::user()->is_admin ? 'true' : 'false'));

        // Verificar permiso de creación
        if (!Auth::user()->is_admin) {
            $module = Auth::user()->modules()->where('slug', 'circulares')->first();

            \Log::info('Módulo encontrado: ' . ($module ? 'SI' : 'NO'));
            if ($module) {
                \Log::info('can_create valor: ' . $module->pivot->can_create);
                \Log::info('can_create tipo: ' . gettype($module->pivot->can_create));
            }

            if (!$module || !$module->pivot->can_create) {
                \Log::warning('ACCESO DENEGADO - abort(403)');
                abort(403, 'No tienes permisos para crear circulares. Usuario: ' . Auth::user()->email);
            }

            \Log::info('ACCESO PERMITIDO');
        } else {
            \Log::info('ES ADMIN - ACCESO PERMITIDO');
        }

        return view('admin.circulares.create');
    }

    /**
     * Store a newly created circular in storage.
     */
    public function store(Request $request)
    {
        // Verificar permiso de creación
        if (!Auth::user()->is_admin) {
            $module = Auth::user()->modules()->where('slug', 'circulares')->first();
            if (!$module || !$module->pivot->can_create) {
                abort(403, 'No tienes permisos para crear circulares');
            }
        }
        $validated = $request->validate([
            'nombre' => 'required|string|max:255',
            'descripcion' => 'required|string',
            'fecha' => 'required|date',
            'archivo' => 'required|file|mimes:pdf,doc,docx,xls,xlsx|max:10240',
        ], [
            'nombre.required' => 'El nombre es obligatorio.',
            'nombre.max' => 'El nombre no debe exceder 255 caracteres.',
            'descripcion.required' => 'La descripción es obligatoria.',
            'fecha.required' => 'La fecha es obligatoria.',
            'fecha.date' => 'La fecha debe ser una fecha válida.',
            'archivo.required' => 'El archivo es obligatorio.',
            'archivo.mimes' => 'El archivo debe ser PDF, Word (doc, docx) o Excel (xls, xlsx).',
            'archivo.max' => 'El archivo no debe superar 10MB.',
        ]);

        // Subir el archivo
        if ($request->hasFile('archivo')) {
            $file = $request->file('archivo');
            $fileName = time() . '_' . $file->getClientOriginalName();
            $filePath = $file->storeAs('circulares', $fileName, 'public');
            $validated['archivo'] = $filePath;
        }

        Circular::create($validated);

        return redirect()
            ->route('circulares.admin.index')
            ->with('success', 'Circular creada exitosamente.');
    }

    /**
     * Show the form for editing the specified circular.
     */
    public function edit($id)
    {
        // Verificar permiso de edición
        if (!Auth::user()->is_admin) {
            $module = Auth::user()->modules()->where('slug', 'circulares')->first();
            if (!$module || !$module->pivot->can_edit) {
                abort(403, 'No tienes permisos para editar circulares');
            }
        }

        $circular = Circular::findOrFail($id);
        return view('admin.circulares.edit', compact('circular'));
    }

    /**
     * Update the specified circular in storage.
     */
    public function update(Request $request, $id)
    {
        // Verificar permiso de edición
        if (!Auth::user()->is_admin) {
            $module = Auth::user()->modules()->where('slug', 'circulares')->first();
            if (!$module || !$module->pivot->can_edit) {
                abort(403, 'No tienes permisos para editar circulares');
            }
        }

        $circular = Circular::findOrFail($id);

        $validated = $request->validate([
            'nombre' => 'required|string|max:255',
            'descripcion' => 'required|string',
            'fecha' => 'required|date',
            'archivo' => 'nullable|file|mimes:pdf,doc,docx,xls,xlsx|max:10240',
        ], [
            'nombre.required' => 'El nombre es obligatorio.',
            'nombre.max' => 'El nombre no debe exceder 255 caracteres.',
            'descripcion.required' => 'La descripción es obligatoria.',
            'fecha.required' => 'La fecha es obligatoria.',
            'fecha.date' => 'La fecha debe ser una fecha válida.',
            'archivo.mimes' => 'El archivo debe ser PDF, Word (doc, docx) o Excel (xls, xlsx).',
            'archivo.max' => 'El archivo no debe superar 10MB.',
        ]);

        // Subir nuevo archivo si se proporciona
        if ($request->hasFile('archivo')) {
            // Eliminar archivo anterior si existe
            if ($circular->archivo && Storage::disk('public')->exists($circular->archivo)) {
                Storage::disk('public')->delete($circular->archivo);
            }

            $file = $request->file('archivo');
            $fileName = time() . '_' . $file->getClientOriginalName();
            $filePath = $file->storeAs('circulares', $fileName, 'public');
            $validated['archivo'] = $filePath;
        }

        $circular->update($validated);

        return redirect()
            ->route('circulares.admin.index')
            ->with('success', 'Circular actualizada exitosamente.');
    }

    /**
     * Remove the specified circular from storage.
     */
    public function destroy($id)
    {
        // Verificar permiso de eliminación
        if (!Auth::user()->is_admin) {
            $module = Auth::user()->modules()->where('slug', 'circulares')->first();
            if (!$module || !$module->pivot->can_delete) {
                abort(403, 'No tienes permisos para eliminar circulares');
            }
        }

        $circular = Circular::findOrFail($id);

        // Eliminar archivo si existe
        if ($circular->archivo && Storage::disk('public')->exists($circular->archivo)) {
            Storage::disk('public')->delete($circular->archivo);
        }

        $circular->delete();

        return redirect()
            ->route('circulares.admin.index')
            ->with('success', 'Circular eliminada exitosamente.');
    }

    /**
     * Display a listing of circulares for public view.
     */
    public function listPublic()
    {
        $circulares = Circular::orderBy('fecha', 'desc')
            ->orderBy('created_at', 'desc')
            ->paginate(15);

        return view('public.circulares', compact('circulares'));
    }

    /**
     * Display the specified circular for public view.
     */
    public function showPublic($id)
    {
        $circular = Circular::findOrFail($id);
        return view('public.circulares_show', compact('circular'));
    }
}
