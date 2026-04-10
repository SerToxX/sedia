const steps = document.querySelectorAll(".class-politicas-devolucion-step")

steps.forEach(step => {

step.addEventListener("click", () => {

steps.forEach(s => s.classList.remove("active"))
step.classList.add("active")

})

})