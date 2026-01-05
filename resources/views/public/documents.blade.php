<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Relatoría de Actos Administrativos</title>
    <link rel="icon" type="image/png" href="{{ asset('favicon.png') }}">
    <link rel="stylesheet" href="{{ asset('css/cabecera.css') }}">  
    <link rel="stylesheet" href="{{ asset('css/document.css') }}">
    <link rel="stylesheet" href="{{ asset('css/accesbilidad.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
    <link href="https://fonts.googleapis.com/css2?family=Ubuntu:wght@400;600&display=swap" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Agregamos Font Awesome 5 para los íconos -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <script src="{{ asset('js/accesibilidad.js') }}"></script>
    <script src="{{ asset('js/document.js') }}"></script>
    <script src="{{ asset('js/documentoOne.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>

    
<!-- Barra Lateral de Accesibilidad -->
<!-- Barra de Accesibilidad - Alcaldía de Bucaramanga -->
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
    {{-- Fin Header --}}

    {{-- SECCIÓN PRINCIPAL: Relatoría de Actos Administrativos --}}
    
    <div class="container my-5" style="background-color: white; padding: 30px; border-radius: 10px; box-shadow: 0 4px 12px rgba(0,0,0,0.05);">
        <h6><span style="color: #808080;"><a href="https://www.bucaramanga.gov.co/" title="Inicio" style="color: #808080;">Inicio</a> » <a href="https://www.bucaramanga.gov.co/transparencia/" title="Transparencia" style="color: #808080;">Transparencia</a> » <a href="https://www.bucaramanga.gov.co/transparencia-bucaramanga/sistema-de-busquedas-de-normas-propio-de-la-entidad/" title="Sistema de Normas Propios de la Entidad" style="color: #808080;">Sistema de Normas Propios de la Entidad</a></span></h6>
        <div class="text-center mb-5">
            
            <h1 class="fw-bold" style="color: #43883d; font-family: 'Ubuntu', sans-serif;">
                Sistema de Normas Propios de la Entidad
                <small class="d-block fs-5 mt-2 text-muted">Relatoría de Actos Administrativos</small>
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
                <div class="card h-100 border-0 cursor-pointer"  style="background-color: #43883d; color: white; border-radius: 10px; overflow: hidden; transition: all 0.3s ease; cursor: pointer;">
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

        <!-- FORMULARIO MEJORADO CON FILTROS AVANZADOS -->
        @php
            $selectedTipo = request('tipo');
            $selectedOrder = request('orden', 'fecha_desc');
            $currentCategory = request('category_id');
        @endphp

        <!-- CHIPS DE TIPOS DE DOCUMENTO -->
        <div class="mb-3">
            @if(isset($tipos) && $tipos->count() > 0)
                @foreach($tipos as $tipo)
                    <form method="GET" action="{{ route('home') }}" class="d-inline">
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
                        <button type="submit" class="chip {{ $selectedTipo == $tipo ? 'active' : '' }}">
                            {{ ucfirst($tipo) }} ({{ $stats['por_tipo'][$tipo] ?? 0 }})
                        </button>
                    </form>
                @endforeach
            @endif
            <form method="GET" action="{{ route('home') }}" class="d-inline">
                @foreach(request()->except(['tipo', 'page']) as $key => $value)
                    @if(is_array($value))
                        @foreach($value as $v)
                            <input type="hidden" name="{{ $key }}[]" value="{{ $v }}">
                        @endforeach
                    @else
                        <input type="hidden" name="{{ $key }}" value="{{ $value }}">
                    @endif
                @endforeach
                <button type="submit" class="chip {{ !$selectedTipo ? 'active' : '' }}">Todos los tipos</button>
            </form>

            <!-- Botón especial para Documentos Históricos -->
            <form method="GET" action="{{ route('home') }}" class="d-inline">
                @foreach(request()->except(['historico', 'fecha_hasta', 'page']) as $key => $value)
                    @if(is_array($value))
                        @foreach($value as $v)
                            <input type="hidden" name="{{ $key }}[]" value="{{ $v }}">
                        @endforeach
                    @else
                        <input type="hidden" name="{{ $key }}" value="{{ $value }}">
                    @endif
                @endforeach
                <input type="hidden" name="fecha_hasta" value="1949-12-31">
                <button type="submit" class="chip {{ request('fecha_hasta') == '1949-12-31' ? 'active' : '' }}" style="background: linear-gradient(135deg, #8B4513 0%, #654321 100%); color: white; border: none;">
                    <i class="fas fa-landmark me-1"></i> Documentos Históricos
                </button>
            </form>
        </div>

        <!-- CHIPS DE CATEGORÍAS -->
<div class="mb-4">
    @if(isset($años) && $años->count() > 0)
        @foreach($años as $año)
            @php
                $countAño = $stats['por_año'][$año] ?? 0;
                $currentAño = request()->get('año');
            @endphp
            <form method="GET" action="{{ route('home') }}" class="d-inline">
                @foreach(request()->except(['año', 'page']) as $key => $value)
                    @if(is_array($value))
                        @foreach($value as $v)
                            <input type="hidden" name="{{ $key }}[]" value="{{ $v }}">
                        @endforeach
                    @else
                        <input type="hidden" name="{{ $key }}" value="{{ $value }}">
                    @endif
                @endforeach
                <input type="hidden" name="año" value="{{ $año }}">
                <button type="submit" class="chip {{ $currentAño == $año ? 'active' : '' }}">
                    {{ $año }} ({{ $countAño }})
                </button>
            </form>
        @endforeach
        
        {{-- Botón para limpiar filtro de año --}}
        @if(request()->filled('año'))
            <form method="GET" action="{{ route('home') }}" class="d-inline">
                @foreach(request()->except(['año', 'page']) as $key => $value)
                    @if(is_array($value))
                        @foreach($value as $v)
                            <input type="hidden" name="{{ $key }}[]" value="{{ $v }}">
                        @endforeach
                    @else
                        <input type="hidden" name="{{ $key }}" value="{{ $value }}">
                    @endif
                @endforeach
                <button type="submit" class="chip clear-filter">
                    Todos los años
                </button>
            </form>
        @endif
    @endif
</div>

        <!-- BUSCADOR GENERAL -->
        <form method="GET" action="{{ route('home') }}">
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
            
            <div class="input-group mb-3">
                <span class="input-group-text bg-light text-secondary"><i class="fas fa-search"></i></span>
                <input type="search" name="busqueda_general" class="form-control"
                       placeholder="Buscar por nombre, número, descripción o tipo..." value="{{ request('busqueda_general') }}">
                <button class="btn btn-success" type="submit">Buscar</button>
            </div>

            <!-- ORDEN Y TOGGLE AVANZADO -->
            <div class="d-flex justify-content-between align-items-center mb-3">
                <div class="d-flex align-items-center gap-2">
                    <i class="fas fa-sort text-muted"></i>
                    <label class="fw-bold text-muted mb-0">Ordenar:</label>
                    @foreach([
                        'fecha_desc' => 'Recientes',
                        'fecha_asc' => 'Antiguos',
                        'nombre_asc' => 'A-Z',
                    ] as $key => $label)
                        <label class="order-option {{ $selectedOrder == $key ? 'active' : '' }}">
                            <input type="radio" name="orden" value="{{ $key }}" onchange="this.form.submit()" hidden
                                   {{ $selectedOrder == $key ? 'checked' : '' }}>
                            {{ $label }}
                        </label>
                    @endforeach
                </div>
                <div>
                    <a class="toggle-advanced text-decoration-none" data-bs-toggle="collapse" href="#filtrosAvanzados" role="button">
                        <i class="fas fa-sliders-h me-1"></i> Filtros avanzados
                    </a>
                </div>
            </div>

            <!-- FILTROS AVANZADOS -->
            <div class="collapse mb-4" id="filtrosAvanzados">
                <div class="row g-3">
                    <div class="col-md-6">
                        <label for="tipo" class="form-label"><i class="fas fa-file-alt me-1"></i> Acto Administrativo</label>
                        <select class="form-select" name="tipo" id="tipo">
                            <option value="">Todos los tipos</option>
                            @if(isset($tipos))
                                @foreach($tipos as $tipo)
                                    <option value="{{ $tipo }}" @selected(request('tipo') == $tipo)>
                                        {{ ucfirst($tipo) }}
                                    </option>
                                @endforeach
                            @endif
                        </select>
                    </div>

                    <!-- Filtros de DocumentType y DocumentTheme mejorados -->
                    <div class="col-md-6">
                        <label for="document_type_id" class="form-label">
                            <i class="fas fa-tags me-1"></i> Tipo de Documento
                        </label>
                        <select name="document_type_id" id="document_type_id" class="form-select">
                            <option value="">Seleccione un tipo</option>
                            @if(isset($documentTypes))
                                @foreach($documentTypes as $documentType)
                                    <option value="{{ $documentType->id }}" {{ request('document_type_id') == $documentType->id ? 'selected' : '' }}>
                                        {{ $documentType->nombre }}
                                    </option>
                                @endforeach
                            @endif
                        </select>
                    </div>

                    <div class="col-md-6">
                        <label for="document_theme_id" class="form-label">
                            <i class="fas fa-bookmark me-1"></i> Tema Específico
                        </label>
                        <select name="document_theme_id" id="document_theme_id" class="form-select" disabled>
                            <option value="">Primero seleccione un tipo</option>
                        </select>
                        <small class="text-muted">Seleccione primero un tipo de documento</small>
                    </div>

                    <div class="col-md-6">
                        <label for="numero" class="form-label"><i class="fas fa-hashtag me-1"></i> Número</label>
                        <input type="text" name="numero" id="numero" class="form-control" 
                               placeholder="Buscar por número del documento" value="{{ request('numero') }}">
                    </div>
                    <div class="col-md-6">
                        <label for="año" class="form-label"><i class="fas fa-calendar me-1"></i> Año</label>
                        <input type="text"
                               class="form-control"
                               name="año"
                               id="año"
                               list="años-list"
                               placeholder="Escriba o seleccione un año"
                               value="{{ request('año') }}"
                               pattern="[0-9]{4}"
                               maxlength="4">
                        <datalist id="años-list">
                            @if(isset($años))
                                @foreach($años as $a)
                                    <option value="{{ $a }}">
                                @endforeach
                            @endif
                        </datalist>
                    </div>
                    <div class="col-md-6">
                        <label for="mes" class="form-label"><i class="fas fa-calendar-week me-1"></i> Mes</label>
                        <select class="form-select" name="mes" id="mes">
                            <option value="">Todos los meses</option>
                            @for($i = 1; $i <= 12; $i++)
                                <option value="{{ $i }}" @selected(request('mes') == $i)>
                                    {{ \Carbon\Carbon::create()->month($i)->translatedFormat('F') }}
                                </option>
                            @endfor
                        </select>
                        <small class="text-muted">Requiere seleccionar un año</small>
                    </div>
                    <div class="col-md-6">
                        <label class="form-label"><i class="fas fa-calendar-day me-1"></i> Fecha desde</label>
                        <input type="date" name="fecha_desde" class="form-control" value="{{ request('fecha_desde') }}">
                    </div>
                    <div class="col-md-6">
                        <label class="form-label"><i class="fas fa-calendar-day me-1"></i> Fecha hasta</label>
                        <input type="date" name="fecha_hasta" class="form-control" value="{{ request('fecha_hasta') }}">
                    </div>
                    <div class="col-md-6">
                        <label class="form-label"><i class="fas fa-calendar-check me-1"></i> Fecha exacta</label>
                        <input type="date" name="fecha" class="form-control" value="{{ request('fecha') }}">
                        <small class="text-muted">Solo si no usa rango de fechas</small>
                    </div>

                    <!-- NUEVA SECCIÓN: Campos opcionales de archivo -->
                    <div class="col-12">
                        <hr class="my-3">
                        <h6 class="text-success fw-bold mb-3">
                            <i class="fas fa-archive me-2"></i>Información de Archivo (Opcional)
                        </h6>
                    </div>

                    <div class="col-md-6">
                        <label for="referencia_ubicacion" class="form-label">
                            <i class="fas fa-map-marker-alt me-1"></i> Referencia y Ubicación
                        </label>
                        <input type="text" name="referencia_ubicacion" id="referencia_ubicacion" class="form-control"
                               placeholder="Ej: T1VD2.1000.32.001" value="{{ request('referencia_ubicacion') }}">
                    </div>

                    <div class="col-md-6">
                        <label for="soporte" class="form-label">
                            <i class="fas fa-file-alt me-1"></i> Soporte
                        </label>
                        <input type="text" name="soporte" id="soporte" class="form-control"
                               placeholder="Ej: Papel, Digital" value="{{ request('soporte') }}">
                    </div>

                    <div class="col-md-6">
                        <label for="volumen" class="form-label">
                            <i class="fas fa-book me-1"></i> Volumen
                        </label>
                        <input type="text" name="volumen" id="volumen" class="form-control"
                               placeholder="Ej: Tomo 2 (1931-1933)" value="{{ request('volumen') }}">
                    </div>

                    <div class="col-md-6">
                        <label for="nombre_productor" class="form-label">
                            <i class="fas fa-user-tie me-1"></i> Nombre del Productor
                        </label>
                        <select name="nombre_productor" id="nombre_productor" class="form-control">
                            <option value="">-- Selecciona --</option>
                            <option value="DESPACHO ALCALDE (1000)" {{ request('nombre_productor') == 'DESPACHO ALCALDE (1000)' ? 'selected' : '' }}>DESPACHO ALCALDE (1000)</option>
                        </select>
                    </div>

                    <div class="col-md-6">
                        <label for="informacion_valoracion" class="form-label">
                            <i class="fas fa-clipboard-check me-1"></i> Información sobre Valoración
                        </label>
                        <input type="text" name="informacion_valoracion" id="informacion_valoracion" class="form-control"
                               placeholder="Ej: Conservación Total" value="{{ request('informacion_valoracion') }}">
                    </div>

                    <div class="col-md-6">
                        <label for="lengua_documentos" class="form-label">
                            <i class="fas fa-language me-1"></i> Lengua de los Documentos
                        </label>
                        <select name="lengua_documentos" id="lengua_documentos" class="form-control">
                            <option value="">-- Selecciona --</option>
                            <option value="ESPAÑOL ISO 639-2 SPA" {{ request('lengua_documentos') == 'ESPAÑOL ISO 639-2 SPA' ? 'selected' : '' }}>ESPAÑOL ISO 639-2 SPA</option>
                        </select>
                    </div>

                    <div class="col-md-6 d-flex align-items-end">
                        <div class="w-100">
                            <button class="btn btn-outline-secondary me-2" type="button" onclick="window.location.href='{{ route('home') }}'">
                                <i class="fas fa-times me-1"></i> Limpiar filtros
                            </button>
                            <button class="btn btn-success" type="submit">
                                <i class="fas fa-filter me-1"></i> Aplicar filtros
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </form>

        @if (
    request()->filled('busqueda_general') ||
    request()->filled('category_id') ||
    request()->filled('tipo') ||
    request()->filled('document_type_id') ||
    request()->filled('document_theme_id') ||
    request()->filled('nombre') ||
    request()->filled('numero') ||
    request()->filled('año') ||
    request()->filled('mes') ||
    request()->filled('fecha') ||
    request()->filled('fecha_desde') ||
    request()->filled('fecha_hasta') ||
    request()->filled('orden') ||
    request()->filled('referencia_ubicacion') ||
    request()->filled('soporte') ||
    request()->filled('volumen') ||
    request()->filled('nombre_productor') ||
    request()->filled('informacion_valoracion') ||
    request()->filled('lengua_documentos')
)
    <div class="mt-4 pt-3 border-top">
        <h6 class="fw-bold text-success mb-2">Filtros aplicados:</h6>
        <div class="d-flex flex-wrap gap-2">
            @php
                $baseParams = request()->except([
                    '_token', 'page'
                ]);
            @endphp

            @if(request()->filled('busqueda_general'))
                <a href="{{ route('home', array_merge($baseParams, ['busqueda_general' => null])) }}"
                   class="badge text-white"
                   style="background-color: #43883D;">
                    🔍 {{ request('busqueda_general') }} &times;
                </a>
            @endif

            @if(request()->filled('category_id'))
                <a href="{{ route('home', array_merge($baseParams, ['category_id' => null])) }}"
                   class="badge text-white"
                   style="background-color: #4E7525;">
                    Categoría: {{ $categories->firstWhere('id', request('category_id'))?->nombre }} &times;
                </a>
            @endif

            @if(request()->filled('tipo'))
                <a href="{{ route('home', array_merge($baseParams, ['tipo' => null])) }}"
                   class="badge text-white"
                   style="background-color: #6A9739;">
                    Tipo: {{ ucfirst(request('tipo')) }} &times;
                </a>
            @endif

            {{-- NUEVO: Filtro de Tipo de Documento --}}
            @if(request()->filled('document_type_id'))
                @php
                    $selectedDocumentType = $documentTypes->firstWhere('id', request('document_type_id'));
                @endphp
                <a href="{{ route('home', array_merge($baseParams, ['document_type_id' => null])) }}"
                   class="badge text-white"
                   style="background-color: #5A8B3A;">
                    Tipo: {{ $selectedDocumentType ? $selectedDocumentType->nombre : 'Desconocido' }} &times;
                </a>
            @endif

            {{-- NUEVO: Filtro de Tema Específico --}}
            @if(request()->filled('document_theme_id'))
                @php
                    // Aquí necesitarías obtener el tema específico desde tu controlador
                    // Por ahora uso un placeholder, pero deberías pasar $documentThemes desde el controlador
                    $selectedTheme = isset($documentThemes) ? $documentThemes->firstWhere('id', request('document_theme_id')) : null;
                @endphp
                <a href="{{ route('home', array_merge($baseParams, ['document_theme_id' => null])) }}"
                   class="badge text-white"
                   style="background-color: #4A7C2A;">
                    Tema: {{ $selectedTheme ? $selectedTheme->nombre : 'ID: ' . request('document_theme_id') }} &times;
                </a>
            @endif

            @if(request()->filled('nombre'))
                <a href="{{ route('home', array_merge($baseParams, ['nombre' => null])) }}"
                   class="badge text-white"
                   style="background-color: #7A7A52;">
                    Nombre: {{ request('nombre') }} &times;
                </a>
            @endif

            @if(request()->filled('numero'))
                <a href="{{ route('home', array_merge($baseParams, ['numero' => null])) }}"
                   class="badge text-white"
                   style="background-color: #8B8B52;">
                    Número: {{ request('numero') }} &times;
                </a>
            @endif

            @if(request()->filled('año'))
                <a href="{{ route('home', array_merge($baseParams, ['año' => null])) }}"
                   class="badge text-white"
                   style="background-color: #B2B700;">
                    Año: {{ request('año') }} &times;
                </a>
            @endif

            @if(request()->filled('mes'))
                @php
                    $mesNumero = (int) request('mes');
                    $mesNumero = ($mesNumero >= 1 && $mesNumero <= 12) ? $mesNumero : 1;
                @endphp
                <a href="{{ route('home', array_merge($baseParams, ['mes' => null])) }}"
                class="badge text-white"
                style="background-color: #CCCC00;">
                    Mes: {{ \Carbon\Carbon::create()->month($mesNumero)->translatedFormat('F') }} &times;
                </a>
            @endif

            @if(request()->filled('fecha'))
                <a href="{{ route('home', array_merge($baseParams, ['fecha' => null])) }}"
                   class="badge text-white"
                   style="background-color: #878D47;">
                    Fecha: {{ request('fecha') }} &times;
                </a>
            @endif

            @if(request()->filled('fecha_desde'))
                <a href="{{ route('home', array_merge($baseParams, ['fecha_desde' => null])) }}"
                   class="badge text-white"
                   style="background-color: #878D47;">
                    Desde: {{ request('fecha_desde') }} &times;
                </a>
            @endif

            @if(request()->filled('fecha_hasta'))
                <a href="{{ route('home', array_merge($baseParams, ['fecha_hasta' => null])) }}"
                   class="badge text-white"
                   style="background-color: {{ request('fecha_hasta') == '1949-12-31' ? '#8B4513' : '#878D47' }};">
                    @if(request('fecha_hasta') == '1949-12-31')
                        <i class="fas fa-landmark me-1"></i> Documentos Históricos (hasta 1949)
                    @else
                        Hasta: {{ request('fecha_hasta') }}
                    @endif
                    &times;
                </a>
            @endif

            @if(request()->filled('orden'))
                <a href="{{ route('home', array_merge($baseParams, ['orden' => null])) }}"
                   class="badge text-dark bg-light border border-secondary">
                    Orden: {{
                        match(request('orden')) {
                            'fecha_desc' => 'Más reciente',
                            'fecha_asc' => 'Más antiguo',
                            'nombre_asc' => 'Nombre A-Z',
                            'numero_asc' => 'Por número',
                            'tipo_asc' => 'Por tipo',
                            'categoria_asc' => 'Por categoría',
                            default => request('orden')
                        }
                    }} &times;
                </a>
            @endif

            {{-- Filtros de campos opcionales de archivo --}}
            @if(request()->filled('referencia_ubicacion'))
                <a href="{{ route('home', array_merge($baseParams, ['referencia_ubicacion' => null])) }}"
                   class="badge text-white"
                   style="background-color: #6A9B4C;">
                    📍 Referencia: {{ Str::limit(request('referencia_ubicacion'), 30) }} &times;
                </a>
            @endif

            @if(request()->filled('soporte'))
                <a href="{{ route('home', array_merge($baseParams, ['soporte' => null])) }}"
                   class="badge text-white"
                   style="background-color: #7AAA5C;">
                    📄 Soporte: {{ request('soporte') }} &times;
                </a>
            @endif

            @if(request()->filled('volumen'))
                <a href="{{ route('home', array_merge($baseParams, ['volumen' => null])) }}"
                   class="badge text-white"
                   style="background-color: #8AB96C;">
                    📚 Volumen: {{ Str::limit(request('volumen'), 30) }} &times;
                </a>
            @endif

            @if(request()->filled('nombre_productor'))
                <a href="{{ route('home', array_merge($baseParams, ['nombre_productor' => null])) }}"
                   class="badge text-white"
                   style="background-color: #9AC87C;">
                    👤 Productor: {{ Str::limit(request('nombre_productor'), 30) }} &times;
                </a>
            @endif

            @if(request()->filled('informacion_valoracion'))
                <a href="{{ route('home', array_merge($baseParams, ['informacion_valoracion' => null])) }}"
                   class="badge text-white"
                   style="background-color: #AAD78C;">
                    ✓ Valoración: {{ request('informacion_valoracion') }} &times;
                </a>
            @endif

            @if(request()->filled('lengua_documentos'))
                <a href="{{ route('home', array_merge($baseParams, ['lengua_documentos' => null])) }}"
                   class="badge text-white"
                   style="background-color: #BAE69C;">
                    🌐 Lengua: {{ Str::limit(request('lengua_documentos'), 30) }} &times;
                </a>
            @endif
        </div>
    </div>
@endif

        <!-- Listado de documentos -->
<!-- Listado de documentos con Bootstrap puro -->
<div class="row g-3">
    @if($documents->count() > 0)
        @foreach($documents as $document)
            @php
            $extension = strtolower(pathinfo($document->archivo, PATHINFO_EXTENSION));
            $iconClass = '';
            $bgClass = '';
            $textClass = '';
            $icon = '';
    
            if ($extension == 'pdf') {
                $iconClass = 'text-danger';
                $bgClass = 'bg-danger bg-opacity-10';
                $textClass = 'text-danger';
                $icon = '<i class="fas fa-file-pdf"></i>';
            } elseif (in_array($extension, ['doc', 'docx'])) {
                $iconClass = 'text-primary';
                $bgClass = 'bg-primary bg-opacity-10';
                $textClass = 'text-primary';
                $icon = '<i class="fas fa-file-word"></i>';
            } elseif (in_array($extension, ['xls', 'xlsx'])) {
                $iconClass = 'text-success';
                $bgClass = 'bg-success bg-opacity-10';
                $textClass = 'text-success';
                $icon = '<i class="fas fa-file-excel"></i>';
            } else {
                $iconClass = 'text-secondary';
                $bgClass = 'bg-secondary bg-opacity-10';
                $textClass = 'text-secondary';
                $icon = '<i class="fas fa-file-alt"></i>';
            }
            @endphp
    
            <div class="col-12 col-md-6 col-lg-4">
                <div class="card h-100 border border-2 border-light shadow-sm" style="border-radius: 12px; transition: all 0.3s ease;" 
                     onmouseover="this.style.transform='translateY(-3px)'; this.classList.add('shadow');" 
                     onmouseout="this.style.transform='translateY(0)'; this.classList.remove('shadow');">
                    
                    <div class="card-body p-4">
                        
                        <!-- Badges superiores -->
                        <div class="d-flex flex-wrap gap-2 mb-3">

                            @if($document->category)
                                <span class="badge text-white fw-semibold px-3 py-2 rounded-pill fs-6" style="background-color: #2d6a2f; font-size: 0.85rem;">
                                    {{ Str::limit($document->documentType->nombre, 15) }}
                                </span>
                            @endif

                            @if($document->category)
                            <span class="badge text-white fw-semibold px-3 py-2 rounded-pill" style="background-color: #2d6a2f; font-size: 0.85rem;">
                                 {{ Str::limit($document->documentTheme->nombre, 15) }}
                            </span>
                            @endif

                            <span class="badge bg-secondary text-white fw-semibold px-3 py-2 rounded-pill" style="font-size: 0.85rem;">
                                {{ \Carbon\Carbon::parse($document->fecha)->format('Y') }}
                            </span>

                            {{-- Etiqueta de Documento Histórico si tiene información de archivo --}}
                            @if($document->referencia_ubicacion || $document->soporte || $document->volumen ||
                                $document->nombre_productor || $document->informacion_valoracion || $document->lengua_documentos)
                                <span class="badge text-white fw-semibold px-3 py-2 rounded-pill"
                                      style="background: linear-gradient(135deg, #8B4513 0%, #A0522D 100%); font-size: 0.85rem;"
                                      title="Este documento contiene información histórica archivística">
                                    <i class="fas fa-archive me-1"></i>Documento Histórico
                                </span>
                            @endif

                        </div>

                        <!-- Contenido principal con ícono y título -->
                        <div class="d-flex align-items-start gap-3 mb-3">
                            <div class="flex-shrink-0 {{ $bgClass }} rounded d-flex align-items-center justify-content-center" 
                                 style="width: 48px; height: 48px;">
                                <span class="{{ $iconClass }}" style="font-size: 1.5rem;">
                                    {!! $icon !!}
                                </span>
                            </div>
                            <div class="flex-grow-1 min-w-0">
                                <h5 class="card-title mb-2 fw-bold text-dark lh-sm" style="font-size: 1.1rem;">
                                    <a href="{{ route('document.show', $document->id) }}" 
                                       class="text-decoration-none text-dark stretched-link"
                                       onmouseover="this.classList.add('text-success');" 
                                       onmouseout="this.classList.remove('text-success');">
                                        {{ ucfirst($document->tipo) }}: No {{ $document->numero }} de {{ $document->nombre }}
                                    </a>
                                </h5>
                                <p class="card-text text-muted mb-0 small">
                                    {{ Str::limit($document->descripcion, 30) }}
                                </p>
                            </div>
                        </div>

                        <!-- Información de fecha -->
                       <div class="d-flex flex-wrap gap-3 mb-3 small text-muted">
                            <div class="d-flex align-items-center gap-1">
                                <i class="fas fa-calendar" style="color: #2D6A2F;"></i>
                                <span>{{ \Carbon\Carbon::parse($document->fecha)->format('d \d\e F \d\e\l Y') }}</span>
                            </div>
                            {{-- <div class="d-flex align-items-center gap-1">
                                <i class="fas fa-clock" style="color: #2D6A2F;"></i>
                                <span>{{ $document->created_at->diffForHumans() }}</span>
                            </div> --}}
                        </div>

                        <!-- Botón Ver / Descargar -->
                        <div class="d-grid">
                            <a href="{{ asset('storage/' . $document->archivo) }}" 
                               target="_blank" 
                               rel="noopener noreferrer" 
                               class="btn text-white fw-bold py-2 rounded-2"
                               style="background-color: #2d6a2f; transition: background-color 0.3s ease;"
                               onmouseover="this.style.backgroundColor='#1f4e21';" 
                               onmouseout="this.style.backgroundColor='#2d6a2f';">
                                Ver / Descargar
                            </a>
                        </div>

                    </div>
                </div>
            </div>
        @endforeach
    @else
        <!-- Estado vacío -->
        <div class="col-12">
            <div class="card border border-2 border-light shadow-sm bg-light" style="border-radius: 12px;">
                <div class="card-body text-center py-5">
                    <div class="mb-4">
                        <i class="fas fa-gavel text-muted opacity-25" style="font-size: 4rem;"></i>
                    </div>
                    <h4 class="text-success fw-bold mb-3">No hay documentos disponibles</h4>
                    <p class="text-muted mb-4">
                        @if(request()->hasAny(['busqueda_general', 'category_id', 'tipo', 'nombre', 'numero', 'año', 'mes', 'fecha', 'fecha_desde', 'fecha_hasta']))
                            No se encontraron documentos que coincidan con los filtros aplicados.
                        @else
                            Utilice los filtros de búsqueda para encontrar documentos específicos.
                        @endif
                    </p>
                    @if(request()->hasAny(['busqueda_general', 'category_id', 'tipo', 'nombre', 'numero', 'año', 'mes', 'fecha', 'fecha_desde', 'fecha_hasta']))
                        <a href="{{ route('home') }}" class="btn btn-outline-success">
                            <i class="fas fa-refresh me-2"></i>
                            Limpiar Filtros
                        </a>
                    @endif
                </div>
            </div>
        </div>
    @endif


</div>

<!-- Botón para Actos Administrativos antes de 2023 -->
<div class="text-center mt-4 mb-4">
    <a href="https://www.bucaramanga.gov.co/transparencia-bucaramanga/sistema-de-busquedas-de-normas-propio-de-la-entidad/" class="btn btn-success btn-lg px-4 py-3 rounded-3 shadow-sm fw-bold">
        <i class="fas fa-archive me-2"></i>
        Actos administrativos antes de 2023
    </a>
    <p class="small text-muted mt-2 mb-0">
        Consulta documentos históricos anteriores al año 2023
    </p>
</div>


        <!-- SECCIÓN DE PAGINACIÓN MEJORADA -->
        @if($documents->hasPages())
            <div class="pagination-container">
                <!-- Enlaces de paginación -->
                <div class="d-flex justify-content-center">
                    {{ $documents->appends(request()->query())->links('pagination::bootstrap-4') }}
                </div>
            </div>
        @endif
        
</div>
    {{-- FIN SECCIÓN PRINCIPAL --}}

    {{-- FOOTER --}}
    @include('partials.public-footer')

</body>
</html>