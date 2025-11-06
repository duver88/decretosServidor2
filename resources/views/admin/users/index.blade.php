@extends('layouts.app')

@section('title', 'Gestión de Usuarios')

@section('content')
<div class="py-6">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <!-- Header mejorado con estadísticas -->
        <div class="mb-8">
            <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center gap-4 mb-6">
                <div>
                    <h2 class="text-3xl font-bold text-gray-900 dark:text-gray-100">
                        <i class="fas fa-users text-[#43883d] mr-2"></i>
                        Gestión de Usuarios
                    </h2>
                    <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
                        Administra usuarios, roles y permisos del sistema
                    </p>
                </div>
                <a href="{{ route('users.create') }}"
                   class="inline-flex items-center px-4 py-2 bg-[#43883d] hover:bg-[#357030] text-white font-semibold rounded-lg shadow-lg hover:shadow-xl transition-all duration-200 transform hover:scale-105">
                    <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path>
                    </svg>
                    Nuevo Usuario
                </a>
            </div>

            <!-- Estadísticas rápidas -->
            <div class="grid grid-cols-1 md:grid-cols-4 gap-4 mb-6">
                <div class="bg-gradient-to-br from-blue-500 to-blue-600 rounded-xl shadow-lg p-6 text-white">
                    <div class="flex items-center justify-between">
                        <div>
                            <p class="text-sm font-medium opacity-90">Total Usuarios</p>
                            <p class="text-3xl font-bold mt-1">{{ $users->total() }}</p>
                        </div>
                        <div class="bg-white bg-opacity-30 rounded-full p-3">
                            <i class="fas fa-users text-2xl"></i>
                        </div>
                    </div>
                </div>

                <div class="bg-gradient-to-br from-green-500 to-green-600 rounded-xl shadow-lg p-6 text-white">
                    <div class="flex items-center justify-between">
                        <div>
                            <p class="text-sm font-medium opacity-90">Administradores</p>
                            <p class="text-3xl font-bold mt-1">{{ $users->where('is_admin', true)->count() }}</p>
                        </div>
                        <div class="bg-white bg-opacity-30 rounded-full p-3">
                            <i class="fas fa-user-shield text-2xl"></i>
                        </div>
                    </div>
                </div>

                <div class="bg-gradient-to-br from-indigo-500 to-indigo-600 rounded-xl shadow-lg p-6 text-white">
                    <div class="flex items-center justify-between">
                        <div>
                            <p class="text-sm font-medium opacity-90">Usuarios Regulares</p>
                            <p class="text-3xl font-bold mt-1">{{ $users->where('is_admin', false)->count() }}</p>
                        </div>
                        <div class="bg-white bg-opacity-30 rounded-full p-3">
                            <i class="fas fa-user text-2xl"></i>
                        </div>
                    </div>
                </div>

                <div class="bg-gradient-to-br from-purple-500 to-purple-600 rounded-xl shadow-lg p-6 text-white">
                    <div class="flex items-center justify-between">
                        <div>
                            <p class="text-sm font-medium opacity-90">En esta página</p>
                            <p class="text-3xl font-bold mt-1">{{ $users->count() }}</p>
                        </div>
                        <div class="bg-white bg-opacity-30 rounded-full p-3">
                            <i class="fas fa-file-alt text-2xl"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Mensajes de éxito/error mejorados -->
        @if(session('success'))
            <div class="mb-6 bg-green-50 dark:bg-green-900/20 border-l-4 border-green-500 p-4 rounded-lg shadow-sm animate-fade-in" role="alert">
                <div class="flex items-center">
                    <i class="fas fa-check-circle text-green-500 mr-3 text-xl"></i>
                    <span class="text-green-800 dark:text-green-300 font-medium">{{ session('success') }}</span>
                </div>
            </div>
        @endif

        @if(session('error'))
            <div class="mb-6 bg-red-50 dark:bg-red-900/20 border-l-4 border-red-500 p-4 rounded-lg shadow-sm animate-fade-in" role="alert">
                <div class="flex items-center">
                    <i class="fas fa-exclamation-circle text-red-500 mr-3 text-xl"></i>
                    <span class="text-red-800 dark:text-red-300 font-medium">{{ session('error') }}</span>
                </div>
            </div>
        @endif

        @if(session('info'))
            <div class="mb-6 bg-blue-50 dark:bg-blue-900/20 border-l-4 border-blue-500 p-4 rounded-lg shadow-sm animate-fade-in" role="alert">
                <div class="flex items-center">
                    <i class="fas fa-info-circle text-blue-500 mr-3 text-xl"></i>
                    <span class="text-blue-800 dark:text-blue-300 font-medium">{{ session('info') }}</span>
                </div>
            </div>
        @endif

        <!-- Tabla de usuarios mejorada -->
        <div class="bg-white dark:bg-gray-800 rounded-xl shadow-xl overflow-hidden">
            <div class="overflow-x-auto">
                <table class="min-w-full divide-y divide-gray-200 dark:divide-gray-700">
                    <thead class="bg-gradient-to-r from-gray-50 to-gray-100 dark:from-gray-700 dark:to-gray-800">
                        <tr>
                            <th scope="col" class="px-6 py-4 text-left text-xs font-bold text-gray-700 dark:text-gray-300 uppercase tracking-wider">
                                <i class="fas fa-user mr-2"></i>Usuario
                            </th>
                            <th scope="col" class="px-6 py-4 text-left text-xs font-bold text-gray-700 dark:text-gray-300 uppercase tracking-wider">
                                <i class="fas fa-envelope mr-2"></i>Contacto
                            </th>
                            <th scope="col" class="px-6 py-4 text-left text-xs font-bold text-gray-700 dark:text-gray-300 uppercase tracking-wider">
                                <i class="fas fa-shield-alt mr-2"></i>Rol
                            </th>
                            <th scope="col" class="px-6 py-4 text-left text-xs font-bold text-gray-700 dark:text-gray-300 uppercase tracking-wider">
                                <i class="fas fa-th-large mr-2"></i>Módulos
                            </th>
                            <th scope="col" class="px-6 py-4 text-left text-xs font-bold text-gray-700 dark:text-gray-300 uppercase tracking-wider">
                                <i class="fas fa-key mr-2"></i>Permisos
                            </th>
                            <th scope="col" class="px-6 py-4 text-right text-xs font-bold text-gray-700 dark:text-gray-300 uppercase tracking-wider">
                                <i class="fas fa-cog mr-2"></i>Acciones
                            </th>
                        </tr>
                    </thead>
                    <tbody class="bg-white dark:bg-gray-800 divide-y divide-gray-200 dark:divide-gray-700">
                        @forelse($users as $user)
                            <tr class="hover:bg-gray-50 dark:hover:bg-gray-750 transition-colors duration-150">
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="flex items-center">
                                        <div class="flex-shrink-0 h-10 w-10">
                                            <div class="h-10 w-10 rounded-full bg-gradient-to-br from-[#43883d] to-[#357030] flex items-center justify-center text-white font-bold shadow-md">
                                                {{ strtoupper(substr($user->name, 0, 1)) }}
                                            </div>
                                        </div>
                                        <div class="ml-4">
                                            <div class="text-sm font-semibold text-gray-900 dark:text-gray-100">
                                                {{ $user->name }}
                                            </div>
                                            <div class="text-xs text-gray-500 dark:text-gray-400">
                                                ID: #{{ $user->id }}
                                            </div>
                                        </div>
                                    </div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="text-sm text-gray-900 dark:text-gray-100">
                                        <i class="fas fa-envelope text-gray-400 mr-2"></i>
                                        {{ $user->email }}
                                    </div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    @if($user->is_admin)
                                        <span class="px-3 py-1 inline-flex text-xs leading-5 font-bold rounded-full bg-gradient-to-r from-green-400 to-green-600 text-white shadow-md">
                                            <i class="fas fa-crown mr-1"></i>Administrador
                                        </span>
                                    @else
                                        <span class="px-3 py-1 inline-flex text-xs leading-5 font-bold rounded-full bg-gradient-to-r from-blue-400 to-blue-600 text-white shadow-md">
                                            <i class="fas fa-user mr-1"></i>Usuario
                                        </span>
                                    @endif
                                </td>
                                <td class="px-6 py-4">
                                    @if($user->is_admin)
                                        <div class="flex items-center">
                                            <span class="px-3 py-1 text-xs font-semibold rounded-full bg-green-100 dark:bg-green-900 text-green-800 dark:text-green-300">
                                                <i class="fas fa-check-circle mr-1"></i>Acceso Total
                                            </span>
                                        </div>
                                    @else
                                        <div class="flex flex-wrap gap-1">
                                            @forelse($user->modules as $module)
                                                <span class="px-2 py-1 text-xs font-medium rounded-lg bg-indigo-100 dark:bg-indigo-900 text-indigo-800 dark:text-indigo-300 border border-indigo-200 dark:border-indigo-700">
                                                    <i class="fas fa-cube mr-1"></i>{{ $module->name }}
                                                </span>
                                            @empty
                                                <span class="px-3 py-1 text-xs font-semibold rounded-full bg-red-100 dark:bg-red-900 text-red-800 dark:text-red-300">
                                                    <i class="fas fa-exclamation-triangle mr-1"></i>Sin módulos
                                                </span>
                                            @endforelse
                                        </div>
                                    @endif
                                </td>
                                <td class="px-6 py-4">
                                    @if(!$user->is_admin)
                                        <div class="flex flex-col gap-1">
                                            @php
                                                $totalPermissions = $user->categoryPermissions->count() + $user->conceptTypes->count();
                                            @endphp
                                            @if($totalPermissions > 0)
                                                <span class="text-xs text-gray-600 dark:text-gray-400">
                                                    <i class="fas fa-folder mr-1"></i>{{ $user->categoryPermissions->count() }} categorías
                                                </span>
                                                <span class="text-xs text-gray-600 dark:text-gray-400">
                                                    <i class="fas fa-file-alt mr-1"></i>{{ $user->conceptTypes->count() }} tipos de concepto
                                                </span>
                                            @else
                                                <span class="text-xs text-gray-500 dark:text-gray-400 italic">
                                                    <i class="fas fa-info-circle mr-1"></i>Sin permisos
                                                </span>
                                            @endif
                                        </div>
                                    @else
                                        <span class="text-xs text-gray-500 dark:text-gray-400 italic">
                                            <i class="fas fa-infinity mr-1"></i>Todos los permisos
                                        </span>
                                    @endif
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                    <div class="flex items-center justify-end gap-2">
                                        <a href="{{ route('users.edit', $user) }}"
                                           class="inline-flex items-center px-3 py-1.5 bg-indigo-100 dark:bg-indigo-900 text-indigo-700 dark:text-indigo-300 rounded-lg hover:bg-indigo-200 dark:hover:bg-indigo-800 transition-colors duration-150"
                                           title="Editar usuario">
                                            <i class="fas fa-edit mr-1"></i>Editar
                                        </a>
                                        <a href="{{ route('users.modules', $user) }}"
                                           class="inline-flex items-center px-3 py-1.5 bg-blue-100 dark:bg-blue-900 text-blue-700 dark:text-blue-300 rounded-lg hover:bg-blue-200 dark:hover:bg-blue-800 transition-colors duration-150"
                                           title="Gestionar módulos">
                                            <i class="fas fa-th-large mr-1"></i>Módulos
                                        </a>
                                        @if($user->id !== auth()->id())
                                            <form action="{{ route('users.destroy', $user) }}"
                                                  method="POST"
                                                  class="inline"
                                                  onsubmit="return confirm('¿Estás seguro de que deseas eliminar a {{ $user->name }}? Esta acción no se puede deshacer.');">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit"
                                                        class="inline-flex items-center px-3 py-1.5 bg-red-100 dark:bg-red-900 text-red-700 dark:text-red-300 rounded-lg hover:bg-red-200 dark:hover:bg-red-800 transition-colors duration-150"
                                                        title="Eliminar usuario">
                                                    <i class="fas fa-trash-alt mr-1"></i>Eliminar
                                                </button>
                                            </form>
                                        @else
                                            <span class="inline-flex items-center px-3 py-1.5 bg-gray-100 dark:bg-gray-700 text-gray-500 dark:text-gray-400 rounded-lg cursor-not-allowed"
                                                  title="No puedes eliminar tu propia cuenta">
                                                <i class="fas fa-lock mr-1"></i>Tú
                                            </span>
                                        @endif
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="6" class="px-6 py-12 text-center">
                                    <div class="flex flex-col items-center justify-center">
                                        <i class="fas fa-users text-gray-300 dark:text-gray-600 text-6xl mb-4"></i>
                                        <p class="text-gray-500 dark:text-gray-400 text-lg font-medium">No hay usuarios registrados</p>
                                        <p class="text-gray-400 dark:text-gray-500 text-sm mt-1">Comienza creando un nuevo usuario</p>
                                    </div>
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            <!-- Paginación mejorada -->
            @if($users->hasPages())
                <div class="bg-gray-50 dark:bg-gray-750 px-6 py-4 border-t border-gray-200 dark:border-gray-700">
                    <div class="flex items-center justify-between">
                        <div class="text-sm text-gray-600 dark:text-gray-400">
                            Mostrando <span class="font-semibold">{{ $users->firstItem() }}</span> a <span class="font-semibold">{{ $users->lastItem() }}</span> de <span class="font-semibold">{{ $users->total() }}</span> usuarios
                        </div>
                        <div>
                            {{ $users->links() }}
                        </div>
                    </div>
                </div>
            @endif
        </div>
    </div>
</div>

<style>
@keyframes fade-in {
    from {
        opacity: 0;
        transform: translateY(-10px);
    }
    to {
        opacity: 1;
        transform: translateY(0);
    }
}

.animate-fade-in {
    animation: fade-in 0.3s ease-out;
}

.dark .dark\:bg-gray-750 {
    background-color: #2d3748;
}

.dark .dark\:hover\:bg-gray-750:hover {
    background-color: #374151;
}
</style>
@endsection
