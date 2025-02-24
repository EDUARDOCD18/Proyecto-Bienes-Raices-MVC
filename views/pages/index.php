<main class="contenedor seccion">
    <h1>Más sobre Nosotros</h1>
    
    <?php include 'iconos.php'; ?>

</main>
<!-- main -->

<div class="seccion contenedor">
    <h2>Casas y Departamentos</h2>

    <?php
    $limite = 3;
    include 'listado.php';
    ?>

    <!-- Contenedor de anuncios -->
    <div class="alinear-derecha">
        <a href="anuncios.php" class="boton-verde">Ver todas</a>
    </div>
</div>
<!-- .seccion -->

<section class="imagen-contacto">
    <h2>Encuentra la casa de tus sueños</h2>
    <p>
        Llena el formulario de contacto y un asesor se pondrá a tu disposición
        lo más pronto posible
    </p>
    <a href="contacphp" class="boton-amarillo">Contacta ahora</a>
</section>
<!-- .imagen-contacto -->

<div class="contenedor seccion seccion-inferior">
    <section class="blog">
        <h3>Nuestro Blog</h3>

        <article class="entrada-blog">
            <div class="imagen">
                <picture>
                    <source srcset="build/img/blog1.webp" type="image/webp" />
                    <source srcset="build/img/blog1.jpg" type="image/jpeg" />
                    <img loading="lazy" src="build/img/blog1.jpg" alt="Entrada Blog Texto" />
                </picture>
            </div>
            <!-- .imagen -->

            <div class="texto-entrada">
                <a href="entraphp">
                    <h4>Terraza en el techo de tu casa</h4>
                    <p class="informacion-meta">
                        Escrito el <span>18/06/1999</span> por : <span>Admin</span>
                    </p>

                    <p>Consejos para construir una tarraza en el techo de tu casa</p>
                </a>
            </div>
            <!-- .texto-entrada -->
        </article>

        <article class="entrada-blog">
            <div class="imagen">
                <picture>
                    <source srcset="build/img/blog2.webp" type="image/webp" />
                    <source srcset="build/img/blog2.jpg" type="image/jpeg" />
                    <img loading="lazy" src="build/img/blog2.jpg" alt="Entrada Blog Texto" />
                </picture>
            </div>
            <!-- .imagen -->

            <div class="texto-entrada">
                <a href="entrada.php">
                    <h4>Guía para la decoración de tu hogar</h4>
                    <p class="informacion-meta">
                        Escrito el <span>18/06/2024</span> por : <span>Javi</span>
                    </p>

                    <p>Decora bien tu casa con los mejores tips</p>
                </a>
            </div>
            <!-- .texto-entrada -->
        </article>
    </section>
    <!-- .blog -->

    <section class="testimoniales">
        <h3>Testimoniales</h3>
        <div class="testimonial">
            <blockquote>
                Lorem ipsum dolor sit amet consectetur adipisicing elit. Ab dolores
                fuga necessitatibus perspiciatis quod porro. Ad aut sit commodi
                doloribus laudantium, voluptas libero tempora dignissimos minus fuga
                excepturi iste incidunt?
            </blockquote>
            <p>Javier C</p>
        </div>
        <!-- .testimonial -->
    </section>
    <!-- .testimoniales -->
</div>
<!-- .contenedor de blog -->