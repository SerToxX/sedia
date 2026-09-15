export function setFieldError(form, fieldName, hasError) {
    const field = form.querySelector(`[name="${fieldName}"]`);
    if (!field) return;
    field.classList.toggle('class-proyectos-input-error', hasError);
}

export function clearAllFieldErrors(form) {
    form.querySelectorAll('input, textarea').forEach((el) =>
        el.classList.remove('class-proyectos-input-error')
    );
}

export function validateRequiredFields(form) {
    const required = [
        { name: 'nombre', label: 'Nombres y Apellidos' },
        { name: 'email', label: 'Email' },
        { name: 'mensaje', label: 'Cuéntanos de tu proyecto' },
    ];
    const missing = [];
    required.forEach(({ name, label }) => {
        const field = form.querySelector(`[name="${name}"]`);
        const invalid = !field || field.value.trim() === '';
        setFieldError(form, name, invalid);
        if (invalid) missing.push(label);
    });
    return missing;
}

export function parseServerErrors(errorsObj) {
    if (!errorsObj || typeof errorsObj !== 'object') return { messages: [], fields: [] };
    const messages = [];
    const fieldsWithErrors = new Set();
    Object.keys(errorsObj).forEach((key) => {
        (errorsObj[key] || []).forEach((m) => messages.push(m));
        fieldsWithErrors.add(key.startsWith('archivos') ? 'archivos[]' : key);
    });
    return { messages, fields: Array.from(fieldsWithErrors) };
}
