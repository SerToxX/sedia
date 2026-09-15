(function () {
    const MAX_FILES = 20;
    const MAX_TOTAL_BYTES = 15 * 1024 * 1024;
    const ALLOWED_EXTENSIONS = ['jpg', 'jpeg', 'png', 'gif', 'pdf', 'doc', 'docx', 'xls', 'xlsx', 'zip', 'rar'];
    const form = document.getElementById('formContactoProyectos');

    if (!form) {
        return;
    }

    const inputFiles = document.getElementById('archivosInput');
    const btnSelectFiles = document.getElementById('btnSelectFiles');
    const btnSubmit = document.getElementById('btnSubmit');
    const archivosList = document.getElementById('archivosList');
    const archivosTotal = document.getElementById('archivosTotal');
    const toastEl = document.getElementById('classMessageToast');
    const toastTitle = document.getElementById('classMessageTitle');
    const toastText = document.getElementById('classMessageText');
    const toastIcon = document.getElementById('classMessageIcon');
    const toastClose = document.getElementById('classMessageClose');
    const toastProgressBar = document.getElementById('classMessageProgressBar');
    let toastTimer = null;
    let selectedFiles = [];
    let dt = new DataTransfer();

    function formatMB(bytes) {
        return (bytes / (1024 * 1024)).toFixed(2);
    }

    function getTotalBytes(filesArray) {
        return filesArray.reduce((acc, f) => acc + (f.size || 0), 0);
    }

    function getFileExt(fileName) {
        const parts = fileName.split('.');
        return parts.length > 1 ? parts.pop().toLowerCase() : '';
    }

    function showToast(type, title, message, durationMs = 8000) {
        if (!toastEl) return;
        if (toastTimer) {
            clearTimeout(toastTimer);
            toastTimer = null;
        }
        toastEl.classList.remove('class-message-hidden', 'class-message-success', 'class-message-error', 'class-message-warning', 'class-message-info');
        toastEl.classList.add('class-message-' + type);
        toastTitle.textContent = title;
        toastText.innerHTML = message;
        if (type === 'success') toastIcon.textContent = '✓';
        if (type === 'error') toastIcon.textContent = '!';
        if (type === 'warning') toastIcon.textContent = '!';
        if (type === 'info') toastIcon.textContent = 'i';
        toastProgressBar.style.animation = 'none';
        toastProgressBar.offsetHeight;
        toastProgressBar.style.animation = 'class-message-progress ' + durationMs + 'ms linear forwards';
        toastEl.classList.add('class-message-show');
        toastTimer = setTimeout(() => {
            hideToast();
        }, durationMs);
    }

    function hideToast() {
        if (!toastEl) return;
        toastEl.classList.remove('class-message-show');
        toastEl.classList.add('class-message-hidden');
    }

    if (toastClose) {
        toastClose.addEventListener('click', hideToast);
    }

    function setFieldError(fieldName, hasError) {
        const field = form.querySelector('[name="' + fieldName + '"]');
        if (!field) return;
        field.classList.toggle('class-proyectos-input-error', hasError);
    }

    function clearAllFieldErrors() {
        const fields = form.querySelectorAll('input, textarea');
        fields.forEach(function (el) {
            el.classList.remove('class-proyectos-input-error');
        });
    }

    function syncInputFiles() {
        dt = new DataTransfer();
        selectedFiles.forEach(function (file) {
            dt.items.add(file);
        });
        inputFiles.files = dt.files;
    }

    function renderFilesList() {
        archivosList.innerHTML = '';
        if (selectedFiles.length === 0) {
            archivosList.innerHTML = '<p class="class-proyectos-archivos-empty">No hay archivos seleccionados.</p>';
        } else {
            const ul = document.createElement('ul');
            ul.className = 'class-proyectos-archivos-items';
            selectedFiles.forEach(function (file, index) {
                const li = document.createElement('li');
                li.className = 'class-proyectos-archivo-item';
                const info = document.createElement('span');
                info.className = 'class-proyectos-archivo-info';
                info.textContent = (index + 1) + '. ' + file.name + ' (' + formatMB(file.size) + ' MB)';
                const btnRemove = document.createElement('button');
                btnRemove.type = 'button';
                btnRemove.className = 'class-proyectos-archivo-remove';
                btnRemove.textContent = 'Quitar';
                btnRemove.addEventListener('click', function () {
                    selectedFiles.splice(index, 1);
                    syncInputFiles();
                    renderFilesList();
                });
                li.appendChild(info);
                li.appendChild(btnRemove);
                ul.appendChild(li);
            });
            archivosList.appendChild(ul);
        }
        const totalBytes = getTotalBytes(selectedFiles);
        archivosTotal.textContent = 'Total: ' + formatMB(totalBytes) + ' MB / 15.00 MB';
    }

    function validateRequiredFields() {
        const requiredFields = [
            { name: 'nombre', label: 'Nombres y Apellidos' },
            { name: 'email', label: 'Email' },
            { name: 'mensaje', label: 'Comentanos de tu proyecto' }
        ];
        const missing = [];
        requiredFields.forEach(function (item) {
            const field = form.querySelector('[name="' + item.name + '"]');
            const value = field ? field.value.trim() : '';
            const invalid = value === '';
            setFieldError(item.name, invalid);
            if (invalid) missing.push(item.label);
        });
        return missing;
    }

    function validateFilesClient() {
        const errors = [];
        if (selectedFiles.length > MAX_FILES) {
            errors.push('Solo se permiten hasta ' + MAX_FILES + ' archivos.');
        }
        const invalidType = selectedFiles.find(function (f) {
            return !ALLOWED_EXTENSIONS.includes(getFileExt(f.name));
        });
        if (invalidType) {
            errors.push('Archivo no permitido: ' + invalidType.name + '.');
        }
        const totalBytes = getTotalBytes(selectedFiles);
        if (totalBytes > MAX_TOTAL_BYTES) {
            errors.push('El total de archivos excede 15MB (actual: ' + formatMB(totalBytes) + 'MB).');
        }
        if (errors.length > 0) {
            setFieldError('archivos[]', true);
        } else {
            setFieldError('archivos[]', false);
        }
        return errors;
    }

    function parseServerErrors(errorsObj) {
        const messages = [];
        const fieldsWithErrors = new Set();
        if (!errorsObj || typeof errorsObj !== 'object') {
            return { messages: [], fields: [] };
        }
        Object.keys(errorsObj).forEach(function (key) {
            const msgs = errorsObj[key] || [];
            msgs.forEach(function (m) {
                messages.push(m);
            });
            if (key.startsWith('archivos')) {
                fieldsWithErrors.add('archivos[]');
            } else {
                fieldsWithErrors.add(key);
            }
        });
        return {
            messages: messages,
            fields: Array.from(fieldsWithErrors)
        };
    }

    btnSelectFiles.addEventListener('click', function () {
        inputFiles.click();
    });

    inputFiles.addEventListener('change', function (e) {
        const incoming = Array.from(e.target.files || []);
        if (incoming.length === 0) return;
        const beforeCount = selectedFiles.length;
        selectedFiles = selectedFiles.concat(incoming);
        if (selectedFiles.length > MAX_FILES) {
            selectedFiles = selectedFiles.slice(0, MAX_FILES);
            showToast(
                'warning',
                'Límite de archivos',
                'Solo se permiten hasta 20 archivos.'
            );
        }
        syncInputFiles();
        renderFilesList();
        if (beforeCount === selectedFiles.length) {
            showToast('info', 'Archivos', 'No se agregaron archivos nuevos.');
        }
        inputFiles.value = '';
    });

    form.querySelectorAll('input, textarea').forEach(function (el) {
        el.addEventListener('input', function () {
            if (el.classList.contains('class-proyectos-input-error') && el.value.trim() !== '') {
                el.classList.remove('class-proyectos-input-error');
            }
        });
    });

    renderFilesList();

    form.addEventListener('submit', function (e) {
        e.preventDefault();
        clearAllFieldErrors();
        const missingFields = validateRequiredFields();
        const fileErrors = validateFilesClient();
        if (missingFields.length > 0 || fileErrors.length > 0) {
            let html = '';
            if (missingFields.length > 0) {
                html += '<strong>Faltan campos obligatorios:</strong><br>' + missingFields.join(', ') + '<br><br>';
            }
            if (fileErrors.length > 0) {
                html += '<strong>Archivos:</strong><br>' + fileErrors.join('<br>');
            }
            showToast('error', 'Revisa el formulario', html.trim());
            return;
        }
        const formData = new FormData(form);
        selectedFiles.forEach(function (file) {
            formData.append('archivos[]', file);
        });
        btnSubmit.disabled = true;
        btnSubmit.textContent = 'Enviando...';
        fetch(form.action, {
            method: 'POST',
            body: formData,
            headers: {
                'X-Requested-With': 'XMLHttpRequest'
            }
        })
            .then(function (response) {
                return response.json()
                    .then(function (data) {
                        return { ok: response.ok, status: response.status, data: data };
                    })
                    .catch(function () {
                        return {
                            ok: false,
                            status: response.status,
                            data: {
                                success: false,
                                message: 'Error del servidor. Intenta nuevamente.'
                            }
                        };
                    });
            })
            .then(function (result) {
                const data = result.data || {};
                if (result.ok && data.success) {
                    showToast('success', 'Mensaje enviado', 'Tu mensaje fue enviado correctamente.');
                    form.reset();
                    selectedFiles = [];
                    syncInputFiles();
                    renderFilesList();
                    clearAllFieldErrors();
                    return;
                }
                if (result.status === 422) {
                    const parsed = parseServerErrors(data.errors);
                    parsed.fields.forEach(function (fieldName) {
                        if (fieldName === 'archivos[]') {
                            setFieldError('archivos[]', true);
                            return;
                        }
                        setFieldError(fieldName, true);
                    });
                    let html = '';
                    if (Array.isArray(data.missing_fields) && data.missing_fields.length > 0) {
                        html += '<strong>Faltan campos obligatorios:</strong><br>' + data.missing_fields.join(', ') + '<br><br>';
                    }
                    if (parsed.messages.length > 0) {
                        html += '<strong>Detalle:</strong><br>' + parsed.messages.join('<br>');
                    } else {
                        html += data.message || 'Error de validación.';
                    }
                    showToast('error', 'Corrige los campos', html);
                    return;
                }
                showToast('error', 'Error', data.message || 'Ocurrió un error al enviar. Intenta nuevamente.');
            })
            .catch(function (error) {
                showToast('error', 'Error de conexión', 'No se pudo enviar el formulario. ' + error.message);
            })
            .finally(function () {
                btnSubmit.disabled = false;
                btnSubmit.textContent = 'ENVIAR';
            });
    });
})();
