<?php
    include 'includes/templates/header.php';
?>

    <main class="contenedor seccion contenido-centrado">
        <h1>Casa en Venta frente al bosque</h1>

        <picture>
            <source srcset="build/img/destacada.webp" type="image/webp">
            <source srcset="build/img/destacada.jpg" type="image/jpeg">
            <img loading="lazy" src="build/img/destacada.jpg" alt="imagen de la propiedad">
        </picture>

        <div class="resumen-propiedad">
            <p class="precio"> $3,000,000</p>

            <ul class="iconos-caracteristicas">
                <li>
                    <img class="icono" loading="lazy" src="build/img/icono_wc.svg" alt="icono wc">
                    <p>3</p>
                </li>
                <li>
                    <img class="icono" loading="lazy" src="build/img/icono_estacionamiento.svg" alt="icono estacionamiento">
                    <p>3</p>
                </li>
                <li>
                    <img class="icono" loading="lazy" src="build/img/icono_dormitorio.svg" alt="icono habitaciones">
                    <p>4</p>
                </li>
            </ul>

            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Eaque quod sunt animi. Excepturi tempora
                officiis eaque ipsum. Cupiditate debitis veritatis vel, suscipit amet, impedit sequi laboriosam
                ipsa, ut quod explicabo?. Lorem ipsum dolor sit amet consectetur, adipisicing elit. Commodi officiis
                eum ratione non dignissimos assumenda ipsum facere error nulla quod laboriosam veritatis possimus
                corrupti quam corporis deleniti velit, animi autem.</p>

            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Ad, dolores quam? Rem error, esse corporis
                minima nesciunt placeat ullam quis deserunt ad itaque maiores voluptatem corrupti, quam tempora
                recusandae. Laboriosam?</p>
        </div>
    </main>

<?php
    include 'includes/templates/footer.php';
?>