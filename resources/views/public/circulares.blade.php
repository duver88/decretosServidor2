<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Relatoria De Circulares</title>
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
    <!-- Tarjeta 1 -->
    <div class="col-sm-6 col-md-4">
        <div class="card h-100 border border-2 border-light shadow-sm" style="border-radius: 12px; transition: all 0.3s ease;"
             onmouseover="this.style.transform='translateY(-3px)'; this.classList.add('shadow');"
             onmouseout="this.style.transform='translateY(0)'; this.classList.remove('shadow');">

            <div class="card-body p-4">

                <div class="d-flex align-items-start gap-3 mb-3">
                    <div class="flex-shrink-0 bg-danger bg-opacity-10 rounded d-flex align-items-center justify-content-center" style="width: 48px; height: 48px;">
                        <span class="text-danger" style="font-size: 1.5rem;"><i class="fas fa-file-pdf"></i></span>
                    </div>
                    <div class="flex-grow-1 min-w-0">
                        <h5 class="card-title mb-2 fw-bold text-dark lh-sm" style="font-size: 1.1rem;">
                            <a href="https://www.bucaramanga.gov.co/wp-content/uploads/2025/07/3-C-SJ-202501-00000003-CIRCULAR-N°-3-SECRETARIA-JURIDICA-solicitando-apoderados-Constitucionales-1.pdf" class="text-decoration-none text-dark stretched-link" onmouseout="this.classList.remove('text-success');">
                                Circular 03 de 2025
                            </a>
                        </h5>
                        <p class="card-text text-muted mb-0 small">Asignacion profesional abogado para asuntos constitucionales en la vigencia 2025</p>
                    </div>
                </div>

                <div class="d-flex flex-wrap gap-3 mb-3 small text-muted">
                    <div class="d-flex align-items-center gap-1">
                        <i class="fas fa-calendar" style="color: #2D6A2F;"></i>
                        <span>21 de enero de 2025</span>
                    </div>
                    <div class="d-flex align-items-center gap-1">
                        <i class="fas fa-clock" style="color: #2D6A2F;"></i>
                        <span>hace 5 días</span>
                    </div>
                </div>

                <div class="d-grid">
                    <a href="https://www.bucaramanga.gov.co/wp-content/uploads/2025/07/3-C-SJ-202501-00000003-CIRCULAR-N°-3-SECRETARIA-JURIDICA-solicitando-apoderados-Constitucionales-1.pdf" 
                    target="_blank" 
                    rel="noopener noreferrer" 
                    class="btn text-white fw-bold py-2 rounded-2"
                    style="background-color: #2d6a2f; transition: background-color 0.3s ease;"
                    onclick="event.stopPropagation();"
                    onmouseover="this.style.backgroundColor='#1f4e21';"
                    onmouseout="this.style.backgroundColor='#2d6a2f';">
                        Ver / Descargar
                    </a>
                </div>
            </div>
        </div>
    </div>

            <!-- Circular 05 -->
            <div class="col-sm-6 col-md-4">
                <div class="card h-100 border border-2 border-light shadow-sm" style="border-radius: 12px; transition: all 0.3s ease;"
                     onmouseover="this.style.transform='translateY(-3px)'; this.classList.add('shadow');"
                     onmouseout="this.style.transform='translateY(0)'; this.classList.remove('shadow');">
                    <div class="card-body p-4">
                        <div class="d-flex align-items-start gap-3 mb-3">
                            <div class="flex-shrink-0 bg-danger bg-opacity-10 rounded d-flex align-items-center justify-content-center" style="width: 48px; height: 48px;">
                                <span class="text-danger" style="font-size: 1.5rem;"><i class="fas fa-file-pdf"></i></span>
                            </div>
                            <div class="flex-grow-1 min-w-0">
                                <h5 class="card-title mb-2 fw-bold text-dark lh-sm" style="font-size: 1.1rem;">
                                    <a href="https://www.bucaramanga.gov.co/wp-content/uploads/2025/07/3-C-SJ-202501-00000005-CIRCULAR-N°-5-SECRETARIA-JURIDICA_0001-1.pdf" class="text-decoration-none text-dark stretched-link">
                                        Circular 05 de 2025
                                    </a>
                                </h5>
                                <p class="card-text text-muted mb-0 small">Tramite de viabilidad juridica sobre asuntos contractuales que lo requieran</p>
                            </div>
                        </div>
                        <div class="d-flex flex-wrap gap-3 mb-3 small text-muted">
                            <div class="d-flex align-items-center gap-1">
                                <i class="fas fa-calendar" style="color: #2D6A2F;"></i>
                                <span>27 de enero de 2025</span>
                            </div>
                            <div class="d-flex align-items-center gap-1">
                                <i class="fas fa-clock" style="color: #2D6A2F;"></i>
                                <span>hace 5 días</span>
                            </div>
                        </div>
                        <div class="d-grid">
                            <a href="#" target="_blank" rel="noopener noreferrer" class="btn text-white fw-bold py-2 rounded-2"
                               style="background-color: #2d6a2f; transition: background-color 0.3s ease;"
                               onmouseover="this.style.backgroundColor='#1f4e21';"
                               onmouseout="this.style.backgroundColor='#2d6a2f';">
                                Ver / Descargar
                            </a>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Circular 06 -->
            <div class="col-sm-6 col-md-4">
                <div class="card h-100 border border-2 border-light shadow-sm" style="border-radius: 12px; transition: all 0.3s ease;"
                     onmouseover="this.style.transform='translateY(-3px)'; this.classList.add('shadow');"
                     onmouseout="this.style.transform='translateY(0)'; this.classList.remove('shadow');">
                    <div class="card-body p-4">
                        <div class="d-flex align-items-start gap-3 mb-3">
                            <div class="flex-shrink-0 bg-danger bg-opacity-10 rounded d-flex align-items-center justify-content-center" style="width: 48px; height: 48px;">
                                <span class="text-danger" style="font-size: 1.5rem;"><i class="fas fa-file-pdf"></i></span>
                            </div>
                            <div class="flex-grow-1 min-w-0">
                                <h5 class="card-title mb-2 fw-bold text-dark lh-sm" style="font-size: 1.1rem;">
                                    <a href="https://www.bucaramanga.gov.co/wp-content/uploads/2025/07/3-C-SJ-202501-00000006-CIRCULAR-N°-6-SECRETARIA-JURIDICA-ANO-2025_0001-1.pdf" class="text-decoration-none text-dark stretched-link">
                                        Circular 06 de 2025
                                    </a>
                                </h5>
                                <p class="card-text text-muted mb-0 small">asignación de reparto con fines de identificación articulos suceptibles de depuracion...</p>
                            </div>
                        </div>
                        <div class="d-flex flex-wrap gap-3 mb-3 small text-muted">
                            <div class="d-flex align-items-center gap-1">
                                <i class="fas fa-calendar" style="color: #2D6A2F;"></i>
                                <span>30 enero de 2025</span>
                            </div>
                            <div class="d-flex align-items-center gap-1">
                                <i class="fas fa-clock" style="color: #2D6A2F;"></i>
                                <span>hace 5 días</span>
                            </div>
                        </div>
                        <div class="d-grid">
                            <a href="#" target="_blank" rel="noopener noreferrer" class="btn text-white fw-bold py-2 rounded-2"
                               style="background-color: #2d6a2f; transition: background-color 0.3s ease;"
                               onmouseover="this.style.backgroundColor='#1f4e21';"
                               onmouseout="this.style.backgroundColor='#2d6a2f';">
                                Ver / Descargar
                            </a>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Circular 08 -->
            <div class="col-sm-6 col-md-4">
                <div class="card h-100 border border-2 border-light shadow-sm" style="border-radius: 12px; transition: all 0.3s ease;"
                     onmouseover="this.style.transform='translateY(-3px)'; this.classList.add('shadow');"
                     onmouseout="this.style.transform='translateY(0)'; this.classList.remove('shadow');">
                    <div class="card-body p-4">
                        <div class="d-flex align-items-start gap-3 mb-3">
                            <div class="flex-shrink-0 bg-danger bg-opacity-10 rounded d-flex align-items-center justify-content-center" style="width: 48px; height: 48px;">
                                <span class="text-danger" style="font-size: 1.5rem;"><i class="fas fa-file-pdf"></i></span>
                            </div>
                            <div class="flex-grow-1 min-w-0">
                                <h5 class="card-title mb-2 fw-bold text-dark lh-sm" style="font-size: 1.1rem;">
                                    <a href="https://www.bucaramanga.gov.co/wp-content/uploads/2025/07/3-C-SJ-202502-00000008-CIRCULAR-N°-8-SECRETARIA-JURIDICA_0001-1.pdf" class="text-decoration-none text-dark stretched-link">
                                        Circular 08 de 2025
                                    </a>
                                </h5>
                                <p class="card-text text-muted mb-0 small">Lineamiento de pago de sentencias judiciales, conciliaciones y laudos arbitrales</p>
                            </div>
                        </div>
                        <div class="d-flex flex-wrap gap-3 mb-3 small text-muted">
                            <div class="d-flex align-items-center gap-1">
                                <i class="fas fa-calendar" style="color: #2D6A2F;"></i>
                                <span>24 de febrero de 2025</span>
                            </div>
                            <div class="d-flex align-items-center gap-1">
                                <i class="fas fa-clock" style="color: #2D6A2F;"></i>
                                <span>hace 5 días</span>
                            </div>
                        </div>
                        <div class="d-grid">
                            <a href="#" target="_blank" rel="noopener noreferrer" class="btn text-white fw-bold py-2 rounded-2"
                               style="background-color: #2d6a2f; transition: background-color 0.3s ease;"
                               onmouseover="this.style.backgroundColor='#1f4e21';"
                               onmouseout="this.style.backgroundColor='#2d6a2f';">
                                Ver / Descargar
                            </a>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Circular 09 -->
            <div class="col-sm-6 col-md-4">
                <div class="card h-100 border border-2 border-light shadow-sm" style="border-radius: 12px; transition: all 0.3s ease;"
                     onmouseover="this.style.transform='translateY(-3px)'; this.classList.add('shadow');"
                     onmouseout="this.style.transform='translateY(0)'; this.classList.remove('shadow');">
                    <div class="card-body p-4">
                        <div class="d-flex align-items-start gap-3 mb-3">
                            <div class="flex-shrink-0 bg-danger bg-opacity-10 rounded d-flex align-items-center justify-content-center" style="width: 48px; height: 48px;">
                                <span class="text-danger" style="font-size: 1.5rem;"><i class="fas fa-file-pdf"></i></span>
                            </div>
                            <div class="flex-grow-1 min-w-0">
                                <h5 class="card-title mb-2 fw-bold text-dark lh-sm" style="font-size: 1.1rem;">
                                    <a href="https://www.bucaramanga.gov.co/wp-content/uploads/2025/07/3-C-SJ-202503-00000009-CIRCULAR-N°-9-SECRETARIA-JURIDICA_0001-1.pdf" class="text-decoration-none text-dark stretched-link">
                                        Circular 09 de 2025
                                    </a>
                                </h5>
                                <p class="card-text text-muted mb-0 small">Criterios para la seleccion de abogados externos que garanticen su idoneidad...</p>
                            </div>
                        </div>
                        <div class="d-flex flex-wrap gap-3 mb-3 small text-muted">
                            <div class="d-flex align-items-center gap-1">
                                <i class="fas fa-calendar" style="color: #2D6A2F;"></i>
                                <span>6 de marzo de 2025</span>
                            </div>
                            <div class="d-flex align-items-center gap-1">
                                <i class="fas fa-clock" style="color: #2D6A2F;"></i>
                                <span>hace 5 días</span>
                            </div>
                        </div>
                        <div class="d-grid">
                            <a href="#" target="_blank" rel="noopener noreferrer" class="btn text-white fw-bold py-2 rounded-2"
                               style="background-color: #2d6a2f; transition: background-color 0.3s ease;"
                               onmouseover="this.style.backgroundColor='#1f4e21';"
                               onmouseout="this.style.backgroundColor='#2d6a2f';">
                                Ver / Descargar
                            </a>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Circular 14 -->
            <div class="col-sm-6 col-md-4">
                <div class="card h-100 border border-2 border-light shadow-sm" style="border-radius: 12px; transition: all 0.3s ease;"
                     onmouseover="this.style.transform='translateY(-3px)'; this.classList.add('shadow');"
                     onmouseout="this.style.transform='translateY(0)'; this.classList.remove('shadow');">
                    <div class="card-body p-4">
                        <div class="d-flex align-items-start gap-3 mb-3">
                            <div class="flex-shrink-0 bg-danger bg-opacity-10 rounded d-flex align-items-center justify-content-center" style="width: 48px; height: 48px;">
                                <span class="text-danger" style="font-size: 1.5rem;"><i class="fas fa-file-pdf"></i></span>
                            </div>
                            <div class="flex-grow-1 min-w-0">
                                <h5 class="card-title mb-2 fw-bold text-dark lh-sm" style="font-size: 1.1rem;">
                                    <a href="https://www.bucaramanga.gov.co/wp-content/uploads/2025/07/3-C-SJ-202503-00000014-CIRCULAR-N°-14-SECRETARIA-JURIDICA_0001-1.pdf" class="text-decoration-none text-dark stretched-link">
                                        Circular 14 de 2025
                                    </a>
                                </h5>
                                <p class="card-text text-muted mb-0 small">Implementacion del formato de declaración de prevención de lavado de activos...</p>
                            </div>
                        </div>
                        <div class="d-flex flex-wrap gap-3 mb-3 small text-muted">
                            <div class="d-flex align-items-center gap-1">
                                <i class="fas fa-calendar" style="color: #2D6A2F;"></i>
                                <span>26 de marzo de 2025</span>
                            </div>
                            <div class="d-flex align-items-center gap-1">
                                <i class="fas fa-clock" style="color: #2D6A2F;"></i>
                                <span>hace 5 días</span>
                            </div>
                        </div>
                        <div class="d-grid">
                            <a href="#" target="_blank" rel="noopener noreferrer" class="btn text-white fw-bold py-2 rounded-2"
                               style="background-color: #2d6a2f; transition: background-color 0.3s ease;"
                               onmouseover="this.style.backgroundColor='#1f4e21';"
                               onmouseout="this.style.backgroundColor='#2d6a2f';">
                                Ver / Descargar
                            </a>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Circular 17 -->
            <div class="col-sm-6 col-md-4">
                <div class="card h-100 border border-2 border-light shadow-sm" style="border-radius: 12px; transition: all 0.3s ease;"
                     onmouseover="this.style.transform='translateY(-3px)'; this.classList.add('shadow');"
                     onmouseout="this.style.transform='translateY(0)'; this.classList.remove('shadow');">
                    <div class="card-body p-4">
                        <div class="d-flex align-items-start gap-3 mb-3">
                            <div class="flex-shrink-0 bg-danger bg-opacity-10 rounded d-flex align-items-center justify-content-center" style="width: 48px; height: 48px;">
                                <span class="text-danger" style="font-size: 1.5rem;"><i class="fas fa-file-pdf"></i></span>
                            </div>
                            <div class="flex-grow-1 min-w-0">
                                <h5 class="card-title mb-2 fw-bold text-dark lh-sm" style="font-size: 1.1rem;">
                                    <a href="https://www.bucaramanga.gov.co/wp-content/uploads/2025/07/3-C-SJ-202504-00000017-CIRCULAR-N°-17-SECRETARIA-JURIDICA_0001-1.pdf" class="text-decoration-none text-dark stretched-link">
                                        Circular 17 de 2025
                                    </a>
                                </h5>
                                <p class="card-text text-muted mb-0 small">Lineamientos para la defensa juridica en procesos de contrato realidad...</p>
                            </div>
                        </div>
                        <div class="d-flex flex-wrap gap-3 mb-3 small text-muted">
                            <div class="d-flex align-items-center gap-1">
                                <i class="fas fa-calendar" style="color: #2D6A2F;"></i>
                                <span>3 de abril del 2025</span>
                            </div>
                            <div class="d-flex align-items-center gap-1">
                                <i class="fas fa-clock" style="color: #2D6A2F;"></i>
                                <span>hace 5 días</span>
                            </div>
                        </div>
                        <div class="d-grid">
                            <a href="#" target="_blank" rel="noopener noreferrer" class="btn text-white fw-bold py-2 rounded-2"
                               style="background-color: #2d6a2f; transition: background-color 0.3s ease;"
                               onmouseover="this.style.backgroundColor='#1f4e21';"
                               onmouseout="this.style.backgroundColor='#2d6a2f';">
                                Ver / Descargar
                            </a>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Circular 20 -->
            <div class="col-sm-6 col-md-4">
                <div class="card h-100 border border-2 border-light shadow-sm" style="border-radius: 12px; transition: all 0.3s ease;"
                     onmouseover="this.style.transform='translateY(-3px)'; this.classList.add('shadow');"
                     onmouseout="this.style.transform='translateY(0)'; this.classList.remove('shadow');">
                    <div class="card-body p-4">
                        <div class="d-flex align-items-start gap-3 mb-3">
                            <div class="flex-shrink-0 bg-danger bg-opacity-10 rounded d-flex align-items-center justify-content-center" style="width: 48px; height: 48px;">
                                <span class="text-danger" style="font-size: 1.5rem;"><i class="fas fa-file-pdf"></i></span>
                            </div>
                            <div class="flex-grow-1 min-w-0">
                                <h5 class="card-title mb-2 fw-bold text-dark lh-sm" style="font-size: 1.1rem;">
                                    <a href="https://www.bucaramanga.gov.co/wp-content/uploads/2025/07/3-C-SJ-202505-00000020-CURCULAR-N°-20-SECRETARIA-JURIDICA_0001-1.pdf" class="text-decoration-none text-dark stretched-link">
                                        Circular 20 de 2025
                                    </a>
                                </h5>
                                <p class="card-text text-muted mb-0 small">Recordatorio sobre tipos penales consagrados en los artículos del código penal...</p>
                            </div>
                        </div>
                        <div class="d-flex flex-wrap gap-3 mb-3 small text-muted">
                            <div class="d-flex align-items-center gap-1">
                                <i class="fas fa-calendar" style="color: #2D6A2F;"></i>
                                <span>08 de mayo de 2025</span>
                            </div>
                            <div class="d-flex align-items-center gap-1">
                                <i class="fas fa-clock" style="color: #2D6A2F;"></i>
                                <span>hace 5 días</span>
                            </div>
                        </div>
                        <div class="d-grid">
                            <a href="#" target="_blank" rel="noopener noreferrer" class="btn text-white fw-bold py-2 rounded-2"
                               style="background-color: #2d6a2f; transition: background-color 0.3s ease;"
                               onmouseover="this.style.backgroundColor='#1f4e21';"
                               onmouseout="this.style.backgroundColor='#2d6a2f';">
                                Ver / Descargar
                            </a>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Circular 21 -->
            <div class="col-sm-6 col-md-4">
                <div class="card h-100 border border-2 border-light shadow-sm" style="border-radius: 12px; transition: all 0.3s ease;"
                     onmouseover="this.style.transform='translateY(-3px)'; this.classList.add('shadow');"
                     onmouseout="this.style.transform='translateY(0)'; this.classList.remove('shadow');">
                    <div class="card-body p-4">
                        <div class="d-flex align-items-start gap-3 mb-3">
                            <div class="flex-shrink-0 bg-danger bg-opacity-10 rounded d-flex align-items-center justify-content-center" style="width: 48px; height: 48px;">
                                <span class="text-danger" style="font-size: 1.5rem;"><i class="fas fa-file-pdf"></i></span>
                            </div>
                            <div class="flex-grow-1 min-w-0">
                                <h5 class="card-title mb-2 fw-bold text-dark lh-sm" style="font-size: 1.1rem;">
                                    <a href="https://www.bucaramanga.gov.co/wp-content/uploads/2025/07/3-C-SJ-202505-00000021-CIRCULAR-N°-21-SECRETARIA-JURIDICA_0001-1.pdf" class="text-decoration-none text-dark stretched-link">
                                        Circular 21 de 2025
                                    </a>
                                </h5>
                                <p class="card-text text-muted mb-0 small">Terminación de los cps y nueva contratación de abogados que atiendan...</p>
                            </div>
                        </div>
                        <div class="d-flex flex-wrap gap-3 mb-3 small text-muted">
                            <div class="d-flex align-items-center gap-1">
                                <i class="fas fa-calendar" style="color: #2D6A2F;"></i>
                                <span>19 de mayo de 2025</span>
                            </div>
                            <div class="d-flex align-items-center gap-1">
                                <i class="fas fa-clock" style="color: #2D6A2F;"></i>
                                <span>hace 5 días</span>
                            </div>
                        </div>
                        <div class="d-grid">
                            <a href="#" target="_blank" rel="noopener noreferrer" class="btn text-white fw-bold py-2 rounded-2"
                               style="background-color: #2d6a2f; transition: background-color 0.3s ease;"
                               onmouseover="this.style.backgroundColor='#1f4e21';"
                               onmouseout="this.style.backgroundColor='#2d6a2f';">
                                Ver / Descargar
                            </a>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Circular 22 -->
            <div class="col-sm-6 col-md-4">
                <div class="card h-100 border border-2 border-light shadow-sm" style="border-radius: 12px; transition: all 0.3s ease;"
                     onmouseover="this.style.transform='translateY(-3px)'; this.classList.add('shadow');"
                     onmouseout="this.style.transform='translateY(0)'; this.classList.remove('shadow');">
                    <div class="card-body p-4">
                        <div class="d-flex align-items-start gap-3 mb-3">
                            <div class="flex-shrink-0 bg-danger bg-opacity-10 rounded d-flex align-items-center justify-content-center" style="width: 48px; height: 48px;">
                                <span class="text-danger" style="font-size: 1.5rem;"><i class="fas fa-file-pdf"></i></span>
                            </div>
                            <div class="flex-grow-1 min-w-0">
                                <h5 class="card-title mb-2 fw-bold text-dark lh-sm" style="font-size: 1.1rem;">
                                    <a href="https://www.bucaramanga.gov.co/wp-content/uploads/2025/07/3-C-SJ-202505-00000022-CIRCULAR-N°-22-SECRETARIA-JURIDICA_0001-1.pdf" class="text-decoration-none text-dark stretched-link">
                                        Circular 22 de 2025
                                    </a>
                                </h5>
                                <p class="card-text text-muted mb-0 small">Socializacion del plan de mejoramiento adoptado como producto de la auditorīa...</p>
                            </div>
                        </div>
                        <div class="d-flex flex-wrap gap-3 mb-3 small text-muted">
                            <div class="d-flex align-items-center gap-1">
                                <i class="fas fa-calendar" style="color: #2D6A2F;"></i>
                                <span>21 de mayo de 2025</span>
                            </div>
                            <div class="d-flex align-items-center gap-1">
                                <i class="fas fa-clock" style="color: #2D6A2F;"></i>
                                <span>hace 5 días</span>
                            </div>
                        </div>
                        <div class="d-grid">
                            <a href="#" target="_blank" rel="noopener noreferrer" class="btn text-white fw-bold py-2 rounded-2"
                               style="background-color: #2d6a2f; transition: background-color 0.3s ease;"
                               onmouseover="this.style.backgroundColor='#1f4e21';"
                               onmouseout="this.style.backgroundColor='#2d6a2f';">
                                Ver / Descargar
                            </a>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Circular 23 -->
            <div class="col-sm-6 col-md-4">
                <div class="card h-100 border border-2 border-light shadow-sm" style="border-radius: 12px; transition: all 0.3s ease;"
                     onmouseover="this.style.transform='translateY(-3px)'; this.classList.add('shadow');"
                     onmouseout="this.style.transform='translateY(0)'; this.classList.remove('shadow');">
                    <div class="card-body p-4">
                        <div class="d-flex align-items-start gap-3 mb-3">
                            <div class="flex-shrink-0 bg-danger bg-opacity-10 rounded d-flex align-items-center justify-content-center" style="width: 48px; height: 48px;">
                                <span class="text-danger" style="font-size: 1.5rem;"><i class="fas fa-file-pdf"></i></span>
                            </div>
                            <div class="flex-grow-1 min-w-0">
                                <h5 class="card-title mb-2 fw-bold text-dark lh-sm" style="font-size: 1.1rem;">
                                    <a href="https://www.bucaramanga.gov.co/wp-content/uploads/2025/07/3-C-SJ-202505-00000023-CIRCULAR-N°-23-SECRETARIA-JURIDICA_0001-1.pdf" class="text-decoration-none text-dark stretched-link">
                                        Circular 23 de 2025
                                    </a>
                                </h5>
                                <p class="card-text text-muted mb-0 small">Directrices en materia de control y seguimiento a la ejecución de contratos...</p>
                            </div>
                        </div>
                        <div class="d-flex flex-wrap gap-3 mb-3 small text-muted">
                            <div class="d-flex align-items-center gap-1">
                                <i class="fas fa-calendar" style="color: #2D6A2F;"></i>
                                <span>22 de mayo de 2025</span>
                            </div>
                            <div class="d-flex align-items-center gap-1">
                                <i class="fas fa-clock" style="color: #2D6A2F;"></i>
                                <span>hace 5 días</span>
                            </div>
                        </div>
                        <div class="d-grid">
                            <a href="#" target="_blank" rel="noopener noreferrer" class="btn text-white fw-bold py-2 rounded-2"
                               style="background-color: #2d6a2f; transition: background-color 0.3s ease;"
                               onmouseover="this.style.backgroundColor='#1f4e21';"
                               onmouseout="this.style.backgroundColor='#2d6a2f';">
                                Ver / Descargar
                            </a>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Circular 25 -->
            <div class="col-sm-6 col-md-4">
                <div class="card h-100 border border-2 border-light shadow-sm" style="border-radius: 12px; transition: all 0.3s ease;"
                     onmouseover="this.style.transform='translateY(-3px)'; this.classList.add('shadow');"
                     onmouseout="this.style.transform='translateY(0)'; this.classList.remove('shadow');">
                    <div class="card-body p-4">
                        <div class="d-flex align-items-start gap-3 mb-3">
                            <div class="flex-shrink-0 bg-danger bg-opacity-10 rounded d-flex align-items-center justify-content-center" style="width: 48px; height: 48px;">
                                <span class="text-danger" style="font-size: 1.5rem;"><i class="fas fa-file-pdf"></i></span>
                            </div>
                            <div class="flex-grow-1 min-w-0">
                                <h5 class="card-title mb-2 fw-bold text-dark lh-sm" style="font-size: 1.1rem;">
                                    <a href="https://www.bucaramanga.gov.co/wp-content/uploads/2025/07/3-C-SJ-202505-00000025-CIRCULAR-25-SECRETARIA-JURDICA_0001-1.pdf" class="text-decoration-none text-dark stretched-link">
                                        Circular 25 de 2025
                                    </a>
                                </h5>
                                <p class="card-text text-muted mb-0 small">Participacion de funcionarios y/o contratistas como invitados ocacionales en el comite...</p>
                            </div>
                        </div>
                        <div class="d-flex flex-wrap gap-3 mb-3 small text-muted">
                            <div class="d-flex align-items-center gap-1">
                                <i class="fas fa-calendar" style="color: #2D6A2F;"></i>
                                <span>27 de mayo de 2025</span>
                            </div>
                            <div class="d-flex align-items-center gap-1">
                                <i class="fas fa-clock" style="color: #2D6A2F;"></i>
                                <span>hace 5 días</span>
                            </div>
                        </div>
                        <div class="d-grid">
                            <a href="#" target="_blank" rel="noopener noreferrer" class="btn text-white fw-bold py-2 rounded-2"
                               style="background-color: #2d6a2f; transition: background-color 0.3s ease;"
                               onmouseover="this.style.backgroundColor='#1f4e21';"
                               onmouseout="this.style.backgroundColor='#2d6a2f';">
                                Ver / Descargar
                            </a>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Circular 26 -->
            <div class="col-sm-6 col-md-4">
                <div class="card h-100 border border-2 border-light shadow-sm" style="border-radius: 12px; transition: all 0.3s ease;"
                     onmouseover="this.style.transform='translateY(-3px)'; this.classList.add('shadow');"
                     onmouseout="this.style.transform='translateY(0)'; this.classList.remove('shadow');">
                    <div class="card-body p-4">
                        <div class="d-flex align-items-start gap-3 mb-3">
                            <div class="flex-shrink-0 bg-danger bg-opacity-10 rounded d-flex align-items-center justify-content-center" style="width: 48px; height: 48px;">
                                <span class="text-danger" style="font-size: 1.5rem;"><i class="fas fa-file-pdf"></i></span>
                            </div>
                            <div class="flex-grow-1 min-w-0">
                                <h5 class="card-title mb-2 fw-bold text-dark lh-sm" style="font-size: 1.1rem;">
                                    <a href="https://www.bucaramanga.gov.co/wp-content/uploads/2025/07/3-C-SJ-202505-00000026-CIRCULAR-N°-26-SECRETARIA-JURIDICA_0001-1.pdf" class="text-decoration-none text-dark stretched-link">
                                        Circular 26 de 2025
                                    </a>
                                </h5>
                                <p class="card-text text-muted mb-0 small">Reiteración y seguimiento al trámite de solicitudes internas y externas...</p>
                            </div>
                        </div>
                        <div class="d-flex flex-wrap gap-3 mb-3 small text-muted">
                            <div class="d-flex align-items-center gap-1">
                                <i class="fas fa-calendar" style="color: #2D6A2F;"></i>
                                <span>30 de mayo de 2025</span>
                            </div>
                            <div class="d-flex align-items-center gap-1">
                                <i class="fas fa-clock" style="color: #2D6A2F;"></i>
                                <span>hace 5 días</span>
                            </div>
                        </div>
                        <div class="d-grid">
                            <a href="#" target="_blank" rel="noopener noreferrer" class="btn text-white fw-bold py-2 rounded-2"
                               style="background-color: #2d6a2f; transition: background-color 0.3s ease;"
                               onmouseover="this.style.backgroundColor='#1f4e21';"
                               onmouseout="this.style.backgroundColor='#2d6a2f';">
                                Ver / Descargar
                            </a>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Circular 27 -->
            <div class="col-sm-6 col-md-4">
                <div class="card h-100 border border-2 border-light shadow-sm" style="border-radius: 12px; transition: all 0.3s ease;"
                     onmouseover="this.style.transform='translateY(-3px)'; this.classList.add('shadow');"
                     onmouseout="this.style.transform='translateY(0)'; this.classList.remove('shadow');">
                    <div class="card-body p-4">
                        <div class="d-flex align-items-start gap-3 mb-3">
                            <div class="flex-shrink-0 bg-danger bg-opacity-10 rounded d-flex align-items-center justify-content-center" style="width: 48px; height: 48px;">
                                <span class="text-danger" style="font-size: 1.5rem;"><i class="fas fa-file-pdf"></i></span>
                            </div>
                            <div class="flex-grow-1 min-w-0">
                                <h5 class="card-title mb-2 fw-bold text-dark lh-sm" style="font-size: 1.1rem;">
                                    <a href="https://www.bucaramanga.gov.co/wp-content/uploads/2025/07/3-C-SJ-202505-00000027-CIRCULAR-N°-27-SECRETARIA-JURIDICA_0001-1.pdf" class="text-decoration-none text-dark stretched-link">
                                        Circular 27 de 2025
                                    </a>
                                </h5>
                                <p class="card-text text-muted mb-0 small">Invitación a participar en la mesa de trabajo virtual respecto...</p>
                            </div>
                        </div>
                        <div class="d-flex flex-wrap gap-3 mb-3 small text-muted">
                            <div class="d-flex align-items-center gap-1">
                                <i class="fas fa-calendar" style="color: #2D6A2F;"></i>
                                <span>30 de mayo de 2025</span>
                            </div>
                            <div class="d-flex align-items-center gap-1">
                                <i class="fas fa-clock" style="color: #2D6A2F;"></i>
                                <span>hace 5 días</span>
                            </div>
                        </div>
                        <div class="d-grid">
                            <a href="#" target="_blank" rel="noopener noreferrer" class="btn text-white fw-bold py-2 rounded-2"
                               style="background-color: #2d6a2f; transition: background-color 0.3s ease;"
                               onmouseover="this.style.backgroundColor='#1f4e21';"
                               onmouseout="this.style.backgroundColor='#2d6a2f';">
                                Ver / Descargar
                            </a>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Circular 29 -->
            <div class="col-sm-6 col-md-4">
                <div class="card h-100 border border-2 border-light shadow-sm" style="border-radius: 12px; transition: all 0.3s ease;"
                     onmouseover="this.style.transform='translateY(-3px)'; this.classList.add('shadow');"
                     onmouseout="this.style.transform='translateY(0)'; this.classList.remove('shadow');">
                    <div class="card-body p-4">
                        <div class="d-flex align-items-start gap-3 mb-3">
                            <div class="flex-shrink-0 bg-danger bg-opacity-10 rounded d-flex align-items-center justify-content-center" style="width: 48px; height: 48px;">
                                <span class="text-danger" style="font-size: 1.5rem;"><i class="fas fa-file-pdf"></i></span>
                            </div>
                            <div class="flex-grow-1 min-w-0">
                                <h5 class="card-title mb-2 fw-bold text-dark lh-sm" style="font-size: 1.1rem;">
                                    <a href="https://www.bucaramanga.gov.co/wp-content/uploads/2025/07/3-C-SJ-202506-00000029-CIRCULAR-N°-29-SECRETARIA-JURIDICA_0001-1.pdf" class="text-decoration-none text-dark stretched-link">
                                        Circular 29 de 2025
                                    </a>
                                </h5>
                                <p class="card-text text-muted mb-0 small">Implementación y seguimiento agenda regulatoria 2025-2</p>
                            </div>
                        </div>
                        <div class="d-flex flex-wrap gap-3 mb-3 small text-muted">
                            <div class="d-flex align-items-center gap-1">
                                <i class="fas fa-calendar" style="color: #2D6A2F;"></i>
                                <span>26 de junio 2025</span>
                            </div>
                            <div class="d-flex align-items-center gap-1">
                                <i class="fas fa-clock" style="color: #2D6A2F;"></i>
                                <span>hace 5 días</span>
                            </div>
                        </div>
                        <div class="d-grid">
                            <a href="#" target="_blank" rel="noopener noreferrer" class="btn text-white fw-bold py-2 rounded-2"
                               style="background-color: #2d6a2f; transition: background-color 0.3s ease;"
                               onmouseover="this.style.backgroundColor='#1f4e21';"
                               onmouseout="this.style.backgroundColor='#2d6a2f';">
                                Ver / Descargar
                            </a>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Circular 31 -->
            <div class="col-sm-6 col-md-4">
                <div class="card h-100 border border-2 border-light shadow-sm" style="border-radius: 12px; transition: all 0.3s ease;"
                     onmouseover="this.style.transform='translateY(-3px)'; this.classList.add('shadow');"
                     onmouseout="this.style.transform='translateY(0)'; this.classList.remove('shadow');">
                    <div class="card-body p-4">
                        <div class="d-flex align-items-start gap-3 mb-3">
                            <div class="flex-shrink-0 bg-danger bg-opacity-10 rounded d-flex align-items-center justify-content-center" style="width: 48px; height: 48px;">
                                <span class="text-danger" style="font-size: 1.5rem;"><i class="fas fa-file-pdf"></i></span>
                            </div>
                            <div class="flex-grow-1 min-w-0">
                                <h5 class="card-title mb-2 fw-bold text-dark lh-sm" style="font-size: 1.1rem;">
                                    <a href="https://www.bucaramanga.gov.co/wp-content/uploads/2025/07/3-C-SJ-202506-00000031-CIRCULAR-N°-31-SECRETARIA-JURIDICA-2025_0001-1.pdf" class="text-decoration-none text-dark stretched-link">
                                        Circular 31 de 2025
                                    </a>
                                </h5>
                                <p class="card-text text-muted mb-0 small">Orientaciones generales sobre las restricciones y prohibiciones en materia contractual...</p>
                            </div>
                        </div>
                        <div class="d-flex flex-wrap gap-3 mb-3 small text-muted">
                            <div class="d-flex align-items-center gap-1">
                                <i class="fas fa-calendar" style="color: #2D6A2F;"></i>
                                <span>02 julio de 2025</span>
                            </div>
                            <div class="d-flex align-items-center gap-1">
                                <i class="fas fa-clock" style="color: #2D6A2F;"></i>
                                <span>hace 5 días</span>
                            </div>
                        </div>
                        <div class="d-grid">
                            <a href="#" target="_blank" rel="noopener noreferrer" class="btn text-white fw-bold py-2 rounded-2"
                               style="background-color: #2d6a2f; transition: background-color 0.3s ease;"
                               onmouseover="this.style.backgroundColor='#1f4e21';"
                               onmouseout="this.style.backgroundColor='#2d6a2f';">
                                Ver / Descargar
                            </a>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Circular 32 -->
            <div class="col-sm-6 col-md-4">
                <div class="card h-100 border border-2 border-light shadow-sm" style="border-radius: 12px; transition: all 0.3s ease;"
                     onmouseover="this.style.transform='translateY(-3px)'; this.classList.add('shadow');"
                     onmouseout="this.style.transform='translateY(0)'; this.classList.remove('shadow');">
                    <div class="card-body p-4">
                        <div class="d-flex align-items-start gap-3 mb-3">
                            <div class="flex-shrink-0 bg-danger bg-opacity-10 rounded d-flex align-items-center justify-content-center" style="width: 48px; height: 48px;">
                                <span class="text-danger" style="font-size: 1.5rem;"><i class="fas fa-file-pdf"></i></span>
                            </div>
                            <div class="flex-grow-1 min-w-0">
                                <h5 class="card-title mb-2 fw-bold text-dark lh-sm" style="font-size: 1.1rem;">
                                    <a href="https://www.bucaramanga.gov.co/wp-content/uploads/2025/07/3-C-SJ-202507-00000032-CIRCULAR-N°-32-SECRETARIA-JURIDICA_0001-1.pdf" class="text-decoration-none text-dark stretched-link">
                                        Circular 32 de 2025
                                    </a>
                                </h5>
                                <p class="card-text text-muted mb-0 small">Plazo de entrega fichas técnicas sobre estudio de procedencia...</p>
                            </div>
                        </div>
                        <div class="d-flex flex-wrap gap-3 mb-3 small text-muted">
                            <div class="d-flex align-items-center gap-1">
                                <i class="fas fa-calendar" style="color: #2D6A2F;"></i>
                                <span>10 de julio 2025</span>
                            </div>
                            <div class="d-flex align-items-center gap-1">
                                <i class="fas fa-clock" style="color: #2D6A2F;"></i>
                                <span>hace 5 días</span>
                            </div>
                        </div>
                        <div class="d-grid">
                            <a href="#" target="_blank" rel="noopener noreferrer" class="btn text-white fw-bold py-2 rounded-2"
                               style="background-color: #2d6a2f; transition: background-color 0.3s ease;"
                               onmouseover="this.style.backgroundColor='#1f4e21';"
                               onmouseout="this.style.backgroundColor='#2d6a2f';">
                                Ver / Descargar
                            </a>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Circular 33 -->
            <div class="col-sm-6 col-md-4">
                <div class="card h-100 border border-2 border-light shadow-sm" style="border-radius: 12px; transition: all 0.3s ease;"
                     onmouseover="this.style.transform='translateY(-3px)'; this.classList.add('shadow');"
                     onmouseout="this.style.transform='translateY(0)'; this.classList.remove('shadow');">
                    <div class="card-body p-4">
                        <div class="d-flex align-items-start gap-3 mb-3">
                            <div class="flex-shrink-0 bg-danger bg-opacity-10 rounded d-flex align-items-center justify-content-center" style="width: 48px; height: 48px;">
                                <span class="text-danger" style="font-size: 1.5rem;"><i class="fas fa-file-pdf"></i></span>
                            </div>
                            <div class="flex-grow-1 min-w-0">
                                <h5 class="card-title mb-2 fw-bold text-dark lh-sm" style="font-size: 1.1rem;">
                                    <a href="https://www.bucaramanga.gov.co/wp-content/uploads/2025/07/3-C-SJ-202507-00000033-CIRCULAR-N°-33-SECRETARIA-JURIDICA_0001-1.pdf" class="text-decoration-none text-dark stretched-link">
                                        Circular 33 de 2025
                                    </a>
                                </h5>
                                <p class="card-text text-muted mb-0 small">Cumplimiento de términos para remision de actos administrativos y antecedentes...</p>
                            </div>
                        </div>
                        <div class="d-flex flex-wrap gap-3 mb-3 small text-muted">
                            <div class="d-flex align-items-center gap-1">
                                <i class="fas fa-calendar" style="color: #2D6A2F;"></i>
                                <span>14 de julio de 2025</span>
                            </div>
                            <div class="d-flex align-items-center gap-1">
                                <i class="fas fa-clock" style="color: #2D6A2F;"></i>
                                <span>hace 5 días</span>
                            </div>
                        </div>
                        <div class="d-grid">
                            <a href="#" target="_blank" rel="noopener noreferrer" class="btn text-white fw-bold py-2 rounded-2"
                               style="background-color: #2d6a2f; transition: background-color 0.3s ease;"
                               onmouseover="this.style.backgroundColor='#1f4e21';"
                               onmouseout="this.style.backgroundColor='#2d6a2f';">
                                Ver / Descargar
                            </a>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Circular 34 -->
            <div class="col-sm-6 col-md-4">
                <div class="card h-100 border border-2 border-light shadow-sm" style="border-radius: 12px; transition: all 0.3s ease;"
                     onmouseover="this.style.transform='translateY(-3px)'; this.classList.add('shadow');"
                     onmouseout="this.style.transform='translateY(0)'; this.classList.remove('shadow');">
                    <div class="card-body p-4">
                        <div class="d-flex align-items-start gap-3 mb-3">
                            <div class="flex-shrink-0 bg-danger bg-opacity-10 rounded d-flex align-items-center justify-content-center" style="width: 48px; height: 48px;">
                                <span class="text-danger" style="font-size: 1.5rem;"><i class="fas fa-file-pdf"></i></span>
                            </div>
                            <div class="flex-grow-1 min-w-0">
                                <h5 class="card-title mb-2 fw-bold text-dark lh-sm" style="font-size: 1.1rem;">
                                    <a href="https://www.bucaramanga.gov.co/wp-content/uploads/2025/07/3-C-SJ-202507-0000034-CIRCULAR-N°-34-SECRETARIA-JURIDICA_0001-1.pdf" class="text-decoration-none text-dark stretched-link">
                                        Circular 34 de 2025
                                    </a>
                                </h5>
                                <p class="card-text text-muted mb-0 small">Capacitación nuevo procedimiento cargue actos administrativos firmados por el alcalde</p>
                            </div>
                        </div>
                        <div class="d-flex flex-wrap gap-3 mb-3 small text-muted">
                            <div class="d-flex align-items-center gap-1">
                                <i class="fas fa-calendar" style="color: #2D6A2F;"></i>
                                <span>16 de julio de 2025</span>
                            </div>
                            <div class="d-flex align-items-center gap-1">
                                <i class="fas fa-clock" style="color: #2D6A2F;"></i>
                                <span>hace 5 días</span>
                            </div>
                        </div>
                        <div class="d-grid">
                            <a href="#" target="_blank" rel="noopener noreferrer" class="btn text-white fw-bold py-2 rounded-2"
                               style="background-color: #2d6a2f; transition: background-color 0.3s ease;"
                               onmouseover="this.style.backgroundColor='#1f4e21';"
                               onmouseout="this.style.backgroundColor='#2d6a2f';">
                                Ver / Descargar
                            </a>
                        </div>
                    </div>
                </div>
            </div>


</div>


        
    </div>

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