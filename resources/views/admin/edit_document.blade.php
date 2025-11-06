@extends('layouts.app')

@section('title', 'Editar Documento')

@section('content')
<div class="max-w-4xl mx-auto my-8">
    <!-- Cabecera del formulario con el color verde institucional -->
    <div class="bg-[#43883d] px-6 py-4">
        <h2 class="text-2xl font-ubuntu font-bold text-white">Editar Documento</h2>
    </div>

    <!-- Debug temporal (quitar después) -->
    @if(isset($documentTypes))
        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-4">
            Se encontraron {{ $documentTypes->count() }} tipos de documento
        </div>
    @else
        <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-4">
            Variable $documentTypes no está definida
        </div>
    @endif

    <div class="bg-white shadow-lg rounded-b-lg p-8">
        <form action="{{ route('document.update', $document->id) }}" method="POST" enctype="multipart/form-data" class="space-y-6">
            @csrf
            @method('PUT')

            <!-- Categoría -->
            <div class="mb-4">
                <label for="category_id" class="block font-ubuntu font-medium text-gray-700 mb-2">Dependencia</label>
                <select name="category_id" id="category_id" class="w-full border-gray-300 rounded-lg shadow-sm p-3 focus:ring-[#43883d] focus:border-[#43883d] font-ubuntu">
                    <option value="">-- Selecciona una Dependencia --</option>
                    @foreach($categories as $category)
                        <option value="{{ $category->id }}" {{ $document->category_id == $category->id ? 'selected' : '' }}>
                            {{ $category->nombre }}
                        </option>
                    @endforeach
                </select>
            </div>

            <!-- 🆕 NUEVOS CAMPOS: DocumentType y DocumentTheme -->
            <div class="grid md:grid-cols-2 gap-6 mb-6 p-4 bg-blue-50 rounded-lg border border-blue-200">
                <h3 class="col-span-full text-lg font-semibold text-blue-800 font-ubuntu mb-4">Clasificación del Documento</h3>
                
                <!-- Tipo de Documento (DocumentType) -->
                <div>
                    <label for="document_type_id" class="block font-ubuntu font-medium text-gray-700 mb-2">
                        Tipo de Documento <span class="text-red-500">*</span>
                    </label>
                    <select name="document_type_id" id="document_type_id" class="w-full border-gray-300 rounded-lg shadow-sm p-3 focus:ring-[#43883d] focus:border-[#43883d] font-ubuntu" required>
                        <option value="">-- Selecciona un tipo --</option>
                        @if(isset($documentTypes))
                            @foreach($documentTypes as $documentType)
                                <option value="{{ $documentType->id }}" {{ old('document_type_id', $document->document_type_id) == $documentType->id ? 'selected' : '' }}>
                                    {{ $documentType->nombre }}
                                </option>
                            @endforeach
                        @endif
                    </select>
                    @error('document_type_id')
                        <p class="text-red-500 text-sm mt-1 font-ubuntu">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Tema Específico (DocumentTheme) -->
                <div>
                    <label for="document_theme_id" class="block font-ubuntu font-medium text-gray-700 mb-2">
                        Tema Específico <span class="text-red-500">*</span>
                    </label>
                    <select name="document_theme_id" id="document_theme_id" class="w-full border-gray-300 rounded-lg shadow-sm p-3 focus:ring-[#43883d] focus:border-[#43883d] font-ubuntu" disabled required>
                        <option value="">Primero selecciona un tipo</option>
                    </select>
                    <small class="text-gray-500">Selecciona primero un tipo de documento</small>
                    @error('document_theme_id')
                        <p class="text-red-500 text-sm mt-1 font-ubuntu">{{ $message }}</p>
                    @enderror
                </div>
            </div>

            <div class="grid md:grid-cols-2 gap-6">
                <!-- Año -->
                <div>
                    <label for="nombre" class="block font-ubuntu font-medium text-gray-700 mb-2">Año</label>
                    <input type="number" name="nombre" id="nombre" min="1920" max="2050" step="1"
                        class="w-full border-gray-300 rounded-lg shadow-sm p-3 focus:ring-[#43883d] focus:border-[#43883d] font-ubuntu"
                        placeholder="Ej: 2024"
                        required
                        maxlength="4"
                        oninput="if(this.value.length > 4) this.value = this.value.slice(0, 4);"
                        value="{{ old('nombre', $document->nombre) }}">
                    @error('nombre')
                        <p class="text-red-500 text-sm mt-1 font-ubuntu">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Número -->
                <div>
                    <label for="numero" class="block font-ubuntu font-medium text-gray-700 mb-2">Número Documento</label>
                    <input type="text" name="numero" id="numero" required class="w-full border-gray-300 rounded-lg shadow-sm p-3 focus:ring-[#43883d] focus:border-[#43883d] font-ubuntu"
                        value="{{ old('numero', $document->numero) }}">
                    @error('numero')
                        <p class="text-red-500 text-sm mt-1 font-ubuntu">{{ $message }}</p>
                    @enderror
                </div>
            </div>

            <div class="grid md:grid-cols-2 gap-6">
                <!-- Fecha -->
                <div>
                    <label for="fecha" class="block font-ubuntu font-medium text-gray-700 mb-2">Fecha</label>
                    <input type="date" name="fecha" id="fecha" min="1920-01-01" max="2050-12-31" class="w-full border-gray-300 rounded-lg shadow-sm p-3 focus:ring-[#43883d] focus:border-[#43883d] font-ubuntu"
                        value="{{ old('fecha', $document->fecha) }}">
                </div>

                <!-- Tipo (Decreto/Resolución) -->
                <div>
                    <label for="tipo" class="block font-ubuntu font-medium text-gray-700 mb-2">Clasificación</label>
                    <select name="tipo" id="tipo" class="w-full border-gray-300 rounded-lg shadow-sm p-3 focus:ring-[#43883d] focus:border-[#43883d] font-ubuntu">
                        <option value="decreto" {{ old('tipo', $document->tipo) == 'decreto' ? 'selected' : '' }}>Decreto</option>
                        <option value="resolución" {{ old('tipo', $document->tipo) == 'resolución' ? 'selected' : '' }}>Resolución</option>
                    </select>
                </div>
            </div>

            <!-- Archivo -->
            <div class="border border-[#B5CBA1] rounded-lg p-4 bg-[#EAECB1]/20">
                <label for="archivo" class="block font-ubuntu font-medium text-gray-700 mb-2">Archivo (opcional)</label>
                <div class="flex items-center">
                    <div class="bg-[#43883d] text-white rounded-lg px-4 py-2 cursor-pointer hover:bg-[#3F8827] transition mr-3">
                        <label for="archivo" class="cursor-pointer font-ubuntu">Seleccionar archivo</label>
                    </div>
                    <input type="file" name="archivo" id="archivo" class="hidden">
                    <span id="file-name" class="text-sm text-gray-600 font-ubuntu">Ningún archivo seleccionado</span>
                </div>
                @if($document->archivo)
                    <div class="mt-3 flex items-center">
                        <div class="text-[#43883d] mr-2">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                            </svg>
                        </div>
                        <p class="text-sm text-gray-600 font-ubuntu">
                            Archivo actual: 
                            <a href="{{ asset('storage/'.$document->archivo) }}" target="_blank" class="text-[#43883d] underline">Ver / Descargar</a>
                        </p>
                    </div>
                @endif
            </div>

            <!-- Descripción -->
            <div>
                <label for="descripcion" class="block font-ubuntu font-medium text-gray-700 mb-2">Descripción</label>
                <textarea name="descripcion" id="descripcion" rows="4" class="w-full border-gray-300 rounded-lg shadow-sm p-3 focus:ring-[#43883d] focus:border-[#43883d] font-ubuntu resize-none" placeholder="Describe brevemente el contenido del documento...">{{ old('descripcion', $document->descripcion) }}</textarea>
            </div>

            <!-- Campos Opcionales de Archivo -->
            <div class="border-t-2 border-gray-200 pt-6 mt-6">
                <h3 class="text-lg font-ubuntu font-bold text-gray-800 mb-2">Información de Archivo (Opcional)</h3>
                <p class="text-sm text-gray-500 mb-4 font-ubuntu">Los siguientes campos son opcionales y pueden ser completados según la información archivística disponible.</p>

                <div class="grid md:grid-cols-2 gap-6">
                    <!-- Referencia y Ubicación -->
                    <div>
                        <label for="referencia_ubicacion" class="block font-ubuntu font-medium text-gray-700 mb-2">
                            Referencia y Ubicación
                            <span class="text-xs text-gray-500">(Opcional)</span>
                        </label>
                        <input type="text" name="referencia_ubicacion" id="referencia_ubicacion"
                            class="w-full border-gray-300 rounded-lg shadow-sm p-3 focus:ring-[#43883d] focus:border-[#43883d] font-ubuntu"
                            placeholder="Ej: T1VD2.1000.32.001"
                            value="{{ old('referencia_ubicacion', $document->referencia_ubicacion) }}">
                        @error('referencia_ubicacion')
                            <p class="text-red-500 text-sm mt-1 font-ubuntu">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Soporte -->
                    <div>
                        <label for="soporte" class="block font-ubuntu font-medium text-gray-700 mb-2">
                            Soporte
                            <span class="text-xs text-gray-500">(Opcional)</span>
                        </label>
                        <input type="text" name="soporte" id="soporte"
                            class="w-full border-gray-300 rounded-lg shadow-sm p-3 focus:ring-[#43883d] focus:border-[#43883d] font-ubuntu"
                            placeholder="Ej: Papel, Digital"
                            value="{{ old('soporte', $document->soporte) }}">
                        @error('soporte')
                            <p class="text-red-500 text-sm mt-1 font-ubuntu">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Volumen -->
                    <div>
                        <label for="volumen" class="block font-ubuntu font-medium text-gray-700 mb-2">
                            Volumen
                            <span class="text-xs text-gray-500">(Opcional)</span>
                        </label>
                        <input type="text" name="volumen" id="volumen"
                            class="w-full border-gray-300 rounded-lg shadow-sm p-3 focus:ring-[#43883d] focus:border-[#43883d] font-ubuntu"
                            placeholder="Ej: Tomo 2 (1931-1933)"
                            value="{{ old('volumen', $document->volumen) }}">
                        @error('volumen')
                            <p class="text-red-500 text-sm mt-1 font-ubuntu">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Nombre del Productor -->
                    <div>
                        <label for="nombre_productor" class="block font-ubuntu font-medium text-gray-700 mb-2">
                            Nombre del Productor
                            <span class="text-xs text-gray-500">(Opcional)</span>
                        </label>
                        <select name="nombre_productor" id="nombre_productor"
                            class="w-full border-gray-300 rounded-lg shadow-sm p-3 focus:ring-[#43883d] focus:border-[#43883d] font-ubuntu">
                            <option value="">-- Selecciona --</option>
                            <option value="DESPACHO ALCALDE (1000)" {{ old('nombre_productor', $document->nombre_productor) == 'DESPACHO ALCALDE (1000)' ? 'selected' : '' }}>DESPACHO ALCALDE (1000)</option>
                        </select>
                        @error('nombre_productor')
                            <p class="text-red-500 text-sm mt-1 font-ubuntu">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Información sobre Valoración -->
                    <div>
                        <label for="informacion_valoracion" class="block font-ubuntu font-medium text-gray-700 mb-2">
                            Información sobre Valoración
                            <span class="text-xs text-gray-500">(Opcional)</span>
                        </label>
                        <input type="text" name="informacion_valoracion" id="informacion_valoracion"
                            class="w-full border-gray-300 rounded-lg shadow-sm p-3 focus:ring-[#43883d] focus:border-[#43883d] font-ubuntu"
                            placeholder="Ej: Conservación Total"
                            value="{{ old('informacion_valoracion', $document->informacion_valoracion) }}">
                        @error('informacion_valoracion')
                            <p class="text-red-500 text-sm mt-1 font-ubuntu">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Lengua de los Documentos -->
                    <div>
                        <label for="lengua_documentos" class="block font-ubuntu font-medium text-gray-700 mb-2">
                            Lengua de los Documentos
                            <span class="text-xs text-gray-500">(Opcional)</span>
                        </label>
                        <select name="lengua_documentos" id="lengua_documentos"
                            class="w-full border-gray-300 rounded-lg shadow-sm p-3 focus:ring-[#43883d] focus:border-[#43883d] font-ubuntu">
                            <option value="">-- Selecciona --</option>
                            <option value="ESPAÑOL ISO 639-2 SPA" {{ old('lengua_documentos', $document->lengua_documentos) == 'ESPAÑOL ISO 639-2 SPA' ? 'selected' : '' }}>ESPAÑOL ISO 639-2 SPA</option>
                        </select>
                        @error('lengua_documentos')
                            <p class="text-red-500 text-sm mt-1 font-ubuntu">{{ $message }}</p>
                        @enderror
                    </div>
                </div>
            </div>

            <!-- Botones -->
            <div class="flex justify-end space-x-4 pt-4">
                <a href="{{ route('dashboard') }}" class="bg-gray-400 text-white px-6 py-3 rounded-lg shadow hover:bg-gray-500 transition font-ubuntu">Cancelar</a>
                <button type="submit" class="bg-[#43883d] text-white px-6 py-3 rounded-lg shadow hover:bg-[#3F8827] transition font-ubuntu font-medium">Actualizar</button>
            </div>
        </form>
    </div>

    <!-- Pie de página con información institucional -->
    <div class="mt-6 text-center">
        <p class="text-xs text-gray-500 font-ubuntu">Alcaldía de Bucaramanga © 2025</p>
    </div>
</div>

<!-- Scripts -->
<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Script para mostrar el nombre del archivo seleccionado
        const fileInput = document.getElementById('archivo');
        const fileNameDisplay = document.getElementById('file-name');
        
        fileInput.addEventListener('change', function(e) {
            const fileName = e.target.files[0] ? e.target.files[0].name : 'Ningún archivo seleccionado';
            fileNameDisplay.textContent = fileName;
        });

        // Script para cargar temas dinámicamente
        const documentTypeSelect = document.getElementById('document_type_id');
        const documentThemeSelect = document.getElementById('document_theme_id');
        const currentThemeId = '{{ old("document_theme_id", $document->document_theme_id) }}';
        
        function resetThemeSelect() {
            documentThemeSelect.innerHTML = '<option value="">Primero selecciona un tipo</option>';
            documentThemeSelect.disabled = true;
            documentThemeSelect.classList.add('opacity-50');
        }
        
        function loadThemes(typeId, selectedThemeId = null) {
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
                            
                            // Seleccionar el tema actual o el enviado por parámetro
                            if ((selectedThemeId && selectedThemeId == theme.id) || 
                                (currentThemeId && currentThemeId == theme.id)) {
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
                    
                    // Mostrar mensaje de error
                    const errorDiv = document.createElement('div');
                    errorDiv.className = 'bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mt-2';
                    errorDiv.innerHTML = '⚠️ Error al cargar los temas. Verifica la conexión.';
                    documentThemeSelect.parentNode.appendChild(errorDiv);
                    
                    setTimeout(() => {
                        if (errorDiv.parentNode) {
                            errorDiv.remove();
                        }
                    }, 5000);
                });
        }
        
        // Event listener para cambio de tipo
        documentTypeSelect.addEventListener('change', function() {
            const typeId = this.value;
            
            if (typeId) {
                loadThemes(typeId);
            } else {
                resetThemeSelect();
            }
        });
        
        // Cargar temas al inicio si ya hay un tipo seleccionado
        if (documentTypeSelect.value) {
            loadThemes(documentTypeSelect.value, currentThemeId);
        }
        
        // Mejorar la experiencia visual
        documentTypeSelect.addEventListener('focus', function() {
            this.style.borderColor = '#43883d';
            this.style.boxShadow = '0 0 0 3px rgba(67, 136, 61, 0.1)';
        });
        
        documentTypeSelect.addEventListener('blur', function() {
            this.style.borderColor = '';
            this.style.boxShadow = '';
        });
    });
</script>

<style>
    @import url('https://fonts.googleapis.com/css2?family=Ubuntu:wght@300;400;500;700&display=swap');
    
    .font-ubuntu {
        font-family: 'Ubuntu', sans-serif;
    }
    
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