@extends('layouts.app')

@section('title', 'Checkout')
@section('description', 'Completa tu pedido de Sedia de forma segura.')

@section('body-class', 'class-checkout-page')

@push('styles')
    @vite('resources/css/checkout.css')
@endpush

@section('content')

<section class="class-checkout">

    <h1 class="class-checkout-title">Finalizar compra</h1>

    <div class="class-checkout-body">

        <!-- ============================
        COLUMNA IZQUIERDA — FACTURACIÓN
        ============================ -->

        <div class="class-checkout-billing">

            <h2 class="class-checkout-billing-title">Detalles de facturación</h2>

            <form id="formCheckout" method="POST" action="#" novalidate>
                @csrf

                <!-- NOMBRES / APELLIDOS -->
                <div class="class-checkout-form-grid">
                    <div class="class-checkout-form-field">
                        <input type="text" name="nombres" placeholder="Nombres" class="class-checkout-input">
                    </div>
                    <div class="class-checkout-form-field">
                        <input type="text" name="apellidos" placeholder="Apellidos" class="class-checkout-input">
                    </div>
                </div>

                <!-- RUC/DNI -->
                <div class="class-checkout-form-field">
                    <input type="text" name="ruc_dni" placeholder="RUC/DNI" class="class-checkout-input">
                </div>

                <!-- PROVINCIA / REGIÓN -->
                <div class="class-checkout-form-field class-checkout-select-wrap">
                    <select name="provincia" class="class-checkout-select">
                        <option value="" disabled selected>Provincia /Región</option>
                        <option value="lima">Lima</option>
                        <option value="arequipa">Arequipa</option>
                        <option value="cusco">Cusco</option>
                        <option value="piura">Piura</option>
                        <option value="la-libertad">La Libertad</option>
                        <option value="lambayeque">Lambayeque</option>
                        <option value="junin">Junín</option>
                        <option value="ica">Ica</option>
                        <option value="ancash">Áncash</option>
                        <option value="loreto">Loreto</option>
                        <option value="puno">Puno</option>
                        <option value="cajamarca">Cajamarca</option>
                        <option value="san-martin">San Martín</option>
                        <option value="ucayali">Ucayali</option>
                        <option value="ayacucho">Ayacucho</option>
                        <option value="huanuco">Huánuco</option>
                        <option value="tacna">Tacna</option>
                        <option value="moquegua">Moquegua</option>
                        <option value="tumbes">Tumbes</option>
                        <option value="madre-de-dios">Madre de Dios</option>
                        <option value="amazonas">Amazonas</option>
                        <option value="apurimac">Apurímac</option>
                        <option value="huancavelica">Huancavelica</option>
                        <option value="pasco">Pasco</option>
                        <option value="callao">Callao</option>
                    </select>
                    <span class="class-checkout-select-arrow">
                        <svg width="10" height="6" viewBox="0 0 10 6" fill="none">
                            <path d="M1 1L5 5L9 1" stroke="#000" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                        </svg>
                    </span>
                </div>

                <!-- DIRECCIÓN -->
                <div class="class-checkout-form-field">
                    <input type="text" name="direccion" placeholder="Dirección de la calle" class="class-checkout-input">
                </div>

                <!-- CÓDIGO POSTAL -->
                <div class="class-checkout-form-field">
                    <input type="text" name="codigo_postal" placeholder="Codigo postal / ZIP" class="class-checkout-input">
                </div>

                <!-- REFERENCIAS -->
                <div class="class-checkout-form-field">
                    <input type="text" name="referencias" placeholder="Referencias de dirección" class="class-checkout-input">
                </div>

                <!-- TELÉFONO -->
                <div class="class-checkout-form-field">
                    <input type="tel" name="telefono" placeholder="Telefono/ Celular" class="class-checkout-input">
                </div>

                <!-- EMAIL -->
                <div class="class-checkout-form-field">
                    <input type="email" name="email" placeholder="Email" class="class-checkout-input">
                </div>

                <!-- CHECKBOX ENVIAR DIFERENTE -->
                <div class="class-checkout-form-field">
                    <label class="class-checkout-check">
                        <input type="checkbox" name="enviar_diferente" id="enviarDiferente">
                        <span>¿Enviar a una dirección diferente?</span>
                    </label>
                </div>

                <!-- NOTAS / INSTRUCCIONES -->
                <div class="class-checkout-notes">
                    <p class="class-checkout-notes-label">
                        Si tiene cualquier observación o instrucción especial para la entrega, porfavor agreguelo a continuación
                    </p>
                    <textarea name="notas" placeholder="Por favor quisiera que...." class="class-checkout-textarea"></textarea>
                </div>

            </form>

        </div>


        <!-- ============================
        COLUMNA DERECHA — TU ORDEN
        ============================ -->

        <div class="class-checkout-order">

            <h2 class="class-checkout-order-title">Tu orden</h2>

            <div class="class-checkout-order-box">

                <!-- CABECERA -->
                <div class="class-checkout-order-header">
                    <span>PRODUCTOS</span>
                    <span>TOTAL</span>
                </div>

                <!-- ITEMS -->
                <div class="class-checkout-order-items">
                    <div class="class-checkout-order-item">
                        <span>Piu-Arena x 6</span>
                        <span>$65</span>
                    </div>
                    <div class="class-checkout-order-item">
                        <span>Roma-Marrón x 3</span>
                        <span>$10</span>
                    </div>
                    <div class="class-checkout-order-item">
                        <span>Itze-Marrón x 2</span>
                        <span>$10</span>
                    </div>
                </div>

                <!-- SUBTOTAL -->
                <div class="class-checkout-order-subtotal">
                    <span>SUBTOTAL</span>
                    <span>$85</span>
                </div>

                <!-- ENVÍO -->
                <div class="class-checkout-order-shipping">
                    <span>ENVIO</span>
                    <span>Envio Gratis</span>
                </div>

                <!-- TOTAL -->
                <div class="class-checkout-order-total">
                    <span>TOTAL</span>
                    <span>$85</span>
                </div>

                <!-- AVISO DE PAGO -->
                <p class="class-checkout-order-notice">
                    Después de hacer clic en <strong>"Finalizar compra"</strong>, serás redirigido a Pago seguro con tarjeta, efectivo y transferencia para completar tu compra de forma segura.
                </p>

                <!-- PRIVACIDAD -->
                <p class="class-checkout-order-privacy">
                    Tus datos personales se utilizarán para procesar tu pedido, mejorar tu experiencia en esta web y otros propósitos descritos en nuestra <a href="#">política de privacidad.</a>
                </p>

                <!-- TÉRMINOS -->
                <label class="class-checkout-terms">
                    <input type="radio" name="terminos" value="acepto">
                    <span>He leído y acepto los términos y condiciones de la web</span>
                </label>

                <!-- BOTÓN -->
                <button type="submit" form="formCheckout" class="class-checkout-btn">
                    REALIZAR EL PEDIDO
                </button>

            </div>

        </div>

    </div>

</section>

@endsection
