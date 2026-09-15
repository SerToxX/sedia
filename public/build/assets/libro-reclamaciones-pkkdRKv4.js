document.addEventListener("DOMContentLoaded",()=>{let e=1;const f=3,m=document.querySelectorAll(".class-reclamaciones-step-item"),i=document.querySelectorAll(".class-reclamaciones-step-content-form"),c=document.getElementById("class-reclamaciones-next"),n=document.getElementById("class-reclamaciones-back"),d=document.getElementById("class-reclamaciones-progress"),p=document.getElementById("class-reclamaciones-success"),u=document.getElementById("class-reclamaciones-actions");if(!m.length||!i.length||!c||!n||!d||!p||!u)return;function o(){m.forEach((s,v)=>{const l=v+1,a=s.querySelector(".class-reclamaciones-step-circle"),y=s.querySelector(".class-reclamaciones-step-label"),r=s.querySelectorAll(".class-reclamaciones-step-line");a.classList.remove("class-reclamaciones-step-circle-active","class-reclamaciones-step-circle-completed"),y.classList.remove("class-reclamaciones-step-label-active"),r.forEach(t=>{t.classList.remove("class-reclamaciones-step-line-active")}),l===e&&(a.classList.add("class-reclamaciones-step-circle-active"),y.classList.add("class-reclamaciones-step-label-active"),r.forEach(t=>{t.classList.add("class-reclamaciones-step-line-active")}),a.innerHTML=l),l<e&&(a.classList.add("class-reclamaciones-step-circle-completed"),a.innerHTML="✓",r.forEach(t=>{t.classList.add("class-reclamaciones-step-line-active")})),l>e&&(a.innerHTML=l)}),i.forEach(s=>{Number(s.dataset.step)===e?s.style.display="block":s.style.display="none"}),e===1?n.style.visibility="hidden":n.style.visibility="visible",e===3?(c.classList.add("class-reclamaciones-next-submit"),c.innerHTML=`
                <span class="class-reclamaciones-next-submit-text">
                    ENVIAR
                </span>
            `):(c.classList.remove("class-reclamaciones-next-submit"),c.innerHTML=`
                <span class="class-reclamaciones-next-text">
                    Siguiente
                </span>

                <div class="class-reclamaciones-next-circle">
                    <span class="class-reclamaciones-next-icon">
                        &#10095;
                    </span>
                </div>
            `)}c.addEventListener("click",()=>{e<f?(e++,o()):(d.style.display="none",i.forEach(s=>{s.style.display="none"}),u.style.display="none",p.style.display="flex")}),n.addEventListener("click",()=>{e>1&&(e--,o())}),o()});
