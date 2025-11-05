@extends('layouts.app')

@section('title', 'Gestionar Módulos')

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
                    Gestionar Módulos
                </h2>
                <p class="text-sm text-gray-500 dark:text-gray-400 mt-1">{{ $user->name }}</p>
            </div>
        </div>

        <!-- Información del usuario -->
        <div class="mb-6 bg-gradient-to-r from-green-50 to-blue-50 dark:from-gray-700 dark:to-gray-600 rounded-lg shadow-md p-6 border-l-4 border-green-500">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-sm font-medium text-gray-600 dark:text-gray-300">Usuario</p>
                    <p class="text-lg font-bold text-gray-900 dark:text-white">{{ $user->name }}</p>
                    <p class="text-sm text-gray-600 dark:text-gray-300 mt-1">{{ $user->email }}</p>
                </div>
                <div>
                    @if($user->is_admin)
                        <span class="px-4 py-2 text-sm font-bold rounded-full bg-green-100 text-green-800 shadow">
                            👤 Administrador
                        </span>
                    @else
                        <span class="px-4 py-2 text-sm font-bold rounded-full bg-blue-100 text-blue-800 shadow">
                            👤 Usuario
                        </span>
                    @endif
                </div>
            </div>
        </div>

        <div class="bg-white dark:bg-gray-800 rounded-lg shadow-lg overflow-hidden">
            <div class="p-8">
                @if($user->is_admin)
                    <div class="text-center py-12">
                        <div class="mb-4">
                            <svg class="w-20 h-20 mx-auto text-green-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"></path>
                            </svg>
                        </div>
                        <h3 class="text-xl font-bold text-gray-900 dark:text-white mb-2">
                            Usuario Administrador
                        </h3>
                        <p class="text-gray-600 dark:text-gray-400 max-w-md mx-auto">
                            Los administradores tienen acceso automático a todos los módulos del sistema.
                            No es necesario asignar módulos manualmente.
                        </p>
                        <div class="mt-6">
                            <a href="{{ route('users.index') }}"
                               class="px-6 py-3 bg-green-600 hover:bg-green-700 text-white font-medium rounded-lg transition duration-200 ease-in-out transform hover:scale-105 shadow-lg inline-block">
                                Volver a Usuarios
                            </a>
                        </div>
                    </div>
                @else
                    <form action="{{ route('users.updateModules', $user) }}" method="POST">
                        @csrf
                        @method('PUT')

                        <div class="mb-6">
                            <label class="block text-sm font-semibold text-gray-700 dark:text-gray-300 mb-4">
                                Módulos Disponibles
                            </label>
                            <div class="space-y-4">
                                @foreach($modules as $module)
                                    @php
                                        $isAssigned = in_array($module->id, $userModules);
                                    @endphp
                                    <div class="border-2 {{ $isAssigned ? 'border-green-400 bg-green-50 dark:bg-green-900/20' : 'border-gray-200 dark:border-gray-600' }} rounded-xl p-5 hover:shadow-lg transition-all duration-200 cursor-pointer transform hover:-translate-y-1">
                                        <label class="flex items-start cursor-pointer">
                                            <input type="checkbox"
                                                   name="modules[]"
                                                   value="{{ $module->id }}"
                                                   {{ $isAssigned ? 'checked' : '' }}
                                                   class="mt-1 w-6 h-6 rounded border-gray-300 text-green-600 focus:ring-2 focus:ring-green-500 dark:bg-gray-600 dark:border-gray-500"
                                                   onchange="this.parentElement.parentElement.classList.toggle('border-green-400'); this.parentElement.parentElement.classList.toggle('bg-green-50'); this.parentElement.parentElement.classList.toggle('dark:bg-green-900/20');">
                                            <div class="ml-4 flex-1">
                                                <div class="flex items-center justify-between mb-2">
                                                    <span class="text-lg font-bold text-gray-900 dark:text-gray-100">
                                                        {{ $module->name }}
                                                    </span>
                                                    <div class="flex items-center space-x-2">
                                                        @if($isAssigned)
                                                            <span class="px-3 py-1 text-xs font-bold rounded-full bg-green-500 text-white shadow">
                                                                ✓ Asignado
                                                            </span>
                                                        @endif
                                                        @if($module->is_active)
                                                            <span class="px-3 py-1 text-xs font-bold rounded-full bg-blue-100 text-blue-800">
                                                                Activo
                                                            </span>
                                                        @else
                                                            <span class="px-3 py-1 text-xs font-bold rounded-full bg-gray-100 text-gray-800">
                                                                Inactivo
                                                            </span>
                                                        @endif
                                                    </div>
                                                </div>
                                                @if($module->description)
                                                    <p class="text-sm text-gray-600 dark:text-gray-400">
                                                        {{ $module->description }}
                                                    </p>
                                                @endif
                                            </div>
                                        </label>
                                    </div>
                                @endforeach
                            </div>
                            <p class="mt-4 text-xs text-gray-500 dark:text-gray-400 bg-blue-50 dark:bg-blue-900/20 p-3 rounded-lg border border-blue-200 dark:border-blue-800">
                                💡 <strong>Tip:</strong> Selecciona los módulos a los que <strong>{{ $user->name }}</strong> tendrá acceso. Solo podrá ver y usar los módulos seleccionados en su panel de control.
                            </p>
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
                                    class="px-6 py-3 bg-blue-600 hover:bg-blue-700 text-white font-medium rounded-lg transition duration-200 ease-in-out transform hover:scale-105 shadow-lg flex items-center">
                                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                                </svg>
                                Guardar Módulos
                            </button>
                        </div>
                    </form>
                @endif
            </div>
        </div>
    </div>
</div>
@endsection
