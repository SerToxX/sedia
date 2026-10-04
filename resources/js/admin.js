import { showToast, initToastClose } from './utils/toast.js';

// Turbo Drive reemplaza solo el <body> entre navegaciones (en vez de recargar
// todo el documento), así que este init debe volver a correr en cada
// "turbo:load" — no solo en el "DOMContentLoaded" de la carga inicial.
function initAdmin() {
    initToastClose();

    // Mensaje flash de éxito/error inyectado por Blade (ver admin/layout.blade.php).
    // Se limpia después de mostrarlo para que una navegación posterior sin
    // flash propio no vuelva a mostrar el mensaje de la página anterior.
    if (window.__adminFlash) {
        const { type, title, message } = window.__adminFlash;
        showToast(type, title, message);
        window.__adminFlash = null;
    }

    // ---------------------------------------------
    // Tema claro/oscuro del panel (independiente del sitio público)
    // ---------------------------------------------
    const STORAGE_KEY = 'sedia_admin_theme';
    const root = document.documentElement;

    function applyTheme(theme) {
        if (theme === 'dark') {
            root.setAttribute('data-theme', 'dark');
        } else {
            root.setAttribute('data-theme', 'light');
        }
    }

    const saved = localStorage.getItem(STORAGE_KEY);
    const prefersDark = window.matchMedia('(prefers-color-scheme: dark)').matches;
    applyTheme(saved ?? (prefersDark ? 'dark' : 'light'));

    const toggleBtn = document.getElementById('classAdminThemeToggle');
    toggleBtn?.addEventListener('click', () => {
        const isDark = root.getAttribute('data-theme') === 'dark';
        const next = isDark ? 'light' : 'dark';
        applyTheme(next);
        localStorage.setItem(STORAGE_KEY, next);
    });

    // ---------------------------------------------
    // Menú lateral en móvil
    // ---------------------------------------------
    const sidebar = document.getElementById('classAdminSidebar');
    const overlay = document.getElementById('classAdminSidebarOverlay');
    const openBtn = document.getElementById('classAdminHamburger');

    function closeSidebar() {
        sidebar?.classList.remove('is-open');
        overlay?.classList.remove('is-open');
    }

    openBtn?.addEventListener('click', () => {
        sidebar?.classList.add('is-open');
        overlay?.classList.add('is-open');
    });
    overlay?.addEventListener('click', closeSidebar);

    // Al navegar con Turbo el menú móvil debe quedar cerrado en la página nueva.
    closeSidebar();
}

document.addEventListener('DOMContentLoaded', initAdmin);
document.addEventListener('turbo:load', initAdmin);
