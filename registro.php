<?php
// registro.php - Formulario de Registro para Nuevos Clientes
$page_title = 'Crear Cuenta';
$page_css = 'registro.css';
$page_js = 'auth.js';

require_once 'includes/config.php';

if (isAuthenticated()) {
    header('Location: dashboard.php');
    exit;
}

require_once 'includes/header.php';

$flash_error = $_SESSION['flash_error'] ?? null;
unset($_SESSION['flash_error']);
?>

<div class="register-wrapper">
    <div class="register-card">
        <!-- Cabecera -->
        <div class="register-header">
            <div class="d-flex justify-content-center align-items-center gap-2 mb-2">
                <i class="bi bi-camera2 text-warning fs-3"></i>
                <span class="auth-logo">LUMIÈRE STUDIO</span>
            </div>
            <p class="text-white-50 small mb-0">Crea tu cuenta de cliente para gestionar y seguir tus reservas fotográficas</p>
        </div>

        <!-- Cuerpo del formulario -->
        <div class="register-body">

            <?php if ($flash_error): ?>
                <div class="alert alert-danger alert-dismissible fade show small py-2 mb-3" role="alert">
                    <i class="bi bi-exclamation-triangle-fill me-1"></i> <?php echo htmlspecialchars($flash_error); ?>
                    <button type="button" class="btn-close py-2" data-bs-dismiss="alert"></button>
                </div>
            <?php endif; ?>

            <form id="registerForm" action="actions/auth_process.php" method="POST">
                <input type="hidden" name="action" value="register">

                <div class="row g-3">
                    <div class="col-12">
                        <label for="regNombre" class="form-label fw-semibold small">Nombre Completo <span class="text-danger">*</span></label>
                        <div class="input-group">
                            <span class="input-group-text bg-light"><i class="bi bi-person text-muted"></i></span>
                            <input type="text" class="form-control" id="regNombre" name="nombre" required placeholder="Ej. Mariana Sánchez">
                        </div>
                    </div>

                    <div class="col-md-6">
                        <label for="regEmail" class="form-label fw-semibold small">Correo Electrónico <span class="text-danger">*</span></label>
                        <div class="input-group">
                            <span class="input-group-text bg-light"><i class="bi bi-envelope text-muted"></i></span>
                            <input type="email" class="form-control" id="regEmail" name="email" required placeholder="correo@ejemplo.com">
                        </div>
                    </div>

                    <div class="col-md-6">
                        <label for="regTelefono" class="form-label fw-semibold small">Teléfono / WhatsApp</label>
                        <div class="input-group">
                            <span class="input-group-text bg-light"><i class="bi bi-telephone text-muted"></i></span>
                            <input type="tel" class="form-control" id="regTelefono" name="telefono" placeholder="55 1234 5678">
                        </div>
                    </div>

                    <div class="col-md-6">
                        <label for="regPassword" class="form-label fw-semibold small">Contraseña <span class="text-danger">*</span></label>
                        <div class="input-group">
                            <span class="input-group-text bg-light"><i class="bi bi-lock text-muted"></i></span>
                            <input type="password" class="form-control" id="regPassword" name="password" required placeholder="Mínimo 6 caracteres" minlength="6">
                            <button class="btn btn-outline-secondary toggle-password" type="button" data-target="regPassword">
                                <i class="bi bi-eye"></i>
                            </button>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <label for="regPasswordConfirm" class="form-label fw-semibold small">Confirmar Contraseña <span class="text-danger">*</span></label>
                        <div class="input-group">
                            <span class="input-group-text bg-light"><i class="bi bi-shield-check text-muted"></i></span>
                            <input type="password" class="form-control" id="regPasswordConfirm" name="password_confirm" required placeholder="Repite tu contraseña">
                        </div>
                        <span id="passwordMatchMsg"></span>
                    </div>

                    <div class="col-12 mt-3">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" id="termsCheck" required>
                            <label class="form-check-label small text-muted" for="termsCheck">
                                Acepto los términos del servicio y las políticas de privacidad del estudio.
                            </label>
                        </div>
                    </div>

                    <div class="col-12 mt-4">
                        <button type="submit" class="btn btn-gold btn-lg w-100 fw-bold shadow-sm">
                            <i class="bi bi-person-check-fill me-2"></i> Crear Cuenta
                        </button>
                    </div>
                </div>
            </form>
        </div>

        <div class="auth-footer">
            ¿Ya tienes una cuenta registrada? <a href="login.php" class="text-warning fw-bold text-decoration-none">Inicia sesión</a>
        </div>
    </div>
</div>

<?php
require_once 'includes/footer.php';
?>
