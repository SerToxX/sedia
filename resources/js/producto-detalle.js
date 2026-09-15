document.addEventListener('DOMContentLoaded', () => {
    const root = document.querySelector('[data-producto]');
    if (!root) return;

    const mainImages = root.querySelectorAll('.class-producto-main-img');
    const thumbs = root.querySelectorAll('[data-thumb]');

    thumbs.forEach((thumb) => {
        thumb.addEventListener('click', () => {
            const index = thumb.dataset.thumb;

            mainImages.forEach((img) => img.classList.toggle('is-active', img.dataset.image === index));
            thumbs.forEach((t) => t.classList.toggle('is-active', t === thumb));
        });
    });

    const swatches = root.querySelectorAll('[data-swatch]');
    const colorName = root.querySelector('[data-color-name]');

    swatches.forEach((swatch) => {
        swatch.addEventListener('click', () => {
            swatches.forEach((s) => s.classList.toggle('is-active', s === swatch));
            if (colorName) colorName.textContent = swatch.dataset.swatchName || '';
        });
    });
});
