<?php
// includes/footer.php - Pie de página y scripts
?>
    </main>

    <footer class="pt-5 pb-3 mt-5">
        <div class="container">
            <div class="row g-4 mb-4">
                <div class="col-lg-4 col-md-6">
                    <h5 class="text-white fw-bold d-flex align-items-center gap-2 mb-3">
                        <i class="bi bi-camera2 text-warning"></i>
                        <span>LUMIÈRE PHOTO STUDIO</span>
                    </h5>
                    <p class="small text-secondary">
                        Capturamos tus mejores momentos con pasión, elegancia y el mejor equipo profesional. Sesiones de estudio, bodas, eventos y fotografía comercial.
                    </p>
                    <div class="d-flex gap-3 fs-5">
                        <a href="#" class="text-secondary"><i class="bi bi-facebook"></i></a>
                        <a href="#" class="text-secondary"><i class="bi bi-instagram"></i></a>
                        <a href="#" class="text-secondary"><i class="bi bi-whatsapp"></i></a>
                        <a href="#" class="text-secondary"><i class="bi bi-youtube"></i></a>
                    </div>
                </div>

                <div class="col-lg-2 col-md-6">
                    <h6 class="text-white fw-semibold mb-3">Navegación</h6>
                    <ul class="list-unstyled small">
                        <li class="mb-2"><a href="index.php">Inicio</a></li>
                        <li class="mb-2"><a href="servicios.php">Servicios</a></li>
                        <li class="mb-2"><a href="galeria.php">Galería</a></li>
                        <li class="mb-2"><a href="nosotros.php">Quiénes Somos</a></li>
                        <li class="mb-2"><a href="contacto.php">Contacto</a></li>
                    </ul>
                </div>

                <div class="col-lg-3 col-md-6">
                    <h6 class="text-white fw-semibold mb-3">Servicios</h6>
                    <ul class="list-unstyled small">
                        <li class="mb-2"><a href="servicios.php#bodas">Fotografía de Bodas</a></li>
                        <li class="mb-2"><a href="servicios.php#xv">Sesiones de XV Años</a></li>
                        <li class="mb-2"><a href="servicios.php#estudio">Retratos & Estudio</a></li>
                        <li class="mb-2"><a href="servicios.php#corporativo">Eventos Corporativos</a></li>
                    </ul>
                </div>

                <div class="col-lg-3 col-md-6">
                    <h6 class="text-white fw-semibold mb-3">Atención al Cliente</h6>
                    <ul class="list-unstyled small text-secondary">
                        <li class="mb-2"><i class="bi bi-geo-alt me-2 text-warning"></i> Av. Principal #450, Centro</li>
                        <li class="mb-2"><i class="bi bi-telephone me-2 text-warning"></i> +52 (55) 1234-5678</li>
                        <li class="mb-2"><i class="bi bi-envelope me-2 text-warning"></i> info@lumierephoto.com</li>
                        <li class="mb-2"><i class="bi bi-clock me-2 text-warning"></i> Lun - Sáb: 9:00 AM - 7:00 PM</li>
                    </ul>
                </div>
            </div>

            <hr class="border-secondary opacity-25">

            <div class="row align-items-center">
                <div class="col-md-6 text-center text-md-start">
                    <small class="text-secondary">&copy; <?php echo date('Y'); ?> Lumière Photo Studio. Todos los derechos reservados.</small>
                </div>
                <div class="col-md-6 text-center text-md-end mt-2 mt-md-0">
                    <small class="text-secondary">Diseño Responsivo con Bootstrap 5 & PHP</small>
                </div>
            </div>
        </div>
    </footer>

    <!-- Bootstrap 5 JS Bundle -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

    <!-- Script Global JS -->
    <script src="assets/js/global.js"></script>

    <!-- Script específico de la página (opcional) -->
    <?php if (isset($page_js) && !empty($page_js)): ?>
        <script src="assets/js/<?php echo $page_js; ?>"></script>
    <?php endif; ?>
</body>
</html>
