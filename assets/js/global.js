/* ==========================================================
   GLOBAL.JS - Funcionalidades JavaScript Globales
   ========================================================== */

document.addEventListener('DOMContentLoaded', () => {
    // Inicializar tooltips de Bootstrap si existen
    const tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'));
    tooltipTriggerList.map((tooltipTriggerEl) => new bootstrap.Tooltip(tooltipTriggerEl));

    // Efecto sutil en la barra de navegación al hacer scroll
    const navbar = document.querySelector('.navbar-custom');
    if (navbar) {
        window.addEventListener('scroll', () => {
            if (window.scrollY > 50) {
                navbar.classList.add('shadow-lg');
            } else {
                navbar.classList.remove('shadow-lg');
            }
        });
    }

    console.log('Lumière Photo Studio - Global JS Cargado con éxito.');
});
