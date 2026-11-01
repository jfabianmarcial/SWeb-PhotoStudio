<?php
// dashboard.php - Panel de Control del Usuario / Administrador
require_once 'includes/config.php';

// Control de Sesión: Redirigir al login si no está autenticado
if (!isAuthenticated()) {
    $_SESSION['flash_error'] = 'Debes iniciar sesión para acceder al panel de control.';
    header('Location: login.php');
    exit;
}

$page_title = 'Panel de Control';
$page_css = 'dashboard.css';

require_once 'includes/header.php';

$flash_success = $_SESSION['flash_success'] ?? null;
unset($_SESSION['flash_success']);

// Obtener citas del usuario desde la sesión (o inicializar citas de ejemplo si es admin o nuevo)
if (!isset($_SESSION['citas']) || empty($_SESSION['citas'])) {
    $_SESSION['citas'] = [
        [
            'id' => 'RES-482910',
            'nombre' => $_SESSION['user_name'],
            'email' => $_SESSION['user_email'],
            'telefono' => $_SESSION['user_phone'] ?? '5512345678',
            'paquete' => 'Boda Premier ($16,500 MXN)',
            'fecha' => date('Y-m-d', strtotime('+7 days')),
            'hora' => '04:00 PM',
            'locacion' => 'Locación Exterior / Hacienda',
            'extras' => 'Dron 4K, Photobook',
            'notas' => 'Sesión en atardecer con vestido campestre.',
            'estado' => 'Confirmada',
            'creado_el' => date('d/m/Y')
        ],
        [
            'id' => 'RES-391823',
            'nombre' => $_SESSION['user_name'],
            'email' => $_SESSION['user_email'],
            'telefono' => $_SESSION['user_phone'] ?? '5512345678',
            'paquete' => 'Retrato Profesional ($1,800 MXN)',
            'fecha' => date('Y-m-d', strtotime('+14 days')),
            'hora' => '11:00 AM',
            'locacion' => 'En Nuestro Estudio Físico',
            'extras' => 'Ninguno',
            'notas' => 'Fondo gris para perfil de LinkedIn.',
            'estado' => 'Pendiente',
            'creado_el' => date('d/m/Y')
        ]
    ];
}

$total_citas = count($_SESSION['citas']);
$citas_confirmadas = count(array_filter($_SESSION['citas'], fn($c) => ($c['estado'] ?? '') === 'Confirmada'));
$citas_pendientes = count(array_filter($_SESSION['citas'], fn($c) => ($c['estado'] ?? '') === 'Pendiente'));
?>

<div class="dashboard-container">
    <div class="container">

        <!-- Mensajes Flash de Sesión -->
        <?php if ($flash_success): ?>
            <div class="alert alert-success alert-dismissible fade show shadow-sm mb-4" role="alert">
                <i class="bi bi-check-circle-fill me-2 fs-5"></i>
                <?php echo htmlspecialchars($flash_success); ?>
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
        <?php endif; ?>

        <!-- Encabezado de Bienvenida -->
        <div class="d-flex flex-wrap justify-content-between align-items-center mb-4 pb-2 border-bottom">
            <div>
                <span class="badge bg-warning text-dark px-3 py-1 rounded-pill fw-semibold mb-2 text-uppercase">
                    <i class="bi bi-shield-lock-fill me-1"></i> Sesión Iniciada: <?php echo ucfirst($_SESSION['user_role'] ?? 'Cliente'); ?>
                </span>
                <h2 class="fw-bold text-dark mb-1">
                    Hola, <?php echo htmlspecialchars(getCurrentUserName()); ?>
                </h2>
                <p class="text-muted small mb-0">Bienvenido a tu panel de control de Lumière Photo Studio</p>
            </div>
            <div class="d-flex gap-2 mt-3 mt-md-0">
                <a href="reservas.php" class="btn btn-gold shadow-sm">
                    <i class="bi bi-calendar-plus me-1"></i> Nueva Reserva
                </a>
                <a href="perfil.php" class="btn btn-outline-dark">
                    <i class="bi bi-gear me-1"></i> Mi Perfil
                </a>
            </div>
        </div>

        <!-- Tarjetas de Métricas (KPIs) -->
        <div class="row g-4 mb-4">
            <div class="col-md-6 col-lg-3">
                <div class="stat-card">
                    <div class="stat-icon gold">
                        <i class="bi bi-calendar3"></i>
                    </div>
                    <div>
                        <div class="stat-value"><?php echo $total_citas; ?></div>
                        <div class="stat-label">Total Reservas</div>
                    </div>
                </div>
            </div>

            <div class="col-md-6 col-lg-3">
                <div class="stat-card">
                    <div class="stat-icon green">
                        <i class="bi bi-check2-circle"></i>
                    </div>
                    <div>
                        <div class="stat-value"><?php echo $citas_confirmadas; ?></div>
                        <div class="stat-label">Confirmadas</div>
                    </div>
                </div>
            </div>

            <div class="col-md-6 col-lg-3">
                <div class="stat-card">
                    <div class="stat-icon blue">
                        <i class="bi bi-hourglass-split"></i>
                    </div>
                    <div>
                        <div class="stat-value"><?php echo $citas_pendientes; ?></div>
                        <div class="stat-label">Pendientes</div>
                    </div>
                </div>
            </div>

            <div class="col-md-6 col-lg-3">
                <div class="stat-card">
                    <div class="stat-icon gold">
                        <i class="bi bi-camera"></i>
                    </div>
                    <div>
                        <div class="stat-value">Activo</div>
                        <div class="stat-label">Estado de Cuenta</div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Tabla de Reservas Recientes -->
        <div class="dashboard-table-card mb-4">
            <div class="d-flex justify-content-between align-items-center mb-3">
                <h5 class="fw-bold mb-0 text-dark">
                    <i class="bi bi-clock-history text-warning me-2"></i> Reservas y Citas Programadas
                </h5>
                <a href="citas.php" class="btn btn-sm btn-outline-dark">
                    Ver todas las citas <i class="bi bi-arrow-right ms-1"></i>
                </a>
            </div>

            <div class="table-responsive">
                <table class="table table-hover align-middle mb-0">
                    <thead class="table-light">
                        <tr>
                            <th>Folio</th>
                            <th>Paquete Fotográfico</th>
                            <th>Fecha & Hora</th>
                            <th>Locación</th>
                            <th>Estado</th>
                            <th class="text-end">Acción</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach (array_slice($_SESSION['citas'], 0, 5) as $cita): ?>
                            <tr>
                                <td class="fw-bold text-dark"><?php echo htmlspecialchars($cita['id']); ?></td>
                                <td>
                                    <div class="fw-semibold"><?php echo htmlspecialchars($cita['paquete']); ?></div>
                                    <?php if (!empty($cita['extras'])): ?>
                                        <small class="text-muted"><i class="bi bi-plus text-warning"></i> <?php echo htmlspecialchars($cita['extras']); ?></small>
                                    <?php endif; ?>
                                </td>
                                <td>
                                    <div><i class="bi bi-calendar-event me-1 text-muted"></i> <?php echo htmlspecialchars($cita['fecha']); ?></div>
                                    <small class="text-muted"><i class="bi bi-clock me-1"></i> <?php echo htmlspecialchars($cita['hora']); ?></small>
                                </td>
                                <td>
                                    <small class="text-secondary"><?php echo htmlspecialchars($cita['locacion']); ?></small>
                                </td>
                                <td>
                                    <?php if (($cita['estado'] ?? '') === 'Confirmada'): ?>
                                        <span class="badge bg-success-subtle text-success border border-success-subtle px-2 py-1">Confirmada</span>
                                    <?php elseif (($cita['estado'] ?? '') === 'Pendiente'): ?>
                                        <span class="badge bg-warning-subtle text-warning-emphasis border border-warning-subtle px-2 py-1">Pendiente</span>
                                    <?php else: ?>
                                        <span class="badge bg-secondary-subtle text-secondary px-2 py-1"><?php echo htmlspecialchars($cita['estado']); ?></span>
                                    <?php endif; ?>
                                </td>
                                <td class="text-end">
                                    <a href="citas.php" class="btn btn-sm btn-light border" title="Ver detalle">
                                        <i class="bi bi-eye"></i>
                                    </a>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>

        <!-- Accesos Rápidos -->
        <div class="row g-4">
            <div class="col-md-4">
                <div class="card p-3 border-0 shadow-sm rounded-3">
                    <div class="d-flex align-items-center gap-3">
                        <div class="bg-warning text-dark p-3 rounded-3 fs-4">
                            <i class="bi bi-calendar-check"></i>
                        </div>
                        <div>
                            <h6 class="fw-bold mb-1">Mis Citas</h6>
                            <a href="citas.php" class="text-decoration-none small text-dark fw-semibold">Administrar reservas &rarr;</a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="card p-3 border-0 shadow-sm rounded-3">
                    <div class="d-flex align-items-center gap-3">
                        <div class="bg-dark text-warning p-3 rounded-3 fs-4">
                            <i class="bi bi-person-gear"></i>
                        </div>
                        <div>
                            <h6 class="fw-bold mb-1">Mi Cuenta</h6>
                            <a href="perfil.php" class="text-decoration-none small text-dark fw-semibold">Editar perfil y clave &rarr;</a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="card p-3 border-0 shadow-sm rounded-3">
                    <div class="d-flex align-items-center gap-3">
                        <div class="bg-light text-danger p-3 rounded-3 fs-4 border">
                            <i class="bi bi-box-arrow-right"></i>
                        </div>
                        <div>
                            <h6 class="fw-bold mb-1">Finalizar Sesión</h6>
                            <a href="actions/logout.php" class="text-decoration-none small text-danger fw-semibold">Cerrar sesión &rarr;</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>

<?php
require_once 'includes/footer.php';
?>
