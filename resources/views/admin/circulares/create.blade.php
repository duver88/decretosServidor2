@extends('layouts.app')

@section('title', 'Crear Nueva Circular')

@section('content')
<div class="py-6">
    <div class="max-w-4xl mx-auto">
        <!-- Header con botón de volver -->
        <div class="flex items-center mb-6">
            <a href="{{ auth()->user()->is_admin ? route('circulares.admin.index') : route('user.circulares.index') }}"
               class="mr-4 text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-gray-200">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
                </svg>
            </a>
            <h2 class="text-2xl font-semibold text-gray-800 dark:text-gray-200">
                Crear Nueva Circular
            </h2>
        </div>

        <div class="bg-white dark:bg-gray-800 rounded-lg shadow-lg overflow-hidden">
            <div class="p-8">
                <form action="{{ auth()->user()->is_admin ? route('circulares.admin.store') : route('user.circulares.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf

                    <!-- Nombre -->
                    <div class="mb-6">
                        <label for="nombre" class="block text-sm font-semibold text-gray-700 dark:text-gray-300 mb-2">
                            Nombre de la Circular <span class="text-red-500">*</span>
                        </label>
                        <input type="text"
                               name="nombre"
                               id="nombre"
                               value="{{ old('nombre') }}"
                               required
                               class="w-full px-4 py-3 rounded-lg border border-gray-300 dark:border-gray-600 bg-white dark:bg-gray-700 text-gray-900 dark:text-gray-100 focus:ring-2 focus:ring-green-500 focus:border-transparent transition @error('nombre') border-red-500 @enderror"
                               placeholder="Ej: Circular 001-2025">
                        @error('nombre')
                            <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Fecha -->
                    <div class="mb-6">
                        <label for="fecha" class="block text-sm font-semibold text-gray-700 dark:text-gray-300 mb-2">
                            Fecha <span class="text-red-500">*</span>
                        </label>
                        <input type="date"
                               name="fecha"
                               id="fecha"
                               value="{{ old('fecha', date('Y-m-d')) }}"
                               required
                               class="w-full px-4 py-3 rounded-lg border border-gray-300 dark:border-gray-600 bg-white dark:bg-gray-700 text-gray-900 dark:text-gray-100 focus:ring-2 focus:ring-green-500 focus:border-transparent transition @error('fecha') border-red-500 @enderror">
                        @error('fecha')
                            <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Descripción -->
                    <div class="mb-6">
                        <label for="descripcion" class="block text-sm font-semibold text-gray-700 dark:text-gray-300 mb-2">
                            Descripción <span class="text-red-500">*</span>
                        </label>
                        <textarea name="descripcion"
                                  id="descripcion"
                                  rows="6"
                                  required
                                  class="w-full px-4 py-3 rounded-lg border border-gray-300 dark:border-gray-600 bg-white dark:bg-gray-700 text-gray-900 dark:text-gray-100 focus:ring-2 focus:ring-green-500 focus:border-transparent transition resize-vertical @error('descripcion') border-red-500 @enderror"
                                  placeholder="Describe detalladamente el contenido y objetivo de la circular...">{{ old('descripcion') }}</textarea>
                        @error('descripcion')
                            <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Archivo PDF -->
                    <div class="mb-6">
                        <label for="archivo" class="block text-sm font-semibold text-gray-700 dark:text-gray-300 mb-2">
                            Archivo PDF <span class="text-red-500">*</span>
                        </label>
                        <div class="mt-1 flex justify-center px-6 pt-5 pb-6 border-2 border-gray-300 dark:border-gray-600 border-dashed rounded-lg hover:border-green-500 transition @error('archivo') border-red-500 @enderror">
                            <div class="space-y-1 text-center">
                                <svg class="mx-auto h-12 w-12 text-gray-400" stroke="currentColor" fill="none" viewBox="0 0 48 48">
                                    <path d="M28 8H12a4 4 0 00-4 4v20m32-12v8m0 0v8a4 4 0 01-4 4H12a4 4 0 01-4-4v-4m32-4l-3.172-3.172a4 4 0 00-5.656 0L28 28M8 32l9.172-9.172a4 4 0 015.656 0L28 28m0 0l4 4m4-24h8m-4-4v8m-12 4h.02" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                </svg>
                                <div class="flex text-sm text-gray-600 dark:text-gray-400">
                                    <label for="archivo" class="relative cursor-pointer bg-white dark:bg-gray-700 rounded-md font-medium text-green-600 hover:text-green-500 focus-within:outline-none focus-within:ring-2 focus-within:ring-offset-2 focus-within:ring-green-500">
                                        <span>Subir archivo</span>
                                        <input id="archivo" name="archivo" type="file" class="sr-only" accept=".pdf,.doc,.docx,.xls,.xlsx" required onchange="updateFileName(this)">
                                    </label>
                                    <p class="pl-1">o arrastra y suelta</p>
                                </div>
                                <p class="text-xs text-gray-500 dark:text-gray-400">
                                    PDF, Word o Excel hasta 10MB
                                </p>
                                <div id="fileNameDisplay" class="hidden mt-4">
                                    <p class="text-sm text-green-600 font-medium" id="fileName"></p>
                                </div>
                            </div>
                        </div>
                        @error('archivo')
                            <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Botones -->
                    <div class="flex items-center justify-end space-x-3 pt-6 border-t border-gray-200 dark:border-gray-700">
                        <a href="{{ route('circulares.admin.index') }}"
                           class="px-6 py-3 bg-gray-500 hover:bg-gray-600 text-white font-medium rounded-lg transition duration-200 ease-in-out transform hover:scale-105">
                            Cancelar
                        </a>
                        <button type="submit"
                                class="px-6 py-3 bg-green-600 hover:bg-green-700 text-white font-medium rounded-lg transition duration-200 ease-in-out transform hover:scale-105 shadow-lg">
                            Crear Circular
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
function updateFileName(input) {
    const fileNameDisplay = document.getElementById('fileNameDisplay');
    const fileName = document.getElementById('fileName');

    if (input.files && input.files[0]) {
        const file = input.files[0];
        const fileSize = (file.size / 1024 / 1024).toFixed(2);
        fileName.textContent = `Archivo seleccionado: ${file.name} (${fileSize} MB)`;
        fileNameDisplay.classList.remove('hidden');
    } else {
        fileNameDisplay.classList.add('hidden');
    }
}
</script>
@endsection
