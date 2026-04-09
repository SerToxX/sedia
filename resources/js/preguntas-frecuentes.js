document.addEventListener("DOMContentLoaded", () => {

const preguntas = document.querySelectorAll(
".class-preguntas-frecuentes-question"
)

if(!preguntas.length) return

preguntas.forEach((pregunta) => {

pregunta.addEventListener("click", () => {

const item = pregunta.parentElement

item.classList.toggle("active")

})

})

})