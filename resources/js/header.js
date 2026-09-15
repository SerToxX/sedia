/* =========================
MENU
========================= */

const menuBtn = document.querySelector(".class-header-left")
const menuClose = document.querySelector(".class-menu-close")
const overlay = document.querySelector(".class-menu-overlay")

if(menuBtn){
    menuBtn.addEventListener("click",()=>{
        document.body.classList.add("menu-open")
    })
}

function closeMenu(){
    document.body.classList.remove("menu-open")
}

menuClose?.addEventListener("click",closeMenu)
overlay?.addEventListener("click",closeMenu)


/* =========================
FILTROS (LISTING)
========================= */

const filtrosBtn = document.querySelector(".class-listing-filters-btn")
const filtrosClose = document.querySelector(".class-filtros-close")
const filtrosOverlay = document.querySelector(".class-filtros-overlay")

if(filtrosBtn){
    filtrosBtn.addEventListener("click",()=>{
        document.body.classList.add("filtros-open")
    })
}

function closeFiltros(){
    document.body.classList.remove("filtros-open")
}

filtrosClose?.addEventListener("click",closeFiltros)
filtrosOverlay?.addEventListener("click",closeFiltros)

/* PRECIO — SLIDER DOBLE */

document.querySelectorAll(".class-filtros-price-slider").forEach(slider=>{

    const minInput = slider.querySelector(".class-filtros-price-min")
    const maxInput = slider.querySelector(".class-filtros-price-max")
    const range = slider.querySelector(".class-filtros-price-range")
    const minLabel = slider.parentElement.querySelector(".class-filtros-price-min-label")
    const maxLabel = slider.parentElement.querySelector(".class-filtros-price-max-label")
    const gap = 5

    function formatPricePEN(value){
        return "S/." + Number(value).toFixed(2)
    }

    function update(){
        let minVal = parseInt(minInput.value)
        let maxVal = parseInt(maxInput.value)

        if(minVal > maxVal - gap){
            minVal = maxVal - gap
            minInput.value = minVal
        }

        const min = parseInt(minInput.min)
        const max = parseInt(minInput.max)

        const minPercent = ((minVal - min) / (max - min)) * 100
        const maxPercent = ((maxVal - min) / (max - min)) * 100

        range.style.left = minPercent + "%"
        range.style.right = (100 - maxPercent) + "%"

        minLabel.textContent = formatPricePEN(minVal)
        maxLabel.textContent = formatPricePEN(maxVal)
    }

    minInput.addEventListener("input", update)
    maxInput.addEventListener("input", update)

    update()

})

/* =========================
CARRITO DESPLEGABLE
========================= */

const carritoBtn = document.querySelector(".class-desplegable-carrito-btn")
const carritoClose = document.querySelector(".class-desplegable-carrito-close")
const carritoOverlay = document.querySelector(".class-desplegable-carrito-overlay")
let carritoOpenedAt = 0

function openCarrito(e) {
    e.preventDefault()
    e.stopPropagation()
    carritoOpenedAt = Date.now()
    document.body.classList.add("carrito-open")
}

function closeCarrito() {
    document.body.classList.remove("carrito-open")
}

function closeCarritoFromOverlay() {
    if (Date.now() - carritoOpenedAt < 220) {
        return
    }
    closeCarrito()
}

carritoBtn?.addEventListener("click", openCarrito)
carritoClose?.addEventListener("click", closeCarrito)
carritoOverlay?.addEventListener("click", closeCarritoFromOverlay)

/* =========================
CARRITO — DATOS Y RENDER
========================= */

const CART_KEY = "sedia_cart"

function getCart() {
    try {
        const raw = localStorage.getItem(CART_KEY)
        const parsed = raw ? JSON.parse(raw) : []
        return Array.isArray(parsed) ? parsed : []
    } catch {
        return []
    }
}

function setCart(items) {
    try {
        localStorage.setItem(CART_KEY, JSON.stringify(items))
    } catch {
        // localStorage no disponible (modo privado, etc.) — seguimos solo en memoria
    }
    renderCart()
}

function addToCart({ id, name, price, image, category }) {
    const cart = getCart()
    const existing = cart.find(item => item.id === id)

    if (existing) {
        existing.qty += 1
    } else {
        cart.push({ id, name, price, image, category, qty: 1 })
    }

    setCart(cart)
}

function removeFromCart(id) {
    setCart(getCart().filter(item => item.id !== id))
}

function changeQty(id, delta) {
    const cart = getCart()
    const item = cart.find(i => i.id === id)
    if (!item) return

    item.qty += delta

    if (item.qty < 1) {
        setCart(cart.filter(i => i.id !== id))
    } else {
        setCart(cart)
    }
}

function formatPrice(value) {
    return "S/" + value.toFixed(2)
}

function renderCart() {
    const cart = getCart()
    const countEl = document.querySelector(".class-header-cart-count")
    const contentEl = document.querySelector(".class-desplegable-carrito-content")
    const footerEl = document.querySelector(".class-desplegable-carrito-footer")
    const subtotalCountEl = document.querySelector(".class-desplegable-carrito-subtotal-count")
    const subtotalPriceEl = document.querySelector(".class-desplegable-carrito-subtotal-price")

    const totalQty = cart.reduce((sum, item) => sum + item.qty, 0)
    const totalPrice = cart.reduce((sum, item) => sum + item.qty * item.price, 0)

    if (countEl) {
        countEl.textContent = totalQty
        countEl.style.display = totalQty > 0 ? "" : "none"
    }

    if (subtotalCountEl) {
        subtotalCountEl.textContent = `(${totalQty} artículo${totalQty === 1 ? "" : "s"})`
    }

    if (subtotalPriceEl) {
        subtotalPriceEl.textContent = formatPrice(totalPrice)
    }

    if (footerEl) {
        footerEl.style.display = cart.length === 0 ? "none" : ""
    }

    if (!contentEl) return

    if (cart.length === 0) {
        contentEl.innerHTML = `<p class="class-desplegable-carrito-empty">Tu carrito está vacío.</p>`
        return
    }

    contentEl.innerHTML = cart.map(item => `
        <div class="class-desplegable-carrito-item">
            <img src="${item.image}" alt="${item.name}" class="class-desplegable-carrito-item-img">
            <div class="class-desplegable-carrito-item-info">
                <span class="class-desplegable-carrito-item-name">${item.name}</span>
                ${item.category ? `<span class="class-desplegable-carrito-item-variant">${item.category}</span>` : ""}
                <div class="class-desplegable-carrito-item-prices">
                    <span class="class-desplegable-carrito-item-new">${formatPrice(item.price)}</span>
                </div>
            </div>
            <div class="class-desplegable-carrito-item-right">
                <button type="button" class="class-desplegable-carrito-item-delete" data-cart-remove="${item.id}" aria-label="Eliminar">
                    <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8"><polyline points="3 6 5 6 21 6"/><path d="M19 6l-1 14H6L5 6"/><path d="M10 11v6M14 11v6"/><path d="M9 6V4h6v2"/></svg>
                </button>
                <div class="class-desplegable-carrito-item-qty">
                    <button type="button" class="class-desplegable-carrito-qty-btn" data-cart-qty-down="${item.id}">−</button>
                    <span class="class-desplegable-carrito-qty-num">${item.qty}</span>
                    <button type="button" class="class-desplegable-carrito-qty-btn" data-cart-qty-up="${item.id}">+</button>
                </div>
            </div>
        </div>
    `).join("")
}

/* Botones "Añadir al carrito" en las tarjetas de producto */
document.addEventListener("click", (e) => {
    const addBtn = e.target.closest(".class-product-card-add")
    if (!addBtn) return

    e.preventDefault()
    e.stopPropagation()

    addToCart({
        id: addBtn.dataset.cartId,
        name: addBtn.dataset.cartName,
        price: parseFloat(addBtn.dataset.cartPrice) || 0,
        image: addBtn.dataset.cartImage,
        category: addBtn.dataset.cartCategory || "",
    })

    document.body.classList.add("carrito-open")

    addBtn.classList.add("is-added")
    addBtn.textContent = "Añadido ✓"
    setTimeout(() => {
        addBtn.classList.remove("is-added")
        addBtn.textContent = "Añadir al carrito"
    }, 1400)
})

/* Eliminar / cambiar cantidad dentro del carrito desplegable */
document.addEventListener("click", (e) => {
    const removeBtn = e.target.closest("[data-cart-remove]")
    if (removeBtn) {
        removeFromCart(removeBtn.dataset.cartRemove)
        return
    }

    const qtyUpBtn = e.target.closest("[data-cart-qty-up]")
    if (qtyUpBtn) {
        changeQty(qtyUpBtn.dataset.cartQtyUp, 1)
        return
    }

    const qtyDownBtn = e.target.closest("[data-cart-qty-down]")
    if (qtyDownBtn) {
        changeQty(qtyDownBtn.dataset.cartQtyDown, -1)
    }
})

renderCart()

/* =========================
DROPDOWN
========================= */

document.querySelectorAll(".class-menu-dropdown").forEach(item=>{

    item.addEventListener("click",()=>{

        item.classList.toggle("active")

        const sub=item.nextElementSibling

        if(sub.style.display==="block"){
            sub.style.display="none"
        }else{
            sub.style.display="block"
        }

    })

})

/* =========================
HEADER SCROLL
========================= */

let lastScroll = 0
const header = document.querySelector(".class-header-container")

if (header) {
    const headerHeight = header.offsetHeight || 100
    const transparentPages =
        document.body.classList.contains("class-home") ||
        document.body.classList.contains("class-proyectos-page") ||
        document.body.classList.contains("class-sobre-nosotros-page") ||
        document.body.classList.contains("class-listing-page")

    // Sincroniza el header con la posición real de scroll ANTES de esperar un
    // evento "scroll". Sin esto, al recargar con el scroll restaurado por el
    // navegador (ya no en el tope), el header se pinta primero en su estado
    // de tope (transparente, íconos blancos) y recién cambia cuando llega el
    // primer evento de scroll — se ve como un parpadeo de todo el header.
    function syncHeaderToScroll(currentScroll) {
        if (currentScroll <= 0) {
            header.classList.remove("class-header-hidden")
            if (transparentPages) {
                header.classList.remove("class-header-scrolled")
            }
            return
        }

        if (transparentPages) {
            if (currentScroll <= headerHeight) {
                header.classList.remove("class-header-scrolled")
                header.classList.remove("class-header-hidden")
            } else {
                header.classList.remove("class-header-hidden")
                header.classList.add("class-header-scrolled")
            }
        } else {
            header.classList.add("class-header-scrolled")
        }
    }

    lastScroll = window.pageYOffset
    syncHeaderToScroll(lastScroll)

    window.addEventListener("scroll", () => {
        const currentScroll = window.pageYOffset

        if (currentScroll <= 0) {
            header.classList.remove("class-header-hidden")
            if (transparentPages) {
                header.classList.remove("class-header-scrolled")
            }
            lastScroll = currentScroll
            return
        }

        const isScrollingDown = currentScroll > lastScroll + 5
        const isScrollingUp = currentScroll < lastScroll - 5

        if (transparentPages) {
            if (isScrollingDown) {
                if (currentScroll <= headerHeight) {
                    header.classList.remove("class-header-scrolled")
                    header.classList.remove("class-header-hidden")
                } else {
                    header.classList.add("class-header-hidden")
                }
            } else if (isScrollingUp) {
                header.classList.remove("class-header-hidden")
                header.classList.add("class-header-scrolled")
            }
        } else {
            header.classList.add("class-header-scrolled")
            if (isScrollingDown && currentScroll > headerHeight) {
                header.classList.add("class-header-hidden")
            } else if (isScrollingUp) {
                header.classList.remove("class-header-hidden")
            }
        }

        lastScroll = currentScroll
    })
}

/* =========================
SEARCH
========================= */

const search = document.querySelector(".class-header-search")
const searchBtn = document.querySelector(".class-header-search-icon")
const searchInput = document.querySelector(".class-header-search-input")

if(searchBtn){

    searchBtn.addEventListener("click",(e)=>{

        // Primer click: solo abre el campo y enfoca, no envía el formulario todavía.
        // Con el campo ya abierto, el click funciona como botón submit normal (busca).
        if(!search.classList.contains("active")){
            e.preventDefault()
            e.stopPropagation()
            search.classList.add("active")
            searchInput.focus()
        } else {
            e.stopPropagation()
        }

    })

}

/* CERRAR AL HACER CLICK FUERA */

document.addEventListener("click",(e)=>{

    if(search && !search.contains(e.target)){
        search.classList.remove("active")
    }

})
