import { defineConfig } from 'vite'
import laravel from 'laravel-vite-plugin'
import tailwindcss from '@tailwindcss/vite'

export default defineConfig({
    plugins: [
        laravel({
            input: [
                // CSS global (Tailwind + header + footer)
                'resources/css/app.css',

                // CSS por página — se carga sólo en la página correspondiente
                'resources/css/index.css',
                'resources/css/listing.css',
                'resources/css/contactanos.css',
                'resources/css/preguntas-frecuentes.css',
                'resources/css/terminos-condiciones.css',
                'resources/css/politicas-devolucion.css',
                'resources/css/proyectos.css',
                'resources/css/sobre-nosotros.css',
                'resources/css/libro-reclamaciones.css',
                'resources/css/checkout.css',
                'resources/css/blog.css',
                'resources/css/producto-detalle.css',

                // CSS del panel de administración (independiente del sitio público)
                'resources/css/admin.css',
                'resources/css/toast.css',

                // JS del panel de administración
                'resources/js/admin.js',

                // JS global
                'resources/js/app.js',
                'resources/js/header.js',

                // JS por página
                'resources/js/home.js',
                'resources/js/preguntas-frecuentes.js',
                'resources/js/terminos-condiciones.js',
                'resources/js/politicas-devolucion.js',
                'resources/js/proyectos/form.js',
                'resources/js/libro-reclamaciones.js',
                'resources/js/contactanos/form.js',
                'resources/js/producto-detalle.js',
            ],
            refresh: true,
        }),
        tailwindcss(),
    ],
    server: {
        watch: {
            ignored: ['**/storage/framework/views/**'],
        },
    },
})
