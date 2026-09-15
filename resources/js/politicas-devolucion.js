document.addEventListener('DOMContentLoaded', () => {
    const steps = document.querySelectorAll('.class-politicas-devolucion-step');
    const contents = document.querySelectorAll('.class-politicas-devolucion-content');

    if (!steps.length || !contents.length) return;

    steps.forEach((step, index) => {
        step.addEventListener('click', () => {
            steps.forEach((item) => item.classList.remove('active'));
            contents.forEach((item) => item.classList.remove('active'));
            step.classList.add('active');
            if (contents[index]) contents[index].classList.add('active');
        });
    });
});
