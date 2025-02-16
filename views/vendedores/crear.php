<main class="contenedor seccion">
    <h1>Registrar Vendedor(a)</h1>

    <a href="/admin" class="boton boton-amarillo" style="width: 20rem; margin-bottom: 2rem;">← Volver</a>

    <?php
    foreach ($errores as $error) :
    ?> <div class="alerta error">
            <?php echo $error; ?>
        </div>
    <?php endforeach; ?>

    <form action="" class="formulario" method="POST" action="/admin/vendedores/crear.php">

        <?php include 'formulario.php'; ?>

        <input type="submit" value="Registrar vendedor(a)" class="boton boton-verde">
    </form> <!-- .formulario -->
</main>