<?php
// galeria.php - Portafolio y visualizador de trabajos fotográficos
$page_title = 'Galería de Trabajos';
$page_css = 'galeria.css';
$page_js = 'galeria.js';

require_once 'includes/header.php';

// Array de fotografías del portafolio (simulación de catálogo o BD)
$galeria = [
    [
        'id' => 1,
        'titulo' => 'Boda en Jardín Botánico',
        'categoria' => 'bodas',
        'categoria_nombre' => 'Bodas',
        'imagen' => 'https://images.unsplash.com/photo-1519741497674-611481863552?auto=format&fit=crop&w=1000&q=80',
        'descripcion' => 'Sesión al atardecer con iluminación natural y tonalidades cálidas.'
    ],
    [
        'id' => 2,
        'titulo' => 'Retrato Ejecutivo Moderno',
        'categoria' => 'estudio',
        'categoria_nombre' => 'Estudio',
        'imagen' => 'https://images.unsplash.com/photo-1507003211169-0a1dd7228f2d?auto=format&fit=crop&w=1000&q=80',
        'descripcion' => 'Iluminación Rembrandt sobre fondo gris texturizado.'
    ],
    [
        'id' => 3,
        'titulo' => 'Sesión de Gala XV Años',
        'categoria' => 'xv',
        'categoria_nombre' => 'XV Años',
        'imagen' => 'https://images.unsplash.com/photo-1534528741775-53994a69daeb?auto=format&fit=crop&w=1000&q=80',
        'descripcion' => 'Book fotográfico en exteriores con vestido de alta costura.'
    ],
    [
        'id' => 4,
        'titulo' => 'Conferencia Anual Tech Summit',
        'categoria' => 'eventos',
        'categoria_nombre' => 'Eventos',
        'imagen' => 'https://images.unsplash.com/photo-1511578314322-379afb476865?auto=format&fit=crop&w=1000&q=80',
        'descripcion' => 'Cobertura de ponencias y networking empresarial en interiores.'
    ],
    [
        'id' => 5,
        'titulo' => 'Ceremonia Nupcial en Catedral',
        'categoria' => 'bodas',
        'categoria_nombre' => 'Bodas',
        'imagen' => 'https://images.unsplash.com/photo-1511285560929-80b456fea0bc?auto=format&fit=crop&w=1000&q=80',
        'descripcion' => 'Captura espontánea del primer beso matrimonial.'
    ],
    [
        'id' => 6,
        'titulo' => 'Maternidad en Estudio',
        'categoria' => 'estudio',
        'categoria_nombre' => 'Estudio',
        'imagen' => 'https://images.unsplash.com/photo-1544005313-94ddf0286df2?auto=format&fit=crop&w=1000&q=80',
        'descripcion' => 'Retrato minimalista con luz suave para futura mamá.'
    ],
    [
        'id' => 7,
        'titulo' => 'Quinceañera en el Bosque',
        'categoria' => 'xv',
        'categoria_nombre' => 'XV Años',
        'imagen' => 'https://images.unsplash.com/photo-1524504388940-b1c1722653e1?auto=format&fit=crop&w=1000&q=80',
        'descripcion' => 'Fotografía conceptual con humo de color y luz de tarde.'
    ],
    [
        'id' => 8,
        'titulo' => 'Lanzamiento de Marca de Joyería',
        'categoria' => 'eventos',
        'categoria_nombre' => 'Eventos',
        'imagen' => 'https://images.unsplash.com/photo-1492684223066-81342ee5ff30?auto=format&fit=crop&w=1000&q=80',
        'descripcion' => 'Cobertura de alfombra roja y coctel de inauguración.'
    ],
    [
        'id' => 9,
        'titulo' => 'Detalles y Anillos de Boda',
        'categoria' => 'bodas',
        'categoria_nombre' => 'Bodas',
        'imagen' => 'https://images.unsplash.com/photo-1606800052052-a08af7148866?auto=format&fit=crop&w=1000&q=80',
        'descripcion' => 'Macro-fotografía de argollas y ramo floral nupcial.'
    ]
];
?>

<!-- Cabecera de Página -->
<section class="py-5 bg-dark text-white text-center">
    <div class="container py-3">
        <span class="badge bg-warning text-dark px-3 py-2 rounded-pill fw-bold mb-2 text-uppercase">
            Nuestro Portafolio
        </span>
        <h1 class="display-5 fw-bold mb-3">Galería de Trabajos</h1>
        <p class="lead text-light opacity-75 mx-auto" style="max-width: 650px;">
            Una muestra selecta de nuestras sesiones más recientes. Haz clic en cualquier imagen para verla en gran formato.
        </p>
    </div>
</section>

<!-- Sección de Filtros y Grilla -->
<section class="py-5">
    <div class="container">
        <!-- Botones de Filtrado JavaScript -->
        <div class="filter-container">
            <button class="filter-btn active" data-filter="todos">
                <i class="bi bi-grid-fill me-1"></i> Todos los Trabajos
            </button>
            <button class="filter-btn" data-filter="bodas">
                <i class="bi bi-heart me-1"></i> Bodas
            </button>
            <button class="filter-btn" data-filter="xv">
                <i class="bi bi-gem me-1"></i> XV Años
            </button>
            <button class="filter-btn" data-filter="estudio">
                <i class="bi bi-person me-1"></i> Retratos & Estudio
            </button>
            <button class="filter-btn" data-filter="eventos">
                <i class="bi bi-building me-1"></i> Eventos & Marcas
            </button>
        </div>

        <!-- Grilla de Imágenes -->
        <div class="row g-4" id="galleryContainer">
            <?php foreach ($galeria as $foto): ?>
                <div class="col-lg-4 col-md-6 gallery-item-wrapper" data-category="<?php echo $foto['categoria']; ?>">
                    <div class="gallery-card" 
                         data-title="<?php echo htmlspecialchars($foto['titulo']); ?>" 
                         data-category-label="<?php echo htmlspecialchars($foto['categoria_nombre']); ?>">
                        <img src="<?php echo $foto['imagen']; ?>" alt="<?php echo htmlspecialchars($foto['titulo']); ?>" loading="lazy">
                        <div class="gallery-card-overlay">
                            <span class="gallery-tag"><?php echo $foto['categoria_nombre']; ?></span>
                            <h5 class="gallery-title"><?php echo $foto['titulo']; ?></h5>
                            <small class="text-white-50"><i class="bi bi-arrows-fullscreen me-1"></i> Ampliar imagen</small>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>

        <!-- Llamado a cotizar -->
        <div class="text-center mt-5 pt-4 border-top">
            <h4 class="fw-bold mb-3">¿Te gusta lo que ves?</h4>
            <p class="text-muted mb-4">Podemos crear recuerdos igual de increíbles para tu evento o sesión especial.</p>
            <a href="reservas.php" class="btn btn-gold btn-lg px-4 shadow">
                <i class="bi bi-calendar2-check me-2"></i> Reservar Mi Sesión
            </a>
        </div>
    </div>
</section>

<!-- Lightbox Modal de Bootstrap -->
<div class="modal fade" id="lightboxModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content bg-dark text-white border-secondary">
            <div class="modal-header border-secondary py-2">
                <span class="badge bg-warning text-dark me-2" id="lightboxBadge">Categoría</span>
                <h6 class="modal-title fw-bold" id="lightboxCaption">Título de la fotografía</h6>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Cerrar"></button>
            </div>
            <div class="modal-body p-0 text-center">
                <img src="" id="lightboxImage" class="img-fluid w-100 rounded-bottom" alt="Foto ampliada" style="max-height: 80vh; object-fit: contain; background: #000;">
            </div>
        </div>
    </div>
</div>

<?php
require_once 'includes/footer.php';
?>
