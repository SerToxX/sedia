document.addEventListener('DOMContentLoaded', () => {
    const root = document.querySelector('[data-producto]');
    if (!root) return;

    /* ---------- galería: miniaturas (solo relevante en móvil) ---------- */
    const mainImages = root.querySelectorAll('.class-producto-main-img');
    const thumbs = root.querySelectorAll('[data-thumb]');

    thumbs.forEach((thumb) => {
        thumb.addEventListener('click', () => {
            const index = thumb.dataset.thumb;

            mainImages.forEach((img) => img.classList.toggle('is-active', img.dataset.image === index));
            thumbs.forEach((t) => t.classList.toggle('is-active', t === thumb));
        });
    });

    /* ---------- color ---------- */
    const swatches = root.querySelectorAll('[data-swatch]');
    const colorName = root.querySelector('[data-color-name]');

    swatches.forEach((swatch) => {
        swatch.addEventListener('click', () => {
            swatches.forEach((s) => s.classList.toggle('is-active', s === swatch));
            if (colorName) colorName.textContent = swatch.dataset.swatchName || '';
        });
    });

    /* ---------- cantidad ---------- */
    const qtyValueEl = root.querySelector('[data-qty-value]');
    const qtyDownBtn = root.querySelector('[data-qty-down]');
    const qtyUpBtn = root.querySelector('[data-qty-up]');
    const addBtn = root.querySelector('[data-add-to-cart]');

    function getQty() {
        return parseInt(qtyValueEl?.textContent, 10) || 1;
    }

    function setQty(value) {
        const qty = Math.max(1, value);
        if (qtyValueEl) qtyValueEl.textContent = qty;
        if (addBtn) addBtn.dataset.cartQty = qty;
        if (qtyDownBtn) qtyDownBtn.disabled = qty <= 1;
    }

    qtyDownBtn?.addEventListener('click', () => setQty(getQty() - 1));
    qtyUpBtn?.addEventListener('click', () => setQty(getQty() + 1));
    setQty(getQty());

    function currentItem() {
        return {
            id: addBtn.dataset.cartId,
            name: addBtn.dataset.cartName,
            price: parseFloat(addBtn.dataset.cartPrice) || 0,
            image: addBtn.dataset.cartImage,
            category: addBtn.dataset.cartCategory || '',
            qty: getQty(),
        };
    }

    /* ---------- añadir al carrito ---------- */
    addBtn?.addEventListener('click', () => {
        if (!window.sediaCart) return;

        window.sediaCart.add(currentItem());
        document.body.classList.add('carrito-open');

        const originalLabel = addBtn.textContent;
        addBtn.classList.add('is-added');
        addBtn.textContent = 'Añadido ✓';
        setTimeout(() => {
            addBtn.classList.remove('is-added');
            addBtn.textContent = originalLabel;
        }, 1400);
    });

    /* ---------- comprar ahora: añade al carrito y va al checkout ---------- */
    const buyBtn = root.querySelector('[data-buy-now]');
    const checkoutUrl = root.dataset.checkoutUrl;

    buyBtn?.addEventListener('click', () => {
        if (!addBtn || !window.sediaCart) return;

        window.sediaCart.add(currentItem());
        window.location.href = checkoutUrl;
    });
});
