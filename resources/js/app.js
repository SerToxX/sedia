document.addEventListener('DOMContentLoaded', () => {
    // Las imágenes ya tienen loading/decoding declarados en el HTML.
    // Solo forzamos draggable=false y bloqueamos el menú contextual.
    document.querySelectorAll('img').forEach((img) => {
        img.setAttribute('draggable', 'false');
    });

    document.addEventListener('contextmenu', (e) => {
        if (e.target.closest('img')) e.preventDefault();
    });

    document.addEventListener('dragstart', (e) => {
        if (e.target.closest('img')) e.preventDefault();
    });
});
