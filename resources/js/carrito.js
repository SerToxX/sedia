/* =========================
ZONA DE ENVIO (DESPLEGABLE)
========================= */

const zonaTrigger = document.querySelector(".class-carrito-zone-trigger")
const zonaPanel = document.querySelector(".class-carrito-zone-panel")
const zonaWrap = document.querySelector(".class-carrito-zone-wrap")

function closeZonaPanel() {
    if (!zonaTrigger || !zonaPanel) return
    zonaPanel.hidden = true
    zonaTrigger.setAttribute("aria-expanded", "false")
    provinciaWrap?.classList.remove("zona-open")
}

function openZonaPanel() {
    if (!zonaTrigger || !zonaPanel) return
    closeProvinciaPanel()
    zonaPanel.hidden = false
    zonaTrigger.setAttribute("aria-expanded", "true")
    provinciaWrap?.classList.add("zona-open")
}

function toggleZonaPanel() {
    const isOpen = zonaTrigger.getAttribute("aria-expanded") === "true"

    if (isOpen) {
        closeZonaPanel()
    } else {
        openZonaPanel()
    }
}

zonaTrigger?.addEventListener("click", (e) => {
    e.stopPropagation()
    toggleZonaPanel()
})

document.addEventListener("click", (e) => {
    if (zonaWrap && !zonaWrap.contains(e.target)) {
        closeZonaPanel()
    }
})

/* Selección única de zona (como radio, con estilo de checkbox) */
document.querySelectorAll(".class-carrito-zone-checkbox").forEach(checkbox => {
    checkbox.addEventListener("click", () => {
        document.querySelectorAll(".class-carrito-zone-checkbox").forEach(other => {
            if (other !== checkbox) other.checked = false
        })
    })
})

/* =========================
PROVINCIA — AGENCIA DE ENVIO
========================= */

const provinciaTrigger = document.querySelector("#carritoProvinciaTrigger")
const provinciaWrap = document.querySelector(".class-carrito-provincia-wrap")
const agenciaFields = document.querySelector("#carritoAgenciaFields")

function closeProvinciaPanel() {
    if (!provinciaTrigger || !agenciaFields) return
    agenciaFields.hidden = true
    provinciaTrigger.setAttribute("aria-expanded", "false")
    provinciaWrap?.classList.remove("is-open")
}

function openProvinciaPanel() {
    if (!provinciaTrigger || !agenciaFields) return
    closeZonaPanel()
    agenciaFields.hidden = false
    provinciaTrigger.setAttribute("aria-expanded", "true")
    provinciaWrap?.classList.add("is-open")
}

provinciaTrigger?.addEventListener("click", () => {
    const isOpen = provinciaTrigger.getAttribute("aria-expanded") === "true"

    if (isOpen) {
        closeProvinciaPanel()
    } else {
        openProvinciaPanel()
    }
})
