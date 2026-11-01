<?php
// contacto.php - Página de Contacto, Ubicación y Mensajes
$page_title = 'Contacto';
$page_css = 'contacto.css';

require_once 'includes/header.php';

$flash_success = $_SESSION['flash_success'] ?? null;
$flash_error = $_SESSION['flash_error'] ?? null;
unset($_SESSION['flash_success'], $_SESSION['flash_error']);

$nombre_defecto = $_SESSION['user_name'] ?? '';
$email_defecto = $_SESSION['user_email'] ?? '';
?>

<!-- Cabecera de Página -->
<section class="py-5 bg-dark text-white text-center">
    <div class="container py-3">
        <span class="badge bg-warning text-dark px-3 py-2 rounded-pill fw-bold mb-2 text-uppercase">
            Estamos para Ayudarte
        </span>
        <h1 class="display-5 fw-bold mb-3">Ponte en Contacto</h1>
        <p class="lead text-light opacity-75 mx-auto" style="max-width: 650px;">
            ¿Tienes alguna consulta especial, quieres visitar el estudio o necesitas una cotización personalizada? Escríbenos o visítanos.
        </p>
    </div>
</section>

<!-- Contenido Principal -->
<section class="py-5">
    <div class="container">

        <!-- Mensajes Flash de Sesión -->
        <?php if ($flash_success): ?>
            <div class="alert alert-success alert-dismissible fade show shadow-sm mb-4" role="alert">
                <i class="bi bi-check-circle-fill me-2 fs-5"></i>
                <?php echo $flash_success; ?>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Cerrar"></button>
            </div>
        <?php endif; ?>

        <?php if ($flash_error): ?>
            <div class="alert alert-danger alert-dismissible fade show shadow-sm mb-4" role="alert">
                <i class="bi bi-exclamation-triangle-fill me-2 fs-5"></i>
                <?php echo $flash_error; ?>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Cerrar"></button>
            </div>
        <?php endif; ?>

        <!-- Tarjetas de Información Rápida -->
        <div class="row g-4 mb-5">
            <div class="col-md-6 col-lg-3">
                <div class="contact-info-card text-center">
                    <div class="contact-icon mx-auto">
                        <i class="bi bi-geo-alt-fill"></i>
                    </div>
                    <h6 class="fw-bold text-dark mb-1">Ubicación del Estudio</h6>
                    <p class="text-secondary small mb-0">Av. de las Artes #450, Col. Centro, Ciudad de México</p>
                </div>
            </div>

            <div class="col-md-6 col-lg-3">
                <div class="contact-info-card text-center">
                    <div class="contact-icon mx-auto">
                        <i class="bi bi-telephone-fill"></i>
                    </div>
                    <h6 class="fw-bold text-dark mb-1">Teléfono & WhatsApp</h6>
                    <p class="text-secondary small mb-0">+52 (55) 1234-5678<br>+52 (55) 9876-5432</p>
                </div>
            </div>

            <div class="col-md-6 col-lg-3">
                <div class="contact-info-card text-center">
                    <div class="contact-icon mx-auto">
                        <i class="bi bi-envelope-fill"></i>
                    </div>
                    <h6 class="fw-bold text-dark mb-1">Correo Electrónico</h6>
                    <p class="text-secondary small mb-0">contacto@lumierephoto.com<br>citas@lumierephoto.com</p>
                </div>
            </div>

            <div class="col-md-6 col-lg-3">
                <div class="contact-info-card text-center">
                    <div class="contact-icon mx-auto">
                        <i class="bi bi-clock-fill"></i>
                    </div>
                    <h6 class="fw-bold text-dark mb-1">Horario de Atención</h6>
                    <p class="text-secondary small mb-0">Lun - Vie: 9:00 AM - 7:00 PM<br>Sábados: 10:00 AM - 4:00 PM</p>
                </div>
            </div>
        </div>

        <div class="row g-5">
            <!-- Formulario de Contacto -->
            <div class="col-lg-6">
                <div class="contact-form-card">
                    <h4 class="fw-bold text-dark mb-2">Envíanos un Mensaje</h4>
                    <p class="text-muted small mb-4">Completa el formulario y un asesor se pondrá en contacto contigo.</p>

                    <form action="actions/contacto_process.php" method="POST" class="needs-validation">
                        <div class="row g-3">
                            <div class="col-md-6">
                                <label for="nombre" class="form-label fw-semibold">Tu Nombre <span class="text-danger">*</span></label>
                                <input type="text" class="form-control" id="nombre" name="nombre" value="<?php echo htmlspecialchars($nombre_defecto); ?>" required placeholder="Ej. Roberto Juárez">
                            </div>

                            <div class="col-md-6">
                                <label for="email" class="form-label fw-semibold">Correo Electrónico <span class="text-danger">*</span></label>
                                <input type="email" class="form-control" id="email" name="email" value="<?php echo htmlspecialchars($email_defecto); ?>" required placeholder="nombre@correo.com">
                            </div>

                            <div class="col-md-6">
                                <label for="telefono" class="form-label fw-semibold">Teléfono</label>
                                <input type="tel" class="form-control" id="telefono" name="telefono" placeholder="Ej. 55 1234 5678">
                            </div>

                            <div class="col-md-6">
                                <label for="asunto" class="form-label fw-semibold">Asunto <span class="text-danger">*</span></label>
                                <select class="form-select" id="asunto" name="asunto" required>
                                    <option value="" disabled selected>-- Elige un asunto --</option>
                                    <option value="Cotización Especial">Cotización Especial / Evento</option>
                                    <option value="Duda sobre Paquete">Duda sobre un paquete</option>
                                    <option value="Visita al Estudio">Agendar visita al estudio físico</option>
                                    <option value="Estado de Entrega">Consultar entrega de fotografías</option>
                                    <option value="Otro">Otro motivo</option>
                                </select>
                            </div>

                            <div class="col-12">
                                <label for="mensaje" class="form-label fw-semibold">Mensaje <span class="text-danger">*</span></label>
                                <textarea class="form-control" id="mensaje" name="mensaje" rows="4" required placeholder="Escribe aquí tu consulta o requerimiento..."></textarea>
                            </div>

                            <div class="col-12 mt-4">
                                <button type="submit" class="btn btn-gold btn-lg w-100 fw-bold shadow-sm">
                                    <i class="bi bi-send-fill me-2"></i> Enviar Mensaje
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

            <!-- Mapa y Pregunta Rápida -->
            <div class="col-lg-6">
                <div class="d-flex flex-column h-100">
                    <h4 class="fw-bold text-dark mb-2">Nuestra Ubicación</h4>
                    <p class="text-muted small mb-3">Encuéntranos en una zona céntrica y de fácil estacionamiento.</p>

                    <div class="map-responsive-container flex-grow-1 mb-4">
                        <iframe 
                            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3762.661739943477!2d-99.1686936850934!3d19.427020586887556!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x85d1ff35f5bd1563%3A0x6c366f0e2de02ff7!2sEl%20%C3%81ngel%20de%20la%20Independencia!5e0!3m2!1ses-419!2smx!4v1680000000000!5m2!1ses-419!2smx" 
                            allowfullscreen="" 
                            loading="lazy" 
                            referrerpolicy="no-referrer-when-downgrade">
                        </iframe>
                    </div>

                    <div class="p-3 bg-light rounded-3 border d-flex align-items-center justify-content-between">
                        <div>
                            <h6 class="mb-1 fw-bold text-dark">¿Quieres agendar tu fecha directamente?</h6>
                            <small class="text-muted">Calcula tu presupuesto sin compromiso en línea.</small>
                        </div>
                        <a href="reservas.php" class="btn btn-dark btn-sm px-3">Ir a Reservar</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<?php
require_once 'includes/footer.php';
?>
