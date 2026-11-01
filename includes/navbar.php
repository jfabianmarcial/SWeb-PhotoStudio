<?php
// includes/navbar.php - Barra de navegación con soporte para sesiones
$current_page = basename($_SERVER['PHP_SELF']);
?>
<nav class="navbar navbar-expand-lg navbar-dark navbar-custom sticky-top">
    <div class="container">
        <!-- Logotipo de la marca -->
        <a class="navbar-brand d-flex align-items-center gap-2" href="index.php">
            <i class="bi bi-camera2 fs-4 text-warning"></i>
            <span>LUMIÈRE <small class="fw-light fs-6 text-white-50">STUDIO</small></span>
        </a>

        <!-- Botón responsive para móviles -->
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarMain" aria-controls="navbarMain" aria-expanded="false" aria-label="Alternar navegación">
            <span class="navbar-toggler-icon"></span>
        </button>

        <!-- Enlaces de navegación -->
        <div class="collapse navbar-collapse" id="navbarMain">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link <?php echo ($current_page == 'index.php') ? 'active' : ''; ?>" href="index.php">
                        <i class="bi bi-house-door me-1"></i> Inicio
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link <?php echo ($current_page == 'servicios.php') ? 'active' : ''; ?>" href="servicios.php">
                        <i class="bi bi-grid me-1"></i> Servicios
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link <?php echo ($current_page == 'galeria.php') ? 'active' : ''; ?>" href="galeria.php">
                        <i class="bi bi-images me-1"></i> Galería
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link <?php echo ($current_page == 'nosotros.php') ? 'active' : ''; ?>" href="nosotros.php">
                        <i class="bi bi-people me-1"></i> Nosotros
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link <?php echo ($current_page == 'contacto.php') ? 'active' : ''; ?>" href="contacto.php">
                        <i class="bi bi-envelope me-1"></i> Contacto
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-warning fw-semibold <?php echo ($current_page == 'reservas.php') ? 'active' : ''; ?>" href="reservas.php">
                        <i class="bi bi-calendar-check me-1"></i> Reservar Cita
                    </a>
                </li>
            </ul>

            <!-- Sección de usuario / Sesión PHP -->
            <ul class="navbar-nav ms-auto mb-2 mb-lg-0 align-items-lg-center">
                <?php if (isAuthenticated()): ?>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle text-white d-flex align-items-center gap-2" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="bi bi-person-circle fs-5 text-warning"></i>
                            <span><?php echo htmlspecialchars(getCurrentUserName()); ?></span>
                        </a>
                        <ul class="dropdown-menu dropdown-menu-end shadow">
                            <li><a class="dropdown-item" href="dashboard.php"><i class="bi bi-speedometer2 me-2"></i> Mi Panel</a></li>
                            <li><a class="dropdown-item" href="citas.php"><i class="bi bi-calendar3 me-2"></i> Mis Citas</a></li>
                            <li><a class="dropdown-item" href="perfil.php"><i class="bi bi-gear me-2"></i> Mi Perfil</a></li>
                            <li><hr class="dropdown-divider"></li>
                            <li><a class="dropdown-item text-danger" href="actions/logout.php"><i class="bi bi-box-arrow-right me-2"></i> Cerrar Sesión</a></li>
                        </ul>
                    </li>
                <?php else: ?>
                    <li class="nav-item me-2">
                        <a class="btn btn-outline-light btn-sm px-3" href="login.php">
                            <i class="bi bi-box-arrow-in-right me-1"></i> Ingresar
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="btn btn-gold btn-sm px-3" href="registro.php">
                            <i class="bi bi-person-plus me-1"></i> Registrarse
                        </a>
                    </li>
                <?php endif; ?>
            </ul>
        </div>
    </div>
</nav>
