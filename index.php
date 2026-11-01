<?php
// index.php - Página principal del Estudio Fotográfico
$page_title = 'Inicio';
$page_css = 'index.css';

require_once 'includes/header.php';
?>

<!-- 1. Hero Section -->
<section class="hero-section py-5">
    <div class="container py-lg-5">
        <div class="row align-items-center min-vh-75">
            <div class="col-lg-8 mx-auto text-center">
                <span class="badge bg-warning text-dark px-3 py-2 rounded-pill fw-bold mb-3 text-uppercase tracking-wider">
                    <i class="bi bi-star-fill me-1"></i> Estudio Fotográfico Profesional
                </span>
                <h1 class="hero-title mb-4">
                    Inmortalizamos tus mejores momentos con <span>elegancia & arte</span>
                </h1>
                <p class="hero-subtitle mx-auto mb-4">
                    Especialistas en bodas, sesiones de XV años, retratos en estudio y cobertura de eventos exclusivos con calidad cinematográfica.
                </p>
                <div class="d-flex flex-wrap justify-content-center gap-3">
                    <a href="reservas.php" class="btn btn-gold btn-lg px-4 py-3 shadow">
                        <i class="bi bi-calendar-event me-2"></i> Agendar una Sesión
                    </a>
                    <a href="galeria.php" class="btn btn-outline-light btn-lg px-4 py-3">
                        <i class="bi bi-images me-2"></i> Ver Portafolio
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- 2. Métricas / Resumen rápido -->
<section class="py-4 bg-light border-bottom">
    <div class="container">
        <div class="row text-center g-4">
            <div class="col-6 col-md-3">
                <h3 class="fw-bold mb-0 text-dark">+8 Años</h3>
                <small class="text-muted fw-semibold">De Experiencia</small>
            </div>
            <div class="col-6 col-md-3">
                <h3 class="fw-bold mb-0 text-dark">+1,200</h3>
                <small class="text-muted fw-semibold">Sesiones Realizadas</small>
            </div>
            <div class="col-6 col-md-3">
                <h3 class="fw-bold mb-0 text-dark">100%</h3>
                <small class="text-muted fw-semibold">Clientes Satisfechos</small>
            </div>
            <div class="col-6 col-md-3">
                <h3 class="fw-bold mb-0 text-dark">4K / HDR</h3>
                <small class="text-muted fw-semibold">Calidad de Entrega</small>
            </div>
        </div>
    </div>
</section>

<!-- 3. Servicios Destacados -->
<section class="py-5">
    <div class="container py-4">
        <div class="text-center mb-5">
            <h6 class="text-warning fw-bold text-uppercase">Nuestras Especialidades</h6>
            <h2 class="fw-bold text-dark">Servicios Fotográficos</h2>
            <p class="text-muted mx-auto" style="max-width: 600px;">
                Ofrecemos paquetes personalizados adaptados a cada momento irrepetible de tu vida.
            </p>
        </div>

        <div class="row g-4">
            <!-- Servicio 1: Bodas -->
            <div class="col-md-6 col-lg-3">
                <div class="card h-100 featured-card shadow-sm border-0">
                    <img src="https://images.unsplash.com/photo-1519741497674-611481863552?auto=format&fit=crop&w=700&q=80" class="card-img-top" alt="Fotografía de Bodas" style="height: 220px; object-fit: cover;">
                    <div class="card-body d-flex flex-column">
                        <h5 class="card-title fw-bold">Bodas & Nupcial</h5>
                        <p class="card-text text-muted small flex-grow-1">
                            Cobertura integral de ceremonia, recepción y sesión pre-boda con edición de alta gama.
                        </p>
                        <a href="servicios.php#bodas" class="btn btn-outline-dark btn-sm mt-3 w-100">Ver Paquetes</a>
                    </div>
                </div>
            </div>

            <!-- Servicio 2: Quinceañeras -->
            <div class="col-md-6 col-lg-3">
                <div class="card h-100 featured-card shadow-sm border-0">
                    <img src="https://images.unsplash.com/photo-1534528741775-53994a69daeb?auto=format&fit=crop&w=700&q=80" class="card-img-top" alt="Sesión de XV Años" style="height: 220px; object-fit: cover;">
                    <div class="card-body d-flex flex-column">
                        <h5 class="card-title fw-bold">Sesiones de XV Años</h5>
                        <p class="card-text text-muted small flex-grow-1">
                            Locaciones de ensueño, cambios de vestuario y books fotográficos impresos premium.
                        </p>
                        <a href="servicios.php#xv" class="btn btn-outline-dark btn-sm mt-3 w-100">Ver Paquetes</a>
                    </div>
                </div>
            </div>

            <!-- Servicio 3: Retrato en Estudio -->
            <div class="col-md-6 col-lg-3">
                <div class="card h-100 featured-card shadow-sm border-0">
                    <img src="https://images.unsplash.com/photo-1544005313-94ddf0286df2?auto=format&fit=crop&w=700&q=80" class="card-img-top" alt="Retrato Profesional" style="height: 220px; object-fit: cover;">
                    <div class="card-body d-flex flex-column">
                        <h5 class="card-title fw-bold">Retratos en Estudio</h5>
                        <p class="card-text text-muted small flex-grow-1">
                            Iluminación controlada, fondos profesionales para perfiles ejecutivos, graduaciones o modelaje.
                        </p>
                        <a href="servicios.php#estudio" class="btn btn-outline-dark btn-sm mt-3 w-100">Ver Paquetes</a>
                    </div>
                </div>
            </div>

            <!-- Servicio 4: Eventos Sociales / Corporativos -->
            <div class="col-md-6 col-lg-3">
                <div class="card h-100 featured-card shadow-sm border-0">
                    <img src="https://images.unsplash.com/photo-1511578314322-379afb476865?auto=format&fit=crop&w=700&q=80" class="card-img-top" alt="Eventos Corporativos" style="height: 220px; object-fit: cover;">
                    <div class="card-body d-flex flex-column">
                        <h5 class="card-title fw-bold">Eventos & Marcas</h5>
                        <p class="card-text text-muted small flex-grow-1">
                            Cobertura de conferencias, aniversarios de empresa y fotografía de productos comerciales.
                        </p>
                        <a href="servicios.php#corporativo" class="btn btn-outline-dark btn-sm mt-3 w-100">Ver Paquetes</a>
                    </div>
                </div>
            </div>
        </div>

        <div class="text-center mt-5">
            <a href="servicios.php" class="btn btn-outline-dark px-4 py-2">
                Explorar todos los servicios y tarifas <i class="bi bi-arrow-right ms-2"></i>
            </a>
        </div>
    </div>
</section>

<!-- 4. Banner CTA Cotización -->
<section class="py-5 bg-dark text-white cta-banner">
    <div class="container py-3">
        <div class="row align-items-center">
            <div class="col-lg-8">
                <h3 class="fw-bold mb-2 text-warning">¿Tienes una fecha especial en mente?</h3>
                <p class="mb-lg-0 text-secondary">
                    Nuestra agenda se reserva con anticipación. Asegura la disponibilidad de nuestros fotógrafos hoy mismo.
                </p>
            </div>
            <div class="col-lg-4 text-lg-end">
                <a href="reservas.php" class="btn btn-gold btn-lg">
                    <i class="bi bi-calendar2-check me-2"></i> Cotizar sin Compromiso
                </a>
            </div>
        </div>
    </div>
</section>

<!-- 5. Testimonios -->
<section class="py-5 bg-light">
    <div class="container py-4">
        <div class="text-center mb-5">
            <h6 class="text-warning fw-bold text-uppercase">Opiniones Reales</h6>
            <h2 class="fw-bold text-dark">Lo que dicen nuestros clientes</h2>
        </div>

        <div class="row g-4">
            <div class="col-md-4">
                <div class="card h-100 p-4 border-0 shadow-sm rounded-4">
                    <div class="text-warning mb-3">
                        <i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i>
                    </div>
                    <p class="text-muted fst-italic mb-4">
                        "Contratamos a Lumière para nuestra boda y no pudimos tomar mejor decisión. Capturaron cada emoción sin ser invasivos. ¡Las fotos quedaron de ensueño!"
                    </p>
                    <div class="d-flex align-items-center gap-3">
                        <div class="rounded-circle bg-dark text-white d-flex align-items-center justify-content-center fw-bold" style="width: 45px; height: 45px;">
                            MC
                        </div>
                        <div>
                            <h6 class="mb-0 fw-bold">Mariana & Carlos</h6>
                            <small class="text-muted">Boda en Hacienda</small>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="card h-100 p-4 border-0 shadow-sm rounded-4">
                    <div class="text-warning mb-3">
                        <i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i>
                    </div>
                    <p class="text-muted fst-italic mb-4">
                        "La sesión de XV años de mi hija fue maravillosa. El equipo la hizo sentir con mucha confianza y la entrega del álbum impreso fue súper rápida y de calidad."
                    </p>
                    <div class="d-flex align-items-center gap-3">
                        <div class="rounded-circle bg-warning text-dark d-flex align-items-center justify-content-center fw-bold" style="width: 45px; height: 45px;">
                            VR
                        </div>
                        <div>
                            <h6 class="mb-0 fw-bold">Valeria Ramírez</h6>
                            <small class="text-muted">Sesión de XV Años</small>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="card h-100 p-4 border-0 shadow-sm rounded-4">
                    <div class="text-warning mb-3">
                        <i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i>
                    </div>
                    <p class="text-muted fst-italic mb-4">
                        "Excelente trabajo en las fotografías de producto y retratos corporativos para mi empresa. Puntualidad impecable y muy profesionales con la iluminación."
                    </p>
                    <div class="d-flex align-items-center gap-3">
                        <div class="rounded-circle bg-secondary text-white d-flex align-items-center justify-content-center fw-bold" style="width: 45px; height: 45px;">
                            AG
                        </div>
                        <div>
                            <h6 class="mb-0 fw-bold">Alejandro Gómez</h6>
                            <small class="text-muted">Retrato Corporativo</small>
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
