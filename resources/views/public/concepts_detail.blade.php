<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Conceptos Jurídicos | {{ $concept->titulo }}</title>
     <link rel="stylesheet" href="{{ asset('css/cabecera.css') }}">   
    <link rel="stylesheet" href="{{ asset('css/conceptsDetails.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Ubuntu:wght@400;600&display=swap" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Ubuntu:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <style>
                /* Solo las fuentes y colores básicos necesarios */
        .ubuntu-font { font-family: 'Ubuntu', sans-serif !important; }
        .oswald-font { font-family: 'Oswald', sans-serif !important; }
        .bg-bucaramanga { background-color: #43883D !important; }
        .text-bucaramanga { color: #43883D !important; }
    </style>
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
    <br>
    {{-- Fin Header --}}

<div class="concept-container">
    <!-- Botón de regreso -->
    <a href="{{ route('concepts.public') }}" class="back-btn">
        <i class="fas fa-arrow-left me-2"></i>
        Volver a Conceptos
    </a>

    <!-- Header del concepto -->
    <div class="header-title">
        <h1>Concepto No {{ $concept->titulo }} del {{ $concept->año }}</h1>
        <p class="header-subtitle mb-0">{{ $concept->tipo_documento }} - {{ $concept->conceptType->nombre }}</p>
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
                    @if(pathinfo($concept->archivo, PATHINFO_EXTENSION) == 'pdf')
                        <iframe src="{{ asset('storage/' . $concept->archivo) }}" 
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

            <!-- Contenido del concepto -->
            @if($concept->contenido)
            <div class="content-card">
                <h5 class="text-success fw-bold mb-3">
                    <i class="fas fa-align-left me-2"></i>
                    Contenido del Concepto
                </h5>
                <div class="content-text text-break text-wrap overflow-auto" style="word-wrap: break-word; word-break: break-word;">
                    {!! nl2br(e($concept->contenido)) !!}
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
                    <a href="{{ asset('storage/' . $concept->archivo) }}" 
                       target="_blank" 
                       class="btn-action">
                        <i class="fas fa-external-link-alt me-2"></i>
                        Abrir en Nueva Pestaña
                    </a>
                    
                    <a href="{{ asset('storage/' . $concept->archivo) }}" 
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
                        <div class="metadata-value">{{ $concept->tipo_documento }}</div>
                    </div>

                    <div class="metadata-item">
                        <div class="metadata-label">
                            <i class="fas fa-calendar-year me-2"></i>
                            Año
                        </div>
                        <div class="metadata-value">{{ $concept->año }}</div>
                    </div>

                    <div class="metadata-item">
                        <div class="metadata-label">
                            <i class="fas fa-hashtag me-2"></i>
                            Número
                        </div>
                        <div class="metadata-value">{{ $concept->titulo }}</div>
                    </div>

                    <div class="metadata-item">
                        <div class="metadata-label">
                            <i class="fas fa-calendar-alt me-2"></i>
                            Fecha de Expedición
                        </div>
                        <div class="metadata-value">{{ \Carbon\Carbon::parse($concept->fecha)->translatedFormat('d \d\e F \d\e\l Y') }}</div>
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
                    <div class="metadata-item">
                        <div class="metadata-label">
                            <i class="fas fa-folder me-2"></i>
                            Tipo de Concepto
                        </div>
                        <div class="metadata-value">{{ $concept->conceptType->nombre }}</div>
                    </div>

                    @if($concept->conceptTheme)
                    <div class="metadata-item">
                        <div class="metadata-label">
                            <i class="fas fa-bookmark me-2"></i>
                            Tema Específico
                        </div>
                        <div class="metadata-value">{{ $concept->conceptTheme->nombre }}</div>
                    </div>
                    @endif

                    @if($concept->dependencia)
                    <div class="metadata-item">
                        <div class="metadata-label">
                            <i class="fas fa-building me-2"></i>
                            Dependencia la Cual Solicita 
                        </div>
                        <div class="metadata-value">{{ $concept->dependencia }}</div>
                    </div>
                    @endif
                </div>
            </div>

            <!-- Tarjeta de Fechas -->
            <div class="info-card">
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
                        <div class="metadata-value">{{ $concept->created_at->translatedFormat('d \d\e F \d\e\l Y') }}</div>
                    </div>

                    <div class="metadata-item">
                        <div class="metadata-label">
                            <i class="fas fa-edit me-2"></i>
                            Última Modificación
                        </div>
                        <div class="metadata-value">{{ $concept->updated_at->translatedFormat('d \d\e F \d\e\l Y') }}</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


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

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>