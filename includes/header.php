<?php
// includes/header.php - Estructura inicial HTML y enlaces CSS
require_once __DIR__ . '/config.php';
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo isset($page_title) ? $page_title . ' | ' . SITE_NAME : SITE_NAME; ?></title>

    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    
    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

    <!-- Hoja de Estilos Global del Estudio -->
    <link rel="stylesheet" href="assets/css/global.css">

    <!-- Hoja de Estilos Específica de esta Página -->
    <?php if (isset($page_css) && !empty($page_css)): ?>
        <link rel="stylesheet" href="assets/css/<?php echo $page_css; ?>">
    <?php endif; ?>
</head>
<body>
    <?php include_once __DIR__ . '/navbar.php'; ?>
    <main>
