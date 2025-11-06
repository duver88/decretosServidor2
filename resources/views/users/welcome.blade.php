@extends('layouts.app')

@section('title', 'Bienvenido')

@section('content')
<div class="max-w-4xl mx-auto">
    <!-- Card de Bienvenida -->
    <div class="bg-white dark:bg-gray-800 rounded-lg shadow-lg overflow-hidden">
        <!-- Header con gradiente -->
        <div class="p-8 text-center" style="background: linear-gradient(135deg, #43883d 0%, #285F19 100%);">
            <div class="mb-4">
                <svg class="h-20 w-20 mx-auto text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/>
                </svg>
            </div>
            <h1 class="text-3xl font-bold text-white mb-2">
                ¡Bienvenido, {{ auth()->user()->name }}!
            </h1>
            <p class="text-white/90 text-lg">
                Sistema de Normas Propios de la Entidad
            </p>
        </div>

        <!-- Contenido -->
        <div class="p-8">
            <!-- Mensaje de error si existe -->
            @if(session('error'))
            <div class="mb-6 bg-red-50 dark:bg-red-900/20 border-l-4 border-red-500 p-4 rounded">
                <div class="flex items-start">
                    <svg class="h-6 w-6 text-red-500 mr-3 flex-shrink-0" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"/>
                    </svg>
                    <div>
                        <p class="font-semibold text-red-800 dark:text-red-300">Acceso Denegado</p>
                        <p class="text-sm text-red-700 dark:text-red-400 mt-1">{{ session('error') }}</p>
                    </div>
                </div>
            </div>
            @endif

            @php
                $userModules = auth()->user()->getAccessibleModules();
            @endphp

            @if($userModules->isEmpty())
                <!-- Usuario sin módulos asignados -->
                <div class="text-center py-8">
                    <div class="mb-6">
                        <svg class="h-24 w-24 mx-auto text-gray-400 dark:text-gray-500" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"/>
                        </svg>
                    </div>
                    <h2 class="text-2xl font-semibold text-gray-700 dark:text-gray-300 mb-3">
                        No tienes módulos asignados
                    </h2>
                    <p class="text-gray-600 dark:text-gray-400 mb-6 max-w-md mx-auto">
                        Actualmente no tienes acceso a ningún módulo del sistema. Por favor, contacta al administrador para solicitar los permisos necesarios.
                    </p>

                    <!-- Información de contacto -->
                    <div class="bg-blue-50 dark:bg-blue-900/20 border border-blue-200 dark:border-blue-800 rounded-lg p-6 max-w-md mx-auto">
                        <h3 class="font-semibold text-blue-900 dark:text-blue-300 mb-2">
                            <i class="fas fa-info-circle mr-2"></i>¿Necesitas acceso?
                        </h3>
                        <p class="text-blue-800 dark:text-blue-300 text-sm">
                            Comunícate con el administrador del sistema para solicitar acceso a los módulos que necesites.
                        </p>
                    </div>
                </div>
            @else
                <!-- Usuario con módulos asignados -->
                <div class="mb-8">
                    <h2 class="text-2xl font-semibold text-gray-800 dark:text-gray-200 mb-4">
                        Tus módulos disponibles
                    </h2>
                    <p class="text-gray-600 dark:text-gray-400 mb-6">
                        Tienes acceso a los siguientes módulos del sistema:
                    </p>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        @foreach($userModules as $module)
                            @if($module->slug === 'actos-administrativos')
                                <a href="{{ route('user.dashboard') }}" class="block p-6 bg-gradient-to-br from-green-50 to-green-100 dark:from-green-900/20 dark:to-green-800/20 border-2 border-green-200 dark:border-green-700 rounded-lg hover:shadow-lg transition-all hover:scale-105">
                                    <div class="flex items-start">
                                        <div class="flex-shrink-0">
                                            <div class="w-12 h-12 bg-green-600 rounded-lg flex items-center justify-center">
                                                <svg class="h-6 w-6 text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
                                                </svg>
                                            </div>
                                        </div>
                                        <div class="ml-4 flex-1">
                                            <h3 class="text-lg font-semibold text-gray-900 dark:text-gray-100">
                                                {{ $module->name }}
                                            </h3>
                                            <p class="text-sm text-gray-600 dark:text-gray-400 mt-1">
                                                Gestiona y consulta actos administrativos
                                            </p>
                                        </div>
                                        <svg class="h-5 w-5 text-green-600 dark:text-green-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                            <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd"/>
                                        </svg>
                                    </div>
                                </a>
                            @elseif($module->slug === 'conceptos')
                                <a href="{{ route('concepts.index') }}" class="block p-6 bg-gradient-to-br from-blue-50 to-blue-100 dark:from-blue-900/20 dark:to-blue-800/20 border-2 border-blue-200 dark:border-blue-700 rounded-lg hover:shadow-lg transition-all hover:scale-105">
                                    <div class="flex items-start">
                                        <div class="flex-shrink-0">
                                            <div class="w-12 h-12 bg-blue-600 rounded-lg flex items-center justify-center">
                                                <svg class="h-6 w-6 text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.746 0 3.332.477 4.5 1.253v13C19.832 18.477 18.246 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"/>
                                                </svg>
                                            </div>
                                        </div>
                                        <div class="ml-4 flex-1">
                                            <h3 class="text-lg font-semibold text-gray-900 dark:text-gray-100">
                                                {{ $module->name }}
                                            </h3>
                                            <p class="text-sm text-gray-600 dark:text-gray-400 mt-1">
                                                Gestiona y consulta conceptos jurídicos
                                            </p>
                                        </div>
                                        <svg class="h-5 w-5 text-blue-600 dark:text-blue-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                            <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd"/>
                                        </svg>
                                    </div>
                                </a>
                            @elseif($module->slug === 'circulares')
                                <a href="{{ route('circulares.admin.index') }}" class="block p-6 bg-gradient-to-br from-orange-50 to-orange-100 dark:from-orange-900/20 dark:to-orange-800/20 border-2 border-orange-200 dark:border-orange-700 rounded-lg hover:shadow-lg transition-all hover:scale-105">
                                    <div class="flex items-start">
                                        <div class="flex-shrink-0">
                                            <div class="w-12 h-12 bg-orange-600 rounded-lg flex items-center justify-center">
                                                <svg class="h-6 w-6 text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
                                                </svg>
                                            </div>
                                        </div>
                                        <div class="ml-4 flex-1">
                                            <h3 class="text-lg font-semibold text-gray-900 dark:text-gray-100">
                                                {{ $module->name }}
                                            </h3>
                                            <p class="text-sm text-gray-600 dark:text-gray-400 mt-1">
                                                Gestiona y consulta circulares
                                            </p>
                                        </div>
                                        <svg class="h-5 w-5 text-orange-600 dark:text-orange-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                            <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd"/>
                                        </svg>
                                    </div>
                                </a>
                            @endif
                        @endforeach
                    </div>
                </div>
            @endif

            <!-- Enlaces públicos siempre disponibles -->
            <div class="mt-8 pt-8 border-t border-gray-200 dark:border-gray-700">
                <h3 class="text-lg font-semibold text-gray-800 dark:text-gray-200 mb-4">
                    <i class="fas fa-globe mr-2 text-[#43883d]"></i>Consulta Pública
                </h3>
                <p class="text-gray-600 dark:text-gray-400 mb-4">
                    Accede a las relatorías públicas disponibles para todos los usuarios:
                </p>
                <div class="grid grid-cols-1 sm:grid-cols-3 gap-3">
                    <a href="{{ route('home') }}" class="flex items-center p-4 bg-gray-50 dark:bg-gray-700 rounded-lg hover:bg-gray-100 dark:hover:bg-gray-600 transition-colors">
                        <svg class="h-5 w-5 text-[#43883d] mr-3" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/>
                        </svg>
                        <span class="text-sm font-medium text-gray-700 dark:text-gray-300">Actos Administrativos</span>
                    </a>
                    <a href="{{ route('concepts.public') }}" class="flex items-center p-4 bg-gray-50 dark:bg-gray-700 rounded-lg hover:bg-gray-100 dark:hover:bg-gray-600 transition-colors">
                        <svg class="h-5 w-5 text-[#43883d] mr-3" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.746 0 3.332.477 4.5 1.253v13C19.832 18.477 18.246 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"/>
                        </svg>
                        <span class="text-sm font-medium text-gray-700 dark:text-gray-300">Conceptos</span>
                    </a>
                    <a href="{{ route('circulares.index') }}" class="flex items-center p-4 bg-gray-50 dark:bg-gray-700 rounded-lg hover:bg-gray-100 dark:hover:bg-gray-600 transition-colors">
                        <svg class="h-5 w-5 text-[#43883d] mr-3" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
                        </svg>
                        <span class="text-sm font-medium text-gray-700 dark:text-gray-300">Circulares</span>
                    </a>
                </div>
            </div>
        </div>
    </div>

    <!-- Información adicional -->
    <div class="mt-6 bg-white dark:bg-gray-800 rounded-lg shadow p-6">
        <h3 class="font-semibold text-gray-800 dark:text-gray-200 mb-3">
            <i class="fas fa-info-circle mr-2 text-[#43883d]"></i>Información del Sistema
        </h3>
        <div class="grid grid-cols-1 md:grid-cols-2 gap-4 text-sm text-gray-600 dark:text-gray-400">
            <div>
                <strong class="text-gray-700 dark:text-gray-300">Usuario:</strong> {{ auth()->user()->email }}
            </div>
            <div>
                <strong class="text-gray-700 dark:text-gray-300">Rol:</strong> {{ auth()->user()->is_admin ? 'Administrador' : 'Usuario' }}
            </div>
            <div>
                <strong class="text-gray-700 dark:text-gray-300">Módulos activos:</strong> {{ $userModules->count() }}
            </div>
            <div>
                <strong class="text-gray-700 dark:text-gray-300">Última sesión:</strong> {{ now()->format('d/m/Y H:i') }}
            </div>
        </div>
    </div>
</div>
@endsection
