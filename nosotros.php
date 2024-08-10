<?php
    require 'includes/app.php';

    incluirTemplate('header');
?>

    <main class="contenedor">
        <h1>Conoce sobre Nosotros</h1>

        <div class="contenido-nosotros">
            <div class="imagen">
                <picture>
                    <source srcset="build/img/nosotros.webp" type="image/webp">
                    <source srcset="build/img/nosotros.jpg" type="image/jpeg">
                    <img loading="lazy" src="build/img/nosotros.jpg" alt="Sobre Nosotros">
                </picture>
            </div>

            <div class="texto-nosotros">
                <blockquote>
                    25 Años de Experiencia
                </blockquote>

                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Eaque quod sunt animi. Excepturi tempora
                    officiis eaque ipsum. Cupiditate debitis veritatis vel, suscipit amet, impedit sequi laboriosam
                    ipsa, ut quod explicabo?. Lorem ipsum dolor sit amet consectetur, adipisicing elit. Commodi officiis
                    eum ratione non dignissimos assumenda ipsum facere error nulla quod laboriosam veritatis possimus
                    corrupti quam corporis deleniti velit, animi autem.</p>

                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Ad, dolores quam? Rem error, esse corporis
                    minima nesciunt placeat ullam quis deserunt ad itaque maiores voluptatem corrupti, quam tempora
                    recusandae. Laboriosam?</p>
            </div>
        </div>
    </main>

    <section class="contenedor seccion">
        <h1>Más Sobre Nosotros</h1>

        <div class="iconos-nosotros">
            <div class="icono">
                <img src="build/img/icono1.svg" alt="Icono Seguridad" loading="lazy">
                <h3>Seguridad</h3>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Quisquam, quod.</p>
            </div>

            <div class="icono">
                <img src="build/img/icono2.svg" alt="Icono Precio" loading="lazy">
                <h3>Precio</h3>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Quisquam, quod.</p>
            </div>

            <div class="icono">
                <img src="build/img/icono3.svg" alt="Icono Tiempo" loading="lazy">
                <h3>Tiempo</h3>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Quisquam, quod.</p>
            </div>
    </section>

<?php
    incluirTemplate('footer');
?>