<?php
// actions/logout.php - Cerrar sesión y limpiar variables
require_once __DIR__ . '/../includes/config.php';

// Limpiar datos de autenticación del usuario
unset($_SESSION['user_id']);
unset($_SESSION['user_name']);
unset($_SESSION['user_email']);
unset($_SESSION['user_role']);
unset($_SESSION['user_phone']);

$_SESSION['flash_success'] = 'Has cerrado tu sesión correctamente. ¡Esperamos verte pronto!';
header('Location: ../login.php');
exit;
