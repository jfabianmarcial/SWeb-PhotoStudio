<?php
// actions/reserva_process.php - Procesamiento de reservas con manejo de sesiones PHP
require_once __DIR__ . '/../includes/config.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Sanitización de entradas del formulario
    $nombre = filter_input(INPUT_POST, 'nombre', FILTER_SANITIZE_SPECIAL_CHARS);
    $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
    $telefono = filter_input(INPUT_POST, 'telefono', FILTER_SANITIZE_SPECIAL_CHARS);
    $paquete = filter_input(INPUT_POST, 'paquete', FILTER_SANITIZE_SPECIAL_CHARS);
    $fecha = filter_input(INPUT_POST, 'fecha', FILTER_SANITIZE_SPECIAL_CHARS);
    $hora = filter_input(INPUT_POST, 'hora', FILTER_SANITIZE_SPECIAL_CHARS);
    $tipo_locacion = filter_input(INPUT_POST, 'tipo_locacion', FILTER_SANITIZE_SPECIAL_CHARS);
    $notas = filter_input(INPUT_POST, 'notas', FILTER_SANITIZE_SPECIAL_CHARS);
    $extras = isset($_POST['extras']) && is_array($_POST['extras']) ? $_POST['extras'] : [];

    // Validar campos requeridos
    if (empty($nombre) || empty($email) || empty($telefono) || empty($paquete) || empty($fecha) || empty($hora)) {
        $_SESSION['flash_error'] = 'Por favor completa todos los campos obligatorios del formulario.';
        header('Location: ../reservas.php');
        exit;
    }

    // Mapa de nombres de paquetes
    $nombres_paquetes = [
        'boda_esencial' => 'Boda Esencial ($8,500 MXN)',
        'boda_premier' => 'Boda Premier ($16,500 MXN)',
        'boda_diamante' => 'Boda Diamante ($26,000 MXN)',
        'xv_sesion' => 'XV Estudio & Locación ($5,500 MXN)',
        'xv_fiesta' => 'XV Fiesta Completa ($12,800 MXN)',
        'xv_completo' => 'XV Todo Incluido ($19,500 MXN)',
        'retrato_pro' => 'Retrato Profesional / LinkedIn ($1,800 MXN)',
        'sesion_familiar' => 'Sesión Familiar / Maternidad ($3,200 MXN)',
        'book_moda' => 'Book Modelaje & Moda ($4,500 MXN)'
    ];

    $paquete_texto = $nombres_paquetes[$paquete] ?? $paquete;

    // Inicializar lista de citas en sesión si no existe
    if (!isset($_SESSION['citas']) || !is_array($_SESSION['citas'])) {
        $_SESSION['citas'] = [];
    }

    // Crear nueva cita
    $nueva_cita = [
        'id' => 'RES-' . strtoupper(substr(uniqid(), -6)),
        'nombre' => $nombre,
        'email' => $email,
        'telefono' => $telefono,
        'paquete' => $paquete_texto,
        'fecha' => $fecha,
        'hora' => $hora,
        'locacion' => ($tipo_locacion === 'estudio') ? 'En Nuestro Estudio Físico' : 'Locación Exterior / Salón',
        'extras' => implode(', ', $extras),
        'notas' => $notas,
        'estado' => 'Pendiente', // Pendiente, Confirmada, Completada, Cancelada
        'creado_el' => date('d/m/Y H:i')
    ];

    // Guardar en la sesión del usuario
    $_SESSION['citas'][] = $nueva_cita;

    // Mensaje de éxito
    $_SESSION['flash_success'] = '¡Tu solicitud de reserva (' . $nueva_cita['id'] . ') fue registrada exitosamente! Nos pondremos en contacto contigo a la brevedad.';

    // Redirigir a la página de reservas con estado exitoso o a citas si ya tiene sesión
    if (isAuthenticated()) {
        header('Location: ../citas.php');
    } else {
        header('Location: ../reservas.php?success=1&id=' . urlencode($nueva_cita['id']));
    }
    exit;
} else {
    header('Location: ../reservas.php');
    exit;
}
