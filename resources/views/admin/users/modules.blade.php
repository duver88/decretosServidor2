<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                Gestionar Módulos: {{ $user->name }}
            </h2>
            <a href="{{ route('users.index') }}"
               class="bg-gray-600 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded inline-flex items-center">
                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
                </svg>
                Volver
            </a>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <!-- Información del usuario -->
                    <div class="mb-6 p-4 bg-gray-50 dark:bg-gray-700 rounded-lg">
                        <div class="flex items-center justify-between">
                            <div>
                                <p class="text-sm text-gray-600 dark:text-gray-400">Usuario</p>
                                <p class="font-semibold">{{ $user->name }}</p>
                                <p class="text-sm text-gray-500">{{ $user->email }}</p>
                            </div>
                            <div>
                                @if($user->is_admin)
                                    <span class="px-3 py-1 text-sm font-semibold rounded-full bg-green-100 text-green-800">
                                        Administrador
                                    </span>
                                @else
                                    <span class="px-3 py-1 text-sm font-semibold rounded-full bg-blue-100 text-blue-800">
                                        Usuario
                                    </span>
                                @endif
                            </div>
                        </div>
                    </div>

                    @if($user->is_admin)
                        <div class="mb-4 bg-blue-100 border border-blue-400 text-blue-700 px-4 py-3 rounded relative" role="alert">
                            <p class="font-bold">Usuario Administrador</p>
                            <span class="block sm:inline">Los administradores tienen acceso automático a todos los módulos del sistema.</span>
                        </div>
                    @else
                        <form action="{{ route('users.updateModules', $user) }}" method="POST">
                            @csrf
                            @method('PUT')

                            <!-- Módulos -->
                            <div class="mb-4">
                                <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-3">
                                    Módulos Disponibles
                                </label>
                                <div class="space-y-3">
                                    @foreach($modules as $module)
                                        <div class="border border-gray-300 dark:border-gray-600 rounded-lg p-4 hover:bg-gray-50 dark:hover:bg-gray-700 transition">
                                            <label class="flex items-start cursor-pointer">
                                                <input type="checkbox" name="modules[]" value="{{ $module->id }}"
                                                       {{ in_array($module->id, $userModules) ? 'checked' : '' }}
                                                       class="mt-1 rounded border-gray-300 text-indigo-600 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 dark:bg-gray-700 dark:border-gray-600">
                                                <div class="ml-3 flex-1">
                                                    <div class="flex items-center justify-between">
                                                        <span class="text-base font-medium text-gray-900 dark:text-gray-100">
                                                            {{ $module->name }}
                                                        </span>
                                                        @if(in_array($module->id, $userModules))
                                                            <span class="px-2 py-1 text-xs rounded-full bg-green-100 text-green-800">
                                                                Asignado
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
                                    Selecciona los módulos a los que {{ $user->name }} tendrá acceso. Solo podrá ver y usar los módulos seleccionados.
                                </p>
                                @error('modules')
                                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                @enderror
                            </div>

                            <!-- Botones -->
                            <div class="flex items-center justify-end mt-6 space-x-3">
                                <a href="{{ route('users.index') }}"
                                   class="bg-gray-500 hover:bg-gray-600 text-white font-bold py-2 px-4 rounded">
                                    Cancelar
                                </a>
                                <button type="submit"
                                        class="bg-blue-600 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                                    Guardar Módulos
                                </button>
                            </div>
                        </form>
                    @endif
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
