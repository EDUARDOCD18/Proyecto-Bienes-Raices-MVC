<main class="contenedor seccion">
    <h1>Contacto</h1>
    <picture>
        <source srcset="/build/img/destacada3.webp" type="image/webp" />
        <source srcset="/build/img/destacada3.jpg" type="image/jpeg" />
        <img src="/build/img/destacada3.jpg" alt="Destacada 3" />
    </picture>
    <h2>Llene el siguente formulario de contacto</h2>

    <!-- Formulario para el contacto -->
    <form class="formulario" action="/contacto" method="post">
        <!-- fieldset para la información personal -->
        <fieldset>
            <legend>Información Personal</legend>

            <label class="requerido" for="nombre">Nombre y Apellido:</label>
            <input type="text" placeholder="Juana Pérez" id="nombre" name="contacto[nombre]" required/>

            <label class="requerido" for="email">E-mail:</label>
            <input type="email" placeholder="correo@correo.com" id="email" name="contacto[email]" required/>

            <label class="requerido" for="telefono">Teléfono:</label>
            <input type="tel" placeholder="12345678900" id="telefono" name="contacto[telefono]" required/>

            <label for="mensaje">Mensaje:</label>
            <textarea id="mensaje" placeholder="Mensaje aquí" name="contacto[mensaje]" required></textarea>
        </fieldset>

        <!-- fieldset para la propiedad -->
        <fieldset>
            <legend>Información de la Propiedad</legend>

            <label class="requerido" for="opciones">Comprar o Vender:</label>
            <select id="opciones" name="contacto[tipo]" required>
                <option value="" disabled selected>-- Seleccione --</option>
                <option value="Compra">Comprar</option>
                <option value="Vende">Vender</option>
            </select>

            <label class="requerido" for="presupuesto">Presupuesto: </label>
            <input type="number" placeholder="Tu precio o presupuesto" id="presupuesto" name="contacto[precio]" required/>
        </fieldset>

        <!-- fieldseto para el contacto -->
        <fieldset>
            <legend>Contacto</legend>

            <p>Como desea ser contactado:</p>
            <div class="forma-contacto requerido">
                <label for="contactar-telefono">Teléfono</label>
                <input type="radio" value="teléfono" id="contactar-telefono" name="contacto[contacto]" required/>

                <label for="contactar-email">E-mail</label>
                <input type="radio" value="email" id="contactar-email" name="contacto[contacto]" required/>
            </div>

            <p>
                Eliga fecha y hora para ser contactado (solo si escogió teléfono)
            </p>

            <label class="requerido" for="fecha">Fecha:</label>
            <input type="date" id="fecha" name="contacto[fecha]"/>

            <label for="hora">hora:</label>
            <input type="time" id="hora" min="09:00" max="18:00" name="contacto[hora]" />
        </fieldset>

        <input type="submit" value="Enviar" class="boton-verde" />
    </form>
    <!-- .formulario -->
</main>