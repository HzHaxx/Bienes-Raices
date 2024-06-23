<?php 

    $id = $_GET['id']; 
    $id = filter_var($id, FILTER_VALIDATE_INT);

    if (!$id) {
        header('Location: /bienesraices/index.php');
    }

    // Importar la conexión
    require 'includes/config/database.php';
    $db = conectarDB();

    // Consultar
    $query = "SELECT * FROM propiedades WHERE id = {$id}";

    // Leer los resultados
    $resultado = mysqli_query($db, $query);

    if (!$resultado->num_rows) {
        header('Location: /bienesraices/index.php');
    }

    $propiedad = mysqli_fetch_assoc($resultado);

    require 'includes/funciones.php';

    incluirTemplate('header');
?>

    <main class="contenedor seccion contenido-centrado">
        <h1><?php echo $propiedad['titulo']; ?></h1>

        <img loading="lazy" src="/bienesraices/imagenes/<?php echo $propiedad['imagen']; ?>" alt="Imagen de la propiedad">

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
    incluirTemplate('footer');
?>