<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ ucfirst($document->tipo) }} N° {{ $document->numero }} de {{ $document->nombre }} - Alcaldía de Bucaramanga</title>

    <!-- Meta tags SEO -->
    <meta name="description" content="{{ ucfirst($document->tipo) }} N° {{ $document->numero }} del año {{ $document->nombre }}, expedido el {{ \Carbon\Carbon::parse($document->fecha)->translatedFormat('d \d\e F \d\e\l Y') }}. {{ Str::limit($document->descripcion ?? 'Documento oficial de la Alcaldía de Bucaramanga', 150) }}">
    <meta name="keywords" content="{{ strtolower($document->tipo) }}, {{ $document->numero }}, {{ $document->nombre }}, alcaldía bucaramanga, documentos oficiales, normativa bucaramanga, {{ $document->category->nombre ?? '' }}">
    <meta name="author" content="Alcaldía de Bucaramanga">
    <meta name="robots" content="index, follow">
    <link rel="canonical" href="{{ url()->current() }}">

    <!-- Open Graph / Facebook -->
    <meta property="og:type" content="article">
    <meta property="og:url" content="{{ url()->current() }}">
    <meta property="og:title" content="{{ ucfirst($document->tipo) }} N° {{ $document->numero }} de {{ $document->nombre }}">
    <meta property="og:description" content="{{ Str::limit($document->descripcion ?? 'Documento oficial de la Alcaldía de Bucaramanga', 150) }}">
    <meta property="og:site_name" content="Alcaldía de Bucaramanga">
    <meta property="og:locale" content="es_CO">

    <!-- Twitter -->
    <meta property="twitter:card" content="summary">
    <meta property="twitter:url" content="{{ url()->current() }}">
    <meta property="twitter:title" content="{{ ucfirst($document->tipo) }} N° {{ $document->numero }} de {{ $document->nombre }}">
    <meta property="twitter:description" content="{{ Str::limit($document->descripcion ?? 'Documento oficial de la Alcaldía de Bucaramanga', 150) }}">

    <!-- Datos estructurados JSON-LD para Google -->
    <script type="application/ld+json">
    {
      "@context": "https://schema.org",
      "@type": "GovernmentService",
      "name": "{{ ucfirst($document->tipo) }} N° {{ $document->numero }} de {{ $document->nombre }}",
      "description": "{{ $document->descripcion ?? 'Documento oficial de la Alcaldía de Bucaramanga' }}",
      "provider": {
        "@type": "GovernmentOrganization",
        "name": "Alcaldía de Bucaramanga",
        "url": "https://www.bucaramanga.gov.co"
      },
      "serviceType": "{{ ucfirst($document->tipo) }}",
      "areaServed": {
        "@type": "City",
        "name": "Bucaramanga",
        "addressCountry": "CO"
      },
      "datePublished": "{{ $document->created_at->toIso8601String() }}",
      "dateModified": "{{ $document->updated_at->toIso8601String() }}"
    }
    </script>
     <link rel="stylesheet" href="{{ asset('css/cabecera.css') }}">   
    <link rel="stylesheet" href="{{ asset('css/conceptsDetails.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Ubuntu:wght@400;600&display=swap" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Ubuntu:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/accesbilidad.css') }}">
    <script src="{{ asset('js/accesibilidad.js') }}"></script>
        <style>
                /* Solo las fuentes y colores básicos necesarios */
        .ubuntu-font { font-family: 'Ubuntu', sans-serif !important; }
        .oswald-font { font-family: 'Oswald', sans-serif !important; }
        .bg-bucaramanga { background-color: #43883D !important; }
        .text-bucaramanga { color: #43883D !important; }
    </style>
</head>
<body>

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

<div class="concept-container">
    <!-- Botón de regreso -->
    <a href="{{ route('home') }}" class="back-btn">
        <i class="fas fa-arrow-left me-2"></i>
        Volver a Documentos
    </a>

    <!-- Header del documento -->
    <div class="header-title">
        <h1>{{ ucfirst($document->tipo) }} N° {{ $document->numero }} de {{ $document->nombre }}</h1>
    </div>

    <div class="row">
        <!-- Columna izquierda - Vista previa del documento (8 columnas) -->
        <div class="col-lg-8 mb-4">
            <div class="info-card">
                <div class="info-card-header">
                    <i class="fas fa-eye me-2"></i>
                    Vista Previa del Documento
                </div>
                <div class="preview-container">
                    @if(pathinfo($document->archivo, PATHINFO_EXTENSION) == 'pdf')
                        <iframe src="{{ asset('storage/' . $document->archivo) }}" 
                                class="preview-iframe">
                        </iframe>
                    @else
                        <div class="no-preview">
                            <div class="no-preview-icon">
                                <i class="fas fa-file-download"></i>
                            </div>
                            <h5 style="color: #43883d; font-weight: 600;">Archivo no visualizable en línea</h5>
                            <p class="mb-0">Solo los archivos PDF pueden visualizarse directamente. Descargue el archivo para abrirlo en su aplicación correspondiente.</p>
                        </div>
                    @endif
                </div>
            </div>

            <!-- Descripción del documento -->
            @if($document->descripcion)
            <div class="content-card">
                <h5 class="text-success fw-bold mb-3">
                    <i class="fas fa-align-left me-2"></i>
                    Descripción del Documento
                </h5>
                <div class="content-text">
                    {!! nl2br(e($document->descripcion)) !!}
                </div>
            </div>
            @endif

            <!-- Tarjeta de Acciones movida aquí -->
            <div class="info-card">
                <div class="info-card-header">
                    <i class="fas fa-cog me-2"></i>
                    Acciones Disponibles
                </div>
                <div class="info-card-body">
                    <a href="{{ asset('storage/' . $document->archivo) }}" 
                       target="_blank" 
                       class="btn-action">
                        <i class="fas fa-external-link-alt me-2"></i>
                        Abrir en Nueva Pestaña
                    </a>
                    
                    <a href="{{ asset('storage/' . $document->archivo) }}" 
                       download 
                       class="btn-outline-action">
                        <i class="fas fa-download me-2"></i>
                        Descargar Archivo
                    </a>
                </div>
            </div>
        </div>

        <!-- Columna derecha - Información en tarjetas (4 columnas) -->
        <div class="col-lg-4">
            <!-- Tarjeta de Información General -->
            <div class="info-card">
                <div class="info-card-header">
                    <i class="fas fa-info-circle me-2"></i>
                    Información General
                </div>
                <div class="info-card-body">
                    <div class="metadata-item">
                        <div class="metadata-label">
                            <i class="fas fa-file-contract me-2"></i>
                            Tipo de Documento
                        </div>
                        <div class="metadata-value">{{ ucfirst($document->tipo) }}</div>
                    </div>

                    <div class="metadata-item">
                        <div class="metadata-label">
                            <i class="fas fa-hashtag me-2"></i>
                            Número
                        </div>
                        <div class="metadata-value">{{ $document->numero }}</div>
                    </div>

                    <div class="metadata-item">
                        <div class="metadata-label">
                            <i class="fas fa-signature me-2"></i>
                            Año 
                        </div>
                        <div class="metadata-value">{{ $document->nombre }}</div>
                    </div>

                    <div class="metadata-item">
                        <div class="metadata-label">
                            <i class="fas fa-calendar-alt me-2"></i>
                            Fecha de Expedición
                        </div>
                        <div class="metadata-value">{{ \Carbon\Carbon::parse($document->fecha)->translatedFormat('d \d\e F \d\e\l Y') }}</div>
                    </div>
                </div>
            </div>

            <!-- Tarjeta de Clasificación -->
            <div class="info-card">
                <div class="info-card-header">
                    <i class="fas fa-tags me-2"></i>
                    Clasificación
                </div>
                <div class="info-card-body">
                    {{-- <div class="metadata-item">
                        <div class="metadata-label">
                            <i class="fas fa-folder me-2"></i>
                            Dependencia
                        </div>
                        <div class="metadata-value">{{ $document->category->nombre }}</div>
                    </div> --}}

                    <div class="metadata-item">
                        <div class="metadata-label">
                            <i class="fas fa-file-alt me-2"></i>
                            Tipo de Archivo
                        </div>
                        <div class="metadata-value">{{ strtoupper(pathinfo($document->archivo, PATHINFO_EXTENSION)) }}</div>
                    </div>

                    <div class="metadata-item">
                        <div class="metadata-label">
                            <i class="fas fa-calendar-year me-2"></i>
                            Año de Expedición
                        </div>
                        <div class="metadata-value">{{ \Carbon\Carbon::parse($document->fecha)->format('Y') }}</div>
                    </div>
                </div>
            </div>

            <!-- Tarjeta de Fechas -->
            {{-- <div class="info-card">
                <div class="info-card-header">
                    <i class="fas fa-clock me-2"></i>
                    Información Temporal
                </div>
                <div class="info-card-body">
                    <div class="metadata-item">
                        <div class="metadata-label">
                            <i class="fas fa-plus-circle me-2"></i>
                            Fecha de Creación
                        </div>
                        <div class="metadata-value">{{ $document->created_at->translatedFormat('d \d\e F \d\e\l Y') }}</div>
                    </div>

                    <div class="metadata-item">
                        <div class="metadata-label">
                            <i class="fas fa-edit me-2"></i>
                            Última Modificación
                        </div>
                        <div class="metadata-value">{{ $document->updated_at->translatedFormat('d \d\e F \d\e\l Y') }}</div>
                    </div>

                    <div class="metadata-item">
                        <div class="metadata-label">
                            <i class="fas fa-eye me-2"></i>
                            Tiempo Transcurrido
                        </div>
                        <div class="metadata-value">{{ $document->created_at->diffForHumans() }}</div>
                    </div>
                </div>
            </div> --}}

            <!-- Tarjeta de Información de Archivo (Campos Opcionales) -->
            @if($document->referencia_ubicacion || $document->soporte || $document->volumen ||
                $document->nombre_productor || $document->informacion_valoracion || $document->lengua_documentos)
            <div class="info-card">
                <div class="info-card-header">
                    <i class="fas fa-archive me-2"></i>
                    Información de Archivo
                </div>
                <div class="info-card-body">
                    @if($document->referencia_ubicacion)
                    <div class="metadata-item">
                        <div class="metadata-label">
                            <i class="fas fa-map-marker-alt me-2"></i>
                            Referencia y Ubicación
                        </div>
                        <div class="metadata-value">{{ $document->referencia_ubicacion }}</div>
                    </div>
                    @endif

                    @if($document->soporte)
                    <div class="metadata-item">
                        <div class="metadata-label">
                            <i class="fas fa-file-alt me-2"></i>
                            Soporte
                        </div>
                        <div class="metadata-value">{{ $document->soporte }}</div>
                    </div>
                    @endif

                    @if($document->volumen)
                    <div class="metadata-item">
                        <div class="metadata-label">
                            <i class="fas fa-book me-2"></i>
                            Volumen
                        </div>
                        <div class="metadata-value">{{ $document->volumen }}</div>
                    </div>
                    @endif

                    @if($document->nombre_productor)
                    <div class="metadata-item">
                        <div class="metadata-label">
                            <i class="fas fa-user-tie me-2"></i>
                            Nombre del Productor
                        </div>
                        <div class="metadata-value">{{ $document->nombre_productor }}</div>
                    </div>
                    @endif

                    @if($document->informacion_valoracion)
                    <div class="metadata-item">
                        <div class="metadata-label">
                            <i class="fas fa-clipboard-check me-2"></i>
                            Información sobre Valoración
                        </div>
                        <div class="metadata-value">{{ $document->informacion_valoracion }}</div>
                    </div>
                    @endif

                    @if($document->lengua_documentos)
                    <div class="metadata-item">
                        <div class="metadata-label">
                            <i class="fas fa-language me-2"></i>
                            Lengua de los Documentos
                        </div>
                        <div class="metadata-value">{{ $document->lengua_documentos }}</div>
                    </div>
                    @endif
                </div>
            </div>
            @endif

        </div>
    </div>
</div>

{{-- FOOTER --}}
@include('partials.public-footer')

<!-- CSS adicional para el badge de seguridad -->
<style>
.security-badge-large {
    width: 60px;
    height: 60px;
    background: linear-gradient(135deg, #43883d, #2d6a2f);
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    margin: 0 auto;
    box-shadow: 0 4px 12px rgba(67, 136, 61, 0.3);
}

.security-badge-large i {
    color: white;
    font-size: 1.5rem;
}
</style>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>