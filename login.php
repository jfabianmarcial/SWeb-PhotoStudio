<?php
// login.php - Formulario de Inicio de Sesión
$page_title = 'Iniciar Sesión';
$page_css = 'login.css';
$page_js = 'auth.js';

require_once 'includes/config.php';

// Si el usuario ya está autenticado, redirigir al panel de control
if (isAuthenticated()) {
    header('Location: dashboard.php');
    exit;
}

require_once 'includes/header.php';

$flash_success = $_SESSION['flash_success'] ?? null;
$flash_error = $_SESSION['flash_error'] ?? null;
unset($_SESSION['flash_success'], $_SESSION['flash_error']);
?>

<div class="auth-wrapper">
    <div class="auth-card">
        <!-- Cabecera del formulario -->
        <div class="auth-header">
            <div class="d-flex justify-content-center align-items-center gap-2 mb-2">
                <i class="bi bi-camera2 text-warning fs-3"></i>
                <span class="auth-logo">LUMIÈRE STUDIO</span>
            </div>
            <p class="text-white-50 small mb-0">Ingresa a tu cuenta para gestionar tus citas y sesiones</p>
        </div>

        <!-- Cuerpo del formulario -->
        <div class="auth-body">

            <!-- Mensajes Flash de Sesión -->
            <?php if ($flash_success): ?>
                <div class="alert alert-success alert-dismissible fade show small py-2" role="alert">
                    <i class="bi bi-check-circle-fill me-1"></i> <?php echo htmlspecialchars($flash_success); ?>
                    <button type="button" class="btn-close py-2" data-bs-dismiss="alert"></button>
                </div>
            <?php endif; ?>

            <?php if ($flash_error): ?>
                <div class="alert alert-danger alert-dismissible fade show small py-2" role="alert">
                    <i class="bi bi-exclamation-triangle-fill me-1"></i> <?php echo htmlspecialchars($flash_error); ?>
                    <button type="button" class="btn-close py-2" data-bs-dismiss="alert"></button>
                </div>
            <?php endif; ?>

            <form action="actions/auth_process.php" method="POST">
                <input type="hidden" name="action" value="login">

                <div class="mb-3">
                    <label for="email" class="form-label fw-semibold small">Correo Electrónico</label>
                    <div class="input-group">
                        <span class="input-group-text bg-light"><i class="bi bi-envelope text-muted"></i></span>
                        <input type="email" class="form-control" id="email" name="email" required placeholder="correo@ejemplo.com" autofocus>
                    </div>
                </div>

                <div class="mb-3">
                    <div class="d-flex justify-content-between align-items-center mb-1">
                        <label for="password" class="form-label fw-semibold small mb-0">Contraseña</label>
                        <a href="#" class="small text-muted text-decoration-none" onclick="alert('Para demostración, utiliza las credenciales que aparecen en el recuadro inferior.'); return false;">¿Olvidaste tu contraseña?</a>
                    </div>
                    <div class="input-group">
                        <span class="input-group-text bg-light"><i class="bi bi-lock text-muted"></i></span>
                        <input type="password" class="form-control" id="password" name="password" required placeholder="••••••••">
                        <button class="btn btn-outline-secondary toggle-password" type="button" data-target="password">
                            <i class="bi bi-eye"></i>
                        </button>
                    </div>
                </div>

                <div class="mb-3 form-check">
                    <input type="checkbox" class="form-check-input" id="rememberMe">
                    <label class="form-check-label small text-muted" for="rememberMe">Recordar mis datos</label>
                </div>

                <div class="d-grid mt-4">
                    <button type="submit" class="btn btn-gold btn-lg fw-bold shadow-sm">
                        <i class="bi bi-box-arrow-in-right me-2"></i> Iniciar Sesión
                    </button>
                </div>
            </form>

            <!-- Credenciales de prueba para facilitar revisión -->
            <div class="mt-4 p-3 bg-light rounded-3 border small">
                <div class="fw-bold text-dark mb-1"><i class="bi bi-info-circle text-primary me-1"></i> Cuentas de Demostración:</div>
                <div class="text-muted"><strong>Admin:</strong> admin@lumierephoto.com | admin123</div>
                <div class="text-muted"><strong>Cliente:</strong> cliente@gmail.com | cliente123</div>
            </div>
        </div>

        <!-- Pie de tarjeta -->
        <div class="auth-footer">
            ¿Aún no tienes cuenta? <a href="registro.php" class="text-warning fw-bold text-decoration-none">Regístrate aquí</a>
        </div>
    </div>
</div>

<?php
require_once 'includes/footer.php';
?>
