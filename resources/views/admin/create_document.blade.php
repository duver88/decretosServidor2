@extends('layouts.app')

@section('title', 'Agregar Documento')

@section('content')
<div class="max-w-4xl mx-auto bg-white dark:bg-gray-800 shadow-md rounded-lg overflow-hidden">
    <!-- Cabecera del formulario con el color verde institucional -->
    <div class="bg-[#43883d] px-6 py-4">
        <h2 class="text-2xl font-ubuntu font-bold text-white">Agregar Documento</h2>
    </div>
    
    <!-- Notificación de éxito -->
    @if(session('success'))
        <div class="bg-[#D8E5B0] border-l-4 border-[#3F8827] text-[#285F19] p-4 mx-6 mt-6">
            <div class="flex">
                <div class="flex-shrink-0">
                    <svg class="h-5 w-5 text-[#3F8827]" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" />
                    </svg>
                </div>
                <div class="ml-3">
                    <p class="font-ubuntu text-sm">{{ session('success') }}</p>
                </div>
            </div>
        </div>
    @endif

    <!-- Formulario con estilos mejorados -->
    <form action="{{ route('document.store') }}" method="POST" enctype="multipart/form-data" class="p-6 space-y-6">
        @csrf

        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <!-- Categoría -->
            <div>
                <label for="category_id" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">Categoría/Dependencia</label>
                <select name="category_id" id="category_id" class="w-full border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-white rounded-md shadow-sm focus:ring-[#43883d] focus:border-[#43883d] font-ubuntu">
                    <option value="">-- Selecciona una categoría --</option>
                    @foreach($categories as $category)
                        <option value="{{ $category->id }}" {{ old('category_id') == $category->id ? 'selected' : '' }}>
                            {{ $category->nombre }}
                        </option>
                    @endforeach
                </select>
                @error('category_id')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- Año -->
            <div>
                <label for="nombre" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">Año</label>
                <input type="number" name="nombre" id="nombre" min="1920" max="2050" step="1"
                    class="w-full border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-white rounded-md shadow-sm focus:ring-[#43883d] focus:border-[#43883d] font-ubuntu"
                    placeholder="Ej: 2024"
                    required
                    value="{{ old('nombre') }}">
                @error('nombre')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>
        </div>

        <!-- 🆕 NUEVOS CAMPOS: DocumentType y DocumentTheme -->
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <!-- Tipo de Documento (DocumentType) -->
            <div>
                <label for="document_type_id" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">
                     Categoría Conceptual <span class="text-red-500">*</span>
                </label>
                <select name="document_type_id" id="document_type_id" class="w-full border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-white rounded-md shadow-sm focus:ring-[#43883d] focus:border-[#43883d] font-ubuntu" required>
                    <option value="">-- Selecciona un tipo --</option>
                    @if(isset($documentTypes))
                        @foreach($documentTypes as $documentType)
                            <option value="{{ $documentType->id }}" {{ old('document_type_id') == $documentType->id ? 'selected' : '' }}>
                                {{ $documentType->nombre }}
                            </option>
                        @endforeach
                    @endif
                </select>
                @error('document_type_id')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- Tema Específico (DocumentTheme) -->
            <div>
                <label for="document_theme_id" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">
                    Tema Específico <span class="text-red-500">*</span>
                </label>
                <select name="document_theme_id" id="document_theme_id" class="w-full border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-white rounded-md shadow-sm focus:ring-[#43883d] focus:border-[#43883d] font-ubuntu" disabled required>
                    <option value="">Primero selecciona un tipo</option>
                </select>
                <small class="text-gray-500 dark:text-gray-400">Selecciona primero un tipo de documento</small>
                @error('document_theme_id')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <!-- Número Documento -->
            <div>
                <label for="numero" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">Número Documento</label>
                <input type="text" name="numero" id="numero" class="w-full border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-white rounded-md shadow-sm focus:ring-[#43883d] focus:border-[#43883d] font-ubuntu" required value="{{ old('numero') }}">
                @error('numero')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- Fecha Del Documento -->
            <div>
                <label for="fecha" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">Fecha Del Documento</label>
                <input type="date" name="fecha" id="fecha" min="1920-01-01" max="2050-12-31" class="w-full border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-white rounded-md shadow-sm focus:ring-[#43883d] focus:border-[#43883d] font-ubuntu" required value="{{ old('fecha') }}">
                @error('fecha')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <!-- Archivo -->
            <div>
                <label for="archivo" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">Archivo</label>
                <div class="mt-1 flex items-center">
                    <label class="w-full flex items-center justify-center px-4 py-2 border border-gray-300 dark:border-gray-600 rounded-md shadow-sm text-sm font-medium text-gray-700 dark:text-gray-300 bg-white dark:bg-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600 cursor-pointer">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2 text-[#43883d] dark:text-[#93C01F]" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12" />
                        </svg>
                        <span class="font-ubuntu">Seleccionar archivo</span>
                        <input type="file" name="archivo" id="archivo" class="sr-only" accept=".pdf,.doc,.docx" required>
                    </label>
                </div>
                <p class="text-xs text-gray-500 dark:text-gray-400 mt-1">Formatos permitidos: PDF, DOC, DOCX</p>
                <p id="file-name" class="text-sm text-gray-600 dark:text-gray-400 mt-2"></p>
                @error('archivo')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- Tipo de Documento (Decreto/Resolución) -->
            <div>
                <label for="tipo" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">Clasificación</label>
                <div class="mt-2 space-y-2">
                    <div class="flex items-center">
                        <input type="radio" id="tipo_decreto" name="tipo" value="decreto" class="h-4 w-4 text-[#43883d] focus:ring-[#43883d] border-gray-300 dark:border-gray-600" {{ old('tipo', 'decreto') == 'decreto' ? 'checked' : '' }}>
                        <label for="tipo_decreto" class="ml-2 block text-sm text-gray-700 dark:text-gray-300 font-ubuntu">
                            Decreto
                        </label>
                    </div>
                    <div class="flex items-center">
                        <input type="radio" id="tipo_resolucion" name="tipo" value="resolución" class="h-4 w-4 text-[#43883d] focus:ring-[#43883d] border-gray-300 dark:border-gray-600" {{ old('tipo') == 'resolución' ? 'checked' : '' }}>
                        <label for="tipo_resolucion" class="ml-2 block text-sm text-gray-700 dark:text-gray-300 font-ubuntu">
                            Resolución
                        </label>
                    </div>
                </div>
                @error('tipo')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>
        </div>

        <!-- Descripción -->
        <div>
            <label for="descripcion" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">Descripción</label>
            <textarea name="descripcion" id="descripcion" rows="4" class="w-full border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-white rounded-md shadow-sm focus:ring-[#43883d] focus:border-[#43883d] font-ubuntu" placeholder="Describe brevemente el contenido del documento...">{{ old('descripcion') }}</textarea>
            @error('descripcion')
                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

        <!-- Campos Opcionales de Archivo -->
        <div class="border-t border-gray-200 dark:border-gray-700 pt-6">
            <h3 class="text-lg font-medium text-gray-900 dark:text-gray-100 mb-4 font-ubuntu">Información de Archivo (Opcional)</h3>
            <p class="text-sm text-gray-500 dark:text-gray-400 mb-4">Los siguientes campos son opcionales y pueden ser completados según la información archivística disponible.</p>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <!-- Referencia y Ubicación -->
                <div>
                    <label for="referencia_ubicacion" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">
                        Referencia y Ubicación
                        <span class="text-xs text-gray-500">(Opcional)</span>
                    </label>
                    <input type="text" name="referencia_ubicacion" id="referencia_ubicacion"
                        class="w-full border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-white rounded-md shadow-sm focus:ring-[#43883d] focus:border-[#43883d] font-ubuntu"
                        placeholder="Ej: T1VD2.1000.32.001"
                        value="{{ old('referencia_ubicacion') }}">
                    @error('referencia_ubicacion')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Soporte -->
                <div>
                    <label for="soporte" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">
                        Soporte
                        <span class="text-xs text-gray-500">(Opcional)</span>
                    </label>
                    <input type="text" name="soporte" id="soporte"
                        class="w-full border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-white rounded-md shadow-sm focus:ring-[#43883d] focus:border-[#43883d] font-ubuntu"
                        placeholder="Ej: Papel, Digital"
                        value="{{ old('soporte') }}">
                    @error('soporte')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Volumen -->
                <div>
                    <label for="volumen" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">
                        Volumen
                        <span class="text-xs text-gray-500">(Opcional)</span>
                    </label>
                    <input type="text" name="volumen" id="volumen"
                        class="w-full border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-white rounded-md shadow-sm focus:ring-[#43883d] focus:border-[#43883d] font-ubuntu"
                        placeholder="Ej: Tomo 2 (1931-1933)"
                        value="{{ old('volumen') }}">
                    @error('volumen')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Nombre del Productor -->
                <div>
                    <label for="nombre_productor" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">
                        Nombre del Productor
                        <span class="text-xs text-gray-500">(Opcional)</span>
                    </label>
                    <select name="nombre_productor" id="nombre_productor"
                        class="w-full border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-white rounded-md shadow-sm focus:ring-[#43883d] focus:border-[#43883d] font-ubuntu">
                        <option value="">-- Selecciona --</option>
                        <option value="DESPACHO ALCALDE (1000)" {{ old('nombre_productor') == 'DESPACHO ALCALDE (1000)' ? 'selected' : '' }}>DESPACHO ALCALDE (1000)</option>
                    </select>
                    @error('nombre_productor')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Información sobre Valoración -->
                <div>
                    <label for="informacion_valoracion" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">
                        Información sobre Valoración
                        <span class="text-xs text-gray-500">(Opcional)</span>
                    </label>
                    <input type="text" name="informacion_valoracion" id="informacion_valoracion"
                        class="w-full border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-white rounded-md shadow-sm focus:ring-[#43883d] focus:border-[#43883d] font-ubuntu"
                        placeholder="Ej: Conservación Total"
                        value="{{ old('informacion_valoracion') }}">
                    @error('informacion_valoracion')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Lengua de los Documentos -->
                <div>
                    <label for="lengua_documentos" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">
                        Lengua de los Documentos
                        <span class="text-xs text-gray-500">(Opcional)</span>
                    </label>
                    <select name="lengua_documentos" id="lengua_documentos"
                        class="w-full border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-white rounded-md shadow-sm focus:ring-[#43883d] focus:border-[#43883d] font-ubuntu">
                        <option value="">-- Selecciona --</option>
                        <option value="ESPAÑOL ISO 639-2 SPA" {{ old('lengua_documentos') == 'ESPAÑOL ISO 639-2 SPA' ? 'selected' : '' }}>ESPAÑOL ISO 639-2 SPA</option>
                    </select>
                    @error('lengua_documentos')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>
            </div>
        </div>

        <!-- Botones de acción -->
        <div class="flex justify-end space-x-3 pt-4 border-t border-gray-200 dark:border-gray-700">
            <a href="{{ route('dashboard') }}" class="px-4 py-2 bg-gray-200 dark:bg-gray-600 hover:bg-gray-300 dark:hover:bg-gray-500 text-gray-800 dark:text-gray-200 rounded-md transition-colors font-ubuntu">
                Cancelar
            </a>
            <button type="submit" class="px-4 py-2 bg-[#43883d] hover:bg-[#3F8827] text-white rounded-md transition-colors shadow-sm font-ubuntu flex items-center">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7H5a2 2 0 00-2 2v9a2 2 0 002 2h14a2 2 0 002-2V9a2 2 0 00-2-2h-3m-1 4l-3 3m0 0l-3-3m3 3V4" />
                </svg>
                Guardar Documento
            </button>
        </div>
    </form>
</div>

<!-- Scripts -->
<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Script para mostrar el nombre del archivo seleccionado
        const fileInput = document.getElementById('archivo');
        const fileNameDisplay = document.getElementById('file-name');
        
        fileInput.addEventListener('change', function() {
            if (fileInput.files.length > 0) {
                fileNameDisplay.textContent = 'Archivo seleccionado: ' + fileInput.files[0].name;
            } else {
                fileNameDisplay.textContent = '';
            }
        });

        // Script para cargar temas dinámicamente
        const documentTypeSelect = document.getElementById('document_type_id');
        const documentThemeSelect = document.getElementById('document_theme_id');
        
        function resetThemeSelect() {
            documentThemeSelect.innerHTML = '<option value="">Primero selecciona un tipo</option>';
            documentThemeSelect.disabled = true;
            documentThemeSelect.classList.add('opacity-50');
        }
        
        function loadThemes(typeId) {
            documentThemeSelect.innerHTML = '<option value="">Cargando temas...</option>';
            documentThemeSelect.disabled = true;
            
            fetch(`/documents/themes/${typeId}`)
                .then(response => {
                    if (!response.ok) {
                        throw new Error('Error en la respuesta del servidor');
                    }
                    return response.json();
                })
                .then(themes => {
                    documentThemeSelect.innerHTML = '<option value="">-- Selecciona un tema --</option>';
                    
                    if (themes && themes.length > 0) {
                        themes.forEach(theme => {
                            const option = document.createElement('option');
                            option.value = theme.id;
                            option.textContent = theme.nombre;
                            
                            // Mantener selección si existe
                            if ('{{ old("document_theme_id") }}' == theme.id) {
                                option.selected = true;
                            }
                            
                            documentThemeSelect.appendChild(option);
                        });
                        
                        documentThemeSelect.disabled = false;
                        documentThemeSelect.classList.remove('opacity-50');
                    } else {
                        documentThemeSelect.innerHTML = '<option value="">No hay temas disponibles</option>';
                        documentThemeSelect.disabled = true;
                    }
                })
                .catch(error => {
                    console.error('Error al cargar temas:', error);
                    documentThemeSelect.innerHTML = '<option value="">Error al cargar temas</option>';
                    documentThemeSelect.disabled = true;
                });
        }
        
        documentTypeSelect.addEventListener('change', function() {
            const typeId = this.value;
            
            if (typeId) {
                loadThemes(typeId);
            } else {
                resetThemeSelect();
            }
        });
        
        // Cargar temas si ya hay un tipo seleccionado (para mantener estado en errores de validación)
        if (documentTypeSelect.value) {
            loadThemes(documentTypeSelect.value);
        }
    });
</script>

<!-- CSS adicional -->
<style>
    #document_theme_id:disabled {
        background-color: #f3f4f6 !important;
        opacity: 0.6;
        cursor: not-allowed;
    }
    
    .focus\:ring-\[\#43883d\]:focus {
        box-shadow: 0 0 0 3px rgba(67, 136, 61, 0.1);
    }
</style>
@endsection