<footer class="class-footer-container">

    <div class="class-footer-inner">
        <div class="class-footer-content">

            {{-- COLUMNA 1: MARCA --}}
            <div class="class-footer-col class-footer-brand">

                <div class="class-footer-logo">SEDIA</div>

                <p class="class-footer-desc">
                    Ofrecemos mobiliario de alta calidad que transforma y mejora cada espacio.
                    Contamos con sillas de comedor y barra para interior y exterior,
                    diseñadas para brindar comodidad, estilo y durabilidad.
                    Nos adaptamos a las necesidades y estética de cada cliente.
                </p>

                <div class="class-footer-social">
                    <a href="#" class="class-footer-social-btn" aria-label="Facebook">
                        <img src="{{ asset('image/icons/social/facebook.svg') }}" alt="Facebook" width="16" height="16">
                    </a>
                    <a href="#" class="class-footer-social-btn" aria-label="Instagram">
                        <img src="{{ asset('image/icons/social/instagram.svg') }}" alt="Instagram" width="16" height="16">
                    </a>
                    <a href="#" class="class-footer-social-btn" aria-label="WhatsApp">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="white">
                            <path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347z"/>
                            <path d="M12 0C5.373 0 0 5.373 0 12c0 2.125.554 4.122 1.523 5.855L.057 23.203a.75.75 0 0 0 .94.94l5.348-1.466A11.945 11.945 0 0 0 12 24c6.627 0 12-5.373 12-12S18.627 0 12 0zm0 21.75a9.75 9.75 0 0 1-5.02-1.392l-.36-.215-3.724 1.02 1.02-3.724-.215-.36A9.75 9.75 0 1 1 12 21.75z"/>
                        </svg>
                    </a>
                </div>

            </div>

            {{-- COLUMNA 2: AYUDA --}}
            <div class="class-footer-col">

                <h3 class="class-footer-col-title">¿Necesitas ayuda?</h3>

                <ul class="class-footer-links">
                    <li><a href="{{ route('nosotros') }}">Nosotros</a></li>
                    <li><a href="{{ route('contactanos') }}">Contáctanos</a></li>
                    <li><a href="{{ route('faq') }}">Preguntas frecuentes</a></li>
                    <li><a href="{{ route('politicas-devolucion') }}">Políticas de devolución</a></li>
                    <li><a href="{{ route('terminos') }}">Términos y condiciones</a></li>
                    <li>
                        <a href="{{ route('libro-reclamaciones') }}" class="class-footer-link-reclamaciones">
                            <img src="{{ asset('image/icons/libro-reclamaciones.png') }}" alt="" width="20" height="20" aria-hidden="true">
                            Libro de reclamaciones
                        </a>
                    </li>
                </ul>

            </div>

            {{-- COLUMNA 3: CONTACTO --}}
            <div class="class-footer-col">

                <h3 class="class-footer-col-title">Contáctanos</h3>

                <ul class="class-footer-links">
                    <li>Jr. Augusto B. Leguía 499</li>
                    <li>informes@grupo1s.pe</li>
                    <li>920 379 618</li>
                </ul>

                <h3 class="class-footer-col-title class-footer-col-title--mt">Horario de Atención</h3>

                <p class="class-footer-schedule">
                    Lun - Vie, 8:00 am - 07:00 pm<br>
                    Sáb, 08:00 am - 05:00 pm
                </p>

            </div>

            {{-- COLUMNA 4: MEDIOS DE PAGO --}}
            <div class="class-footer-col">

                <h3 class="class-footer-col-title">Medios de pago</h3>

                <div class="class-footer-payments">
                    <div class="class-footer-pay-card">
                        <img src="{{ asset('image/icons/payment/visa.svg') }}" alt="Visa">
                    </div>
                    <div class="class-footer-pay-card">
                        <img src="{{ asset('image/icons/payment/mastercard.svg') }}" alt="Mastercard">
                    </div>
                    <div class="class-footer-pay-card">
                        <img src="{{ asset('image/icons/payment/pay3.png') }}" alt="Pago 3">
                    </div>
                    <div class="class-footer-pay-card">
                        <img src="{{ asset('image/icons/payment/pay4.png') }}" alt="Pago 4">
                    </div>
                    <div class="class-footer-pay-card">
                        <img src="{{ asset('image/icons/payment/pay5.png') }}" alt="Pago 5">
                    </div>
                    <div class="class-footer-pay-card">
                        <img src="{{ asset('image/icons/payment/pay6.png') }}" alt="Pago 6">
                    </div>
                    <div class="class-footer-pay-card">
                        <img src="{{ asset('image/icons/payment/pay7.png') }}" alt="Pago 7">
                    </div>
                </div>

            </div>

        </div>
    </div>

    {{-- BOTTOM BAR --}}
    <div class="class-footer-bottom">
        <div class="class-footer-bottom-inner">
            <p class="class-footer-copy">© 2025 All Rights Reserved</p>
        </div>
    </div>

</footer>
