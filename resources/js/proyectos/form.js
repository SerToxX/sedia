import { showToast, initToastClose } from '../utils/toast.js';
import { addFiles, renderFilesList, resetFiles, validateFilesClient, getSelectedFiles } from './fileManager.js';
import { clearAllFieldErrors, validateRequiredFields, setFieldError, parseServerErrors } from './validator.js';

document.addEventListener('DOMContentLoaded', () => {
    const form = document.getElementById('formContactoProyectos');
    if (!form) return;

    const inputFiles = document.getElementById('archivosInput');
    const btnSelectFiles = document.getElementById('btnSelectFiles');
    const btnSubmit = document.getElementById('btnSubmit');
    const archivosList = document.getElementById('archivosList');
    const archivosTotal = document.getElementById('archivosTotal');

    initToastClose();
    renderFilesList(archivosList, archivosTotal, inputFiles);

    btnSelectFiles.addEventListener('click', () => inputFiles.click());

    inputFiles.addEventListener('change', (e) => {
        const incoming = Array.from(e.target.files || []);
        if (!incoming.length) return;
        addFiles(incoming, inputFiles, archivosList, archivosTotal);
        inputFiles.value = '';
    });

    form.querySelectorAll('input, textarea').forEach((el) => {
        el.addEventListener('input', () => {
            if (el.classList.contains('class-proyectos-input-error') && el.value.trim() !== '') {
                el.classList.remove('class-proyectos-input-error');
            }
        });
    });

    form.addEventListener('submit', (e) => {
        e.preventDefault();
        clearAllFieldErrors(form);

        const missingFields = validateRequiredFields(form);
        const fileErrors = validateFilesClient(form);

        if (missingFields.length > 0 || fileErrors.length > 0) {
            let html = '';
            if (missingFields.length > 0) {
                html += `<strong>Faltan campos obligatorios:</strong><br>${missingFields.join(', ')}<br><br>`;
            }
            if (fileErrors.length > 0) {
                html += `<strong>Archivos:</strong><br>${fileErrors.join('<br>')}`;
            }
            showToast('error', 'Revisa el formulario', html.trim());
            return;
        }

        const formData = new FormData(form);
        getSelectedFiles().forEach((file) => formData.append('archivos[]', file));

        btnSubmit.disabled = true;
        btnSubmit.textContent = 'Enviando...';

        fetch(form.action, {
            method: 'POST',
            body: formData,
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
                    resetFiles(inputFiles, archivosList, archivosTotal);
                    clearAllFieldErrors(form);
                    return;
                }
                if (status === 422) {
                    const parsed = parseServerErrors(data.errors);
                    parsed.fields.forEach((fieldName) => setFieldError(form, fieldName, true));
                    let html = '';
                    if (Array.isArray(data.missing_fields) && data.missing_fields.length > 0) {
                        html += `<strong>Faltan campos obligatorios:</strong><br>${data.missing_fields.join(', ')}<br><br>`;
                    }
                    html += parsed.messages.length > 0
                        ? `<strong>Detalle:</strong><br>${parsed.messages.join('<br>')}`
                        : data.message || 'Error de validación.';
                    showToast('error', 'Corrige los campos', html);
                    return;
                }
                showToast('error', 'Error', data.message || 'Ocurrió un error al enviar. Intenta nuevamente.');
            })
            .catch((error) =>
                showToast('error', 'Error de conexión', `No se pudo enviar el formulario. ${error.message}`)
            )
            .finally(() => {
                btnSubmit.disabled = false;
                btnSubmit.textContent = 'ENVIAR';
            });
    });
});
