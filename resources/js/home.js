document.addEventListener("DOMContentLoaded", () => {
    const video = document.querySelector(".class-hero-video")

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
