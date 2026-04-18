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

