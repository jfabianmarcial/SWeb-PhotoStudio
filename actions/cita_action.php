<?php
// actions/cita_action.php - Modificar estado de una cita en la sesión
require_once __DIR__ . '/../includes/config.php';

if (!isAuthenticated()) {
    header('Location: ../login.php');
    exit;
}

$id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_SPECIAL_CHARS);
$action = filter_input(INPUT_GET, 'action', FILTER_SANITIZE_SPECIAL_CHARS);

if ($id && $action && isset($_SESSION['citas']) && is_array($_SESSION['citas'])) {
    foreach ($_SESSION['citas'] as &$cita) {
        if ($cita['id'] === $id) {
            if ($action === 'confirmar') {
                $cita['estado'] = 'Confirmada';
                $_SESSION['flash_success'] = "La reserva {$id} ha sido confirmada satisfactoriamente.";
            } elseif ($action === 'cancelar') {
                $cita['estado'] = 'Cancelada';
                $_SESSION['flash_success'] = "La reserva {$id} ha sido cancelada.";
            } elseif ($action === 'eliminar') {
                $_SESSION['citas'] = array_filter($_SESSION['citas'], fn($c) => $c['id'] !== $id);
                $_SESSION['flash_success'] = "La reserva {$id} fue eliminada del sistema.";
                break;
            }
            break;
        }
    }
}

header('Location: ../citas.php');
exit;
