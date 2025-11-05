{{-- Footer Público Reutilizable --}}
<span id="final"></span>
<style>
    .hover-link {
        transition: all 0.3s ease;
    }
    .hover-link:hover {
        opacity: 0.8;
        transform: translateX(5px);
    }
    .btn-outline-light:hover {
        background-color: rgba(255, 255, 255, 0.15);
        border-color: rgba(255, 255, 255, 0.8);
    }
</style>
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
        <div class="row">
            <div class="col-12 mb-4">
                <h5 class="oswald-font fw-semibold mb-3 d-flex align-items-center">
                    <span class="bg-white bg-opacity-25 rounded-circle p-2 me-2 d-inline-flex align-items-center justify-content-center" style="width: 40px; height: 40px;">
                        <i class="fas fa-share-alt"></i>
                    </span>
                    Síguenos en Redes Sociales
                </h5>
                <div class="row g-3 justify-content-center justify-content-md-start">
                    <div class="col-lg-3 col-md-6 col-12">
                        <a href="https://www.facebook.com/alcaldiadebucaramanga/"
                           class="btn btn-outline-light w-100 d-flex align-items-center justify-content-center py-2"
                           target="_blank"
                           style="min-height: 45px;">
                            <i class="fab fa-facebook-f me-2"></i>
                            <span class="text-truncate">Alcaldia de Bucaramanga</span>
                        </a>
                    </div>
                    <div class="col-lg-3 col-md-6 col-12">
                        <a href="https://x.com/AlcaldiaBGA"
                           class="btn btn-outline-light w-100 d-flex align-items-center justify-content-center py-2"
                           target="_blank"
                           style="min-height: 45px;">
                            <i class="fab fa-twitter me-2"></i>
                            <span class="text-truncate">@AlcaldiaBGA</span>
                        </a>
                    </div>
                    <div class="col-lg-3 col-md-6 col-12">
                        <a href="https://www.instagram.com/alcaldiadebucaramanga/?hl=es"
                           class="btn btn-outline-light w-100 d-flex align-items-center justify-content-center py-2"
                           target="_blank"
                           style="min-height: 45px;">
                            <i class="fab fa-instagram me-2"></i>
                            <span class="text-truncate">@alcaldiadebucaramanga</span>
                        </a>
                    </div>
                    <div class="col-lg-3 col-md-6 col-12">
                        <a href="https://www.youtube.com/user/PrensaBucaramanga"
                           class="btn btn-outline-light w-100 d-flex align-items-center justify-content-center py-2"
                           target="_blank"
                           style="min-height: 45px;">
                            <i class="fab fa-youtube me-2"></i>
                            <span class="text-truncate">Alcaldia de Bucaramanga</span>
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
                <div class="row g-3">
                    <div class="col-lg-3 col-md-6 col-12">
                        <a href="https://www.bucaramanga.gov.co/autorizacion-de-tratamiento-de-datos-personales/"
                           class="d-flex align-items-start text-white text-decoration-none hover-link"
                           target="_blank">
                            <i class="fas fa-chevron-right me-2 mt-1 small"></i>
                            <span class="small">Autorización de Tratamiento de Datos Personales</span>
                        </a>
                    </div>
                    <div class="col-lg-3 col-md-6 col-12">
                        <a href="https://www.bucaramanga.gov.co/wp-content/uploads/2023/12/Resolucion-350-2023-politica-de-datos-personales-1.pdf"
                           class="d-flex align-items-start text-white text-decoration-none hover-link"
                           target="_blank">
                            <i class="fas fa-chevron-right me-2 mt-1 small"></i>
                            <span class="small">Política de Tratamiento de Datos Personales</span>
                        </a>
                    </div>
                    <div class="col-lg-3 col-md-6 col-12">
                        <a href="https://www.bucaramanga.gov.co/condiciones-de-uso/"
                           class="d-flex align-items-start text-white text-decoration-none hover-link"
                           target="_blank">
                            <i class="fas fa-chevron-right me-2 mt-1 small"></i>
                            <span class="small">Política web y condiciones de uso</span>
                        </a>
                    </div>
                    <div class="col-lg-3 col-md-6 col-12">
                        <a href="https://www.bucaramanga.gov.co/wp-content/uploads/2021/08/Politica_Editorial_Actualizada_2014.pdf"
                           class="d-flex align-items-start text-white text-decoration-none hover-link"
                           target="_blank">
                            <i class="fas fa-chevron-right me-2 mt-1 small"></i>
                            <span class="small">Política editorial</span>
                        </a>
                    </div>
                    <div class="col-lg-3 col-md-6 col-12">
                        <a href="https://www.bucaramanga.gov.co/wp-content/uploads/2021/08/Plan_de_Uso_Redes_Sociales.pdf"
                           class="d-flex align-items-start text-white text-decoration-none hover-link"
                           target="_blank">
                            <i class="fas fa-chevron-right me-2 mt-1 small"></i>
                            <span class="small">Plan uso de redes sociales</span>
                        </a>
                    </div>
                    <div class="col-lg-3 col-md-6 col-12">
                        <a href="https://www.bucaramanga.gov.co/wp-content/uploads/2024/04/PLAN-DE-COMUNICACIONES-2024-2027.pdf"
                           class="d-flex align-items-start text-white text-decoration-none hover-link"
                           target="_blank">
                            <i class="fas fa-chevron-right me-2 mt-1 small"></i>
                            <span class="small">Plan de comunicaciones</span>
                        </a>
                    </div>
                    <div class="col-lg-3 col-md-6 col-12">
                        <a href="https://www.bucaramanga.gov.co/wp-content/uploads/2023/07/RESOLUCION-0139-ADOPTA-Y-ACTUALIZA-POLITICA-INSTITUCIONAL.pdf"
                           class="d-flex align-items-start text-white text-decoration-none hover-link"
                           target="_blank">
                            <i class="fas fa-chevron-right me-2 mt-1 small"></i>
                            <span class="small">Política de Seguridad de la Información</span>
                        </a>
                    </div>
                    <div class="col-lg-3 col-md-6 col-12">
                        <a href="https://www.bucaramanga.gov.co/politicas-de-privacidad/"
                           class="d-flex align-items-start text-white text-decoration-none hover-link"
                           target="_blank">
                            <i class="fas fa-chevron-right me-2 mt-1 small"></i>
                            <span class="small">Uso y monitoreo página web</span>
                        </a>
                    </div>
                    <div class="col-lg-3 col-md-6 col-12">
                        <a href="https://www.bucaramanga.gov.co/mapa-del-sitio/"
                           class="d-flex align-items-start text-white text-decoration-none hover-link"
                           target="_blank">
                            <i class="fas fa-chevron-right me-2 mt-1 small"></i>
                            <span class="small">Mapa del sitio</span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Footer Gobierno Nacional -->
    <div class="navbar navbar-expand-lg barra-superior-govco py-3 mt-4">
        <div class="container">
            <div class="row align-items-center w-100">
                <div class="col-md-6">
                    <div class="d-flex align-items-center">
                        <!-- Logo gov.co oficial -->
                        <img src="https://www.bucaramanga.gov.co/wp-content/uploads/2021/03/logo_gov_co-e1611810279980.png"
                             alt="Logo Gov.co"
                             class="me-3"
                             style="height: 40px; width: auto;">
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>
