<?php
// nosotros.php - Quiénes Somos, Historia, Equipo y Tecnología
$page_title = 'Quiénes Somos';
$page_css = 'nosotros.css';

require_once 'includes/header.php';
?>

<!-- Cabecera de Página -->
<section class="about-hero text-center border-bottom">
    <div class="container py-4">
        <span class="about-badge mb-2 d-inline-block">Conoce Nuestro Estudio</span>
        <h1 class="display-5 fw-bold text-dark mb-3">Pasión por capturar lo irrepetible</h1>
        <p class="lead text-muted mx-auto" style="max-width: 700px;">
            Somos un equipo multidisciplinario de fotógrafos, cinematógrafos y editores apasionados por convertir instantes fugaces en recuerdos eternos.
        </p>
    </div>
</section>

<!-- Sección 1: Historia & Filosofía -->
<section class="py-5">
    <div class="container py-lg-4">
        <div class="row align-items-center g-5">
            <div class="col-lg-6">
                <div class="position-relative">
                    <img src="https://images.unsplash.com/photo-1554048612-b6a482bc67e5?auto=format&fit=crop&w=800&q=80" alt="Estudio Fotográfico" class="img-fluid rounded-4 shadow-lg w-100" style="object-fit: cover; height: 420px;">
                    <div class="position-absolute bottom-0 start-0 m-4 p-3 bg-white rounded-3 shadow d-none d-sm-flex align-items-center gap-3">
                        <div class="bg-warning text-dark p-3 rounded-circle">
                            <i class="bi bi-award-fill fs-4"></i>
                        </div>
                        <div>
                            <h6 class="mb-0 fw-bold">Premio Fotográfico 2024</h6>
                            <small class="text-muted">Mejor Cobertura Nupcial Regional</small>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-6">
                <span class="badge bg-warning text-dark px-3 py-2 rounded-pill fw-bold mb-3 text-uppercase">
                    Nuestra Trayectoria
                </span>
                <h2 class="fw-bold mb-3 text-dark">Más de 8 años creando arte con luz y emoción</h2>
                <p class="text-secondary">
                    Fundado en 2016, <strong>Lumière Photo Studio</strong> nació de la convicción de que la fotografía no debe ser sólo una pose estática, sino una experiencia auténtica y memorable.
                </p>
                <p class="text-secondary">
                    Nos especializamos tanto en sesiones íntimas de estudio como en grandes producciones para bodas de destino y eventos de gala. Cada imagen entregada pasa por un riguroso proceso de revelado digital y colorimetría profesional para garantizar tonos de piel naturales y armonías visuales dignas de galería.
                </p>

                <div class="row g-3 mt-3">
                    <div class="col-sm-6">
                        <div class="d-flex align-items-center gap-2">
                            <i class="bi bi-check-circle-fill text-warning fs-5"></i>
                            <span class="fw-semibold text-dark">Puntualidad en entregas</span>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="d-flex align-items-center gap-2">
                            <i class="bi bi-check-circle-fill text-warning fs-5"></i>
                            <span class="fw-semibold text-dark">Equipo 100% profesional</span>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="d-flex align-items-center gap-2">
                            <i class="bi bi-check-circle-fill text-warning fs-5"></i>
                            <span class="fw-semibold text-dark">Respaldos dobles de archivos</span>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="d-flex align-items-center gap-2">
                            <i class="bi bi-check-circle-fill text-warning fs-5"></i>
                            <span class="fw-semibold text-dark">Asesoría de estilismo y poses</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Sección 2: El Equipo Profesional -->
<section class="py-5 bg-light">
    <div class="container py-4">
        <div class="text-center mb-5">
            <span class="text-warning fw-bold text-uppercase">Talento Creativo</span>
            <h2 class="fw-bold text-dark">Conoce a Nuestros Fotógrafos</h2>
            <p class="text-muted mx-auto" style="max-width: 600px;">
                Profesionales certificados con amplia trayectoria en diferentes disciplinas visuales.
            </p>
        </div>

        <div class="row g-4">
            <!-- Fotógrafo 1 -->
            <div class="col-lg-3 col-md-6">
                <div class="team-card h-100">
                    <div class="team-img-wrapper">
                        <img src="https://images.unsplash.com/photo-1534528741775-53994a69daeb?auto=format&fit=crop&w=600&q=80" alt="Valeria Mendoza">
                    </div>
                    <div class="p-4 text-center">
                        <h5 class="fw-bold mb-1">Valeria Mendoza</h5>
                        <p class="team-role mb-2">Directora Creativa & Bodas</p>
                        <p class="small text-muted mb-0">8 años capturando sonrisas y miradas únicas en bodas y ceremonias.</p>
                    </div>
                </div>
            </div>

            <!-- Fotógrafo 2 -->
            <div class="col-lg-3 col-md-6">
                <div class="team-card h-100">
                    <div class="team-img-wrapper">
                        <img src="https://images.unsplash.com/photo-1507003211169-0a1dd7228f2d?auto=format&fit=crop&w=600&q=80" alt="Carlos Estrada">
                    </div>
                    <div class="p-4 text-center">
                        <h5 class="fw-bold mb-1">Carlos Estrada</h5>
                        <p class="team-role mb-2">Especialista en Estudio & Retratos</p>
                        <p class="small text-muted mb-0">Maestro de la luz artificial, perfiles corporativos y books de moda.</p>
                    </div>
                </div>
            </div>

            <!-- Fotógrafo 3 -->
            <div class="col-lg-3 col-md-6">
                <div class="team-card h-100">
                    <div class="team-img-wrapper">
                        <img src="https://images.unsplash.com/photo-1517841905240-472988babdf9?auto=format&fit=crop&w=600&q=80" alt="Sofía Navarro">
                    </div>
                    <div class="p-4 text-center">
                        <h5 class="fw-bold mb-1">Sofía Navarro</h5>
                        <p class="team-role mb-2">Fotógrafa de XV Años & Maternidad</p>
                        <p class="small text-muted mb-0">Empatía, dinamismo y dirección creativa para sesiones juveniles y familiares.</p>
                    </div>
                </div>
            </div>

            <!-- Fotógrafo 4 -->
            <div class="col-lg-3 col-md-6">
                <div class="team-card h-100">
                    <div class="team-img-wrapper">
                        <img src="https://images.unsplash.com/photo-1500648767791-00dcc994a43e?auto=format&fit=crop&w=600&q=80" alt="Mateo Ríos">
                    </div>
                    <div class="p-4 text-center">
                        <h5 class="fw-bold mb-1">Mateo Ríos</h5>
                        <p class="team-role mb-2">Cinematógrafo & Piloto de Dron</p>
                        <p class="small text-muted mb-0">Especialista en video 4K cinematográfico y tomas aéreas espectaculares.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Sección 3: Equipo Técnico & Cámaras -->
<section class="py-5">
    <div class="container py-4">
        <div class="row align-items-center g-5">
            <div class="col-lg-6">
                <span class="badge bg-warning text-dark px-3 py-2 rounded-pill fw-bold mb-3 text-uppercase">
                    Tecnología de Punta
                </span>
                <h2 class="fw-bold mb-4 text-dark">Nuestro Equipo & Herramientas</h2>
                <p class="text-secondary mb-4">
                    Para lograr la máxima fidelidad de color, definición y nitidez en cada fotografía, utilizamos equipo de grado cinematográfico y fotográfico líder en el mundo.
                </p>

                <div class="row g-3">
                    <div class="col-12">
                        <div class="equipment-box">
                            <h6 class="fw-bold text-dark mb-1"><i class="bi bi-camera-fill text-warning me-2"></i> Cámaras Sony Alpha & Canon EOS R Full-Frame</h6>
                            <small class="text-muted">Sensores de hasta 61 megapíxeles para un nivel de detalle insuperable incluso en impresiones de gran formato.</small>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="equipment-box">
                            <h6 class="fw-bold text-dark mb-1"><i class="bi bi-sun-fill text-warning me-2"></i> Iluminación de Estudio Profoto & Godox</h6>
                            <small class="text-muted">Flashes de sincronización de alta velocidad, modificadores parabólicos y cajas de luz para iluminar suavemente la piel.</small>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="equipment-box">
                            <h6 class="fw-bold text-dark mb-1"><i class="bi bi-airplane-fill text-warning me-2"></i> Drones DJI Mavic Pro</h6>
                            <small class="text-muted">Tomas aéreas estabilizadas en resolución 4K HDR para haciendas, jardines y locaciones exteriores.</small>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-6">
                <img src="https://images.unsplash.com/photo-1516035069371-29a1b244cc32?auto=format&fit=crop&w=800&q=80" alt="Cámara y Lentes Fotográficos" class="img-fluid rounded-4 shadow-lg w-100" style="object-fit: cover; height: 440px;">
            </div>
        </div>
    </div>
</section>

<!-- Sección 4: Instalaciones del Estudio -->
<section class="py-5 bg-dark text-white">
    <div class="container text-center py-4">
        <span class="text-warning fw-bold text-uppercase">Instalaciones</span>
        <h2 class="display-6 fw-bold mb-3">Visita Nuestro Estudio Físico</h2>
        <p class="lead text-white-50 mx-auto mb-4" style="max-width: 650px;">
            Contamos con ciclorama blanco infinito, fondos de colores intercambiables, área de maquillaje con espejos de camerino y sala climatizada de espera para clientes.
        </p>
        <div class="d-flex justify-content-center gap-3">
            <a href="contacto.php" class="btn btn-gold btn-lg px-4">
                <i class="bi bi-geo-alt-fill me-2"></i> Ver Ubicación y Horarios
            </a>
            <a href="reservas.php" class="btn btn-outline-light btn-lg px-4">
                <i class="bi bi-calendar2-check me-2"></i> Agendar Cita
            </a>
        </div>
    </div>
</section>

<?php
require_once 'includes/footer.php';
?>
