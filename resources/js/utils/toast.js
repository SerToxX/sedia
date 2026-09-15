let toastTimer = null;

const ICONS = { success: '✓', error: '!', warning: '!', info: 'i' };

function getEl(id) { return document.getElementById(id); }

export function showToast(type, title, message, durationMs = 8000) {
    const toastEl = getEl('classMessageToast');
    if (!toastEl) return;

    if (toastTimer) { clearTimeout(toastTimer); toastTimer = null; }

    toastEl.classList.remove(
        'class-message-hidden',
        'class-message-success',
        'class-message-error',
        'class-message-warning',
        'class-message-info'
    );
    toastEl.classList.add('class-message-' + type);
    getEl('classMessageTitle').textContent = title;
    getEl('classMessageText').innerHTML = message;
    getEl('classMessageIcon').textContent = ICONS[type] ?? 'i';

    const bar = getEl('classMessageProgressBar');
    bar.style.animation = 'none';
    bar.offsetHeight;
    bar.style.animation = `class-message-progress ${durationMs}ms linear forwards`;

    toastEl.classList.add('class-message-show');
    toastTimer = setTimeout(hideToast, durationMs);
}

export function hideToast() {
    const toastEl = getEl('classMessageToast');
    if (!toastEl) return;
    toastEl.classList.remove('class-message-show');
    toastEl.classList.add('class-message-hidden');
}

export function initToastClose() {
    const closeBtn = getEl('classMessageClose');
    if (closeBtn) closeBtn.addEventListener('click', hideToast);
}
