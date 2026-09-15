import { showToast, initToastClose } from '../utils/toast.js';

document.addEventListener('DOMContentLoaded', () => {
    const form = document.getElementById('formContactanos');
    if (!form) return;

    initToastClose();

    const REQUIRED = [
        { name: 'nombres',   label: 'Nombres' },
        { name: 'apellidos', label: 'Apellidos' },
        { name: 'correo',    label: 'Correo electrónico' },
        { name: 'mensaje',   label: 'Mensaje' },
    ];

    function setError(fieldName, hasError) {
        const el = form.querySelector(`[name="${fieldName}"]`);
        if (el) el.classList.toggle('class-contactanos-input-error', hasError);
    }

    function clearErrors() {
        form.querySelectorAll('input, textarea').forEach((el) =>
            el.classList.remove('class-contactanos-input-error')
        );
    }

    function validateForm() {
        const missing = [];
        REQUIRED.forEach(({ name, label }) => {
            const el = form.querySelector(`[name="${name}"]`);
            const invalid = !el || el.value.trim() === '';
            setError(name, invalid);
            if (invalid) missing.push(label);
        });
        return missing;
    }

    form.querySelectorAll('input, textarea').forEach((el) => {
        el.addEventListener('input', () => {
            if (el.classList.contains('class-contactanos-input-error') && el.value.trim() !== '') {
                el.classList.remove('class-contactanos-input-error');
            }
        });
    });

    form.addEventListener('submit', (e) => {
        e.preventDefault();
        clearErrors();

        const missing = validateForm();
        if (missing.length > 0) {
            showToast('error', 'Revisa el formulario',
                `<strong>Faltan campos obligatorios:</strong><br>${missing.join(', ')}`);
            return;
        }

        const btnSubmit = form.querySelector('[type="submit"]');
        const originalText = btnSubmit.textContent;
        btnSubmit.disabled = true;
        btnSubmit.textContent = 'Enviando...';

        fetch(form.action, {
            method: 'POST',
            body: new FormData(form),
            headers: { 'X-Requested-With': 'XMLHttpRequest' },
        })
            .then((response) =>
                response.json()
                    .then((data) => ({ ok: response.ok, status: response.status, data }))
                    .catch(() => ({
                        ok: false,
                        status: response.status,
                        data: { success: false, message: 'Error del servidor. Intenta nuevamente.' },
                    }))
            )
            .then(({ ok, status, data = {} }) => {
                if (ok && data.success) {
                    showToast('success', 'Mensaje enviado', 'Tu mensaje fue enviado correctamente.');
                    form.reset();
                    clearErrors();
                    return;
                }
                if (status === 422 && data.errors) {
                    Object.keys(data.errors).forEach((field) => setError(field, true));
                    const messages = Object.values(data.errors).flat();
                    let html = '';
                    if (Array.isArray(data.missing_fields) && data.missing_fields.length) {
                        html += `<strong>Faltan campos obligatorios:</strong><br>${data.missing_fields.join(', ')}<br><br>`;
                    }
                    html += messages.length
                        ? `<strong>Detalle:</strong><br>${messages.join('<br>')}`
                        : data.message || 'Error de validación.';
                    showToast('error', 'Corrige los campos', html);
                    return;
                }
                showToast('error', 'Error', data.message || 'Ocurrió un error al enviar. Intenta nuevamente.');
            })
            .catch((err) =>
                showToast('error', 'Error de conexión', `No se pudo enviar el formulario. ${err.message}`)
            )
            .finally(() => {
                btnSubmit.disabled = false;
                btnSubmit.textContent = originalText;
            });
    });
});
