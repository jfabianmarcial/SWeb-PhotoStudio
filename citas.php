<?php
// citas.php - Gestión y Control de Citas/Sesiones
require_once 'includes/config.php';

if (!isAuthenticated()) {
    $_SESSION['flash_error'] = 'Inicia sesión para ver y administrar tus citas.';
    header('Location: login.php');
    exit;
}

$page_title = 'Gestión de Citas';
$page_css = 'citas.css';

require_once 'includes/header.php';

$flash_success = $_SESSION['flash_success'] ?? null;
unset($_SESSION['flash_success']);

// Asegurar que exista la lista de citas en la sesión
if (!isset($_SESSION['citas'])) {
    $_SESSION['citas'] = [];
}

// Filtro por estado si viene por GET
$filtro = $_GET['filtro'] ?? 'todos';
$citas_mostradas = $_SESSION['citas'];

if ($filtro !== 'todos') {
    $citas_mostradas = array_filter($citas_mostradas, function($cita) use ($filtro) {
        return strtolower($cita['estado'] ?? '') === strtolower($filtro);
    });
}
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

        <!-- Encabezado -->
        <div class="d-flex flex-wrap justify-content-between align-items-center mb-4">
            <div>
                <a href="dashboard.php" class="text-muted text-decoration-none small">
                    <i class="bi bi-arrow-left me-1"></i> Volver al Panel
                </a>
                <h2 class="fw-bold text-dark mt-1 mb-0">Gestión de Citas & Sesiones</h2>
                <small class="text-muted">Consulta, confirma o cancela las sesiones fotográficas agendadas</small>
            </div>
            <div class="mt-3 mt-md-0">
                <a href="reservas.php" class="btn btn-gold shadow-sm">
                    <i class="bi bi-plus-circle me-1"></i> Agendar Otra Sesión
                </a>
            </div>
        </div>

        <!-- Filtros Rápidos -->
        <div class="card p-3 border-0 shadow-sm rounded-3 mb-4">
            <div class="d-flex flex-wrap align-items-center justify-content-between gap-3">
                <div class="btn-group" role="group">
                    <a href="citas.php?filtro=todos" class="btn btn-sm <?php echo ($filtro === 'todos') ? 'btn-dark' : 'btn-outline-secondary'; ?>">
                        Todas (<?php echo count($_SESSION['citas']); ?>)
                    </a>
                    <a href="citas.php?filtro=pendiente" class="btn btn-sm <?php echo ($filtro === 'pendiente') ? 'btn-warning' : 'btn-outline-secondary'; ?>">
                        Pendientes
                    </a>
                    <a href="citas.php?filtro=confirmada" class="btn btn-sm <?php echo ($filtro === 'confirmada') ? 'btn-success' : 'btn-outline-secondary'; ?>">
                        Confirmadas
                    </a>
                    <a href="citas.php?filtro=cancelada" class="btn btn-sm <?php echo ($filtro === 'cancelada') ? 'btn-danger' : 'btn-outline-secondary'; ?>">
                        Canceladas
                    </a>
                </div>

                <div class="small text-muted">
                    <i class="bi bi-info-circle me-1"></i> Las reservas se guardan en tu sesión activa.
                </div>
            </div>
        </div>

        <!-- Tarjeta y Tabla de Citas -->
        <div class="citas-card p-4">
            <?php if (empty($citas_mostradas)): ?>
                <div class="text-center py-5">
                    <div class="text-muted mb-3" style="font-size: 3.5rem;">
                        <i class="bi bi-calendar-x"></i>
                    </div>
                    <h5 class="fw-bold text-dark">No hay citas registradas con este filtro</h5>
                    <p class="text-muted small mb-4">Puedes agendar una nueva cita fotográfica en cualquier momento.</p>
                    <a href="reservas.php" class="btn btn-gold">
                        <i class="bi bi-calendar-plus me-1"></i> Agendar Mi Primera Cita
                    </a>
                </div>
            <?php else: ?>
                <div class="table-responsive">
                    <table class="table table-hover align-middle table-citas mb-0">
                        <thead>
                            <tr>
                                <th>Folio</th>
                                <th>Cliente / Contacto</th>
                                <th>Paquete Fotográfico</th>
                                <th>Fecha & Hora</th>
                                <th>Locación</th>
                                <th>Estado</th>
                                <th class="text-end">Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($citas_mostradas as $index => $c): ?>
                                <tr>
                                    <td>
                                        <span class="badge bg-dark px-2 py-1"><?php echo htmlspecialchars($c['id']); ?></span>
                                    </td>
                                    <td>
                                        <div class="fw-bold text-dark"><?php echo htmlspecialchars($c['nombre']); ?></div>
                                        <small class="text-muted"><i class="bi bi-envelope me-1"></i><?php echo htmlspecialchars($c['email']); ?></small><br>
                                        <small class="text-muted"><i class="bi bi-telephone me-1"></i><?php echo htmlspecialchars($c['telefono']); ?></small>
                                    </td>
                                    <td>
                                        <div class="fw-semibold"><?php echo htmlspecialchars($c['paquete']); ?></div>
                                        <?php if (!empty($c['extras'])): ?>
                                            <small class="text-warning-emphasis d-block">
                                                <i class="bi bi-plus-circle me-1"></i><?php echo htmlspecialchars($c['extras']); ?>
                                            </small>
                                        <?php endif; ?>
                                    </td>
                                    <td>
                                        <div class="fw-bold text-dark"><?php echo htmlspecialchars($c['fecha']); ?></div>
                                        <small class="text-muted"><?php echo htmlspecialchars($c['hora']); ?></small>
                                    </td>
                                    <td>
                                        <span class="small text-secondary"><?php echo htmlspecialchars($c['locacion']); ?></span>
                                    </td>
                                    <td>
                                        <?php 
                                            $st = strtolower($c['estado'] ?? 'pendiente');
                                            $badgeClass = 'badge-pendiente';
                                            if ($st === 'confirmada') $badgeClass = 'badge-confirmada';
                                            elseif ($st === 'cancelada') $badgeClass = 'badge-cancelada';
                                            elseif ($st === 'completada') $badgeClass = 'badge-completada';
                                        ?>
                                        <span class="badge-status <?php echo $badgeClass; ?>">
                                            <?php echo htmlspecialchars($c['estado']); ?>
                                        </span>
                                    </td>
                                    <td class="text-end">
                                        <div class="btn-group btn-group-sm">
                                            <!-- Ver detalle en modal -->
                                            <button type="button" class="btn btn-outline-dark" data-bs-toggle="modal" data-bs-target="#modalCita<?php echo $index; ?>" title="Ver Detalles">
                                                <i class="bi bi-eye"></i>
                                            </button>

                                            <!-- Confirmar cita -->
                                            <?php if (($c['estado'] ?? '') !== 'Confirmada'): ?>
                                                <a href="actions/cita_action.php?id=<?php echo urlencode($c['id']); ?>&action=confirmar" class="btn btn-outline-success" title="Confirmar Cita">
                                                    <i class="bi bi-check-lg"></i>
                                                </a>
                                            <?php endif; ?>

                                            <!-- Cancelar cita -->
                                            <?php if (($c['estado'] ?? '') !== 'Cancelada'): ?>
                                                <a href="actions/cita_action.php?id=<?php echo urlencode($c['id']); ?>&action=cancelar" class="btn btn-outline-warning" title="Cancelar Cita" onclick="return confirm('¿Seguro que deseas cancelar esta reserva?');">
                                                    <i class="bi bi-x-lg"></i>
                                                </a>
                                            <?php endif; ?>

                                            <!-- Eliminar cita -->
                                            <a href="actions/cita_action.php?id=<?php echo urlencode($c['id']); ?>&action=eliminar" class="btn btn-outline-danger" title="Eliminar Registro" onclick="return confirm('¿Eliminar definitivamente este registro?');">
                                                <i class="bi bi-trash"></i>
                                            </a>
                                        </div>
                                    </td>
                                </tr>

                                <!-- Modal Detalle de Cita -->
                                <div class="modal fade" id="modalCita<?php echo $index; ?>" tabindex="-1" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered">
                                        <div class="modal-content">
                                            <div class="modal-header bg-dark text-white">
                                                <h5 class="modal-title fs-6 fw-bold">
                                                    <i class="bi bi-receipt text-warning me-2"></i> Detalle de Cita: <?php echo htmlspecialchars($c['id']); ?>
                                                </h5>
                                                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
                                            </div>
                                            <div class="modal-body">
                                                <ul class="list-group list-group-flush small">
                                                    <li class="list-group-item d-flex justify-content-between">
                                                        <span class="text-muted">Cliente:</span>
                                                        <strong><?php echo htmlspecialchars($c['nombre']); ?></strong>
                                                    </li>
                                                    <li class="list-group-item d-flex justify-content-between">
                                                        <span class="text-muted">Correo:</span>
                                                        <span><?php echo htmlspecialchars($c['email']); ?></span>
                                                    </li>
                                                    <li class="list-group-item d-flex justify-content-between">
                                                        <span class="text-muted">Teléfono:</span>
                                                        <span><?php echo htmlspecialchars($c['telefono']); ?></span>
                                                    </li>
                                                    <li class="list-group-item d-flex justify-content-between">
                                                        <span class="text-muted">Paquete:</span>
                                                        <strong><?php echo htmlspecialchars($c['paquete']); ?></strong>
                                                    </li>
                                                    <li class="list-group-item d-flex justify-content-between">
                                                        <span class="text-muted">Fecha y Hora:</span>
                                                        <span><?php echo htmlspecialchars($c['fecha'] . ' a las ' . $c['hora']); ?></span>
                                                    </li>
                                                    <li class="list-group-item d-flex justify-content-between">
                                                        <span class="text-muted">Locación:</span>
                                                        <span><?php echo htmlspecialchars($c['locacion']); ?></span>
                                                    </li>
                                                    <li class="list-group-item d-flex justify-content-between">
                                                        <span class="text-muted">Extras:</span>
                                                        <span><?php echo !empty($c['extras']) ? htmlspecialchars($c['extras']) : 'Ninguno'; ?></span>
                                                    </li>
                                                    <li class="list-group-item">
                                                        <span class="text-muted d-block mb-1">Notas especiales:</span>
                                                        <div class="p-2 bg-light rounded text-secondary">
                                                            <?php echo !empty($c['notas']) ? htmlspecialchars($c['notas']) : 'Sin notas adicionales.'; ?>
                                                        </div>
                                                    </li>
                                                </ul>
                                            </div>
                                            <div class="modal-footer py-2">
                                                <button type="button" class="btn btn-secondary btn-sm" data-bs-dismiss="modal">Cerrar</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            <?php endif; ?>
        </div>

    </div>
</div>

<?php
require_once 'includes/footer.php';
?>
