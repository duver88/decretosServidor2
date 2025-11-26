<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Relatoria De Circulares</title>
     <link rel="stylesheet" href="{{ asset('css/cabecera.css') }}">
    <link rel="stylesheet" href="{{ asset('css/conceptsDetails.css') }}">
    <link rel="stylesheet" href="{{ asset('css/document.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Ubuntu:wght@400;600&display=swap" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Ubuntu:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/accesbilidad.css') }}">
    <script src="{{ asset('js/accesibilidad.js') }}"></script>
    <script src="{{ asset('js/document.js') }}"></script>
    <script src="{{ asset('js/documentoOne.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <style>
                /* Solo las fuentes y colores básicos necesarios */
        .ubuntu-font { font-family: 'Ubuntu', sans-serif !important; }
        .oswald-font { font-family: 'Oswald', sans-serif !important; }
        .bg-bucaramanga { background-color: #43883D !important; }
        .text-bucaramanga { color: #43883D !important; }
    </style>
</head>

    <div class="accessibility-bar">
    <div class="accessibility-container">
        <!-- Botón toggle para móvil (oculto en escritorio) -->
        <button id="accessibilityToggle" class="accessibility-toggle" title="Opciones de Accesibilidad">
            <i class="fas fa-universal-access"></i>
        </button>
        
        <!-- Panel de botones -->
        <div id="accessibilityPanel" class="accessibility-panel">
            <!-- Controles de Fuente -->
            <button id="decreaseFont" 
                    class="accessibility-btn font-btn-decrease" 
                    data-tooltip="Disminuir texto" 
                    title="Disminuir tamaño de texto">
                <i class="fas fa-search-minus"></i>
            </button>
            
            <button id="resetFont" 
                    class="accessibility-btn font-btn-reset active" 
                    data-tooltip="Tamaño normal" 
                    title="Tamaño normal de texto">
                <i class="fas fa-refresh"></i>
            </button>
            
            <button id="increaseFont" 
                    class="accessibility-btn font-btn-increase" 
                    data-tooltip="Aumentar texto" 
                    title="Aumentar tamaño de texto">
                <i class="fas fa-search-plus"></i>
            </button>
            
            <!-- Separador visual -->
            <div class="accessibility-separator"></div>
            
            <!-- Controles de Contraste -->
            <button id="normalContrast" 
                    class="accessibility-btn contrast-btn-normal active" 
                    data-tooltip="Contraste normal" 
                    title="Contraste normal">
                <i class="fas fa-eye"></i>
            </button>
            
            <button id="highContrast" 
                    class="accessibility-btn contrast-btn-high" 
                    data-tooltip="Alto contraste" 
                    title="Alto contraste">
                <i class="fas fa-adjust"></i>
            </button>
            
            <button id="darkMode" 
                    class="accessibility-btn contrast-btn-dark" 
                    data-tooltip="Modo oscuro" 
                    title="Modo oscuro">
                <i class="fas fa-moon"></i>
            </button>
            
            <!-- Separador visual -->
            <div class="accessibility-separator"></div>
            
            <!-- Centro de Relevo con ícono oficial -->
            <a id="centroRelevo" 
               href="https://centroderelevo.gov.co/" 
               target="_blank" 
               class="accessibility-btn centro-relevo-btn" 
               data-tooltip="Centro de Relevo Colombia" 
               title="Centro de Relevo Colombia">
                <svg class="centro-relevo-icon" viewBox="0 0 32 32" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <!-- Figura principal - persona -->
                    <circle cx="16" cy="8" r="3" fill="currentColor"/>
                    <path d="M16 12c-3 0-6 1.5-6 4v2h12v-2c0-2.5-3-4-6-4z" fill="currentColor"/>
                    
                    <!-- Manos en lenguaje de señas -->
                    <g fill="currentColor">
                        <!-- Mano izquierda -->
                        <path d="M8 16c0-1 .5-2 1.5-2.5l1 .5c.5.3.5 1 0 1.3l-1 .5c-1 .5-1.5 1.5-1.5 2.5v2h2v-2z"/>
                        
                        <!-- Mano derecha -->
                        <path d="M24 16c0-1-.5-2-1.5-2.5l-1 .5c-.5.3-.5 1 0 1.3l1 .5c1 .5 1.5 1.5 1.5 2.5v2h-2v-2z"/>
                        
                        <!-- Dedos en movimiento -->
                        <circle cx="7" cy="14" r="1" fill="currentColor"/>
                        <circle cx="6" cy="16" r="0.8" fill="currentColor"/>
                        <circle cx="25" cy="14" r="1" fill="currentColor"/>
                        <circle cx="26" cy="16" r="0.8" fill="currentColor"/>
                    </g>
                    
                    <!-- Símbolo de comunicación -->
                    <g stroke="currentColor" stroke-width="1.5" fill="none">
                        <path d="M12 22c2-1 4-1 6 0"/>
                        <path d="M10 24c4-2 8-2 12 0"/>
                    </g>
                    
                    <!-- Indicador de accesibilidad -->
                    <circle cx="26" cy="6" r="4" fill="currentColor" opacity="0.8"/>
                    <path d="M24 6h4M26 4v4" stroke="white" stroke-width="1.2" stroke-linecap="round"/>
                </svg>
            </a>
            
            <!-- Reset completo -->
            <button id="resetAll" 
                    class="accessibility-btn reset-btn" 
                    data-tooltip="Restablecer todo" 
                    title="Restablecer toda la configuración">
                <i class="fas fa-undo-alt"></i>
            </button>
        </div>
    </div>
</div>

    {{-- Header --}}
    <nav class="navbar navbar-expand-lg barra-superior-govco" aria-label="Barra superior">
            <a href="https://www.gov.co/" target="_blank" aria-label="Portal del Estado Colombiano - GOV.CO"></a>
    </nav>
    <header class="borderWg">      
        <!-- Header principal con Bootstrap Navbar -->
        <div class="container ">
            <!-- Logo -->
            
            <div class="d-flex justify-content-center align-items-center">
            <div class="logo-container">
                <div class="logo-box">
                <img
                    src="https://www.bucaramanga.gov.co/wp-content/uploads/2025/05/Screenshot_7.png"
                    alt="Escudo Bucaramanga"
                    class="logo-img img-fluid"
                />
                </div>
            </div>
            </div>

            
            <!-- Menú Bootstrap -->
            <nav class="navbar navbar-expand-lg">
                <div class="container-fluid">
                    <button class="navbar-toggler mx-auto border-0 bg-transparent p-0" type="button" data-bs-toggle="collapse" data-bs-target="#navbarMenu" aria-controls="navbarMenu" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon">
                            <span class="bar"></span>
                            <span class="bar"></span>
                            <span class="bar"></span>
                        </span>
                    </button>
                    
                    <div class="collapse navbar-collapse" id="navbarMenu">
                        <ul class="navbar-nav mx-auto">
                            <li class="nav-item">
                                <a class="nav-link " href="https://www.bucaramanga.gov.co/">Inicio</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="https://www.bucaramanga.gov.co/tramites/">Paga tus impuestos</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="https://www.bucaramanga.gov.co/noticias/">Noticias</a>
                            </li>
                            <li class="nav-item dropdown ">
                                <a class="nav-link dropdown-toggle active " href="https://www.bucaramanga.gov.co/transparencia/" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                    Transparencia y acceso<br>a la información pública
                                </a>
                                <ul class="dropdown-menu">
                                    <li><a class="dropdown-item" href="https://www.bucaramanga.gov.co/gobierno-ciudadanos/#entidad">Información de la entidad</a></li>
                                    <li><a class="dropdown-item" href="https://outlook.office.com/owa/">Correo institucional</a></li>
                                    <li><a class="dropdown-item" href="https://www.bucaramanga.gov.co/transparencia/#normativa">Normativa</a></li>
                                    <li><a class="dropdown-item" href="https://www.bucaramanga.gov.co/transparencia/#contratacion">Contratación</a></li>
                                    <li><a class="dropdown-item" href="https://www.bucaramanga.gov.co/transparencia/#planeacion">Planeación, presupuesto e informes</a></li>
                                    <li><a class="dropdown-item" href="https://www.bucaramanga.gov.co/participa/">Participa</a></li>
                                    <li><a class="dropdown-item" href="https://www.bucaramanga.gov.co/transparencia/#datos_abiertos">Datos abiertos</a></li>
                                    <li><a class="dropdown-item" href="https://www.bucaramanga.gov.co/transparencia/#grupos_interes">Información específica para Grupos de Interés</a></li>
                                    <li><a class="dropdown-item" href="https://www.bucaramanga.gov.co/transparencia/#reporte_info">Obligación de reporte de información específica por parte de la entidad</a></li>
                                    <li><a class="dropdown-item" href="https://www.bucaramanga.gov.co/transparencia/#tributaria">Información tributaria en entidades territoriales locales</a></li>
                                </ul>
                            </li>
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                    Atención y servicios<br>a la ciudadanía
                                </a>
                                <ul class="dropdown-menu">
                                    <li><a class="dropdown-item" href="https://www.bucaramanga.gov.co/tramites/">Trámites</a></li>
                                    <li><a class="dropdown-item" href="https://www.bucaramanga.gov.co/datos/">Centro de analítica de datos</a></li>
                                    <li><a class="dropdown-item" href="https://canaldenuncia.bucaramanga.gov.co/">Canal de denuncia para presuntos actos de corrupción</a></li>
                                    <li><a class="dropdown-item" href="https://www.bucaramanga.gov.co/inspecciones-de-policia/">Inspecciones de Policía</a></li>
                                    <li><a class="dropdown-item" href="https://www.bucaramanga.gov.co/proteccion-animal/">Bienestar Animal</a></li>
                                    <li><a class="dropdown-item" href="https://puntosdigitales.bucaramanga.gov.co/">Puntos Digitales</a></li>
                                    <li><a class="dropdown-item" href="https://www.bucaramanga.gov.co/ninos/">Portal de Niños</a></li>
                                    <li><a class="dropdown-item" href="https://www.bucaramanga.gov.co/inventario-de-sentencias-22/">Inventario de Sentencias</a></li>
                                    <li><a class="dropdown-item" href="https://www.bucaramanga.gov.co/servicio-de-empleo/">Servicio de empleo</a></li>
                                    <li><a class="dropdown-item" href="https://www.bucaramanga.gov.co/preguntas-frecuentes/">Preguntas frecuentes</a></li>
                                    <li><a class="dropdown-item" href="https://www.bucaramanga.gov.co/canales-de-atencion/">Canales de atención</a></li>
                                    <li><a class="dropdown-item" href="https://www.bucaramanga.gov.co/portal-de-peticiones/">Crea una PQRSD</a></li>
                                    <li><a class="dropdown-item" href="https://www.bucaramanga.gov.co/juntas-administradoras-locales-2024-2027/">Juntas administradoras locales 2024-2027</a></li>
                                </ul>
                            </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="https://www.bucaramanga.gov.co/participa/">Participa</a>
                                </li>
                        </ul>
                        
                    </div>
                </div>
            </nav>
        </div>
    </header>
    <br>
    {{-- Fin Header --}}

            {{-- SECCIÓN PRINCIPAL: Relatoría de Conceptos --}}
    <div class="container my-5" style="background-color: white; padding: 30px; border-radius: 10px; box-shadow: 0 4px 12px rgba(0,0,0,0.05);">
       <h6><span style="color: #808080;"><a href="https://www.bucaramanga.gov.co/" title="Inicio" style="color: #808080;">Inicio</a> » <a href="https://www.bucaramanga.gov.co/transparencia/" title="Transparencia" style="color: #808080;">Transparencia</a> » <a href="https://www.bucaramanga.gov.co/transparencia-bucaramanga/sistema-de-busquedas-de-normas-propio-de-la-entidad/" title="Sistema de Normas Propios de la Entidad" style="color: #808080;">Sistema de Normas Propios de la Entidad</a></span></h6>
        <div class="text-center mb-5">
            <h1 class="fw-bold" style="color: #43883d; font-family: 'Ubuntu', sans-serif;">
                Relatoría de Circulares 
                <small class="d-block fs-5 mt-2 text-muted">Sistema De Normas Propios de la Entidad</small>
            </h1>
        </div>

        <!-- Botones de navegación en formato de tarjetas -->
        <div class="row row-cols-1 row-cols-md-2 row-cols-lg-4 g-4 mb-5">
            <!-- Botón 1: Conoce el sistema de búsqueda -->
            <div class="col">
                <div class="card h-100 border-0 cursor-pointer" onclick="window.location.href='{{ route('conoce.sistema') }}'"  style="background-color: #43883d; color: white; border-radius: 10px; overflow: hidden; transition: all 0.3s ease; cursor: pointer;">
                    <div class="card-body text-center p-4">
                        <div class="mb-3">
                            <i class="fas fa-info-circle" style="font-size: 2rem;"></i>
                        </div>
                        <h5 class="card-title mb-2" style="font-weight: 600;">Conoce el Sistema de Búsqueda</h5>
                        <p class="card-text" style="font-size: 0.9rem; opacity: 0.8;">Información general sobre el funcionamiento del sistema</p>
                    </div>
                </div>
            </div>

            <!-- Botón 2: Relatoría de conceptos -->
            <div class="col">
                <div class="card h-100 border-0 cursor-pointer" onclick="window.location.href='{{ route('concepts.public') }}'"  style="background-color: #43883d; color: white; border-radius: 10px; overflow: hidden; transition: all 0.3s ease; cursor: pointer;">
                    <div class="card-body text-center p-4">
                        <div class="mb-3">
                            <i class="fas fa-book-open" style="font-size: 2rem;"></i>
                        </div>
                        <h5 class="card-title mb-2" style="font-weight: 600;">Relatoría de Conceptos</h5>
                        <p class="card-text" style="font-size: 0.9rem; opacity: 0.8;">Consulta los conceptos emitidos por la entidad</p>
                    </div>
                </div>
            </div>

            <!-- Botón 3: Relatoría de Actos Administrativos -->
            <div class="col">
                <div class="card h-100 border-0 cursor-pointer" onclick="window.location.href='{{ route('home') }}'"  style="background-color: #43883d; color: white; border-radius: 10px; overflow: hidden; transition: all 0.3s ease; cursor: pointer;">
                    <div class="card-body text-center p-4">
                        <div class="mb-3">
                            <i class="fas fa-gavel" style="font-size: 2rem;"></i>
                        </div>
                        <h5 class="card-title mb-2" style="font-weight: 600;">Relatoría de Actos Administrativos</h5>
                        <p class="card-text" style="font-size: 0.9rem; opacity: 0.8;">Consulta decretos, resoluciones y otros actos administrativos</p>
                    </div>
                </div>
            </div>

            <!-- Botón 4: Relatoría de Circulares -->
            <div class="col">
                <div class="card h-100 border-0 cursor-pointer" onclick="window.location.href='{{ route('circulares.index') }}'"  style="background-color: #43883d; color: white; border-radius: 10px; overflow: hidden; transition: all 0.3s ease; cursor: pointer;">
                    <div class="card-body text-center p-4">
                        <div class="mb-3">
                            <i class="fas fa-file-alt" style="font-size: 2rem;"></i>
                        </div>
                        <h5 class="card-title mb-2" style="font-weight: 600;">Relatoría de Circulares</h5>
                        <p class="card-text" style="font-size: 0.9rem; opacity: 0.8;">Consulta las circulares emitidas por la entidad</p>
                    </div>
                </div>
            </div>
        </div>

<div class="row g-4">
    @forelse($circulares as $circular)
    <!-- Tarjeta Circular -->
    <div class="col-sm-6 col-md-4">
        <div class="card h-100 border border-2 border-light shadow-sm" style="border-radius: 12px; transition: all 0.3s ease;"
             onmouseover="this.style.transform='translateY(-3px)'; this.classList.add('shadow');"
             onmouseout="this.style.transform='translateY(0)'; this.classList.remove('shadow');">

            <div class="card-body p-4">

                @php
                // Obtener la extensión del archivo
                $extension = $circular->archivo ? pathinfo($circular->archivo, PATHINFO_EXTENSION) : '';

                // Determinar el icono y color según la extensión
                if (in_array($extension, ['pdf'])) {
                    $iconClass = 'text-danger';
                    $bgClass = 'bg-danger bg-opacity-10';
                    $icon = '<i class="fas fa-file-pdf"></i>';
                    $buttonClass = 'btn-danger';
                    $buttonText = 'Ver PDF';
                } elseif (in_array($extension, ['doc', 'docx'])) {
                    $iconClass = 'text-primary';
                    $bgClass = 'bg-primary bg-opacity-10';
                    $icon = '<i class="fas fa-file-word"></i>';
                    $buttonClass = 'btn-primary';
                    $buttonText = 'Ver Word';
                } elseif (in_array($extension, ['xls', 'xlsx'])) {
                    $iconClass = 'text-success';
                    $bgClass = 'bg-success bg-opacity-10';
                    $icon = '<i class="fas fa-file-excel"></i>';
                    $buttonClass = 'btn-success';
                    $buttonText = 'Ver Excel';
                } else {
                    $iconClass = 'text-secondary';
                    $bgClass = 'bg-secondary bg-opacity-10';
                    $icon = '<i class="fas fa-file-alt"></i>';
                    $buttonClass = 'btn-secondary';
                    $buttonText = 'Ver Archivo';
                }
                @endphp

                <div class="d-flex align-items-start gap-3 mb-3">
                    <div class="flex-shrink-0 {{ $bgClass }} rounded d-flex align-items-center justify-content-center" style="width: 48px; height: 48px;">
                        <span class="{{ $iconClass }}" style="font-size: 1.5rem;">{!! $icon !!}</span>
                    </div>
                    <div class="flex-grow-1 min-w-0">
                        <h5 class="card-title mb-2 fw-bold text-dark lh-sm" style="font-size: 1.1rem;">
                            <a href="{{ route('circulares.show', $circular->id) }}" class="text-decoration-none text-dark stretched-link">
                                {{ $circular->nombre }}
                            </a>
                        </h5>
                        <p class="card-text text-muted mb-0 small">{{ Str::limit($circular->descripcion, 100) }}</p>
                    </div>
                </div>

                <div class="d-flex flex-wrap gap-3 mb-3 small text-muted">
                    <div class="d-flex align-items-center gap-1">
                        <i class="fas fa-calendar" style="color: #2D6A2F;"></i>
                        <span>{{ $circular->fecha->format('d/m/Y') }}</span>
                    </div>
                    <div class="d-flex align-items-center gap-1">
                        <i class="fas fa-clock" style="color: #2D6A2F;"></i>
                        <span>{{ $circular->created_at->diffForHumans() }}</span>
                    </div>
                </div>

                <div class="d-grid">
                    <a href="{{ route('circulares.show', $circular->id) }}"
                    class="btn text-white fw-bold py-2 rounded-2"
                    style="background-color: #2d6a2f; transition: background-color 0.3s ease;"
                    onclick="event.stopPropagation();"
                    onmouseover="this.style.backgroundColor='#1f4e21';"
                    onmouseout="this.style.backgroundColor='#2d6a2f';">
                        Ver Detalles
                    </a>
                </div>
            </div>
        </div>
    </div>
    @empty
    <div class="col-12">
        <div class="text-center py-5">
            <i class="fas fa-inbox fa-3x text-muted mb-3"></i>
            <p class="text-muted">No hay circulares disponibles en este momento</p>
        </div>
    </div>
    @endforelse
</div>

<!-- SECCIÓN DE PAGINACIÓN MEJORADA -->
@if($circulares->hasPages())
    <div class="pagination-container mt-4">
        <!-- Enlaces de paginación -->
        <div class="d-flex justify-content-center">
            {{ $circulares->appends(request()->query())->links('pagination::bootstrap-4') }}
        </div>
    </div>
@endif


    </div>

    {{-- FOOTER --}}
    @include('partials.public-footer')
