<?php
// perfil.php - Perfil de Usuario y Seguridad
require_once 'includes/config.php';

if (!isAuthenticated()) {
    $_SESSION['flash_error'] = 'Inicia sesión para ver tu perfil.';
    header('Location: login.php');
    exit;
}

$page_title = 'Mi Perfil';
$page_css = 'perfil.css';

require_once 'includes/header.php';

$flash_success = $_SESSION['flash_success'] ?? null;
$flash_error = $_SESSION['flash_error'] ?? null;
unset($_SESSION['flash_success'], $_SESSION['flash_error']);

$nombre = $_SESSION['user_name'] ?? '';
$email = $_SESSION['user_email'] ?? '';
$telefono = $_SESSION['user_phone'] ?? '';
$rol = $_SESSION['user_role'] ?? 'cliente';
$total_citas = isset($_SESSION['citas']) ? count($_SESSION['citas']) : 0;
?>

<div class="py-5 bg-light min-vh-100">
    <div class="container">

        <!-- Mensajes Flash de Sesión -->
        <?php if ($flash_success): ?>
            <div class="alert alert-success alert-dismissible fade show shadow-sm mb-4" role="alert">
                <i class="bi bi-check-circle-fill me-2 fs-5"></i>
                <?php echo htmlspecialchars($flash_success); ?>
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
        <?php endif; ?>

        <?php if ($flash_error): ?>
            <div class="alert alert-danger alert-dismissible fade show shadow-sm mb-4" role="alert">
                <i class="bi bi-exclamation-triangle-fill me-2 fs-5"></i>
                <?php echo htmlspecialchars($flash_error); ?>
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
        <?php endif; ?>

        <!-- Encabezado -->
        <div class="mb-4">
            <a href="dashboard.php" class="text-muted text-decoration-none small">
                <i class="bi bi-arrow-left me-1"></i> Volver al Panel
            </a>
            <h2 class="fw-bold text-dark mt-1 mb-0">Mi Perfil de Usuario</h2>
            <small class="text-muted">Administra tu información personal y opciones de seguridad</small>
        </div>

        <div class="row g-4">
            <!-- Tarjeta Lateral de Información -->
            <div class="col-lg-4">
                <div class="profile-card p-4 text-center">
                    <div class="profile-avatar-wrapper shadow-sm">
                        <i class="bi bi-person"></i>
                    </div>

                    <h5 class="fw-bold text-dark mb-1"><?php echo htmlspecialchars($nombre); ?></h5>
                    <p class="text-muted small mb-2"><?php echo htmlspecialchars($email); ?></p>
                    <span class="badge bg-warning text-dark px-3 py-1 rounded-pill fw-semibold text-uppercase mb-3">
                        Rol: <?php echo htmlspecialchars($rol); ?>
                    </span>

                    <hr class="my-3">

                    <div class="text-start small text-secondary mb-4">
                        <div class="d-flex justify-content-between mb-2">
                            <span><i class="bi bi-calendar3 me-2"></i> Reservas Activas:</span>
                            <strong class="text-dark"><?php echo $total_citas; ?></strong>
                        </div>
                        <div class="d-flex justify-content-between mb-2">
                            <span><i class="bi bi-telephone me-2"></i> Teléfono:</span>
                            <strong class="text-dark"><?php echo !empty($telefono) ? htmlspecialchars($telefono) : 'No registrado'; ?></strong>
                        </div>
                        <div class="d-flex justify-content-between">
                            <span><i class="bi bi-shield-check me-2"></i> Estado:</span>
                            <span class="text-success fw-bold">Cuenta Activa</span>
                        </div>
                    </div>

                    <a href="actions/logout.php" class="btn btn-outline-danger w-100 btn-sm">
                        <i class="bi bi-box-arrow-right me-1"></i> Cerrar Sesión
                    </a>
                </div>
            </div>

            <!-- Formularios de Edición -->
            <div class="col-lg-8">
                <!-- 1. Formulario Datos Personales -->
                <div class="card p-4 border-0 shadow-sm rounded-4 mb-4">
                    <h5 class="fw-bold text-dark mb-3 pb-2 border-bottom">
                        <i class="bi bi-person-gear text-warning me-2"></i> Datos Personales
                    </h5>
                    <form action="actions/perfil_process.php" method="POST">
                        <input type="hidden" name="action" value="update_profile">

                        <div class="row g-3">
                            <div class="col-md-6">
                                <label for="perfilNombre" class="form-label fw-semibold small">Nombre Completo</label>
                                <input type="text" class="form-control" id="perfilNombre" name="nombre" value="<?php echo htmlspecialchars($nombre); ?>" required>
                            </div>

                            <div class="col-md-6">
                                <label for="perfilEmail" class="form-label fw-semibold small">Correo Electrónico</label>
                                <input type="email" class="form-control" id="perfilEmail" name="email" value="<?php echo htmlspecialchars($email); ?>" required>
                            </div>

                            <div class="col-md-6">
                                <label for="perfilTelefono" class="form-label fw-semibold small">Teléfono / WhatsApp</label>
                                <input type="tel" class="form-control" id="perfilTelefono" name="telefono" value="<?php echo htmlspecialchars($telefono); ?>" placeholder="Ej. 55 1234 5678">
                            </div>

                            <div class="col-md-6">
                                <label class="form-label fw-semibold small">Tipo de Cuenta</label>
                                <input type="text" class="form-control bg-light" value="<?php echo ucfirst($rol); ?>" disabled>
                            </div>

                            <div class="col-12 text-end mt-4">
                                <button type="submit" class="btn btn-gold fw-bold px-4 shadow-sm">
                                    <i class="bi bi-check2-circle me-1"></i> Guardar Cambios
                                </button>
                            </div>
                        </div>
                    </form>
                </div>

                <!-- 2. Formulario de Seguridad / Cambiar Contraseña -->
                <div class="card p-4 border-0 shadow-sm rounded-4">
                    <h5 class="fw-bold text-dark mb-3 pb-2 border-bottom">
                        <i class="bi bi-lock text-warning me-2"></i> Seguridad & Contraseña
                    </h5>
                    <form action="actions/perfil_process.php" method="POST">
                        <input type="hidden" name="action" value="change_password">

                        <div class="row g-3">
                            <div class="col-md-6">
                                <label for="nuevaPassword" class="form-label fw-semibold small">Nueva Contraseña</label>
                                <input type="password" class="form-control" id="nuevaPassword" name="nueva_password" required placeholder="Mínimo 6 caracteres" minlength="6">
                            </div>

                            <div class="col-md-6">
                                <label for="confirmarPassword" class="form-label fw-semibold small">Confirmar Nueva Contraseña</label>
                                <input type="password" class="form-control" id="confirmarPassword" name="confirmar_password" required placeholder="Repite la nueva contraseña" minlength="6">
                            </div>

                            <div class="col-12 text-end mt-4">
                                <button type="submit" class="btn btn-outline-dark fw-bold px-4">
                                    <i class="bi bi-shield-lock me-1"></i> Actualizar Contraseña
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>

    </div>
</div>

<?php
require_once 'includes/footer.php';
?>
