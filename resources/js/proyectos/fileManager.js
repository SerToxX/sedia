import { showToast } from '../utils/toast.js';

const MAX_FILES = 20;
const MAX_TOTAL_BYTES = 15 * 1024 * 1024;
const ALLOWED_EXTENSIONS = ['jpg', 'jpeg', 'png', 'gif', 'pdf', 'doc', 'docx', 'xls', 'xlsx', 'zip', 'rar'];

let selectedFiles = [];

export function getSelectedFiles() {
    return selectedFiles;
}

export function formatMB(bytes) {
    return (bytes / (1024 * 1024)).toFixed(2);
}

function getTotalBytes() {
    return selectedFiles.reduce((acc, f) => acc + (f.size || 0), 0);
}

function getFileExt(fileName) {
    const parts = fileName.split('.');
    return parts.length > 1 ? parts.pop().toLowerCase() : '';
}

export function syncInputFiles(inputEl) {
    const dt = new DataTransfer();
    selectedFiles.forEach((f) => dt.items.add(f));
    inputEl.files = dt.files;
}

export function renderFilesList(listEl, totalEl, inputEl) {
    listEl.innerHTML = '';
    if (selectedFiles.length === 0) {
        listEl.innerHTML = '<p class="class-proyectos-archivos-empty">No hay archivos seleccionados.</p>';
    } else {
        const ul = document.createElement('ul');
        ul.className = 'class-proyectos-archivos-items';
        selectedFiles.forEach((file, index) => {
            const li = document.createElement('li');
            li.className = 'class-proyectos-archivo-item';

            const info = document.createElement('span');
            info.className = 'class-proyectos-archivo-info';
            info.textContent = `${index + 1}. ${file.name} (${formatMB(file.size)} MB)`;

            const btnRemove = document.createElement('button');
            btnRemove.type = 'button';
            btnRemove.className = 'class-proyectos-archivo-remove';
            btnRemove.textContent = 'Quitar';
            btnRemove.addEventListener('click', () => {
                selectedFiles.splice(index, 1);
                syncInputFiles(inputEl);
                renderFilesList(listEl, totalEl, inputEl);
            });

            li.appendChild(info);
            li.appendChild(btnRemove);
            ul.appendChild(li);
        });
        listEl.appendChild(ul);
    }
    totalEl.textContent = `Total: ${formatMB(getTotalBytes())} MB / 15.00 MB`;
}

export function addFiles(incoming, inputEl, listEl, totalEl) {
    const beforeCount = selectedFiles.length;
    selectedFiles = selectedFiles.concat(incoming);
    if (selectedFiles.length > MAX_FILES) {
        selectedFiles = selectedFiles.slice(0, MAX_FILES);
        showToast('warning', 'Límite de archivos', `Solo se permiten hasta ${MAX_FILES} archivos.`);
    }
    syncInputFiles(inputEl);
    renderFilesList(listEl, totalEl, inputEl);
    if (beforeCount === selectedFiles.length) {
        showToast('info', 'Archivos', 'No se agregaron archivos nuevos.');
    }
}

export function resetFiles(inputEl, listEl, totalEl) {
    selectedFiles = [];
    syncInputFiles(inputEl);
    renderFilesList(listEl, totalEl, inputEl);
}

export function validateFilesClient(form) {
    const errors = [];
    if (selectedFiles.length > MAX_FILES) {
        errors.push(`Solo se permiten hasta ${MAX_FILES} archivos.`);
    }
    const invalidType = selectedFiles.find((f) => !ALLOWED_EXTENSIONS.includes(getFileExt(f.name)));
    if (invalidType) {
        errors.push(`Archivo no permitido: ${invalidType.name}.`);
    }
    const totalBytes = getTotalBytes();
    if (totalBytes > MAX_TOTAL_BYTES) {
        errors.push(`El total de archivos excede 15MB (actual: ${formatMB(totalBytes)}MB).`);
    }
    const archivosField = form.querySelector('[name="archivos[]"]');
    if (archivosField) {
        archivosField.classList.toggle('class-proyectos-input-error', errors.length > 0);
    }
    return errors;
}
