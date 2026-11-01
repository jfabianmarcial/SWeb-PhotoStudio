<?php
// actions/auth_process.php - Procesamiento de Inicio de Sesión y Registro
require_once __DIR__ . '/../includes/config.php';

$action = $_POST['action'] ?? '';

// Usuarios precargados de demostración (en un proyecto con BD esto se consulta en MySQL)
$usuarios_demo = [
    [
        'id' => 1,
        'nombre' => 'Administrador Lumière',
        'email' => 'admin@lumierephoto.com',
        'password' => 'admin123',
        'rol' => 'admin',
        'telefono' => '5512345678'
    ],
    [
        'id' => 2,
        'nombre' => 'Carlos Mendoza',
        'email' => 'cliente@gmail.com',
        'password' => 'cliente123',
        'rol' => 'cliente',
        'telefono' => '5587654321'
    ]
];

// Si no existen usuarios registrados en la sesión actual, inicializarlos con los demo
if (!isset($_SESSION['usuarios_registrados'])) {
    $_SESSION['usuarios_registrados'] = $usuarios_demo;
}

// -------------------------------------------------------------
// 1. INICIAR SESIÓN
// -------------------------------------------------------------
if ($action === 'login') {
    $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
    $password = trim($_POST['password'] ?? '');

    if (empty($email) || empty($password)) {
        $_SESSION['flash_error'] = 'Por favor ingresa tu correo y contraseña.';
        header('Location: ../login.php');
        exit;
    }

    $usuario_encontrado = null;
    foreach ($_SESSION['usuarios_registrados'] as $user) {
        if (strtolower($user['email']) === strtolower($email)) {
            // Verificar contraseña (directa o hash)
            if ($user['password'] === $password || (isset($user['password_hash']) && password_verify($password, $user['password_hash']))) {
                $usuario_encontrado = $user;
                break;
            }
        }
    }

    if ($usuario_encontrado) {
        // Establecer variables de sesión PHP
        $_SESSION['user_id'] = $usuario_encontrado['id'];
        $_SESSION['user_name'] = $usuario_encontrado['nombre'];
        $_SESSION['user_email'] = $usuario_encontrado['email'];
        $_SESSION['user_role'] = $usuario_encontrado['rol'];
        $_SESSION['user_phone'] = $usuario_encontrado['telefono'] ?? '';

        $_SESSION['flash_success'] = '¡Bienvenido(a) de nuevo, ' . htmlspecialchars($usuario_encontrado['nombre']) . '!';
        header('Location: ../dashboard.php');
        exit;
    } else {
        $_SESSION['flash_error'] = 'Credenciales incorrectas. Verifica tu correo y contraseña.';
        header('Location: ../login.php');
        exit;
    }
}

// -------------------------------------------------------------
// 2. REGISTRO DE CLIENTE
// -------------------------------------------------------------
if ($action === 'register') {
    $nombre = filter_input(INPUT_POST, 'nombre', FILTER_SANITIZE_SPECIAL_CHARS);
    $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
    $telefono = filter_input(INPUT_POST, 'telefono', FILTER_SANITIZE_SPECIAL_CHARS);
    $password = trim($_POST['password'] ?? '');
    $password_confirm = trim($_POST['password_confirm'] ?? '');

    if (empty($nombre) || empty($email) || empty($password)) {
        $_SESSION['flash_error'] = 'Todos los campos marcados con asterisco son obligatorios.';
        header('Location: ../registro.php');
        exit;
    }

    if ($password !== $password_confirm) {
        $_SESSION['flash_error'] = 'Las contraseñas ingresadas no coinciden.';
        header('Location: ../registro.php');
        exit;
    }

    // Verificar si el correo ya existe
    foreach ($_SESSION['usuarios_registrados'] as $user) {
        if (strtolower($user['email']) === strtolower($email)) {
            $_SESSION['flash_error'] = 'Ya existe una cuenta con este correo electrónico.';
            header('Location: ../registro.php');
            exit;
        }
    }

    // Registrar nuevo usuario en la sesión
    $nuevo_id = count($_SESSION['usuarios_registrados']) + 1;
    $nuevo_usuario = [
        'id' => $nuevo_id,
        'nombre' => $nombre,
        'email' => $email,
        'password' => $password,
        'rol' => 'cliente',
        'telefono' => $telefono
    ];

    $_SESSION['usuarios_registrados'][] = $nuevo_usuario;

    // Autologin del nuevo usuario
    $_SESSION['user_id'] = $nuevo_usuario['id'];
    $_SESSION['user_name'] = $nuevo_usuario['nombre'];
    $_SESSION['user_email'] = $nuevo_usuario['email'];
    $_SESSION['user_role'] = $nuevo_usuario['rol'];
    $_SESSION['user_phone'] = $nuevo_usuario['telefono'];

    $_SESSION['flash_success'] = '¡Tu cuenta ha sido creada con éxito! Bienvenido(a) a Lumière Photo Studio.';
    header('Location: ../dashboard.php');
    exit;
}

header('Location: ../login.php');
exit;
