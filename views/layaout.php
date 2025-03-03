<?php

if (!isset($_SESSION)) {
    session_start();
}

$auth = $_SESSION['login'] ?? false;

if (!isset($inicio)) {
    $inicio = false;
}
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bienes Raices</title>
    <link rel="preload" href="/build/css/app.css" as="style">
    <link rel="stylesheet" href="/build/css/app.css">
</head>

<body>
    <header class="header <?php echo $inicio ? 'inicio' : ''; ?>">
        <div class="contenedor contenido-header">
            <div class="barra">
                <a href="/"><img src="/build/img/logo.svg" alt="Logo" /></a>

                <div class="mobile-menu">
                    <img src="/build/img/barras.svg" alt="icono menu responsive" />
                </div>

                <div class="derecha">
                    <img class="dark-mode-boton" src="/build/img/dark-mode.svg" alt="Activar Modo Oscuro" />
                    <div class="navegacion">
                        <a href="/nosotros">Nosotros</a>
                        <a href="/propiedades">Anuncios</a>
                        <a href="/blog">Blog</a>
                        <a href="/contacto">Contacto</a>
                        <?php if ($auth) : ?>
                            <a href="/logout">Cerrar Sesión</a>
                        <?php else : ?>
                            <a href="/login">Iniciar Sesión</a>
                        <?php endif; ?>
                    </div>
                </div>
                <!-- .navegacion -->
            </div>
            <!-- .barra -->

            <?php echo $inicio ? "<h1>Venta de Casas y Departamentos Exclusivos de Lujo</h1>" : ''; ?>
        </div>
        <!-- .contenedor -->
    </header>
    <!-- .header -->

    <?php echo $contenido; ?>

    <footer class="footer seccion">
        <div class="contenedor contenedor-footer">
            <div class="navegacion">
                <a href="/nosotros">Nosotros</a>
                <a href="/anuncios">Anuncios</a>
                <a href="/blog">Blog</a>
                <a href="/contacto">Contacto</a>
            </div>
            <!-- .navegacion -->
        </div>
        <!-- .contenedor .contenedor-footer -->
        <p class="copyright">Todos los derechos reservados. <?php echo date('Y'); ?></p>
    </footer>
    <!-- .footer -->

    <script src="/build/js/bundle.min.js"></script>
</body>

</html>