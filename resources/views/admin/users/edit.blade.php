@extends('layouts.app')

@section('title', 'Editar Usuario')

@section('content')
<div class="py-6">
    <div class="max-w-4xl mx-auto">
        <!-- Header con botón de volver -->
        <div class="flex items-center mb-6">
            <a href="{{ route('users.index') }}"
               class="mr-4 text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-gray-200">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
                </svg>
            </a>
            <div>
                <h2 class="text-2xl font-semibold text-gray-800 dark:text-gray-200">
                    Editar Usuario
                </h2>
                <p class="text-sm text-gray-500 dark:text-gray-400 mt-1">{{ $user->name }}</p>
            </div>
        </div>

        <div class="bg-white dark:bg-gray-800 rounded-lg shadow-lg overflow-hidden">
            <div class="p-8">
                <form action="{{ route('users.update', $user) }}" method="POST">
                    @csrf
                    @method('PUT')

                    <!-- Nombre -->
                    <div class="mb-6">
                        <label for="name" class="block text-sm font-semibold text-gray-700 dark:text-gray-300 mb-2">
                            Nombre Completo <span class="text-red-500">*</span>
                        </label>
                        <input type="text"
                               name="name"
                               id="name"
                               value="{{ old('name', $user->name) }}"
                               required
                               class="w-full px-4 py-3 rounded-lg border border-gray-300 dark:border-gray-600 bg-white dark:bg-gray-700 text-gray-900 dark:text-gray-100 focus:ring-2 focus:ring-blue-500 focus:border-transparent transition">
                        @error('name')
                            <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Email -->
                    <div class="mb-6">
                        <label for="email" class="block text-sm font-semibold text-gray-700 dark:text-gray-300 mb-2">
                            Correo Electrónico <span class="text-red-500">*</span>
                        </label>
                        <input type="email"
                               name="email"
                               id="email"
                               value="{{ old('email', $user->email) }}"
                               required
                               class="w-full px-4 py-3 rounded-lg border border-gray-300 dark:border-gray-600 bg-white dark:bg-gray-700 text-gray-900 dark:text-gray-100 focus:ring-2 focus:ring-blue-500 focus:border-transparent transition">
                        @error('email')
                            <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Contraseña -->
                    <div class="mb-6">
                        <label for="password" class="block text-sm font-semibold text-gray-700 dark:text-gray-300 mb-2">
                            Nueva Contraseña
                        </label>
                        <input type="password"
                               name="password"
                               id="password"
                               class="w-full px-4 py-3 rounded-lg border border-gray-300 dark:border-gray-600 bg-white dark:bg-gray-700 text-gray-900 dark:text-gray-100 focus:ring-2 focus:ring-blue-500 focus:border-transparent transition"
                               placeholder="Dejar en blanco para mantener la actual">
                        <p class="mt-1 text-xs text-gray-500 dark:text-gray-400">
                            Solo completar si desea cambiar la contraseña
                        </p>
                        @error('password')
                            <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Confirmar Contraseña -->
                    <div class="mb-6">
                        <label for="password_confirmation" class="block text-sm font-semibold text-gray-700 dark:text-gray-300 mb-2">
                            Confirmar Nueva Contraseña
                        </label>
                        <input type="password"
                               name="password_confirmation"
                               id="password_confirmation"
                               class="w-full px-4 py-3 rounded-lg border border-gray-300 dark:border-gray-600 bg-white dark:bg-gray-700 text-gray-900 dark:text-gray-100 focus:ring-2 focus:ring-blue-500 focus:border-transparent transition">
                    </div>

                    <!-- Es Administrador -->
                    <div class="mb-6 p-4 bg-gray-50 dark:bg-gray-700 rounded-lg border border-gray-200 dark:border-gray-600">
                        <label class="flex items-center cursor-pointer">
                            <input type="checkbox"
                                   name="is_admin"
                                   id="is_admin"
                                   value="1"
                                   {{ old('is_admin', $user->is_admin) ? 'checked' : '' }}
                                   class="w-5 h-5 rounded border-gray-300 text-blue-600 focus:ring-2 focus:ring-blue-500 dark:bg-gray-600 dark:border-gray-500"
                                   onchange="toggleModules()">
                            <span class="ml-3 text-sm font-medium text-gray-700 dark:text-gray-300">
                                Conceder privilegios de Administrador
                            </span>
                        </label>
                        <p class="mt-2 ml-8 text-xs text-gray-500 dark:text-gray-400">
                            Los administradores tienen acceso completo a todas las funcionalidades
                        </p>
                    </div>

                    <!-- Módulos -->
                    <div id="modules-section" class="mb-6">
                        <label class="block text-sm font-semibold text-gray-700 dark:text-gray-300 mb-3">
                            Módulos Permitidos
                        </label>
                        <div class="space-y-3">
                            @foreach($modules as $module)
                                <div class="border border-gray-200 dark:border-gray-600 rounded-lg p-4 hover:bg-gray-50 dark:hover:bg-gray-700 transition cursor-pointer">
                                    <label class="flex items-start cursor-pointer">
                                        <input type="checkbox"
                                               name="modules[]"
                                               value="{{ $module->id }}"
                                               {{ in_array($module->id, old('modules', $userModules)) ? 'checked' : '' }}
                                               class="mt-1 w-5 h-5 rounded border-gray-300 text-blue-600 focus:ring-2 focus:ring-blue-500 dark:bg-gray-600 dark:border-gray-500">
                                        <div class="ml-4 flex-1">
                                            <div class="flex items-center justify-between">
                                                <span class="text-base font-medium text-gray-900 dark:text-gray-100">
                                                    {{ $module->name }}
                                                </span>
                                                @if($module->is_active)
                                                    <span class="px-2 py-1 text-xs rounded-full bg-green-100 text-green-800">
                                                        Activo
                                                    </span>
                                                @endif
                                            </div>
                                            @if($module->description)
                                                <p class="mt-1 text-sm text-gray-500 dark:text-gray-400">
                                                    {{ $module->description }}
                                                </p>
                                            @endif
                                        </div>
                                    </label>
                                </div>
                            @endforeach
                        </div>
                        @error('modules')
                            <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Botones -->
                    <div class="flex items-center justify-end space-x-3 pt-6 border-t border-gray-200 dark:border-gray-700">
                        <a href="{{ route('users.index') }}"
                           class="px-6 py-3 bg-gray-500 hover:bg-gray-600 text-white font-medium rounded-lg transition duration-200 ease-in-out transform hover:scale-105">
                            Cancelar
                        </a>
                        <button type="submit"
                                class="px-6 py-3 bg-blue-600 hover:bg-blue-700 text-white font-medium rounded-lg transition duration-200 ease-in-out transform hover:scale-105 shadow-lg">
                            Actualizar Usuario
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
    function toggleModules() {
        const isAdmin = document.getElementById('is_admin').checked;
        const modulesSection = document.getElementById('modules-section');

        if (isAdmin) {
            modulesSection.style.display = 'none';
        } else {
            modulesSection.style.display = 'block';
        }
    }

    // Ejecutar al cargar la página
    document.addEventListener('DOMContentLoaded', toggleModules);
</script>
@endsection
