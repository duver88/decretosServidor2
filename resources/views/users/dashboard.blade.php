@extends('layouts.app')

@section('title', 'Dashboard de Usuario')

@section('content')

<!-- Tarjetas de resumen para usuarios -->
<div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
    <!-- Mis Documentos -->
    <div class="bg-white dark:bg-gray-800 rounded-lg shadow-md p-6 border-t-4 border-[#43883d]">
        <div class="flex items-center">
            <div class="p-3 rounded-full bg-[#EAECB1] text-[#43883d]">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                </svg>
            </div>
            <div class="ml-4">
                <h2 class="text-lg font-ubuntu font-semibold text-gray-700 dark:text-gray-200">Mis Documentos</h2>
                <p class="mt-2 text-3xl font-ubuntu font-bold text-[#43883d] dark:text-[#93C01F]">{{ $documents->count() }}</p>
            </div>
        </div>
    </div>
    
    <!-- Categorías con Permisos -->
    <div class="bg-white dark:bg-gray-800 rounded-lg shadow-md p-6 border-t-4 border-[#f8dc0b]">
        <div class="flex items-center">
            <div class="p-3 rounded-full bg-[#FCF2B1] text-amber-700">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"/>
                </svg>
            </div>
            <div class="ml-4">
                <h2 class="text-lg font-ubuntu font-semibold text-gray-700 dark:text-gray-200">Categorías Asignadas</h2>
                <p class="mt-2 text-3xl font-ubuntu font-bold text-amber-600 dark:text-amber-500">{{ auth()->user()->categoryPermissions()->count() }}</p>
            </div>
        </div>
    </div>
    
    <!-- Permisos -->
    <div class="bg-white dark:bg-gray-800 rounded-lg shadow-md p-6 border-t-4 border-blue-500">
        <div class="flex items-center">
            <div class="p-3 rounded-full bg-blue-100 text-blue-700">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"/>
                </svg>
            </div>
            <div class="ml-4">
                <h2 class="text-lg font-ubuntu font-semibold text-gray-700 dark:text-gray-200">Permisos Activos</h2>
                <div class="mt-2 text-sm text-gray-600 dark:text-gray-400">
                    <div class="flex space-x-2">
                        @if(auth()->user()->categoryPermissions()->where('can_create', true)->exists())
                            <span class="bg-green-100 text-green-800 px-2 py-1 rounded text-xs">Crear</span>
                        @endif
                        @if(auth()->user()->categoryPermissions()->where('can_edit', true)->exists())
                            <span class="bg-blue-100 text-blue-800 px-2 py-1 rounded text-xs">Editar</span>
                        @endif
                        @if(auth()->user()->categoryPermissions()->where('can_delete', true)->exists())
                            <span class="bg-red-100 text-red-800 px-2 py-1 rounded text-xs">Eliminar</span>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- FORMULARIO DE FILTROS -->
<div class="bg-white dark:bg-gray-800 rounded-lg shadow-md p-6 mb-6">
    @php
        $selectedTipo = request('tipo');
        $selectedOrder = request('orden', 'fecha_desc');
        $currentCategory = request('category_id');
        
        // Obtener categorías del usuario
        $userCategories = auth()->user()->categoryPermissions()->with('category')->get()->pluck('category');
        $userCategoryIds = $userCategories->pluck('id')->toArray();
        
        // Estadísticas básicas del usuario
        $userDocuments = $documents;
        $userStats = [
            'por_tipo' => $userDocuments->groupBy('tipo')->map->count(),
            'por_categoria' => $userDocuments->groupBy('category_id')->map->count(),
        ];
    @endphp

    <!-- CHIPS DE CATEGORÍAS ASIGNADAS -->
    @if($userCategories->count() > 0)
        <div class="mb-4">
            <h3 class="text-sm font-semibold text-gray-700 dark:text-gray-300 mb-2">Mis categorías:</h3>
            <div class="flex flex-wrap gap-2">
                @foreach($userCategories as $categoria)
                    <form method="GET" action="{{ route('user.dashboard') }}" class="inline">
                        @foreach(request()->except(['category_id', 'page']) as $key => $value)
                            @if(is_array($value))
                                @foreach($value as $v)
                                    <input type="hidden" name="{{ $key }}[]" value="{{ $v }}">
                                @endforeach
                            @else
                                <input type="hidden" name="{{ $key }}" value="{{ $value }}">
                            @endif
                        @endforeach
                        <input type="hidden" name="category_id" value="{{ $categoria->id }}">
                        <button type="submit" class="inline-flex items-center px-3 py-1.5 rounded-full text-sm font-medium transition-colors
                            {{ $currentCategory == $categoria->id ? 'bg-[#43883d] text-white' : 'bg-gray-100 text-gray-700 hover:bg-[#43883d] hover:text-white' }}">
                            {{ $categoria->nombre }} ({{ $userStats['por_categoria'][$categoria->id] ?? 0 }})
                        </button>
                    </form>
                @endforeach
                <form method="GET" action="{{ route('user.dashboard') }}" class="inline">
                    @foreach(request()->except(['category_id', 'page']) as $key => $value)
                        @if(is_array($value))
                            @foreach($value as $v)
                                <input type="hidden" name="{{ $key }}[]" value="{{ $v }}">
                            @endforeach
                        @else
                            <input type="hidden" name="{{ $key }}" value="{{ $value }}">
                        @endif
                    @endforeach
                    <button type="submit" class="inline-flex items-center px-3 py-1.5 rounded-full text-sm font-medium transition-colors
                        {{ !$currentCategory ? 'bg-[#43883d] text-white' : 'bg-gray-100 text-gray-700 hover:bg-[#43883d] hover:text-white' }}">
                        Todas mis categorías
                    </button>
                </form>
            </div>
        </div>
    @endif

    <!-- CHIPS DE TIPOS DE DOCUMENTO -->
    @if($userStats['por_tipo']->count() > 0)
        <div class="mb-4">
            <h3 class="text-sm font-semibold text-gray-700 dark:text-gray-300 mb-2">Filtrar por tipo:</h3>
            <div class="flex flex-wrap gap-2">
                @foreach($userStats['por_tipo'] as $tipo => $count)
                    <form method="GET" action="{{ route('user.dashboard') }}" class="inline">
                        @foreach(request()->except(['tipo', 'page']) as $key => $value)
                            @if(is_array($value))
                                @foreach($value as $v)
                                    <input type="hidden" name="{{ $key }}[]" value="{{ $v }}">
                                @endforeach
                            @else
                                <input type="hidden" name="{{ $key }}" value="{{ $value }}">
                            @endif
                        @endforeach
                        <input type="hidden" name="tipo" value="{{ $tipo }}">
                        <button type="submit" class="inline-flex items-center px-3 py-1.5 rounded-full text-sm font-medium transition-colors
                            {{ $selectedTipo == $tipo ? 'bg-[#43883d] text-white' : 'bg-gray-100 text-gray-700 hover:bg-[#43883d] hover:text-white' }}">
                            {{ ucfirst($tipo) }} ({{ $count }})
                        </button>
                    </form>
                @endforeach
                <form method="GET" action="{{ route('user.dashboard') }}" class="inline">
                    @foreach(request()->except(['tipo', 'page']) as $key => $value)
                        @if(is_array($value))
                            @foreach($value as $v)
                                <input type="hidden" name="{{ $key }}[]" value="{{ $v }}">
                            @endforeach
                        @else
                            <input type="hidden" name="{{ $key }}" value="{{ $value }}">
                        @endif
                    @endforeach
                    <button type="submit" class="inline-flex items-center px-3 py-1.5 rounded-full text-sm font-medium transition-colors
                        {{ !$selectedTipo ? 'bg-[#43883d] text-white' : 'bg-gray-100 text-gray-700 hover:bg-[#43883d] hover:text-white' }}">
                        Todos los tipos
                    </button>
                </form>
            </div>
        </div>
    @endif

    <!-- FORMULARIO PRINCIPAL DE FILTROS -->
    <form method="GET" action="{{ route('user.dashboard') }}" id="mainFilterForm">
        <!-- Preservar otros filtros cuando se usa búsqueda general -->
        @foreach(request()->except(['busqueda_general', 'page']) as $key => $value)
            @if(is_array($value))
                @foreach($value as $v)
                    <input type="hidden" name="{{ $key }}[]" value="{{ $v }}">
                @endforeach
            @else
                <input type="hidden" name="{{ $key }}" value="{{ $value }}">
            @endif
        @endforeach
        
        <!-- BUSCADOR GENERAL -->
        <div class="flex gap-4 mb-4">
            <div class="flex-1">
                <input type="search" name="busqueda_general" 
                       class="w-full px-4 py-2 border border-gray-300 rounded-md focus:ring-[#43883d] focus:border-[#43883d]"
                       placeholder="Buscar en mis documentos por nombre, número, descripción..." 
                       value="{{ request('busqueda_general') }}">
            </div>
            <button class="px-6 py-2 bg-[#43883d] text-white rounded-md hover:bg-[#3F8827] transition-colors" type="submit">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 inline mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                </svg>
                Buscar
            </button>
        </div>

        <!-- ORDEN Y TOGGLE AVANZADO -->
        <div class="flex flex-col md:flex-row justify-between items-start md:items-center mb-4">
            <div class="flex flex-wrap items-center gap-4 mb-2 md:mb-0">
                <span class="text-sm font-semibold text-gray-700 dark:text-gray-300">Ordenar por:</span>
                @foreach([
                    'fecha_desc' => 'Más recientes',
                    'fecha_asc' => 'Más antiguos',
                    'nombre_asc' => 'Nombre A-Z',
                ] as $key => $label)
                    <label class="flex items-center cursor-pointer">
                        <input type="radio" name="orden" value="{{ $key }}" onchange="this.form.submit()" 
                               class="mr-2 text-[#43883d] focus:ring-[#43883d]"
                               {{ $selectedOrder == $key ? 'checked' : '' }}>
                        <span class="text-sm {{ $selectedOrder == $key ? 'text-[#43883d] font-semibold' : 'text-gray-600' }}">
                            {{ $label }}
                        </span>
                    </label>
                @endforeach
            </div>
            <div>
                <button type="button" onclick="toggleAdvancedFilters()" 
                        class="text-[#43883d] hover:text-[#3F8827] text-sm font-medium">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 inline mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6V4m0 2a2 2 0 100 4m0-4a2 2 0 110 4m-6 8a2 2 0 100-4m0 4a2 2 0 100 4m0-4v2m0-6V4m6 6v10m6-2a2 2 0 100-4m0 4a2 2 0 100 4m0-4v2m0-6V4" />
                    </svg>
                    <span id="toggleText">Mostrar filtros avanzados</span>
                </button>
            </div>
        </div>

        <!-- FILTROS AVANZADOS -->
        <div id="filtrosAvanzados" class="hidden border-t pt-4">
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
                
                <!-- Tipo de Documento (solo los tipos que tiene el usuario) -->
                <div>
                    <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">
                        Tipo de Documento
                    </label>
                    <select name="tipo" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:ring-[#43883d] focus:border-[#43883d] dark:bg-gray-700 dark:border-gray-600 dark:text-gray-300">
                        <option value="">Todos mis tipos</option>
                        @foreach($userStats['por_tipo'] as $tipo => $count)
                            <option value="{{ $tipo }}" {{ request('tipo') == $tipo ? 'selected' : '' }}>
                                {{ ucfirst($tipo) }} ({{ $count }})
                            </option>
                        @endforeach
                    </select>
                </div>

                <!-- Categoría (solo las asignadas al usuario) -->
                <div>
                    <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">
                        Mi Categoría
                    </label>
                    <select name="category_id" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:ring-[#43883d] focus:border-[#43883d] dark:bg-gray-700 dark:border-gray-600 dark:text-gray-300">
                        <option value="">Todas mis categorías</option>
                        @foreach($userCategories as $categoria)
                            <option value="{{ $categoria->id }}" {{ request('category_id') == $categoria->id ? 'selected' : '' }}>
                                {{ $categoria->nombre }}
                            </option>
                        @endforeach
                    </select>
                </div>
                
                <!-- Número del Documento -->
                <div>
                    <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">
                        Número del Documento
                    </label>
                    <input type="text" name="numero" 
                           class="w-full px-3 py-2 border border-gray-300 rounded-md focus:ring-[#43883d] focus:border-[#43883d] dark:bg-gray-700 dark:border-gray-600 dark:text-gray-300"
                           placeholder="Ej: 001, 002, etc." 
                           value="{{ request('numero') }}">
                </div>
                
                <!-- Fecha desde -->
                <div>
                    <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">
                        Fecha desde
                    </label>
                    <input type="date" name="fecha_desde" 
                           class="w-full px-3 py-2 border border-gray-300 rounded-md focus:ring-[#43883d] focus:border-[#43883d] dark:bg-gray-700 dark:border-gray-600 dark:text-gray-300"
                           value="{{ request('fecha_desde') }}">
                </div>
                
                <!-- Fecha hasta -->
                <div>
                    <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">
                        Fecha hasta
                    </label>
                    <input type="date" name="fecha_hasta"
                           class="w-full px-3 py-2 border border-gray-300 rounded-md focus:ring-[#43883d] focus:border-[#43883d] dark:bg-gray-700 dark:border-gray-600 dark:text-gray-300"
                           value="{{ request('fecha_hasta') }}">
                </div>
            </div>

            <!-- Campos Opcionales de Archivo -->
            <div class="mt-6 pt-4 border-t border-gray-200 dark:border-gray-600">
                <h4 class="text-sm font-semibold text-gray-700 dark:text-gray-300 mb-4 flex items-center">
                    <i class="fas fa-archive mr-2 text-[#43883d]"></i>
                    Filtros de Información de Archivo (Opcionales)
                </h4>
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
                    <!-- Referencia Ubicación -->
                    <div>
                        <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">
                            Referencia de Ubicación
                        </label>
                        <input type="text" name="referencia_ubicacion"
                               class="w-full px-3 py-2 border border-gray-300 rounded-md focus:ring-[#43883d] focus:border-[#43883d] dark:bg-gray-700 dark:border-gray-600 dark:text-gray-300"
                               placeholder="Ej: Archivo General, Estante 3..."
                               value="{{ request('referencia_ubicacion') }}">
                    </div>

                    <!-- Soporte -->
                    <div>
                        <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">
                            Soporte
                        </label>
                        <input type="text" name="soporte"
                               class="w-full px-3 py-2 border border-gray-300 rounded-md focus:ring-[#43883d] focus:border-[#43883d] dark:bg-gray-700 dark:border-gray-600 dark:text-gray-300"
                               placeholder="Ej: Papel, Digital..."
                               value="{{ request('soporte') }}">
                    </div>

                    <!-- Volumen -->
                    <div>
                        <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">
                            Volumen
                        </label>
                        <input type="text" name="volumen"
                               class="w-full px-3 py-2 border border-gray-300 rounded-md focus:ring-[#43883d] focus:border-[#43883d] dark:bg-gray-700 dark:border-gray-600 dark:text-gray-300"
                               placeholder="Ej: Vol. 1, Tomo 2..."
                               value="{{ request('volumen') }}">
                    </div>

                    <!-- Nombre Productor -->
                    <div>
                        <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">
                            Nombre del Productor
                        </label>
                        <select name="nombre_productor"
                                class="w-full px-3 py-2 border border-gray-300 rounded-md focus:ring-[#43883d] focus:border-[#43883d] dark:bg-gray-700 dark:border-gray-600 dark:text-gray-300">
                            <option value="">-- Selecciona --</option>
                            <option value="DESPACHO ALCALDE (1000)" {{ request('nombre_productor') == 'DESPACHO ALCALDE (1000)' ? 'selected' : '' }}>DESPACHO ALCALDE (1000)</option>
                        </select>
                    </div>

                    <!-- Información Valoración -->
                    <div>
                        <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">
                            Información de Valoración
                        </label>
                        <input type="text" name="informacion_valoracion"
                               class="w-full px-3 py-2 border border-gray-300 rounded-md focus:ring-[#43883d] focus:border-[#43883d] dark:bg-gray-700 dark:border-gray-600 dark:text-gray-300"
                               placeholder="Ej: Alta importancia..."
                               value="{{ request('informacion_valoracion') }}">
                    </div>

                    <!-- Lengua Documentos -->
                    <div>
                        <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">
                            Lengua de los Documentos
                        </label>
                        <select name="lengua_documentos"
                                class="w-full px-3 py-2 border border-gray-300 rounded-md focus:ring-[#43883d] focus:border-[#43883d] dark:bg-gray-700 dark:border-gray-600 dark:text-gray-300">
                            <option value="">-- Selecciona --</option>
                            <option value="ESPAÑOL ISO 639-2 SPA" {{ request('lengua_documentos') == 'ESPAÑOL ISO 639-2 SPA' ? 'selected' : '' }}>ESPAÑOL ISO 639-2 SPA</option>
                        </select>
                    </div>
                </div>
            </div>

            <!-- Botones de acción para filtros avanzados -->
            <div class="flex flex-col sm:flex-row justify-between items-center gap-4 mt-6 pt-4 border-t border-gray-200 dark:border-gray-600">
                <div class="flex flex-wrap gap-2">
                    <button type="button" onclick="clearAllFilters()" 
                            class="px-4 py-2 bg-gray-500 text-white rounded-md hover:bg-gray-600 transition-colors">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 inline mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                        </svg>
                        Limpiar filtros
                    </button>
                </div>
                <button type="submit" 
                        class="px-6 py-2 bg-[#43883d] text-white rounded-md hover:bg-[#3F8827] transition-colors">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 inline mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                    </svg>
                    Aplicar filtros
                </button>
            </div>
        </div>
    </form>

    <!-- Filtros aplicados -->
    @if (request()->hasAny(['busqueda_general', 'category_id', 'tipo', 'numero', 'fecha_desde', 'fecha_hasta', 'orden']))
        <div class="mt-4 pt-4 border-t">
            <h6 class="text-sm font-semibold text-gray-700 dark:text-gray-300 mb-2">Filtros aplicados:</h6>
            <div class="flex flex-wrap gap-2">
                @php
                    $baseParams = request()->except(['_token', 'page']);
                @endphp

                @if(request()->filled('busqueda_general'))
                    <a href="{{ route('user.dashboard', array_merge($baseParams, ['busqueda_general' => null])) }}"
                       class="inline-flex items-center px-2 py-1 bg-[#43883d] text-white text-xs rounded-full hover:bg-[#3F8827] transition-colors">
                        🔍 {{ request('busqueda_general') }} ×
                    </a>
                @endif

                @if(request()->filled('tipo'))
                    <a href="{{ route('user.dashboard', array_merge($baseParams, ['tipo' => null])) }}"
                       class="inline-flex items-center px-2 py-1 bg-[#6A9739] text-white text-xs rounded-full hover:bg-[#5A8129] transition-colors">
                        Tipo: {{ ucfirst(request('tipo')) }} ×
                    </a>
                @endif

                @if(request()->filled('category_id') && $userCategories->count() > 0)
                    @php
                        $selectedCategory = $userCategories->firstWhere('id', request('category_id'));
                    @endphp
                    <a href="{{ route('user.dashboard', array_merge($baseParams, ['category_id' => null])) }}"
                       class="inline-flex items-center px-2 py-1 bg-[#4E7525] text-white text-xs rounded-full hover:bg-[#3E6015] transition-colors">
                        Categoría: {{ $selectedCategory ? Str::limit($selectedCategory->nombre, 20) : 'Desconocida' }} ×
                    </a>
                @endif

                @if(request()->filled('numero'))
                    <a href="{{ route('user.dashboard', array_merge($baseParams, ['numero' => null])) }}"
                       class="inline-flex items-center px-2 py-1 bg-[#9C9C52] text-white text-xs rounded-full hover:bg-[#8C8C42] transition-colors">
                        Número: {{ request('numero') }} ×
                    </a>
                @endif

                @if(request()->filled('fecha_desde'))
                    <a href="{{ route('user.dashboard', array_merge($baseParams, ['fecha_desde' => null])) }}"
                       class="inline-flex items-center px-2 py-1 bg-[#878D47] text-white text-xs rounded-full hover:bg-[#777D37] transition-colors">
                        Desde: {{ request('fecha_desde') }} ×
                    </a>
                @endif

                @if(request()->filled('fecha_hasta'))
                    <a href="{{ route('user.dashboard', array_merge($baseParams, ['fecha_hasta' => null])) }}"
                       class="inline-flex items-center px-2 py-1 bg-[#878D47] text-white text-xs rounded-full hover:bg-[#777D37] transition-colors">
                        Hasta: {{ request('fecha_hasta') }} ×
                    </a>
                @endif

                @if(request()->filled('orden') && request('orden') !== 'fecha_desc')
                    <a href="{{ route('user.dashboard', array_merge($baseParams, ['orden' => null])) }}"
                       class="inline-flex items-center px-2 py-1 bg-gray-500 text-white text-xs rounded-full hover:bg-gray-600 transition-colors">
                        Orden: {{
                            match(request('orden')) {
                                'fecha_asc' => 'Más antiguos',
                                'nombre_asc' => 'Nombre A-Z',
                                default => request('orden')
                            }
                        }} ×
                    </a>
                @endif

                <!-- Botón para limpiar todos los filtros -->
                <a href="{{ route('user.dashboard') }}"
                   class="inline-flex items-center px-3 py-1 bg-red-500 text-white text-xs rounded-full hover:bg-red-600 transition-colors font-semibold">
                    🗑️ Limpiar todos ×
                </a>
            </div>
        </div>
    @endif
</div>

<!-- Encabezado y botón agregar (solo si tiene permisos) -->
<div class="flex flex-col md:flex-row justify-between items-start md:items-center mb-6">
    <div>
        <h1 class="text-2xl font-ubuntu font-bold text-[#43883d] dark:text-[#93C01F] mb-2">Mis Documentos</h1>
        <p class="text-sm text-gray-600 dark:text-gray-400">
            Documentos de las categorías en las que tienes permisos ({{ $documents->count() }} documentos)
        </p>
    </div>
    @if(auth()->user()->categoryPermissions()->where('can_create', true)->exists())
        <a href="{{ route('user.document.create') }}" class="inline-flex items-center px-4 py-2 bg-[#43883d] hover:bg-[#3F8827] text-white rounded-md shadow-sm transition duration-150 ease-in-out mt-4 md:mt-0">
            <svg class="h-5 w-5 mr-2" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/>
            </svg>
            Crear Documento
        </a>
    @endif
</div>

<!-- Mensajes de éxito/error -->
@if(session('success'))
    <div class="bg-[#D8E5B0] border-l-4 border-[#3F8827] text-[#285F19] p-4 mb-6 rounded-md">
        <div class="flex">
            <div class="flex-shrink-0">
                <svg class="h-5 w-5 text-[#3F8827]" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" />
                </svg>
            </div>
            <div class="ml-3">
                <p class="text-sm">{{ session('success') }}</p>
            </div>
        </div>
    </div>
@endif

@if(session('error'))
    <div class="bg-red-100 border-l-4 border-red-500 text-red-700 p-4 mb-6 rounded-md">
        <div class="flex">
            <div class="flex-shrink-0">
                <svg class="h-5 w-5 text-red-500" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z" clip-rule="evenodd" />
                </svg>
            </div>
            <div class="ml-3">
                <p class="text-sm">{{ session('error') }}</p>
            </div>
        </div>
    </div>
@endif

<!-- Grid de cards para documentos -->
<div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
    @forelse($documents as $document)
        <div class="bg-white dark:bg-gray-800 rounded-lg shadow-md overflow-hidden transition-shadow hover:shadow-lg">
            <!-- Cabecera de la card con color según tipo de documento -->
            <div class="p-4 {{ ucfirst($document->tipo) == 'Decreto' ? 'bg-[#FCF2B1]/40' : 'bg-[#43883d]/40' }}">
                <div class="flex justify-between items-start">
                    <!-- Categoría y Tipo -->
                    <div>
                        <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-[#D8E5B0] text-[#285F19]">
                            {{ $document->category->nombre }}
                        </span>
                        <span class="ml-2 inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium {{ $document->tipo == 'decreto' ? 'bg-[#FCF2B1] text-amber-800' : 'bg-[#F0A9AA] text-red-800' }}">
                            {{ ucfirst($document->tipo) }}
                        </span>
                    </div>
                    
                    <!-- Ícono según tipo de documento -->
                    <div class="{{ ucfirst($document->tipo) == 'decreto' ? 'text-amber-600' : 'text-red-600' }}">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                        </svg>
                    </div>
                </div>
            </div>
            
            <!-- Contenido principal de la card -->
            <div class="p-5">
                <h3 class="text-lg font-semibold text-gray-800 dark:text-gray-200 mb-2">
                    {{ ucfirst($document->tipo) }}: No {{ $document->numero }} de {{ $document->nombre }}
                </h3>
                
                @if($document->descripcion)
                    <p class="text-sm text-gray-600 dark:text-gray-400 mb-3">
                        {{ Str::limit($document->descripcion, 100) }}
                    </p>
                @endif
                
                <!-- Metadatos del documento -->
                <div class="space-y-2 text-sm text-gray-600 dark:text-gray-400 mb-4">
                    <div class="flex items-center">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-2 text-gray-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                        </svg>
                        <span>Fecha: {{ \Carbon\Carbon::parse($document->fecha)->translatedFormat('d \d\e F \d\e\l Y') }}</span>
                    </div>
                    
                    <div class="flex items-center">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-2 text-gray-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                        <span>Creado: {{ $document->created_at->diffForHumans() }}</span>
                    </div>
                </div>
                
                <!-- Acciones para el documento CON PERMISOS -->
                <div class="flex justify-between items-center pt-4 border-t border-gray-200 dark:border-gray-700">
                    <a href="{{ route('document.show.internal', $document->id) }}"
                        class="text-[#43883d] hover:text-[#3F8827] dark:text-[#93C01F] dark:hover:text-[#93C01F]/80 flex items-center">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                        </svg>
                        <span>Ver</span>
                    </a>
                    
                    <div class="space-x-2">
                        @if(auth()->user()->hasPermissionFor($document->category_id, 'edit'))
                            <a href="{{ route('user.document.edit', $document->id) }}" 
                                class="inline-flex items-center px-3 py-1.5 bg-[#f8dc0b] hover:bg-[#FCF2B1] text-[#285F19] rounded-md text-sm transition-colors">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z" />
                                </svg>
                                Editar
                            </a>
                        @else
                            <span class="inline-flex items-center px-3 py-1.5 bg-gray-200 text-gray-500 rounded-md text-sm cursor-not-allowed">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z" />
                                </svg>
                                Sin permisos
                            </span>
                        @endif
                        
                        @if(auth()->user()->hasPermissionFor($document->category_id, 'delete'))
                            <form action="{{ route('user.document.destroy', $document->id) }}" method="POST" class="inline-block" 
                                onsubmit="return confirm('¿Seguro que deseas eliminar este documento?')">
                                @csrf
                                @method('DELETE')
                                <button class="inline-flex items-center px-3 py-1.5 bg-red-600 hover:bg-red-700 text-white rounded-md text-sm transition-colors">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                    </svg>
                                    Eliminar
                                </button>
                            </form>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    @empty
        <div class="col-span-full">
            <div class="bg-white dark:bg-gray-800 rounded-lg shadow-md p-10 text-center">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-16 w-16 mx-auto text-gray-400 mb-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                </svg>
                <p class="text-lg text-gray-600 dark:text-gray-400 mb-5">
                    @if(request()->hasAny(['busqueda_general', 'category_id', 'tipo', 'numero', 'fecha_desde', 'fecha_hasta']))
                        No se encontraron documentos que coincidan con los filtros aplicados.
                    @elseif(auth()->user()->categoryPermissions()->count() == 0)
                        No tienes categorías asignadas aún. Contacta al administrador para obtener permisos.
                    @else
                        No hay documentos en tus categorías asignadas.
                    @endif
                </p>
                @if(request()->hasAny(['busqueda_general', 'category_id', 'tipo', 'numero', 'fecha_desde', 'fecha_hasta']))
                    <a href="{{ route('user.dashboard') }}" class="inline-flex items-center px-4 py-2 bg-gray-500 hover:bg-gray-600 text-white rounded-md mr-3">
                        Limpiar filtros
                    </a>
                @endif
                @if(auth()->user()->categoryPermissions()->where('can_create', true)->exists())
                    <a href="{{ route('user.document.create') }}" class="inline-flex items-center px-4 py-2 bg-[#43883d] hover:bg-[#3F8827] text-white rounded-md">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/>
                        </svg>
                        {{ request()->hasAny(['busqueda_general', 'category_id', 'tipo', 'numero', 'fecha_desde', 'fecha_hasta']) ? 'Crear nuevo documento' : 'Crear primer documento' }}
                    </a>
                @else
                    <p class="text-sm text-gray-500 mt-4">
                        No tienes permisos para crear documentos. Contacta al administrador.
                    </p>
                @endif
            </div>
        </div>
    @endforelse
</div>

<!-- Información adicional para usuarios -->
@if($documents->count() > 0)
    <div class="mt-8 bg-blue-50 dark:bg-blue-900/20 border border-blue-200 dark:border-blue-800 rounded-lg p-6">
        <div class="flex items-start">
            <div class="flex-shrink-0">
                <svg class="h-5 w-5 text-blue-400" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                </svg>
            </div>
            <div class="ml-3">
                <h3 class="text-sm font-medium text-blue-800 dark:text-blue-400">
                    Información sobre tus permisos
                </h3>
                <div class="mt-2 text-sm text-blue-700 dark:text-blue-300">
                    <ul class="list-disc pl-5 space-y-1">
                        @if(auth()->user()->categoryPermissions()->where('can_create', true)->exists())
                            <li>Puedes <strong>crear</strong> documentos en {{ auth()->user()->categoryPermissions()->where('can_create', true)->count() }} categoría(s)</li>
                        @endif
                        @if(auth()->user()->categoryPermissions()->where('can_edit', true)->exists())
                            <li>Puedes <strong>editar</strong> documentos en {{ auth()->user()->categoryPermissions()->where('can_edit', true)->count() }} categoría(s)</li>
                        @endif
                        @if(auth()->user()->categoryPermissions()->where('can_delete', true)->exists())
                            <li>Puedes <strong>eliminar</strong> documentos en {{ auth()->user()->categoryPermissions()->where('can_delete', true)->count() }} categoría(s)</li>
                        @endif
                        <li>Solo puedes ver y gestionar documentos de las categorías donde tienes permisos asignados</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
@endif

<script>
// Funciones para manejar los filtros avanzados
function toggleAdvancedFilters() {
    const filters = document.getElementById('filtrosAvanzados');
    const toggleText = document.getElementById('toggleText');
    
    if (filters.classList.contains('hidden')) {
        filters.classList.remove('hidden');
        toggleText.textContent = 'Ocultar filtros avanzados';
    } else {
        filters.classList.add('hidden');
        toggleText.textContent = 'Mostrar filtros avanzados';
    }
}

// Función para limpiar todos los filtros
function clearAllFilters() {
    if (confirm('¿Está seguro de que desea limpiar todos los filtros?')) {
        window.location.href = '{{ route("user.dashboard") }}';
    }
}

document.addEventListener('DOMContentLoaded', function() {
    // Auto-expandir filtros avanzados si hay filtros aplicados
    const hasAdvancedFilters = {{ request()->hasAny(['category_id', 'tipo', 'numero', 'fecha_desde', 'fecha_hasta']) ? 'true' : 'false' }};
    if (hasAdvancedFilters) {
        const filters = document.getElementById('filtrosAvanzados');
        const toggleText = document.getElementById('toggleText');
        if (filters && toggleText) {
            filters.classList.remove('hidden');
            toggleText.textContent = 'Ocultar filtros avanzados';
        }
    }
    
    // Validación de rangos de fecha
    const fechaDesde = document.querySelector('input[name="fecha_desde"]');
    const fechaHasta = document.querySelector('input[name="fecha_hasta"]');
    
    if (fechaDesde && fechaHasta) {
        fechaDesde.addEventListener('change', function() {
            if (fechaHasta.value && this.value > fechaHasta.value) {
                alert('La fecha "desde" no puede ser posterior a la fecha "hasta".');
                this.value = '';
            }
        });
        
        fechaHasta.addEventListener('change', function() {
            if (fechaDesde.value && this.value < fechaDesde.value) {
                alert('La fecha "hasta" no puede ser anterior a la fecha "desde".');
                this.value = '';
            }
        });
    }
    
    // Mejorar experiencia visual con focus en campos
    const focusableFields = document.querySelectorAll('#filtrosAvanzados select, #filtrosAvanzados input');
    focusableFields.forEach(field => {
        field.addEventListener('focus', function() {
            if (!this.disabled) {
                this.style.borderColor = '#43883d';
                this.style.boxShadow = '0 0 0 0.2rem rgba(67, 136, 61, 0.25)';
            }
        });
        
        field.addEventListener('blur', function() {
            this.style.borderColor = '';
            this.style.boxShadow = '';
        });
    });
});
</script>

@endsection