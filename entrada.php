<?php
    include 'includes/templates/header.php';
?>

    <main class="contenedor seccion contenido-centrado">
        <h1>Guía para la decoración de tu hogar</h1>
        
        <picture>
            <source srcset="build/img/destacada.webp" type="image/webp">
            <source srcset="build/img/destacada.jpg" type="image/jpeg">
            <img loading="lazy" src="build/img/destacada.jpg" alt="imagen de la propiedad">
        </picture>
        
        <p class="informacion-meta">Escrito el: <span>20/10/2021</span> por: <span>Admin</span></p>
        
        <div class="resumen-propiedad">
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

    <footer class="footer seccion">
        <div class="contenedor contenedor-footer">
            <nav class="navegacion">
                <a href="nosotros.html">Nosotros</a>
                <a href="anuncios.html">Anuncios</a>
                <a href="blog.html">Blog</a>
                <a href="contacto.html">Contacto</a>
            </nav>
        </div>

        <p class="copyright">Todos los derechos Reservados Bienes Raices 2024 &copy;</p>
    </footer>

    <script src="build/js/bundle.min.js"></script>
</body>
</html>