<main class="contenedor seccion">
    <h1>Editar el Registro de la Propiedad</h1>

    <?php foreach ($errores as $error): ?>
        <div class="alerta error">
            <?php echo $error; ?>
        </div>
    <?php endforeach; ?>

    <form class="formulario" method="POST" enctype="multipart/form-data">
        <a href="/admin" class="boton boton-amarillo-block" style="width: 20rem; margin-bottom: 2rem;">Volver atrás</a>
        <?php include __DIR__ . '/formulario.php' ?>
        <input type="submit" value="Actualizar Registro" class="boton boton-verde">
    </form>

</main>