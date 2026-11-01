<?php
// servicios.php - Catálogo de Paquetes y Servicios del Estudio
$page_title = 'Nuestros Servicios';
$page_css = 'servicios.css';

require_once 'includes/header.php';
?>

<!-- Cabecera de Página -->
<section class="page-header text-center">
    <div class="container">
        <span class="badge bg-warning text-dark px-3 py-2 rounded-pill fw-bold mb-2 text-uppercase">
            Catálogo & Tarifas
        </span>
        <h1 class="display-5 fw-bold text-white mb-3">Nuestros Servicios Fotográficos</h1>
        <p class="lead text-light opacity-75 mx-auto" style="max-width: 650px;">
            Conoce cada uno de nuestros paquetes diseñados para inmortalizar tus ocasiones más importantes con calidad profesional.
        </p>
    </div>
</section>

<!-- Sección 1: Bodas -->
<section id="bodas" class="py-5">
    <div class="container">
        <div class="d-flex align-items-center gap-3 mb-4 border-bottom pb-3">
            <div class="bg-warning text-dark rounded-circle d-flex align-items-center justify-content-center" style="width: 50px; height: 50px;">
                <i class="bi bi-heart-fill fs-4"></i>
            </div>
            <div>
                <h3 class="fw-bold mb-0">Fotografía de Bodas</h3>
                <small class="text-muted">Cobertura artística y emotiva de tu día inolvidable</small>
            </div>
        </div>

        <div class="row g-4">
            <!-- Paquete Boda Esencial -->
            <div class="col-lg-4 col-md-6">
                <div class="card h-100 p-4 package-card shadow-sm">
                    <h5 class="fw-bold text-dark">Boda Esencial</h5>
                    <p class="text-muted small">Ideal para ceremonias íntimas y registro civil.</p>
                    <div class="package-price my-3">$8,500 <small class="fs-6 text-muted fw-normal">MXN</small></div>
                    <ul class="list-unstyled package-features text-secondary small flex-grow-1">
                        <li><i class="bi bi-check-circle-fill text-warning me-2"></i> 4 horas de cobertura continua</li>
                        <li><i class="bi bi-check-circle-fill text-warning me-2"></i> 1 Fotógrafo profesional</li>
                        <li><i class="bi bi-check-circle-fill text-warning me-2"></i> 120 Fotografías editadas en alta resolución</li>
                        <li><i class="bi bi-check-circle-fill text-warning me-2"></i> Galería privada digital por 6 meses</li>
                    </ul>
                    <a href="reservas.php?servicio=boda_esencial" class="btn btn-outline-dark w-100 mt-4">Cotizar o Reservar</a>
                </div>
            </div>

            <!-- Paquete Boda Premier (Destacado) -->
            <div class="col-lg-4 col-md-6">
                <div class="card h-100 p-4 package-card popular shadow">
                    <span class="badge-popular"><i class="bi bi-star-fill me-1"></i> Más Popular</span>
                    <h5 class="fw-bold text-dark">Boda Premier</h5>
                    <p class="text-muted small">Cobertura completa desde preparación hasta la fiesta.</p>
                    <div class="package-price my-3 text-warning">$16,500 <small class="fs-6 text-muted fw-normal">MXN</small></div>
                    <ul class="list-unstyled package-features text-secondary small flex-grow-1">
                        <li><i class="bi bi-check-circle-fill text-warning me-2"></i> 8 horas de cobertura integral</li>
                        <li><i class="bi bi-check-circle-fill text-warning me-2"></i> 2 Fotógrafos (dos ángulos)</li>
                        <li><i class="bi bi-check-circle-fill text-warning me-2"></i> Sesión previa de novios (Save the Date)</li>
                        <li><i class="bi bi-check-circle-fill text-warning me-2"></i> 250 Fotografías editadas</li>
                        <li><i class="bi bi-check-circle-fill text-warning me-2"></i> Photobook impreso tamaño 30x30 cm</li>
                    </ul>
                    <a href="reservas.php?servicio=boda_premier" class="btn btn-gold w-100 mt-4 shadow-sm">Cotizar o Reservar</a>
                </div>
            </div>

            <!-- Paquete Boda Diamante -->
            <div class="col-lg-4 col-md-6">
                <div class="card h-100 p-4 package-card shadow-sm">
                    <h5 class="fw-bold text-dark">Boda Diamante</h5>
                    <p class="text-muted small">La experiencia de lujo definitiva con video cine.</p>
                    <div class="package-price my-3">$26,000 <small class="fs-6 text-muted fw-normal">MXN</small></div>
                    <ul class="list-unstyled package-features text-secondary small flex-grow-1">
                        <li><i class="bi bi-check-circle-fill text-warning me-2"></i> Cobertura ilimitada (hasta 12 hrs)</li>
                        <li><i class="bi bi-check-circle-fill text-warning me-2"></i> 2 Fotógrafos + 1 Camarógrafo (Video 4K)</li>
                        <li><i class="bi bi-check-circle-fill text-warning me-2"></i> Sesión previa y Trash the Dress</li>
                        <li><i class="bi bi-check-circle-fill text-warning me-2"></i> Cuadro enmarcado en tela 60x90 cm</li>
                        <li><i class="bi bi-check-circle-fill text-warning me-2"></i> Entrega en USB con caja de madera de lujo</li>
                    </ul>
                    <a href="reservas.php?servicio=boda_diamante" class="btn btn-outline-dark w-100 mt-4">Cotizar o Reservar</a>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Sección 2: Sesiones de XV Años -->
<section id="xv" class="py-5 bg-light">
    <div class="container">
        <div class="d-flex align-items-center gap-3 mb-4 border-bottom pb-3">
            <div class="bg-warning text-dark rounded-circle d-flex align-items-center justify-content-center" style="width: 50px; height: 50px;">
                <i class="bi bi-gem fs-4"></i>
            </div>
            <div>
                <h3 class="fw-bold mb-0">Sesiones de XV Años</h3>
                <small class="text-muted">Creatividad, juventud y recuerdos inolvidables para la quinceañera</small>
            </div>
        </div>

        <div class="row g-4">
            <div class="col-md-6 col-lg-4">
                <div class="card h-100 p-4 package-card shadow-sm">
                    <h5 class="fw-bold text-dark">XV Estudio & Locación</h5>
                    <p class="text-muted small">Sesión previa antes del evento.</p>
                    <div class="package-price my-3">$5,500 <small class="fs-6 text-muted fw-normal">MXN</small></div>
                    <ul class="list-unstyled package-features text-secondary small flex-grow-1">
                        <li><i class="bi bi-check-circle-fill text-warning me-2"></i> 3 Horas de sesión</li>
                        <li><i class="bi bi-check-circle-fill text-warning me-2"></i> 3 Cambios de vestuario</li>
                        <li><i class="bi bi-check-circle-fill text-warning me-2"></i> 35 Fotos editadas con retoque fino</li>
                        <li><i class="bi bi-check-circle-fill text-warning me-2"></i> Cuadro para bienvenida al salón</li>
                    </ul>
                    <a href="reservas.php?servicio=xv_sesion" class="btn btn-outline-dark w-100 mt-4">Cotizar o Reservar</a>
                </div>
            </div>

            <div class="col-md-6 col-lg-4">
                <div class="card h-100 p-4 package-card popular shadow">
                    <span class="badge-popular"><i class="bi bi-star-fill me-1"></i> Recomendado</span>
                    <h5 class="fw-bold text-dark">XV Fiesta Completa</h5>
                    <p class="text-muted small">Sesión previa + misa y recepción de fiesta.</p>
                    <div class="package-price my-3 text-warning">$12,800 <small class="fs-6 text-muted fw-normal">MXN</small></div>
                    <ul class="list-unstyled package-features text-secondary small flex-grow-1">
                        <li><i class="bi bi-check-circle-fill text-warning me-2"></i> Sesión previa en locación</li>
                        <li><i class="bi bi-check-circle-fill text-warning me-2"></i> 6 Horas de evento social</li>
                        <li><i class="bi bi-check-circle-fill text-warning me-2"></i> 180 Fotos en alta calidad</li>
                        <li><i class="bi bi-check-circle-fill text-warning me-2"></i> Photobook de 20 páginas</li>
                    </ul>
                    <a href="reservas.php?servicio=xv_fiesta" class="btn btn-gold w-100 mt-4">Cotizar o Reservar</a>
                </div>
            </div>

            <div class="col-md-6 col-lg-4">
                <div class="card h-100 p-4 package-card shadow-sm">
                    <h5 class="fw-bold text-dark">XV Todo Incluido</h5>
                    <p class="text-muted small">Foto, video con dron y photobook prémium.</p>
                    <div class="package-price my-3">$19,500 <small class="fs-6 text-muted fw-normal">MXN</small></div>
                    <ul class="list-unstyled package-features text-secondary small flex-grow-1">
                        <li><i class="bi bi-check-circle-fill text-warning me-2"></i> Cobertura total de evento</li>
                        <li><i class="bi bi-check-circle-fill text-warning me-2"></i> Video teaser clip + Video completo</li>
                        <li><i class="bi bi-check-circle-fill text-warning me-2"></i> Tomas aéreas con Dron (locación)</li>
                        <li><i class="bi bi-check-circle-fill text-warning me-2"></i> 2 Cuadros de firmas</li>
                    </ul>
                    <a href="reservas.php?servicio=xv_completo" class="btn btn-outline-dark w-100 mt-4">Cotizar o Reservar</a>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Sección 3: Retratos en Estudio -->
<section id="estudio" class="py-5">
    <div class="container">
        <div class="d-flex align-items-center gap-3 mb-4 border-bottom pb-3">
            <div class="bg-warning text-dark rounded-circle d-flex align-items-center justify-content-center" style="width: 50px; height: 50px;">
                <i class="bi bi-person-bounding-box fs-4"></i>
            </div>
            <div>
                <h3 class="fw-bold mb-0">Retratos en Estudio & Graduaciones</h3>
                <small class="text-muted">Iluminación controlada, fondos modernos y retoque digital profesional</small>
            </div>
        </div>

        <div class="row g-4">
            <div class="col-md-6 col-lg-4">
                <div class="card h-100 p-4 package-card shadow-sm">
                    <h5 class="fw-bold text-dark">Retrato Profesional / LinkedIn</h5>
                    <p class="text-muted small">Para ejecutivos, marcas personales y currículum.</p>
                    <div class="package-price my-3">$1,800 <small class="fs-6 text-muted fw-normal">MXN</small></div>
                    <ul class="list-unstyled package-features text-secondary small flex-grow-1">
                        <li><i class="bi bi-check-circle-fill text-warning me-2"></i> 45 Minutos en estudio</li>
                        <li><i class="bi bi-check-circle-fill text-warning me-2"></i> 2 Fondos a elegir (blanco/negro/gris)</li>
                        <li><i class="bi bi-check-circle-fill text-warning me-2"></i> 5 Fotos retocadas al detalle</li>
                        <li><i class="bi bi-check-circle-fill text-warning me-2"></i> Entrega en 48 horas</li>
                    </ul>
                    <a href="reservas.php?servicio=retrato_pro" class="btn btn-outline-dark w-100 mt-4">Cotizar o Reservar</a>
                </div>
            </div>

            <div class="col-md-6 col-lg-4">
                <div class="card h-100 p-4 package-card shadow-sm">
                    <h5 class="fw-bold text-dark">Sesión Familiar / Maternidad</h5>
                    <p class="text-muted small">Crea memorias con tus seres queridos.</p>
                    <div class="package-price my-3">$3,200 <small class="fs-6 text-muted fw-normal">MXN</small></div>
                    <ul class="list-unstyled package-features text-secondary small flex-grow-1">
                        <li><i class="bi bi-check-circle-fill text-warning me-2"></i> 1.5 Horas de sesión</li>
                        <li><i class="bi bi-check-circle-fill text-warning me-2"></i> Hasta 6 personas (o mascotas)</li>
                        <li><i class="bi bi-check-circle-fill text-warning me-2"></i> 20 Fotos editadas</li>
                        <li><i class="bi bi-check-circle-fill text-warning me-2"></i> 5 Impresiones 6x8 pulgadas</li>
                    </ul>
                    <a href="reservas.php?servicio=sesion_familiar" class="btn btn-outline-dark w-100 mt-4">Cotizar o Reservar</a>
                </div>
            </div>

            <div class="col-md-6 col-lg-4">
                <div class="card h-100 p-4 package-card shadow-sm">
                    <h5 class="fw-bold text-dark">Book Modelaje & Artístico</h5>
                    <p class="text-muted small">Para modelos, actores, músicos y portafolios.</p>
                    <div class="package-price my-3">$4,500 <small class="fs-6 text-muted fw-normal">MXN</small></div>
                    <ul class="list-unstyled package-features text-secondary small flex-grow-1">
                        <li><i class="bi bi-check-circle-fill text-warning me-2"></i> 2.5 Horas de sesión creativa</li>
                        <li><i class="bi bi-check-circle-fill text-warning me-2"></i> Esquemas de iluminación artística</li>
                        <li><i class="bi bi-check-circle-fill text-warning me-2"></i> 25 Fotos editadas de alta moda</li>
                        <li><i class="bi bi-check-circle-fill text-warning me-2"></i> Asesoría de poses incluida</li>
                    </ul>
                    <a href="reservas.php?servicio=book_moda" class="btn btn-outline-dark w-100 mt-4">Cotizar o Reservar</a>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Preguntas Frecuentes (FAQ Accordion Bootstrap) -->
<section class="py-5 bg-light">
    <div class="container">
        <div class="text-center mb-5">
            <h6 class="text-warning fw-bold text-uppercase">Resolvemos tus dudas</h6>
            <h2 class="fw-bold text-dark">Preguntas Frecuentes</h2>
        </div>

        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div class="accordion shadow-sm" id="accordionFaq">
                    <div class="accordion-item border-0 mb-3 rounded overflow-hidden">
                        <h2 class="accordion-header">
                            <button class="accordion-button fw-bold" type="button" data-bs-toggle="collapse" data-bs-target="#faq1">
                                ¿Con cuánta anticipación debo reservar mi sesión o evento?
                            </button>
                        </h2>
                        <div id="faq1" class="accordion-collapse collapse show" data-bs-parent="#accordionFaq">
                            <div class="accordion-body text-secondary small">
                                Para bodas y eventos de XV años recomendamos reservar de 3 a 6 meses antes para asegurar fecha. Para sesiones en estudio o retratos ejecutivos, basta con 3 a 5 días hábiles de anticipación.
                            </div>
                        </div>
                    </div>

                    <div class="accordion-item border-0 mb-3 rounded overflow-hidden">
                        <h2 class="accordion-header">
                            <button class="accordion-button collapsed fw-bold" type="button" data-bs-toggle="collapse" data-bs-target="#faq2">
                                ¿Cómo y cuándo se realiza la entrega de las fotografías?
                            </button>
                        </h2>
                        <div id="faq2" class="accordion-collapse collapse" data-bs-parent="#accordionFaq">
                            <div class="accordion-body text-secondary small">
                                Las sesiones en estudio se entregan entre 3 y 5 días hábiles. Las coberturas de bodas y eventos sociales toman de 15 a 20 días hábiles debido al detallado proceso de selección, corrección de color y retoque fino. Todas las fotografías se entregan en alta resolución sin marcas de agua.
                            </div>
                        </div>
                    </div>

                    <div class="accordion-item border-0 mb-3 rounded overflow-hidden">
                        <h2 class="accordion-header">
                            <button class="accordion-button collapsed fw-bold" type="button" data-bs-toggle="collapse" data-bs-target="#faq3">
                                ¿Se requiere algún anticipo para apartar mi fecha?
                            </button>
                        </h2>
                        <div id="faq3" class="accordion-collapse collapse" data-bs-parent="#accordionFaq">
                            <div class="accordion-body text-secondary small">
                                Sí, se solicita un anticipo del 30% al firmar o confirmar la reserva, y el saldo restante se liquida el día del evento o al momento de la sesión fotográfica.
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<?php
require_once 'includes/footer.php';
?>
