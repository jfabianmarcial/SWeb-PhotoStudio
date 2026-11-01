<?php
// reservas.php - Formulario de Cotización y Reserva de Sesiones Fotográficas
$page_title = 'Reservar Cita';
$page_css = 'reservas.css';
$page_js = 'reservas.js';

require_once 'includes/header.php';

// Capturar mensajes de sesión (Flash Messages)
$flash_success = $_SESSION['flash_success'] ?? null;
$flash_error = $_SESSION['flash_error'] ?? null;
unset($_SESSION['flash_success'], $_SESSION['flash_error']);

// Pre-llenar si el usuario está logueado
$nombre_defecto = $_SESSION['user_name'] ?? '';
$email_defecto = $_SESSION['user_email'] ?? '';
?>

<!-- Cabecera de Página -->
<section class="py-5 bg-dark text-white text-center">
    <div class="container py-3">
        <span class="badge bg-warning text-dark px-3 py-2 rounded-pill fw-bold mb-2 text-uppercase">
            Agenda Tu Fecha
        </span>
        <h1 class="display-5 fw-bold mb-3">Reserva tu Sesión Fotográfica</h1>
        <p class="lead text-light opacity-75 mx-auto" style="max-width: 650px;">
            Elige el paquete ideal, selecciona la fecha y hora de tu preferencia y calcula tu cotización en tiempo real.
        </p>
    </div>
</section>

<!-- Contenido Principal: Formulario de Reserva -->
<section class="py-5">
    <div class="container">

        <!-- Mensajes Flash de Sesión -->
        <?php if ($flash_success): ?>
            <div class="alert alert-success alert-dismissible fade show shadow-sm mb-4" role="alert">
                <i class="bi bi-check-circle-fill me-2 fs-5"></i>
                <strong>¡Excelente!</strong> <?php echo htmlspecialchars($flash_success); ?>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Cerrar"></button>
            </div>
        <?php endif; ?>

        <?php if ($flash_error): ?>
            <div class="alert alert-danger alert-dismissible fade show shadow-sm mb-4" role="alert">
                <i class="bi bi-exclamation-triangle-fill me-2 fs-5"></i>
                <strong>Atención:</strong> <?php echo htmlspecialchars($flash_error); ?>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Cerrar"></button>
            </div>
        <?php endif; ?>

        <div class="booking-container">
            <div class="row g-0">
                <!-- Barra Lateral con Resumen de Precios -->
                <div class="col-lg-4 booking-sidebar d-flex flex-column justify-content-between">
                    <div>
                        <h4 class="fw-bold mb-4">
                            <i class="bi bi-receipt me-2"></i> Resumen de Cotización
                        </h4>

                        <div class="price-summary-box mb-4 text-dark">
                            <small class="text-muted text-uppercase fw-bold d-block mb-1">Paquete Seleccionado:</small>
                            <h6 class="fw-bold mb-3" id="displayPaqueteNombre">Ningún paquete seleccionado</h6>

                            <small class="text-muted text-uppercase fw-bold d-block mb-1">Precio Estimado:</small>
                            <div class="total-amount" id="displayTotal">$0 MXN</div>
                            <small class="text-muted d-block mt-2">* Cotización estimada antes de anticipo.</small>
                        </div>

                        <div class="text-light opacity-75 small">
                            <h6 class="text-warning fw-bold mb-2">¿Cómo funciona la reserva?</h6>
                            <ul class="ps-3 mb-0">
                                <li class="mb-2">Envías tu solicitud con fecha y detalles.</li>
                                <li class="mb-2">Verificamos la disponibilidad en el calendario.</li>
                                <li class="mb-2">Te contactamos por WhatsApp o llamada para confirmar y enviar el recibo de anticipo.</li>
                            </ul>
                        </div>
                    </div>

                    <div class="mt-4 pt-3 border-top border-secondary">
                        <small class="text-secondary d-block"><i class="bi bi-telephone-fill text-warning me-2"></i> ¿Dudas inmediatas? Llámanos: <strong>+52 (55) 1234-5678</strong></small>
                    </div>
                </div>

                <!-- Formulario Principal -->
                <div class="col-lg-8 p-4 p-md-5">
                    <form id="bookingForm" action="actions/reserva_process.php" method="POST" novalidate>
                        <!-- Paso 1: Datos de Contacto -->
                        <div class="mb-5">
                            <h5 class="fw-bold text-dark border-bottom pb-2 mb-4">
                                <i class="bi bi-person-lines-fill text-warning me-2"></i> 1. Tus Datos de Contacto
                            </h5>
                            <div class="row g-3">
                                <div class="col-md-6">
                                    <label for="nombre" class="form-label fw-semibold">Nombre Completo <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" id="nombre" name="nombre" value="<?php echo htmlspecialchars($nombre_defecto); ?>" required placeholder="Ej. Ana Lucía Morales">
                                    <div class="invalid-feedback">Por favor ingresa tu nombre.</div>
                                </div>

                                <div class="col-md-6">
                                    <label for="email" class="form-label fw-semibold">Correo Electrónico <span class="text-danger">*</span></label>
                                    <input type="email" class="form-control" id="email" name="email" value="<?php echo htmlspecialchars($email_defecto); ?>" required placeholder="ejemplo@correo.com">
                                    <div class="invalid-feedback">Ingresa un correo electrónico válido.</div>
                                </div>

                                <div class="col-md-6">
                                    <label for="telefono" class="form-label fw-semibold">Teléfono o WhatsApp <span class="text-danger">*</span></label>
                                    <input type="tel" class="form-control" id="telefono" name="telefono" required placeholder="Ej. 55 1234 5678">
                                    <div class="invalid-feedback">Ingresa tu número de teléfono.</div>
                                </div>

                                <div class="col-md-6">
                                    <label for="ciudad" class="form-label fw-semibold">Ciudad / Municipio</label>
                                    <input type="text" class="form-control" id="ciudad" name="ciudad" placeholder="Ej. Ciudad de México">
                                </div>
                            </div>
                        </div>

                        <!-- Paso 2: Detalles de la Sesión -->
                        <div class="mb-5">
                            <h5 class="fw-bold text-dark border-bottom pb-2 mb-4">
                                <i class="bi bi-camera-reels-fill text-warning me-2"></i> 2. Detalles de la Sesión
                            </h5>
                            <div class="row g-3">
                                <div class="col-12">
                                    <label for="selectPaquete" class="form-label fw-semibold">Selecciona tu Paquete <span class="text-danger">*</span></label>
                                    <select class="form-select form-select-lg" id="selectPaquete" name="paquete" required>
                                        <option value="" disabled selected>-- Elige un paquete fotográfico --</option>
                                        <optgroup label="Fotografía de Bodas">
                                            <option value="boda_esencial">Boda Esencial ($8,500 MXN)</option>
                                            <option value="boda_premier">Boda Premier ($16,500 MXN) [Recomendado]</option>
                                            <option value="boda_diamante">Boda Diamante ($26,000 MXN)</option>
                                        </optgroup>
                                        <optgroup label="Sesiones de XV Años">
                                            <option value="xv_sesion">XV Estudio & Locación ($5,500 MXN)</option>
                                            <option value="xv_fiesta">XV Fiesta Completa ($12,800 MXN)</option>
                                            <option value="xv_completo">XV Todo Incluido ($19,500 MXN)</option>
                                        </optgroup>
                                        <optgroup label="Retratos y Estudio">
                                            <option value="retrato_pro">Retrato Profesional / LinkedIn ($1,800 MXN)</option>
                                            <option value="sesion_familiar">Sesión Familiar / Maternidad ($3,200 MXN)</option>
                                            <option value="book_moda">Book Modelaje & Moda ($4,500 MXN)</option>
                                        </optgroup>
                                    </select>
                                    <div class="invalid-feedback">Selecciona el paquete deseado.</div>
                                </div>

                                <div class="col-md-6">
                                    <label for="fecha_evento" class="form-label fw-semibold">Fecha Deseada <span class="text-danger">*</span></label>
                                    <input type="date" class="form-control" id="fecha_evento" name="fecha" required>
                                    <div class="invalid-feedback">Selecciona una fecha válida a partir de mañana.</div>
                                </div>

                                <div class="col-md-6">
                                    <label for="hora" class="form-label fw-semibold">Horario Tentativo <span class="text-danger">*</span></label>
                                    <select class="form-select" id="hora" name="hora" required>
                                        <option value="" disabled selected>-- Elige horario --</option>
                                        <option value="10:00 AM">10:00 AM - Mañana</option>
                                        <option value="12:00 PM">12:00 PM - Mediodía</option>
                                        <option value="03:00 PM">03:00 PM - Tarde</option>
                                        <option value="05:30 PM">05:30 PM - Hora Dorada / Atardecer</option>
                                        <option value="07:00 PM">07:00 PM - Noche (Eventos)</option>
                                    </select>
                                    <div class="invalid-feedback">Elige un horario.</div>
                                </div>

                                <div class="col-12 mt-3">
                                    <label class="form-label fw-semibold d-block">Tipo de Locación</label>
                                    <div class="d-flex gap-4">
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="tipo_locacion" id="loc_estudio" value="estudio" checked>
                                            <label class="form-check-label" for="loc_estudio">
                                                En Nuestro Estudio Físico
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="tipo_locacion" id="loc_exterior" value="exterior">
                                            <label class="form-check-label" for="loc_exterior">
                                                En Locación Exterior / Salón de Eventos
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Paso 3: Servicios Adicionales (Extras) -->
                        <div class="mb-5">
                            <h5 class="fw-bold text-dark border-bottom pb-2 mb-4">
                                <i class="bi bi-plus-circle-fill text-warning me-2"></i> 3. Adicionales Opcionales
                            </h5>
                            <div class="row g-3">
                                <div class="col-md-6">
                                    <div class="form-check p-3 border rounded">
                                        <input class="form-check-input extra-service" type="checkbox" name="extras[]" value="Cuadro Enmarcado 60x90" id="extra1" data-precio="1500">
                                        <label class="form-check-label w-100" for="extra1">
                                            <strong>Cuadro Enmarcado 60x90 cm</strong>
                                            <span class="d-block text-muted small">+ $1,500 MXN</span>
                                        </label>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-check p-3 border rounded">
                                        <input class="form-check-input extra-service" type="checkbox" name="extras[]" value="Tomas Aéreas con Dron 4K" id="extra2" data-precio="2800">
                                        <label class="form-check-label w-100" for="extra2">
                                            <strong>Tomas Aéreas con Dron 4K</strong>
                                            <span class="d-block text-muted small">+ $2,800 MXN</span>
                                        </label>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-check p-3 border rounded">
                                        <input class="form-check-input extra-service" type="checkbox" name="extras[]" value="Photobook Pasta Dura 30x30" id="extra3" data-precio="2200">
                                        <label class="form-check-label w-100" for="extra3">
                                            <strong>Photobook Pasta Dura 30x30 cm</strong>
                                            <span class="d-block text-muted small">+ $2,200 MXN</span>
                                        </label>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-check p-3 border rounded">
                                        <input class="form-check-input extra-service" type="checkbox" name="extras[]" value="Maquillaje y Peinado Profesional" id="extra4" data-precio="1600">
                                        <label class="form-check-label w-100" for="extra4">
                                            <strong>Maquillaje & Peinado Profesional</strong>
                                            <span class="d-block text-muted small">+ $1,600 MXN</span>
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Paso 4: Notas adicionales -->
                        <div class="mb-4">
                            <label for="notas" class="form-label fw-semibold">Detalles Especiales o Mensaje para el Fotógrafo</label>
                            <textarea class="form-control" id="notas" name="notas" rows="3" placeholder="Cuéntanos sobre tu evento, número de invitados, temáticas o dudas que tengas..."></textarea>
                        </div>

                        <!-- Botón de Envío -->
                        <div class="d-grid gap-2">
                            <button type="submit" class="btn btn-gold btn-lg py-3 fw-bold shadow">
                                <i class="bi bi-send-check-fill me-2"></i> Confirmar Solicitud de Reserva
                            </button>
                            <small class="text-center text-muted mt-2">
                                <i class="bi bi-shield-check text-success me-1"></i> Tus datos están protegidos. No cobramos cargos automáticos.
                            </small>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>

<?php
require_once 'includes/footer.php';
?>
