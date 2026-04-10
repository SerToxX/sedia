document.addEventListener("DOMContentLoaded", () => {

const preguntas = document.querySelectorAll(
".class-terminos-condiciones-question"
)

if(!preguntas.length) return

preguntas.forEach((pregunta) => {

pregunta.addEventListener("click", () => {

const item = pregunta.parentElement

item.classList.toggle("active")

})

})

})