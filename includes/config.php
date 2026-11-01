<?php
// includes/config.php - Configuración general y control de sesión

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// Configuración general del sitio
define('SITE_NAME', 'Lumière Photo Studio');
define('SITE_URL', 'http://localhost/SWeb-PhotoStudio');

// Helper para verificar si el usuario tiene sesión activa
function isAuthenticated() {
    return isset($_SESSION['user_id']);
}

// Helper para obtener el nombre del usuario actual
function getCurrentUserName() {
    return $_SESSION['user_name'] ?? 'Invitado';
}
?>
