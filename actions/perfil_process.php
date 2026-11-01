<?php
// actions/perfil_process.php - Actualización de datos del perfil de usuario
require_once __DIR__ . '/../includes/config.php';

if (!isAuthenticated()) {
    header('Location: ../login.php');
    exit;
}

$action = $_POST['action'] ?? '';

// 1. Actualizar Datos Personales
if ($action === 'update_profile') {
    $nombre = filter_input(INPUT_POST, 'nombre', FILTER_SANITIZE_SPECIAL_CHARS);
    $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
    $telefono = filter_input(INPUT_POST, 'telefono', FILTER_SANITIZE_SPECIAL_CHARS);

    if (empty($nombre) || empty($email)) {
        $_SESSION['flash_error'] = 'El nombre y el correo no pueden estar vacíos.';
        header('Location: ../perfil.php');
        exit;
    }

    // Actualizar variables de sesión
    $_SESSION['user_name'] = $nombre;
    $_SESSION['user_email'] = $email;
    $_SESSION['user_phone'] = $telefono;

    // Actualizar también en el array de usuarios registrados si existe
    if (isset($_SESSION['usuarios_registrados'])) {
        foreach ($_SESSION['usuarios_registrados'] as &$u) {
            if ($u['id'] == $_SESSION['user_id']) {
                $u['nombre'] = $nombre;
                $u['email'] = $email;
                $u['telefono'] = $telefono;
                break;
            }
        }
    }

    $_SESSION['flash_success'] = 'Tus datos personales se han actualizado correctamente.';
    header('Location: ../perfil.php');
    exit;
}

// 2. Cambiar Contraseña
if ($action === 'change_password') {
    $nueva_clave = trim($_POST['nueva_password'] ?? '');
    $confirmar_clave = trim($_POST['confirmar_password'] ?? '');

    if (empty($nueva_clave) || strlen($nueva_clave) < 6) {
        $_SESSION['flash_error'] = 'La nueva contraseña debe tener al menos 6 caracteres.';
        header('Location: ../perfil.php');
        exit;
    }

    if ($nueva_clave !== $confirmar_clave) {
        $_SESSION['flash_error'] = 'Las nuevas contraseñas no coinciden.';
        header('Location: ../perfil.php');
        exit;
    }

    // Actualizar en el array de usuarios
    if (isset($_SESSION['usuarios_registrados'])) {
        foreach ($_SESSION['usuarios_registrados'] as &$u) {
            if ($u['id'] == $_SESSION['user_id']) {
                $u['password'] = $nueva_clave;
                break;
            }
        }
    }

    $_SESSION['flash_success'] = 'Tu contraseña ha sido actualizada con éxito.';
    header('Location: ../perfil.php');
    exit;
}

header('Location: ../perfil.php');
exit;
