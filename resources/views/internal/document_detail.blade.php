@extends('layouts.app')

@section('title', ucfirst($document->tipo) . ' N° ' . $document->numero . ' de ' . $document->nombre)

@section('content')

<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-6">
    <!-- Botón de regreso -->
    <div class="mb-4">
        <a href="{{ auth()->user()->is_admin ? route('dashboard') : route('user.dashboard') }}"
           class="inline-flex items-center text-gray-600 hover:text-[#43883d] transition-colors">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18" />
            </svg>
            Volver al Dashboard
        </a>
    </div>

    <!-- Título del documento -->
    <div class="bg-white dark:bg-gray-800 rounded-lg shadow-md p-6 mb-6">
        <h1 class="text-2xl font-ubuntu font-bold text-[#43883d] dark:text-[#93C01F] mb-2">
            {{ ucfirst($document->tipo) }} N° {{ $document->numero }} de {{ $document->nombre }}
        </h1>
        <p class="text-gray-600 dark:text-gray-400">
            Expedido el {{ \Carbon\Carbon::parse($document->fecha)->translatedFormat('d \d\e F \d\e\l Y') }}
        </p>
    </div>

    <!-- Estadísticas del documento -->
    <div class="bg-gradient-to-r from-[#43883d] to-[#2d6a2f] rounded-lg shadow-md p-6 mb-6 text-white">
        <h2 class="text-lg font-semibold mb-4 flex items-center">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z" />
            </svg>
            Estadísticas del Documento
        </h2>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
            <div class="text-center">
                <div class="text-3xl font-bold">{{ number_format($document->views_count) }}</div>
                <div class="text-sm opacity-90">Visualizaciones Públicas</div>
            </div>
            <div class="text-center border-l border-r border-white border-opacity-20">
                <div class="text-xl font-bold">{{ $document->created_at->format('d/m/Y') }}</div>
                <div class="text-sm opacity-90">Fecha de Creación</div>
            </div>
            <div class="text-center">
                <div class="text-xl font-bold">{{ $document->created_at->diffForHumans() }}</div>
                <div class="text-sm opacity-90">Antigüedad</div>
            </div>
        </div>
    </div>

    <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
        <!-- Columna izquierda - Información del documento -->
        <div class="lg:col-span-2 space-y-6">
            <!-- Información General -->
            <div class="bg-white dark:bg-gray-800 rounded-lg shadow-md p-6">
                <h3 class="text-lg font-semibold text-gray-800 dark:text-gray-200 mb-4 flex items-center">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2 text-[#43883d]" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                    Información General
                </h3>
                <div class="space-y-3">
                    <div class="flex justify-between border-b pb-2">
                        <span class="text-gray-600 dark:text-gray-400">Tipo:</span>
                        <span class="font-semibold text-gray-800 dark:text-gray-200">{{ ucfirst($document->tipo) }}</span>
                    </div>
                    <div class="flex justify-between border-b pb-2">
                        <span class="text-gray-600 dark:text-gray-400">Número:</span>
                        <span class="font-semibold text-gray-800 dark:text-gray-200">{{ $document->numero }}</span>
                    </div>
                    <div class="flex justify-between border-b pb-2">
                        <span class="text-gray-600 dark:text-gray-400">Año:</span>
                        <span class="font-semibold text-gray-800 dark:text-gray-200">{{ $document->nombre }}</span>
                    </div>
                    <div class="flex justify-between border-b pb-2">
                        <span class="text-gray-600 dark:text-gray-400">Fecha de Expedición:</span>
                        <span class="font-semibold text-gray-800 dark:text-gray-200">{{ \Carbon\Carbon::parse($document->fecha)->translatedFormat('d/m/Y') }}</span>
                    </div>
                    <div class="flex justify-between border-b pb-2">
                        <span class="text-gray-600 dark:text-gray-400">Tipo de Archivo:</span>
                        <span class="font-semibold text-gray-800 dark:text-gray-200">{{ strtoupper(pathinfo($document->archivo, PATHINFO_EXTENSION)) }}</span>
                    </div>
                </div>
            </div>

            <!-- Descripción -->
            @if($document->descripcion)
            <div class="bg-white dark:bg-gray-800 rounded-lg shadow-md p-6">
                <h3 class="text-lg font-semibold text-gray-800 dark:text-gray-200 mb-4 flex items-center">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2 text-[#43883d]" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h7" />
                    </svg>
                    Descripción
                </h3>
                <p class="text-gray-700 dark:text-gray-300">{{ $document->descripcion }}</p>
            </div>
            @endif

            <!-- Información de Archivo (si existe) -->
            @if($document->referencia_ubicacion || $document->soporte || $document->volumen ||
                $document->nombre_productor || $document->informacion_valoracion || $document->lengua_documentos)
            <div class="bg-white dark:bg-gray-800 rounded-lg shadow-md p-6">
                <h3 class="text-lg font-semibold text-gray-800 dark:text-gray-200 mb-4 flex items-center">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2 text-[#43883d]" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 8h14M5 8a2 2 0 110-4h14a2 2 0 110 4M5 8v10a2 2 0 002 2h10a2 2 0 002-2V8m-9 4h4" />
                    </svg>
                    Información de Archivo
                </h3>
                <div class="space-y-3">
                    @if($document->referencia_ubicacion)
                    <div class="flex justify-between border-b pb-2">
                        <span class="text-gray-600 dark:text-gray-400">Referencia y Ubicación:</span>
                        <span class="font-semibold text-gray-800 dark:text-gray-200">{{ $document->referencia_ubicacion }}</span>
                    </div>
                    @endif
                    @if($document->soporte)
                    <div class="flex justify-between border-b pb-2">
                        <span class="text-gray-600 dark:text-gray-400">Soporte:</span>
                        <span class="font-semibold text-gray-800 dark:text-gray-200">{{ $document->soporte }}</span>
                    </div>
                    @endif
                    @if($document->volumen)
                    <div class="flex justify-between border-b pb-2">
                        <span class="text-gray-600 dark:text-gray-400">Volumen:</span>
                        <span class="font-semibold text-gray-800 dark:text-gray-200">{{ $document->volumen }}</span>
                    </div>
                    @endif
                    @if($document->nombre_productor)
                    <div class="flex justify-between border-b pb-2">
                        <span class="text-gray-600 dark:text-gray-400">Nombre del Productor:</span>
                        <span class="font-semibold text-gray-800 dark:text-gray-200">{{ $document->nombre_productor }}</span>
                    </div>
                    @endif
                    @if($document->informacion_valoracion)
                    <div class="flex justify-between border-b pb-2">
                        <span class="text-gray-600 dark:text-gray-400">Información sobre Valoración:</span>
                        <span class="font-semibold text-gray-800 dark:text-gray-200">{{ $document->informacion_valoracion }}</span>
                    </div>
                    @endif
                    @if($document->lengua_documentos)
                    <div class="flex justify-between border-b pb-2">
                        <span class="text-gray-600 dark:text-gray-400">Lengua de los Documentos:</span>
                        <span class="font-semibold text-gray-800 dark:text-gray-200">{{ $document->lengua_documentos }}</span>
                    </div>
                    @endif
                </div>
            </div>
            @endif
        </div>

        <!-- Columna derecha - Acciones y Fechas -->
        <div class="space-y-6">
            <!-- Acciones -->
            <div class="bg-white dark:bg-gray-800 rounded-lg shadow-md p-6">
                <h3 class="text-lg font-semibold text-gray-800 dark:text-gray-200 mb-4 flex items-center">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2 text-[#43883d]" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6V4m0 2a2 2 0 100 4m0-4a2 2 0 110 4m-6 8a2 2 0 100-4m0 4a2 2 0 110-4m0 4v2m0-6V4m6 6v10m6-2a2 2 0 100-4m0 4a2 2 0 110-4m0 4v2m0-6V4" />
                    </svg>
                    Acciones
                </h3>
                <div class="space-y-3">
                    <a href="{{ route('document.show', $document->id) }}"
                       target="_blank"
                       class="block w-full text-center px-4 py-3 bg-[#43883d] hover:bg-[#3F8827] text-white rounded-md transition-colors">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 inline mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                        </svg>
                        Ver Documento Público
                    </a>
                    <a href="{{ asset('storage/' . $document->archivo) }}"
                       download
                       class="block w-full text-center px-4 py-3 border-2 border-[#43883d] text-[#43883d] hover:bg-[#43883d] hover:text-white rounded-md transition-colors">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 inline mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4" />
                        </svg>
                        Descargar Archivo
                    </a>
                </div>
            </div>

            <!-- Información Temporal -->
            <div class="bg-white dark:bg-gray-800 rounded-lg shadow-md p-6">
                <h3 class="text-lg font-semibold text-gray-800 dark:text-gray-200 mb-4 flex items-center">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2 text-[#43883d]" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                    Fechas
                </h3>
                <div class="space-y-3">
                    <div class="flex justify-between border-b pb-2">
                        <span class="text-gray-600 dark:text-gray-400">Creado:</span>
                        <span class="font-semibold text-gray-800 dark:text-gray-200">{{ $document->created_at->translatedFormat('d/m/Y') }}</span>
                    </div>
                    <div class="flex justify-between border-b pb-2">
                        <span class="text-gray-600 dark:text-gray-400">Modificado:</span>
                        <span class="font-semibold text-gray-800 dark:text-gray-200">{{ $document->updated_at->translatedFormat('d/m/Y') }}</span>
                    </div>
                    <div class="flex justify-between">
                        <span class="text-gray-600 dark:text-gray-400">Antigüedad:</span>
                        <span class="font-semibold text-gray-800 dark:text-gray-200">{{ $document->created_at->diffForHumans() }}</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
