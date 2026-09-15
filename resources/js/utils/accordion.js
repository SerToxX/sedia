/**
 * Inicializa un acordeón genérico.
 * @param {string} questionSelector - Selector CSS de los elementos clicables (la pregunta/título)
 */
export function initAccordion(questionSelector) {
    const items = document.querySelectorAll(questionSelector);
    if (!items.length) return;
    items.forEach((q) => {
        q.addEventListener('click', () => q.parentElement.classList.toggle('active'));
    });
}
