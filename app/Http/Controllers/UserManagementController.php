<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Module;
use App\Models\Category;
use App\Models\ConceptType;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;

class UserManagementController extends Controller
{
    /**
     * Mostrar listado de usuarios
     */
    public function index()
    {
        $users = User::with('modules')->orderBy('name')->paginate(15);
        return view('admin.users.index', compact('users'));
    }

    /**
     * Mostrar formulario de creación de usuario
     */
    public function create()
    {
        $modules = Module::active()->ordered()->get();
        $categories = Category::all();
        $conceptTypes = ConceptType::all();

        return view('admin.users.create', compact('modules', 'categories', 'conceptTypes'));
    }

    /**
     * Guardar nuevo usuario
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
            'is_admin' => ['boolean'],
            'modules' => ['array'],
            'modules.*' => ['exists:modules,id'],
            'category_permissions' => ['array'],
            'category_permissions.*.can_create' => ['boolean'],
            'category_permissions.*.can_edit' => ['boolean'],
            'category_permissions.*.can_delete' => ['boolean'],
            'concept_permissions' => ['array'],
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'is_admin' => $request->boolean('is_admin'),
        ]);

        // Asignar módulos con permisos si no es admin
        if (!$user->is_admin && $request->has('modules')) {
            $modulesData = [];
            foreach ($request->modules as $moduleId => $modulePermissions) {
                // Solo agregar si el módulo está habilitado
                if (isset($modulePermissions['enabled']) && $modulePermissions['enabled']) {
                    $modulesData[$moduleId] = [
                        'can_create' => isset($modulePermissions['can_create']) ? 1 : 0,
                        'can_edit' => isset($modulePermissions['can_edit']) ? 1 : 0,
                        'can_delete' => isset($modulePermissions['can_delete']) ? 1 : 0,
                    ];
                }
            }
            $user->modules()->sync($modulesData);
        }

        // Asignar permisos de categorías
        if (!$user->is_admin && $request->has('category_permissions')) {
            foreach ($request->category_permissions as $categoryId => $permissions) {
                if (isset($permissions['can_create']) || isset($permissions['can_edit']) || isset($permissions['can_delete'])) {
                    $user->categoryPermissions()->create([
                        'category_id' => $categoryId,
                        'can_create' => isset($permissions['can_create']),
                        'can_edit' => isset($permissions['can_edit']),
                        'can_delete' => isset($permissions['can_delete']),
                    ]);
                }
            }
        }

        // Asignar permisos de conceptos (globales)
        if (!$user->is_admin && $request->has('concept_permissions')) {
            $canCreate = isset($request->concept_permissions['create']);
            $canEdit = isset($request->concept_permissions['edit']);
            $canDelete = isset($request->concept_permissions['delete']);

            if ($canCreate || $canEdit || $canDelete) {
                $conceptTypes = ConceptType::all();
                foreach ($conceptTypes as $type) {
                    $user->conceptTypes()->attach($type->id, [
                        'can_create' => $canCreate,
                        'can_edit' => $canEdit,
                        'can_delete' => $canDelete
                    ]);
                }
            }
        }

        // Limpiar caché del usuario
        $this->clearUserCache($user->id);

        return redirect()->route('users.index')
            ->with('success', 'Usuario creado exitosamente');
    }

    /**
     * Mostrar formulario de edición de usuario
     */
    public function edit(User $user)
    {
        $modules = Module::active()->ordered()->get();
        $userModules = $user->modules->pluck('id')->toArray();

        $categories = Category::all();
        $conceptTypes = ConceptType::all();

        // Obtener permisos actuales de categorías
        $userCategoryPermissions = $user->categoryPermissions()
            ->get()
            ->keyBy('category_id')
            ->toArray();

        // Obtener permisos actuales de conceptos (globales)
        $userConceptPermissions = [];
        $allTypes = ConceptType::all();
        if ($allTypes->count() > 0) {
            $types = $user->conceptTypes;
            if ($types->count() === $allTypes->count()) {
                $firstType = $types->first();
                if ($firstType) {
                    $userConceptPermissions = [
                        'can_create' => $firstType->pivot->can_create,
                        'can_edit' => $firstType->pivot->can_edit,
                        'can_delete' => $firstType->pivot->can_delete,
                    ];
                }
            }
        }

        return view('admin.users.edit', compact('user', 'modules', 'userModules', 'categories', 'conceptTypes', 'userCategoryPermissions', 'userConceptPermissions'));
    }

    /**
     * Actualizar usuario
     */
    public function update(Request $request, User $user)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users,email,' . $user->id],
            'password' => ['nullable', 'confirmed', Rules\Password::defaults()],
            'is_admin' => ['boolean'],
            'modules' => ['array'],
            'modules.*' => ['exists:modules,id'],
            'category_permissions' => ['array'],
            'category_permissions.*.can_create' => ['boolean'],
            'category_permissions.*.can_edit' => ['boolean'],
            'category_permissions.*.can_delete' => ['boolean'],
            'concept_permissions' => ['array'],
        ]);

        $user->name = $request->name;
        $user->email = $request->email;
        $user->is_admin = $request->boolean('is_admin');

        if ($request->filled('password')) {
            $user->password = Hash::make($request->password);
        }

        $user->save();

        // Actualizar módulos con permisos si no es admin
        if (!$user->is_admin && $request->has('modules')) {
            $modulesData = [];
            foreach ($request->modules as $moduleId => $modulePermissions) {
                // Solo agregar si el módulo está habilitado
                if (isset($modulePermissions['enabled']) && $modulePermissions['enabled']) {
                    $modulesData[$moduleId] = [
                        'can_create' => isset($modulePermissions['can_create']) ? 1 : 0,
                        'can_edit' => isset($modulePermissions['can_edit']) ? 1 : 0,
                        'can_delete' => isset($modulePermissions['can_delete']) ? 1 : 0,
                    ];
                }
            }
            $user->modules()->sync($modulesData);
        } elseif ($user->is_admin) {
            // Si es admin, remover todos los módulos asignados (no los necesita)
            $user->modules()->detach();
        }

        // Actualizar permisos de categorías
        if (!$user->is_admin) {
            // Eliminar permisos existentes
            $user->categoryPermissions()->delete();

            // Crear nuevos permisos
            if ($request->has('category_permissions')) {
                foreach ($request->category_permissions as $categoryId => $permissions) {
                    if (isset($permissions['can_create']) || isset($permissions['can_edit']) || isset($permissions['can_delete'])) {
                        $user->categoryPermissions()->create([
                            'category_id' => $categoryId,
                            'can_create' => isset($permissions['can_create']),
                            'can_edit' => isset($permissions['can_edit']),
                            'can_delete' => isset($permissions['can_delete']),
                        ]);
                    }
                }
            }

            // Actualizar permisos de conceptos (globales)
            $user->conceptTypes()->detach();

            if ($request->has('concept_permissions')) {
                $canCreate = isset($request->concept_permissions['create']);
                $canEdit = isset($request->concept_permissions['edit']);
                $canDelete = isset($request->concept_permissions['delete']);

                if ($canCreate || $canEdit || $canDelete) {
                    $conceptTypes = ConceptType::all();
                    foreach ($conceptTypes as $type) {
                        $user->conceptTypes()->attach($type->id, [
                            'can_create' => $canCreate,
                            'can_edit' => $canEdit,
                            'can_delete' => $canDelete
                        ]);
                    }
                }
            }
        } elseif ($user->is_admin) {
            // Si es admin, remover todos los permisos (no los necesita)
            $user->categoryPermissions()->delete();
            $user->conceptTypes()->detach();
        }

        // Limpiar caché del usuario
        $this->clearUserCache($user->id);

        return redirect()->route('users.index')
            ->with('success', 'Usuario actualizado exitosamente');
    }

    /**
     * Eliminar usuario
     */
    public function destroy(User $user)
    {
        // No permitir eliminar el propio usuario
        if ($user->id === auth()->id()) {
            return redirect()->route('users.index')
                ->with('error', 'No puedes eliminar tu propio usuario');
        }

        $user->delete();

        return redirect()->route('users.index')
            ->with('success', 'Usuario eliminado exitosamente');
    }

    /**
     * Mostrar formulario de asignación de módulos
     */
    public function manageModules(User $user)
    {
        $modules = Module::active()->ordered()->get();
        $userModules = $user->modules->pluck('id')->toArray();

        return view('admin.users.modules', compact('user', 'modules', 'userModules'));
    }

    /**
     * Actualizar módulos del usuario
     */
    public function updateModules(Request $request, User $user)
    {
        $request->validate([
            'modules' => ['array'],
            'modules.*' => ['exists:modules,id'],
        ]);

        // Si el usuario es admin, no necesita módulos asignados
        if ($user->is_admin) {
            $user->modules()->detach();
            return redirect()->route('users.index')
                ->with('info', 'Los administradores tienen acceso a todos los módulos automáticamente');
        }

        $user->modules()->sync($request->modules ?? []);

        return redirect()->route('users.index')
            ->with('success', 'Módulos actualizados exitosamente');
    }

    /**
     * Mostrar formulario de Mi Cuenta (edición de perfil del usuario actual)
     */
    public function myAccount()
    {
        $user = auth()->user();
        return view('admin.users.my-account', compact('user'));
    }

    /**
     * Actualizar perfil del usuario actual (Mi Cuenta)
     */
    public function updateMyAccount(Request $request)
    {
        $user = auth()->user();

        $request->validate([
            'password' => ['nullable', 'confirmed', Rules\Password::defaults()],
        ]);

        // Solo permitir cambio de contraseña
        if ($request->filled('password')) {
            $user->password = Hash::make($request->password);
            $user->save();

            return redirect()->route('my-account.edit')
                ->with('success', 'Contraseña actualizada exitosamente');
        }

        return redirect()->route('my-account.edit')
            ->with('info', 'No se realizaron cambios');
    }

    /**
     * Limpiar caché del usuario
     */
    private function clearUserCache($userId)
    {
        cache()->forget("user_{$userId}_accessible_modules");
        cache()->forget("user_{$userId}_global_concept_create");
        cache()->forget("user_{$userId}_global_concept_edit");
        cache()->forget("user_{$userId}_global_concept_delete");
    }
}
