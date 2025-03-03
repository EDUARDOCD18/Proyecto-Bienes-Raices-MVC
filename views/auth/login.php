<main class="contenedor seccion contenido-centrado">
    <h1>Iniciar Sesión</h1>

    <?php foreach ($errores as $error) : ?>
        <div class="alerta error">
            <?php echo $error; ?>
        </div>
    <?php endforeach; ?>

    <form action="/login" class="formulario" method="post">
        <!-- fieldset para iniciar la sesión -->
        <fieldset>
            <legend>Identifiquese</legend>

            <label for="email" class="requerido">E-mail:</label>
            <input type="email" name="email" placeholder="correo@correo.com" id="nombre" />
            <label for="password" class="requerido">Password:</label>
            <input type="password" name="password" placeholder="Tu password" id="password" />
        </fieldset>
        <input type="submit" value="Iniciar Sesión" class="boton boton-verde">
    </form>
</main>