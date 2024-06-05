<?php
    require '../../includes/funciones.php';

    incluirTemplate('header');
?>

    <main class="contenedor">
        <h1>Crear</h1>

        <a href="/bienesraices/admin/index.php" class="boton boton-verde">Volver</a>

        <form action="" class="formulario">
            <fieldset>
                <legend>Información General</legend>

                <label for="titulo">Titulo</label>
                <input type="text" id="titulo" placeholder="Titulo Propiedad">

                <label for="precio">Precio</label>
                <input type="number" id="precio" placeholder="Precio Propiedad">

                <label for="imagen">Imagen</label>
                <input type="file" id="imagen" accept="image/jpeg, image/png">

                <label for="descripcion">Descripción</label>
                <textarea id="descripcion"></textarea>
            </fieldset>



        </form>
    </main>

<?php
    incluirTemplate('footer');
?>