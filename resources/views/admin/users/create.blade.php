@extends('layouts.app')

@section('title', 'Crear Nuevo Usuario')

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
            <h2 class="text-2xl font-semibold text-gray-800 dark:text-gray-200">
                Crear Nuevo Usuario
            </h2>
        </div>

        <div class="bg-white dark:bg-gray-800 rounded-lg shadow-lg overflow-hidden">
            <div class="p-8">
                <form action="{{ route('users.store') }}" method="POST">
                    @csrf

                    <!-- Nombre -->
                    <div class="mb-6">
                        <label for="name" class="block text-sm font-semibold text-gray-700 dark:text-gray-300 mb-2">
                            Nombre Completo <span class="text-red-500">*</span>
                        </label>
                        <input type="text"
                               name="name"
                               id="name"
                               value="{{ old('name') }}"
                               required
                               class="w-full px-4 py-3 rounded-lg border border-gray-300 dark:border-gray-600 bg-white dark:bg-gray-700 text-gray-900 dark:text-gray-100 focus:ring-2 focus:ring-green-500 focus:border-transparent transition"
                               placeholder="Ingrese el nombre completo">
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
                               value="{{ old('email') }}"
                               required
                               class="w-full px-4 py-3 rounded-lg border border-gray-300 dark:border-gray-600 bg-white dark:bg-gray-700 text-gray-900 dark:text-gray-100 focus:ring-2 focus:ring-green-500 focus:border-transparent transition"
                               placeholder="usuario@ejemplo.com">
                        @error('email')
                            <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Contraseña -->
                    <div class="mb-6">
                        <label for="password" class="block text-sm font-semibold text-gray-700 dark:text-gray-300 mb-2">
                            Contraseña <span class="text-red-500">*</span>
                        </label>
                        <input type="password"
                               name="password"
                               id="password"
                               required
                               class="w-full px-4 py-3 rounded-lg border border-gray-300 dark:border-gray-600 bg-white dark:bg-gray-700 text-gray-900 dark:text-gray-100 focus:ring-2 focus:ring-green-500 focus:border-transparent transition"
                               placeholder="Mínimo 8 caracteres">
                        @error('password')
                            <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Confirmar Contraseña -->
                    <div class="mb-6">
                        <label for="password_confirmation" class="block text-sm font-semibold text-gray-700 dark:text-gray-300 mb-2">
                            Confirmar Contraseña <span class="text-red-500">*</span>
                        </label>
                        <input type="password"
                               name="password_confirmation"
                               id="password_confirmation"
                               required
                               class="w-full px-4 py-3 rounded-lg border border-gray-300 dark:border-gray-600 bg-white dark:bg-gray-700 text-gray-900 dark:text-gray-100 focus:ring-2 focus:ring-green-500 focus:border-transparent transition"
                               placeholder="Repita la contraseña">
                    </div>

                    <!-- Es Administrador -->
                    <div class="mb-6 p-4 bg-gray-50 dark:bg-gray-700 rounded-lg border border-gray-200 dark:border-gray-600">
                        <label class="flex items-center cursor-pointer">
                            <input type="checkbox"
                                   name="is_admin"
                                   id="is_admin"
                                   value="1"
                                   {{ old('is_admin') ? 'checked' : '' }}
                                   class="w-5 h-5 rounded border-gray-300 text-green-600 focus:ring-2 focus:ring-green-500 dark:bg-gray-600 dark:border-gray-500"
                                   onchange="toggleModules()">
                            <span class="ml-3 text-sm font-medium text-gray-700 dark:text-gray-300">
                                Conceder privilegios de Administrador
                            </span>
                        </label>
                        <p class="mt-2 ml-8 text-xs text-gray-500 dark:text-gray-400">
                            Los administradores tienen acceso completo a todas las funcionalidades del sistema
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
                                               {{ in_array($module->id, old('modules', [])) ? 'checked' : '' }}
                                               class="mt-1 w-5 h-5 rounded border-gray-300 text-green-600 focus:ring-2 focus:ring-green-500 dark:bg-gray-600 dark:border-gray-500">
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
                        <p class="mt-3 text-xs text-gray-500 dark:text-gray-400">
                            Selecciona los módulos a los que el usuario tendrá acceso
                        </p>
                        @error('modules')
                            <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Permisos de Categorías (Actos Administrativos) -->
                    <div id="category-permissions-section" class="mb-6">
                        <label class="block text-sm font-semibold text-gray-700 dark:text-gray-300 mb-3">
                            Permisos para Actos Administrativos (por Categoría)
                        </label>
                        <div class="bg-gradient-to-r from-purple-50 to-pink-50 dark:from-gray-700 dark:to-gray-600 rounded-lg p-4 border-l-4 border-purple-500">
                            <p class="text-xs text-gray-600 dark:text-gray-300 mb-4">
                                Define qué acciones puede realizar el usuario en cada categoría de documentos
                            </p>
                            <div class="space-y-3">
                                @forelse($categories as $category)
                                    <div class="bg-white dark:bg-gray-800 rounded-lg p-4 shadow-sm">
                                        <div class="font-medium text-gray-900 dark:text-gray-100 mb-3">
                                            {{ $category->nombre }}
                                        </div>
                                        <div class="flex flex-wrap gap-4">
                                            <label class="flex items-center cursor-pointer">
                                                <input type="checkbox"
                                                       name="category_permissions[{{ $category->id }}][can_create]"
                                                       value="1"
                                                       {{ old("category_permissions.{$category->id}.can_create") ? 'checked' : '' }}
                                                       class="w-4 h-4 rounded border-gray-300 text-green-600 focus:ring-2 focus:ring-green-500">
                                                <span class="ml-2 text-sm text-gray-700 dark:text-gray-300">Crear</span>
                                            </label>
                                            <label class="flex items-center cursor-pointer">
                                                <input type="checkbox"
                                                       name="category_permissions[{{ $category->id }}][can_edit]"
                                                       value="1"
                                                       {{ old("category_permissions.{$category->id}.can_edit") ? 'checked' : '' }}
                                                       class="w-4 h-4 rounded border-gray-300 text-blue-600 focus:ring-2 focus:ring-blue-500">
                                                <span class="ml-2 text-sm text-gray-700 dark:text-gray-300">Editar</span>
                                            </label>
                                            <label class="flex items-center cursor-pointer">
                                                <input type="checkbox"
                                                       name="category_permissions[{{ $category->id }}][can_delete]"
                                                       value="1"
                                                       {{ old("category_permissions.{$category->id}.can_delete") ? 'checked' : '' }}
                                                       class="w-4 h-4 rounded border-gray-300 text-red-600 focus:ring-2 focus:ring-red-500">
                                                <span class="ml-2 text-sm text-gray-700 dark:text-gray-300">Eliminar</span>
                                            </label>
                                        </div>
                                    </div>
                                @empty
                                    <p class="text-sm text-gray-500 dark:text-gray-400 italic">No hay categorías disponibles</p>
                                @endforelse
                            </div>
                        </div>
                    </div>

                    <!-- Permisos de Conceptos (Globales) -->
                    <div id="concept-permissions-section" class="mb-6">
                        <label class="block text-sm font-semibold text-gray-700 dark:text-gray-300 mb-3">
                            Permisos para Conceptos (Globales)
                        </label>
                        <div class="bg-gradient-to-r from-blue-50 to-cyan-50 dark:from-gray-700 dark:to-gray-600 rounded-lg p-4 border-l-4 border-blue-500">
                            <p class="text-xs text-gray-600 dark:text-gray-300 mb-4">
                                Estos permisos se aplican a todos los tipos de conceptos
                            </p>
                            <div class="bg-white dark:bg-gray-800 rounded-lg p-4 shadow-sm">
                                <div class="flex flex-wrap gap-6">
                                    <label class="flex items-center cursor-pointer">
                                        <input type="checkbox"
                                               name="concept_permissions[create]"
                                               value="1"
                                               {{ old('concept_permissions.create') ? 'checked' : '' }}
                                               class="w-5 h-5 rounded border-gray-300 text-green-600 focus:ring-2 focus:ring-green-500">
                                        <span class="ml-3 text-base font-medium text-gray-700 dark:text-gray-300">Crear Conceptos</span>
                                    </label>
                                    <label class="flex items-center cursor-pointer">
                                        <input type="checkbox"
                                               name="concept_permissions[edit]"
                                               value="1"
                                               {{ old('concept_permissions.edit') ? 'checked' : '' }}
                                               class="w-5 h-5 rounded border-gray-300 text-blue-600 focus:ring-2 focus:ring-blue-500">
                                        <span class="ml-3 text-base font-medium text-gray-700 dark:text-gray-300">Editar Conceptos</span>
                                    </label>
                                    <label class="flex items-center cursor-pointer">
                                        <input type="checkbox"
                                               name="concept_permissions[delete]"
                                               value="1"
                                               {{ old('concept_permissions.delete') ? 'checked' : '' }}
                                               class="w-5 h-5 rounded border-gray-300 text-red-600 focus:ring-2 focus:ring-red-500">
                                        <span class="ml-3 text-base font-medium text-gray-700 dark:text-gray-300">Eliminar Conceptos</span>
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Botones -->
                    <div class="flex items-center justify-end space-x-3 pt-6 border-t border-gray-200 dark:border-gray-700">
                        <a href="{{ route('users.index') }}"
                           class="px-6 py-3 bg-gray-500 hover:bg-gray-600 text-white font-medium rounded-lg transition duration-200 ease-in-out transform hover:scale-105">
                            Cancelar
                        </a>
                        <button type="submit"
                                class="px-6 py-3 bg-green-600 hover:bg-green-700 text-white font-medium rounded-lg transition duration-200 ease-in-out transform hover:scale-105 shadow-lg">
                            Crear Usuario
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
        const categoryPermissionsSection = document.getElementById('category-permissions-section');
        const conceptPermissionsSection = document.getElementById('concept-permissions-section');

        if (isAdmin) {
            modulesSection.style.display = 'none';
            categoryPermissionsSection.style.display = 'none';
            conceptPermissionsSection.style.display = 'none';
        } else {
            modulesSection.style.display = 'block';
            categoryPermissionsSection.style.display = 'block';
            conceptPermissionsSection.style.display = 'block';
        }
    }

    // Ejecutar al cargar la página
    document.addEventListener('DOMContentLoaded', toggleModules);
</script>
@endsection
