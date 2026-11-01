
/* ==========================================================
   GALERIA.JS - Filtros Dinámicos y Visor Lightbox Modal
   ========================================================== */

document.addEventListener('DOMContentLoaded', () => {
    const filterButtons = document.querySelectorAll('.filter-btn');
    const galleryItems = document.querySelectorAll('.gallery-item-wrapper');
    const lightboxModalEl = document.getElementById('lightboxModal');
    const lightboxImage = document.getElementById('lightboxImage');
    const lightboxCaption = document.getElementById('lightboxCaption');
    const lightboxBadge = document.getElementById('lightboxBadge');
    
    let lightboxModal = null;
    if (lightboxModalEl && typeof bootstrap !== 'undefined') {
        lightboxModal = new bootstrap.Modal(lightboxModalEl);
    }

    // 1. Filtrado dinámico por categoría
    filterButtons.forEach(button => {
        button.addEventListener('click', () => {
            // Cambiar botón activo
            filterButtons.forEach(btn => btn.classList.remove('active'));
            button.classList.add('active');

            const filterValue = button.getAttribute('data-filter');

            galleryItems.forEach(item => {
                const category = item.getAttribute('data-category');
                if (filterValue === 'todos' || category === filterValue) {
                    item.style.display = 'block';
                    setTimeout(() => {
                        item.style.opacity = '1';
                        item.style.transform = 'scale(1)';
                    }, 50);
                } else {
                    item.style.opacity = '0';
                    item.style.transform = 'scale(0.95)';
                    setTimeout(() => {
                        item.style.display = 'none';
                    }, 250);
                }
            });
        });
    });

    // 2. Lightbox Modal al hacer clic en una foto
    const galleryCards = document.querySelectorAll('.gallery-card');
    galleryCards.forEach(card => {
        card.addEventListener('click', () => {
            const img = card.querySelector('img');
            const title = card.getAttribute('data-title') || 'Fotografía de Estudio';
            const categoryText = card.getAttribute('data-category-label') || 'Galería';

            if (lightboxImage && img) {
                lightboxImage.src = img.src;
                lightboxImage.alt = title;
            }
            if (lightboxCaption) {
                lightboxCaption.textContent = title;
            }
            if (lightboxBadge) {
                lightboxBadge.textContent = categoryText;
            }

            if (lightboxModal) {
                lightboxModal.show();
            }
        });
    });
});
