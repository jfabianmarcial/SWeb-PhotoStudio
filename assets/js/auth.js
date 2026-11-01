/* ==========================================================
   AUTH.JS - Validaciones Interactivas para Login y Registro
   ========================================================== */

document.addEventListener('DOMContentLoaded', () => {
    // 1. Mostrar/Ocultar Contraseña
    const togglePassButtons = document.querySelectorAll('.toggle-password');
    togglePassButtons.forEach(btn => {
        btn.addEventListener('click', () => {
            const targetId = btn.getAttribute('data-target');
            const passInput = document.getElementById(targetId);
            const icon = btn.querySelector('i');

            if (passInput) {
                if (passInput.type === 'password') {
                    passInput.type = 'text';
                    if (icon) icon.className = 'bi bi-eye-slash';
                } else {
                    passInput.type = 'password';
                    if (icon) icon.className = 'bi bi-eye';
                }
            }
        });
    });

    // 2. Validación de coincidencia de contraseñas en Registro
    const regForm = document.getElementById('registerForm');
    const pass1 = document.getElementById('regPassword');
    const pass2 = document.getElementById('regPasswordConfirm');
    const matchMsg = document.getElementById('passwordMatchMsg');

    if (pass1 && pass2 && matchMsg) {
        function checkPasswordMatch() {
            if (pass2.value.length === 0) {
                matchMsg.textContent = '';
                return;
            }
            if (pass1.value === pass2.value) {
                matchMsg.textContent = '✓ Las contraseñas coinciden';
                matchMsg.className = 'text-success small fw-semibold mt-1 d-block';
            } else {
                matchMsg.textContent = '✗ Las contraseñas no coinciden';
                matchMsg.className = 'text-danger small fw-semibold mt-1 d-block';
            }
        }

        pass1.addEventListener('input', checkPasswordMatch);
        pass2.addEventListener('input', checkPasswordMatch);
    }
});
