/* ==========================================================
   RESERVAS.JS - Cálculo Dinámico y Validación del Formulario
   ========================================================== */

document.addEventListener('DOMContentLoaded', () => {
    const bookingForm = document.getElementById('bookingForm');
    const selectPaquete = document.getElementById('selectPaquete');
    const extraCheckboxes = document.querySelectorAll('.extra-service');
    const displayTotal = document.getElementById('displayTotal');
    const displayPaqueteNombre = document.getElementById('displayPaqueteNombre');
    const fechaInput = document.getElementById('fecha_evento');

    // 1. Establecer fecha mínima para que no puedan elegir fechas pasadas
    if (fechaInput) {
        const hoy = new Date();
        hoy.setDate(hoy.getDate() + 1); // Al menos mañana
        const fechaMinima = hoy.toISOString().split('T')[0];
        fechaInput.min = fechaMinima;
    }

    // Precios base de los paquetes
    const precios = {
        'boda_esencial': { nombre: 'Boda Esencial', precio: 8500 },
        'boda_premier': { nombre: 'Boda Premier (Recomendado)', precio: 16500 },
        'boda_diamante': { nombre: 'Boda Diamante', precio: 26000 },
        'xv_sesion': { nombre: 'XV Estudio & Locación', precio: 5500 },
        'xv_fiesta': { nombre: 'XV Fiesta Completa', precio: 12800 },
        'xv_completo': { nombre: 'XV Todo Incluido (Foto + Dron)', precio: 19500 },
        'retrato_pro': { nombre: 'Retrato Profesional / LinkedIn', precio: 1800 },
        'sesion_familiar': { nombre: 'Sesión Familiar / Maternidad', precio: 3200 },
        'book_moda': { nombre: 'Book Modelaje & Moda', precio: 4500 }
    };

    // 2. Función para recalcular el precio en tiempo real
    function calcularTotal() {
        let total = 0;
        let nombreSeleccionado = 'Ningún paquete seleccionado';

        const paqueteVal = selectPaquete ? selectPaquete.value : '';
        if (paqueteVal && precios[paqueteVal]) {
            total += precios[paqueteVal].precio;
            nombreSeleccionado = precios[paqueteVal].nombre;
        }

        // Sumar extras
        extraCheckboxes.forEach(chk => {
            if (chk.checked) {
                total += parseFloat(chk.getAttribute('data-precio') || 0);
            }
        });

        // Actualizar visualmente el resumen
        if (displayTotal) {
            displayTotal.textContent = '$' + total.toLocaleString('es-MX') + ' MXN';
        }
        if (displayPaqueteNombre) {
            displayPaqueteNombre.textContent = nombreSeleccionado;
        }
    }

    // Escuchar cambios en el select de paquetes
    if (selectPaquete) {
        selectPaquete.addEventListener('change', calcularTotal);
    }

    // Escuchar cambios en los servicios adicionales (checkboxes)
    extraCheckboxes.forEach(chk => {
        chk.addEventListener('change', calcularTotal);
    });

    // 3. Detectar si viene un parámetro GET en la URL (ej: reservas.php?servicio=boda_premier)
    const urlParams = new URLSearchParams(window.location.search);
    const servicioParam = urlParams.get('servicio');
    if (servicioParam && selectPaquete) {
        if (precios[servicioParam]) {
            selectPaquete.value = servicioParam;
            calcularTotal();
        }
    } else {
        calcularTotal();
    }

    // 4. Validación de envío del formulario
    if (bookingForm) {
        bookingForm.addEventListener('submit', (e) => {
            if (!bookingForm.checkValidity()) {
                e.preventDefault();
                e.stopPropagation();
            }
            bookingForm.classList.add('was-validated');
        });
    }
});
