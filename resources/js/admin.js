import { showToast, initToastClose } from './utils/toast.js';

document.addEventListener('DOMContentLoaded', () => {
    initToastClose();

    // Mensaje flash de éxito/error inyectado por Blade (ver admin/layout.blade.php)
    if (window.__adminFlash) {
        const { type, title, message } = window.__adminFlash;
        showToast(type, title, message);
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
});
