<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Conceptos Jurídicos</title>
    <link rel="stylesheet" href="{{ asset('css/cabecera.css') }}">   
    <link rel="stylesheet" href="{{ asset('css/accesbilidad.css') }}"> 
    <link rel="stylesheet" href="{{ asset('js/accesibilidad.js') }}"> 
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
    <link rel="stylesheet" href="{{ asset('css/styleConcepts.css') }}">
    <link href="https://fonts.googleapis.com/css2?family=Ubuntu:wght@400;600&display=swap" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Ubuntu:wght@300;400;500;700&family=Oswald:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="icon" type="image/png" href="{{ asset('favicon.png') }}">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="{{ asset('js/Concepts.js') }}"></script>
    <script src="{{ asset('js/conceptosfunciones.js') }}"></script>
    <!-- Agregamos Font Awesome 5 para los íconos -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

</head>
<body>
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



    {{-- Fin Barrra de accesibiliad-- }}


    {{-- SECCIÓN PRINCIPAL: Relatoría de Conceptos --}}
    <div class="container my-5" style="background-color: white; padding: 30px; border-radius: 10px; box-shadow: 0 4px 12px rgba(0,0,0,0.05);">
       <h6><span style="color: #808080;"><a href="https://www.bucaramanga.gov.co/" title="Inicio" style="color: #808080;">Inicio</a> » <a href="https://www.bucaramanga.gov.co/transparencia/" title="Transparencia" style="color: #808080;">Transparencia</a> » <a href="https://www.bucaramanga.gov.co/transparencia-bucaramanga/sistema-de-busquedas-de-normas-propio-de-la-entidad/" title="Sistema de Normas Propios de la Entidad" style="color: #808080;">Sistema de Normas Propios de la Entidad</a></span></h6>
        <div class="text-center mb-5">
            <h1 class="fw-bold" style="color: #43883d; font-family: 'Ubuntu', sans-serif;">
                Sistema De Normas Propios de la Entidad
                <small class="d-block fs-5 mt-2 text-muted">Relatoría de Conceptos</small>
            </h1>
        </div>

        <!-- Botones de navegación en formato de tarjetas -->
        <div class="row row-cols-1 row-cols-md-2 row-cols-lg-4 g-4 mb-5">
            <!-- Botón 1: Conoce el sistema de búsqueda -->
            <div class="col">
                <div class="card h-100 border-0 cursor-pointer" onclick="window.location.href='{{ route('home') }}'"  style="background-color: #43883d; color: white; border-radius: 10px; overflow: hidden; transition: all 0.3s ease; cursor: pointer;">
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
                <div class="card h-100 border-0 cursor-pointer"  style="background-color: #43883d; color: white; border-radius: 10px; overflow: hidden; transition: all 0.3s ease; cursor: pointer;">
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
                <div class="card h-100 border-0 cursor-pointer" onclick="window.location.href='{{ route('home') }}'"  style="background-color: #43883d; color: white; border-radius: 10px; overflow: hidden; transition: all 0.3s ease; cursor: pointer;">
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

        <!-- FORMULARIO -->
        @php
            $selectedType = request('concept_type_id');
            $selectedOrder = request('orden', 'fecha_desc');
        @endphp

        <!-- CHIPS DE TIPOS DE CONCEPTO -->
        <div class="mb-4">
            @foreach($conceptTypes as $tipo)
                <form method="GET" action="{{ route('concepts.public') }}" class="d-inline">
                    <input type="hidden" name="concept_type_id" value="{{ $tipo->id }}">
                    <button type="submit" class="chip {{ $selectedType == $tipo->id ? 'active' : '' }}">
                        {{ $tipo->nombre }}
                    </button>
                </form>
            @endforeach
        </div>

        <!-- BUSCADOR GENERAL -->
        <form method="GET" action="{{ route('concepts.public') }}">
            <div class="input-group mb-3">
                <span class="input-group-text bg-light text-secondary"><i class="fas fa-search"></i></span>
                <input type="search" name="busqueda_general" class="form-control"
                       placeholder="Buscar por título, contenido, año..." value="{{ request('busqueda_general') }}">
                <button class="btn btn-success" type="submit">Buscar</button>
            </div>

            <!-- ORDEN Y TOGGLE AVANZADO -->
            <div class="d-flex justify-content-between align-items-center mb-3">
                <div class="d-flex align-items-center gap-2">
                    <i class="fas fa-sort text-muted"></i>
                    <label class="fw-bold text-muted mb-0">Ordenar:</label>
                    @foreach([
                        'fecha_desc' => 'Recientes',
                        'titulo_asc' => 'A-Z',
                        'fecha_asc' => 'Antiguos',
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
                        <label for="concept_type_id" class="form-label"><i class="fas fa-folder-open me-1"></i> Tipo de Concepto</label>
                        <select class="form-select" name="concept_type_id" id="concept_type_id">
                            <option value="">Todos</option>
                            @foreach($conceptTypes as $tipo)
                                <option value="{{ $tipo->id }}" @selected(request('concept_type_id') == $tipo->id)>
                                    {{ $tipo->nombre }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="col-md-6">
                        <label for="concept_theme_id" class="form-label"><i class="fas fa-tags me-1"></i> Tema específico</label>
                        <select class="form-select" name="concept_theme_id" id="concept_theme_id" onchange="asignarTipoDesdeTema()">
                            <option value="">Todos</option>
                            @foreach($conceptThemes as $tema)
                                <option value="{{ $tema->id }}" data-type-id="{{ $tema->concept_type_id }}"
                                    @selected(request('concept_theme_id') == $tema->id)>
                                    {{ $tema->nombre }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    {{-- @if(isset($dependencias) && count($dependencias) > 0)
                    <div class="col-md-6">
                        <label for="dependencia" class="form-label"><i class="fas fa-building me-1"></i> Dependencia</label>
                        <select class="form-select" name="dependencia" id="dependencia">
                            <option value="">Todas</option>
                            @foreach($dependencias as $dep)
                                <option value="{{ $dep }}" @selected(request('dependencia') == $dep)>
                                    {{ $dep }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    @endif --}}
                    <div class="col-md-6">
                        <label for="año" class="form-label"><i class="fas fa-calendar me-1"></i> Año</label>
                        <select class="form-select" name="año">
                            <option value="">Todos</option>
                            @foreach($años as $a)
                                <option value="{{ $a }}" @selected(request('año') == $a)>{{ $a }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-6">
                        <label class="form-label"><i class="fas fa-calendar-day me-1"></i> Fecha desde</label>
                        <input type="date" name="fecha_desde" class="form-control" value="{{ request('fecha_desde') }}">
                    </div>
                    <div class="col-md-6">
                        <label class="form-label"><i class="fas fa-calendar-day me-1"></i> Fecha hasta</label>
                        <input type="date" name="fecha_hasta" class="form-control" value="{{ request('fecha_hasta') }}">
                    </div>
                    <div class="col-md-6 d-flex align-items-end justify-content-end">
                        <button class="btn btn-outline-secondary me-2" type="reset" onclick="window.location.href='{{ route('concepts.public') }}'">
                            <i class="fas fa-times me-1"></i> Limpiar
                        </button>
                        <button class="btn btn-success" type="submit">
                            <i class="fas fa-filter me-1"></i> Aplicar filtros
                        </button>
                    </div>
                </div>
            </div>
        </form>

        @if (
            request()->filled('busqueda_general') ||
            request()->filled('concept_type_id') ||
            request()->filled('concept_theme_id') ||
            request()->filled('dependencia') ||
            request()->filled('año') ||
            request()->filled('mes') ||
            request()->filled('fecha_desde') ||
            request()->filled('fecha_hasta') ||
            request()->filled('orden')
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
                        <a href="{{ route('concepts.public', array_merge($baseParams, ['busqueda_general' => null])) }}"
                           class="badge text-white"
                           style="background-color: #43883D;">
                            🔍 {{ request('busqueda_general') }} &times;
                        </a>
                    @endif



                    @if(request()->filled('concept_theme_id'))
                        <a href="{{ route('concepts.public', array_merge($baseParams, ['concept_theme_id' => null])) }}"
                           class="badge text-white"
                           style="background-color: #6A9739;">
                            Tema: {{ $conceptThemes->firstWhere('id', request('concept_theme_id'))?->nombre }} &times;
                        </a>
                    @endif

                    @if(request()->filled('concept_type_id'))
                        <a href="{{ route('concepts.public', array_merge($baseParams, ['concept_type_id' => null, 'concept_theme_id' => null])) }}"
                           class="badge text-white"
                           style="background-color: #4E7525;">
                            Tipo: {{ $conceptTypes->firstWhere('id', request('concept_type_id'))?->nombre }} &times;
                        </a>
                    @endif

                    @if(request()->filled('dependencia'))
                        <a href="{{ route('concepts.public', array_merge($baseParams, ['dependencia' => null])) }}"
                           class="badge text-white"
                           style="background-color: #7A7A52;">
                            Dependencia: {{ request('dependencia') }} &times;
                        </a>
                    @endif

                    @if(request()->filled('año'))
                        <a href="{{ route('concepts.public', array_merge($baseParams, ['año' => null])) }}"
                           class="badge text-white"
                           style="background-color: #B2B700;">
                            Año: {{ request('año') }} &times;
                        </a>
                    @endif

                    @if(request()->filled('mes'))
                        <a href="{{ route('concepts.public', array_merge($baseParams, ['mes' => null])) }}"
                           class="badge text-white"
                           style="background-color: #CCCC00;">
                            Mes: {{ \Carbon\Carbon::create()->month(request('mes'))->translatedFormat('F') }} &times;
                        </a>
                    @endif

                    @if(request()->filled('fecha_desde'))
                        <a href="{{ route('concepts.public', array_merge($baseParams, ['fecha_desde' => null])) }}"
                           class="badge text-white"
                           style="background-color: #878D47;">
                            Desde: {{ request('fecha_desde') }} &times;
                        </a>
                    @endif

                    @if(request()->filled('fecha_hasta'))
                        <a href="{{ route('concepts.public', array_merge($baseParams, ['fecha_hasta' => null])) }}"
                           class="badge text-white"
                           style="background-color: #878D47;">
                            Hasta: {{ request('fecha_hasta') }} &times;
                        </a>
                    @endif

                    @if(request()->filled('orden'))
                        <a href="{{ route('concepts.public', array_merge($baseParams, ['orden' => null])) }}"
                           class="badge text-dark bg-light border border-secondary">
                            Orden: {{
                                match(request('orden')) {
                                    'fecha_desc' => 'Más reciente',
                                    'fecha_asc' => 'Más antiguo',
                                    'titulo_asc' => 'Título A-Z',
                                    'titulo_desc' => 'Título Z-A',
                                    default => request('orden')
                                }
                            }} &times;
                        </a>
                    @endif
                </div>
            </div>
        @endif

        <!-- Listado de conceptos -->
<div class="row g-3">
    @if($concepts->count() > 0)
        @foreach($concepts as $concept)
            @php
            $extension = strtolower(pathinfo($concept->archivo, PATHINFO_EXTENSION));
            $iconClass = '';
            $bgClass = '';
            $icon = '';
    
            if ($extension == 'pdf') {
                $iconClass = 'text-danger';
                $bgClass = 'bg-danger bg-opacity-10';
                $icon = '<i class="fas fa-file-pdf fa-2x"></i>';
            } elseif (in_array($extension, ['doc', 'docx'])) {
                $iconClass = 'text-primary';
                $bgClass = 'bg-primary bg-opacity-10';
                $icon = '<i class="fas fa-file-word fa-2x"></i>';
            } elseif (in_array($extension, ['xls', 'xlsx'])) {
                $iconClass = 'text-success';
                $bgClass = 'bg-success bg-opacity-10';
                $icon = '<i class="fas fa-file-excel fa-2x"></i>';
            } else {
                $iconClass = 'text-secondary';
                $bgClass = 'bg-secondary bg-opacity-10';
                $icon = '<i class="fas fa-file-alt fa-2x"></i>';
            }
            @endphp
    
            <div class="col-12 col-md-6 col-lg-4">
                <div class="card border rounded shadow-sm h-100 bg-white">
                    <div class="card-body p-4">
                        
                        <!-- Badges en la parte superior -->
                        <div class="mb-3">
                            <span class="badge bg-success text-white me-2">Concepto</span>
                            <span class="badge bg-secondary text-white me-2">{{ $concept->año }}</span>
                            
                            @if($concept->conceptTheme)
                                <span class="badge bg-primary text-white">
                                    {{ Str::limit($concept->conceptTheme->nombre, 20) }}
                                </span>
                            @elseif($concept->dependencia)
                                <span class="badge bg-primary text-white">
                                    {{ Str::limit($concept->dependencia, 20) }}
                                </span>
                            @endif
                        </div>

                        <!-- Ícono + Título en línea horizontal -->
                        <div class="d-flex align-items-center mb-3">
                            <div class="me-3 {{ $iconClass }} {{ $bgClass }} p-2 rounded d-flex align-items-center justify-content-center" 
                                 style="width: 60px; height: 60px; min-width: 60px;">
                                {!! $icon !!}
                            </div>
                            <div class="flex-grow-1">
                                <h5 class="mb-1 fw-bold text-dark">
                                    <a href="{{ route('concepts.show.public', $concept->id) }}" 
                                       class="text-decoration-none text-dark">
                                        Concepto No {{ $concept->titulo }} del {{ $concept->año }}
                                    </a>
                                </h5>
                                <p class="text-muted mb-0 small">
                                    {{ Str::limit($concept->contenido, 30) }}
                                </p>
                            </div>
                        </div>

                        <!-- Información de fecha -->
                        <div class="d-flex justify-content-between align-items-center text-muted small mb-3">
                            <span class="d-flex align-items-center">
                                <i class="fas fa-calendar me-2 text-primary"></i>
                                {{ \Carbon\Carbon::parse($concept->fecha)->format('d \d\e F \d\e\l Y') }}
                            </span>
                            <span class="d-flex align-items-center">
                                <i class="fas fa-clock me-2 text-secondary"></i>
                                {{ $concept->created_at->diffForHumans() }}
                            </span>
                        </div>

                        <!-- Botón Ver idéntico a la imagen -->
                        <div class="d-grid">
                            <a href="{{ route('concepts.show.public', $concept->id) }}" 
                               class="btn btn-success fw-bold">
                                Ver
                            </a>
                        </div>

                    </div>
                </div>
            </div>
        @endforeach
    @else
        <!-- Estado vacío -->
        <div class="col-12">
            <div class="card border rounded shadow-sm bg-light">
                <div class="card-body text-center py-5">
                    <div class="mb-4">
                        <i class="fas fa-search text-muted" style="font-size: 4rem; opacity: 0.3;"></i>
                    </div>
                    <h4 class="text-success fw-bold mb-3">No hay conceptos disponibles</h4>
                    <p class="text-muted mb-4">
                        @if(request()->hasAny(['busqueda_general', 'concept_type_id', 'concept_theme_id', 'dependencia', 'año', 'fecha_desde', 'fecha_hasta']))
                            No se encontraron conceptos que coincidan con los filtros aplicados.
                        @else
                            Utilice los filtros de búsqueda para encontrar conceptos específicos.
                        @endif
                    </p>
                    @if(request()->hasAny(['busqueda_general', 'concept_type_id', 'concept_theme_id', 'dependencia', 'año', 'fecha_desde', 'fecha_hasta']))
                        <a href="{{ route('concepts.public') }}" class="btn btn-outline-success">
                            <i class="fas fa-refresh me-2"></i>
                            Limpiar Filtros
                        </a>
                    @endif
                </div>
            </div>
        </div>
    @endif
</div>

        <!-- SECCIÓN DE PAGINACIÓN MEJORADA -->
        @if($concepts->hasPages())
            <div class="pagination-container">
                <!-- Enlaces de paginación -->
                <div class="d-flex justify-content-center">
                    {{ $concepts->appends(request()->query())->links('pagination::bootstrap-4') }}
                </div>
            </div>
        @endif
        
    </div>

    {{-- FIN SECCIÓN PRINCIPAL --}}

    {{-- FOOTER --}}




<!-- FOOTER -->
<span id="final"></span>
<footer class="bg-bucaramanga text-white ubuntu-font">
    <div class="container py-5">
        <div class="row g-4">
            
            <!-- Logo Institucional -->
            <div class="col-lg-3 col-md-6">
                <div class="bg-white text-center p-4 rounded-3 shadow-sm mb-3">
                    <!-- Escudo oficial de Bucaramanga -->
                    <img src="https://www.bucaramanga.gov.co/wp-content/uploads/2025/05/Screenshot_7.png" 
                         alt="Escudo Alcaldía de Bucaramanga" 
                         class="mb-3" 
                         style="height: 80px; width: auto;">
                    <h6 class="text-bucaramanga fw-bold mb-0 ubuntu-font">
                        ALCALDÍA DE<br>BUCARAMANGA
                    </h6>
                </div>
            </div>

            <!-- Información de Ubicación -->
            <div class="col-lg-3 col-md-6">
                <div class="mb-4">
                    <h5 class="oswald-font fw-semibold mb-3 d-flex align-items-center">
                        <span class="bg-white bg-opacity-25 rounded-circle p-2 me-2 d-inline-flex align-items-center justify-content-center" style="width: 40px; height: 40px;">
                            <i class="fas fa-map-marker-alt"></i>
                        </span>
                        Ubicación
                    </h5>
                    <div class="mb-3 small">
                        <strong class="d-block">Dirección Fase I:</strong>
                        Calle 35 # 10-43, Bucaramanga, Santander, Colombia
                    </div>
                    <div class="mb-3 small">
                        <strong class="d-block">Dirección Fase II:</strong>
                        Carrera 11 # 34-52, Bucaramanga, Santander, Colombia
                    </div>
                    <div class="small">
                        <strong>Código Postal:</strong> 680006<br>
                        <strong>Código Dane:</strong> 68001
                    </div>
                </div>
            </div>

            <!-- Horarios y Contacto -->
            <div class="col-lg-3 col-md-6">
                <div class="mb-4">
                    <h5 class="oswald-font fw-semibold mb-3 d-flex align-items-center">
                        <span class="bg-white bg-opacity-25 rounded-circle p-2 me-2 d-inline-flex align-items-center justify-content-center" style="width: 40px; height: 40px;">
                            <i class="fas fa-clock"></i>
                        </span>
                        Horarios
                    </h5>
                    <div class="mb-3 small">
                        <strong class="d-block">Horario de Atención:</strong>
                        Lunes a jueves: 7:30 a.m. a 12:00 m. y de 1:00 p.m. a 5:00 p.m.<br>
                        Viernes: Jornada continua de 7:00 a.m. a 4:00 p.m.<br>
                        <small class="text-white-50">(30 minutos de descanso al medio día)</small>
                    </div>
                    <div class="mb-2 small">
                        <strong>Teléfono:</strong> +57 (607) 633 70 00
                    </div>
                    <div class="small">
                        <strong>Línea gratuita:</strong> +57 (607) 652 55 55
                    </div>
                </div>
            </div>

            <!-- Comunicación -->
            <div class="col-lg-3 col-md-6">
                <div class="mb-4">
                    <h5 class="oswald-font fw-semibold mb-3 d-flex align-items-center">
                        <span class="bg-white bg-opacity-25 rounded-circle p-2 me-2 d-inline-flex align-items-center justify-content-center" style="width: 40px; height: 40px;">
                            <i class="fas fa-envelope"></i>
                        </span>
                        Comunicación
                    </h5>
                    <div class="mb-3 small">
                        <strong class="d-block">Correo institucional:</strong>
                        <a href="mailto:contactenos@bucaramanga.gov.co" class="text-white text-decoration-none">
                            contactenos@bucaramanga.gov.co
                        </a>
                    </div>
                    <div class="mb-3 small">
                        <strong class="d-block">Notificaciones judiciales:</strong>
                        <a href="mailto:notificaciones@bucaramanga.gov.co" class="text-white text-decoration-none">
                            notificaciones@bucaramanga.gov.co
                        </a>
                    </div>
                    <div class="mb-2 small">
                        <strong class="d-block">Canal de denuncia:</strong>
                        <a href="https://canaldenuncia.bucaramanga.gov.co/" class="text-white text-decoration-none" target="_blank">
                            canaldenuncia.bucaramanga.gov.co
                        </a>
                    </div>
                    <div class="small">
                        <strong class="d-block">Emergencias:</strong>
                        <a href="https://emergencia.bucaramanga.gov.co/" class="text-white text-decoration-none" target="_blank">
                            emergencia.bucaramanga.gov.co
                        </a>
                    </div>
                </div>
            </div>
        </div>

        <!-- Separador -->
        <hr class="border-white border-opacity-25 my-4">

        <!-- Redes Sociales -->
        <div class="row justify-content-center">
            <div class="col-12 mb-4">
                <h5 class="oswald-font fw-semibold mb-3 d-flex align-items-center">
                    <span class="bg-white bg-opacity-25 rounded-circle p-2 me-2 d-inline-flex align-items-center justify-content-center" style="width: 40px; height: 40px;">
                        <i class="fas fa-share-alt"></i>
                    </span>
                    Síguenos en Redes Sociales
                </h5>
                <div class="row g-2">
                    <div class="col-xl-2 col-lg-3 col-md-4 col-sm-6">
                        <a href="https://www.facebook.com/alcaldiadebucaramanga/" class="btn btn-outline-light btn-sm w-100 d-flex align-items-center justify-content-start text-start" target="_blank">
                            <i class="fab fa-facebook-f me-2"></i>
                            <span class="small">Alcaldia de Bucaramanga</span>
                        </a>
                    </div>
                    <div class="col-xl-2 col-lg-3 col-md-4 col-sm-6">
                        <a href="https://x.com/AlcaldiaBGA" class="btn btn-outline-light btn-sm w-100 d-flex align-items-center justify-content-start text-start" target="_blank">
                            <i class="fab fa-twitter me-2"></i>
                            <span class="small">@AlcaldiaBGA</span>
                        </a>
                    </div>
                    <div class="col-xl-2 col-lg-3 col-md-4 col-sm-6">
                        <a href="https://www.instagram.com/alcaldiadebucaramanga/?hl=es" class="btn btn-outline-light btn-sm w-100 d-flex align-items-center justify-content-start text-start" target="_blank">
                            <i class="fab fa-instagram me-2"></i>
                            <span class="small">@alcaldiadebucaramanga</span>
                        </a>
                    </div>
                    <div class="col-xl-2 col-lg-3 col-md-4 col-sm-6">
                        <a href="https://www.youtube.com/user/PrensaBucaramanga" class="btn btn-outline-light btn-sm w-100 d-flex align-items-center justify-content-start text-start" target="_blank">
                            <i class="fab fa-youtube me-2"></i>
                            <span class="small">Alcaldia de Bucaramanga</span>
                        </a>
                    </div>
                </div>
            </div>
        </div>

        <!-- Separador -->
        <hr class="border-white border-opacity-25 my-4">

        <!-- Enlaces Institucionales -->
        <div class="row">
            <div class="col-12">
                <h5 class="oswald-font fw-semibold mb-3 d-flex align-items-center">
                    <span class="bg-white bg-opacity-25 rounded-circle p-2 me-2 d-inline-flex align-items-center justify-content-center" style="width: 40px; height: 40px;">
                        <i class="fas fa-link"></i>
                    </span>
                    Enlaces de Interés
                </h5>
                <div class="row g-2">
                    <div class="col-lg-3 col-md-4 col-sm-6">
                        <a href="https://www.bucaramanga.gov.co/autorizacion-de-tratamiento-de-datos-personales/" class="btn btn-link text-white text-decoration-none p-2 text-start w-100 small border-start border-2 border-transparent">
                            <i class="fas fa-chevron-right me-2 small"></i>
                            Autorización de Tratamiento de Datos Personales
                        </a>
                    </div>
                    <div class="col-lg-3 col-md-4 col-sm-6">
                        <a href="https://www.bucaramanga.gov.co/wp-content/uploads/2023/12/Resolucion-350-2023-politica-de-datos-personales-1.pdf" class="btn btn-link text-white text-decoration-none p-2 text-start w-100 small border-start border-2 border-transparent">
                            <i class="fas fa-chevron-right me-2 small"></i>
                            Política de Tratamiento de Datos Personales
                        </a>
                    </div>
                    <div class="col-lg-3 col-md-4 col-sm-6">
                        <a href="https://www.bucaramanga.gov.co/condiciones-de-uso/" class="btn btn-link text-white text-decoration-none p-2 text-start w-100 small border-start border-2 border-transparent">
                            <i class="fas fa-chevron-right me-2 small"></i>
                            Política web y condiciones de uso
                        </a>
                    </div>
                    <div class="col-lg-3 col-md-4 col-sm-6">
                        <a href="https://www.bucaramanga.gov.co/wp-content/uploads/2021/08/Politica_Editorial_Actualizada_2014.pdf" class="btn btn-link text-white text-decoration-none p-2 text-start w-100 small border-start border-2 border-transparent">
                            <i class="fas fa-chevron-right me-2 small"></i>
                            Política editorial
                        </a>
                    </div>
                    <div class="col-lg-3 col-md-4 col-sm-6">
                        <a href="https://www.bucaramanga.gov.co/wp-content/uploads/2021/08/Plan_de_Uso_Redes_Sociales.pdf" class="btn btn-link text-white text-decoration-none p-2 text-start w-100 small border-start border-2 border-transparent">
                            <i class="fas fa-chevron-right me-2 small"></i>
                            Plan uso de redes sociales
                        </a>
                    </div>
                    <div class="col-lg-3 col-md-4 col-sm-6">
                        <a href="https://www.bucaramanga.gov.co/wp-content/uploads/2024/04/PLAN-DE-COMUNICACIONES-2024-2027.pdf" class="btn btn-link text-white text-decoration-none p-2 text-start w-100 small border-start border-2 border-transparent">
                            <i class="fas fa-chevron-right me-2 small"></i>
                            Plan de comunicaciones
                        </a>
                    </div>
                    <div class="col-lg-3 col-md-4 col-sm-6">
                        <a href="https://www.bucaramanga.gov.co/wp-content/uploads/2023/07/RESOLUCION-0139-ADOPTA-Y-ACTUALIZA-POLITICA-INSTITUCIONAL.pdf" class="btn btn-link text-white text-decoration-none p-2 text-start w-100 small border-start border-2 border-transparent">
                            <i class="fas fa-chevron-right me-2 small"></i>
                            Política de Seguridad de la Información
                        </a>
                    </div>
                    <div class="col-lg-3 col-md-4 col-sm-6">
                        <a href="https://www.bucaramanga.gov.co/politicas-de-privacidad/" class="btn btn-link text-white text-decoration-none p-2 text-start w-100 small border-start border-2 border-transparent">
                            <i class="fas fa-chevron-right me-2 small"></i>
                            Uso y monitoreo página web
                        </a>
                    </div>
                    <div class="col-lg-3 col-md-4 col-sm-6">
                        <a href="https://www.bucaramanga.gov.co/mapa-del-sitio/" class="btn btn-link text-white text-decoration-none p-2 text-start w-100 small border-start border-2 border-transparent">
                            <i class="fas fa-chevron-right me-2 small"></i>
                            Mapa del sitio
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Footer Gobierno Nacional -->
    <div class="navbar navbar-expand-lg barra-superior-govco py-3 mt-4">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-md-6">
                    <div class="d-flex align-items-center">
                        <!-- Logo gov.co oficial -->
                        <img src="https://www.bucaramanga.gov.co/wp-content/uploads/2021/03/logo_gov_co-e1611810279980.png" 
                             alt="Logo Gov.co" 
                             class="me-3" 
                             style="height: 40px; width: auto;">
                        <div>
                           
                        </div>
                    </div>
                </div>
                <div class="col-md-6 text-md-end text-center mt-3 mt-md-0">

                </div>
            </div>
        </div>
    </div>
</footer>


</body>
</html>