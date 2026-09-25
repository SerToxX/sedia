document.addEventListener("DOMContentLoaded", () => {
    const hero = document.querySelector(".class-hero")
    const video = document.querySelector(".class-hero-video")

    // Establecer altura dinámica del hero para evitar zoom en móvil
    const setHeroHeight = () => {
        if (hero) {
            hero.style.height = window.innerHeight + "px"
        }
    }

    setHeroHeight()

    // Recalcular cuando cambia el tamaño de la ventana (orientación, barras del navegador, etc)
    window.addEventListener("resize", setHeroHeight)
    window.addEventListener("orientationchange", setHeroHeight)

    if (!video || !("IntersectionObserver" in window)) {
        return
    }

    const observer = new IntersectionObserver((entries) => {
        entries.forEach((entry) => {
            if (entry.isIntersecting) {
                video.play().catch(() => {})
            } else {
                video.pause()
            }
        })
    }, {
        threshold: 0.2
    })

    observer.observe(video)
})
