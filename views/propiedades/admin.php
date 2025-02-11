<main class="contenedor seccion">
    <h1>Administrador</h1>

    <?php
    if ($resultado) {
        $mensaje = mostrarNotificaciones(intval($resultado));

        if ($mensaje) { ?>
            <p class="alerta exito"><?php echo s($mensaje); ?></p>
    <?php }
    } ?>


    <div class="acciones">
        <a href="/propiedades/crear" class="boton boton-verde">Nueva Propiedad →</a>
        <a href="/vendedores/crear.php" class="boton boton-verde">Nuevo(a) Vendedor(a) →</a>
    </div>

    <h2>Propiedades</h2>

    <table class="propiedades">
        <thead>
            <tr>
                <th>ID</th>
                <th>Título</th>
                <th>Imagen</th>
                <th>Precio</th>
                <th>Acciones</th>
            </tr>
        </thead> <!-- Mostrar los resultados de la consulta -->
        <tbody>
            <?php foreach ($propiedades as $propiedad): ?>
                <tr>
                    <td><?php echo $propiedad->id; ?></td>
                    <td><?php echo $propiedad->titulo; ?></td>
                    <td><img src="../imagenes/<?php echo $propiedad->imagen; ?>" alt="" class="imagen-tabla"></td>
                    <td><?php echo "$ " . $propiedad->precio; ?></td>
                    <td class="botones-accion">
                        <form method="POST" class="w-100" action="/propiedades/eliminar">
                            <input type="hidden" name="id" value="<?php echo $propiedad->id ?>">
                            <input type="hidden" name="tipo" value="propiedad">
                            <input type="submit" value="Eliminar" class="boton-rojo-block">
                        </form>
                        <a href="/propiedades/actualizar?id=<?php echo $propiedad->id; ?>" class="boton-amarillo-block">Actualizar</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</main>