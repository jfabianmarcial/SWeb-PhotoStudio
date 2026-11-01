<?php
// actions/contacto_process.php - Procesamiento del formulario de contacto
require_once __DIR__ . '/../includes/config.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nombre = filter_input(INPUT_POST, 'nombre', FILTER_SANITIZE_SPECIAL_CHARS);
    $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
    $telefono = filter_input(INPUT_POST, 'telefono', FILTER_SANITIZE_SPECIAL_CHARS);
    $asunto = filter_input(INPUT_POST, 'asunto', FILTER_SANITIZE_SPECIAL_CHARS);
    $mensaje = filter_input(INPUT_POST, 'mensaje', FILTER_SANITIZE_SPECIAL_CHARS);

    if (empty($nombre) || empty($email) || empty($asunto) || empty($mensaje)) {
        $_SESSION['flash_error'] = 'Por favor completa todos los campos requeridos del formulario de contacto.';
        header('Location: ../contacto.php');
        exit;
    }

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $_SESSION['flash_error'] = 'Por favor proporciona una dirección de correo electrónico válida.';
        header('Location: ../contacto.php');
        exit;
    }

    // Guardar en sesión
    if (!isset($_SESSION['mensajes_contacto']) || !is_array($_SESSION['mensajes_contacto'])) {
        $_SESSION['mensajes_contacto'] = [];
    }

    $_SESSION['mensajes_contacto'][] = [
        'id' => uniqid('MSG-'),
        'nombre' => $nombre,
        'email' => $email,
        'telefono' => $telefono,
        'asunto' => $asunto,
        'mensaje' => $mensaje,
        'fecha' => date('d/m/Y H:i')
    ];

    $_SESSION['flash_success'] = '¡Gracias por escribirnos, ' . htmlspecialchars($nombre) . '! Hemos recibido tu mensaje y te responderemos en menos de 24 horas.';
    header('Location: ../contacto.php');
    exit;
} else {
    header('Location: ../contacto.php');
    exit;
}
