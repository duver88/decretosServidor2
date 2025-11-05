<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Module;
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
        return view('admin.users.create', compact('modules'));
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
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'is_admin' => $request->boolean('is_admin'),
        ]);

        // Asignar módulos si no es admin
        if (!$user->is_admin && $request->has('modules')) {
            $user->modules()->sync($request->modules);
        }

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

        return view('admin.users.edit', compact('user', 'modules', 'userModules'));
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
        ]);

        $user->name = $request->name;
        $user->email = $request->email;
        $user->is_admin = $request->boolean('is_admin');

        if ($request->filled('password')) {
            $user->password = Hash::make($request->password);
        }

        $user->save();

        // Actualizar módulos si no es admin
        if (!$user->is_admin && $request->has('modules')) {
            $user->modules()->sync($request->modules);
        } elseif ($user->is_admin) {
            // Si es admin, remover todos los módulos asignados (no los necesita)
            $user->modules()->detach();
        }

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
}
