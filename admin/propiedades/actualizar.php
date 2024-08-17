<?php

// Para verificar si hay errores
// ini_set('display_errors', 1);
// ini_set('display_startup_errors', 1);
// error_reporting(E_ALL);

use App\Propiedad;
use Intervention\Image\ImageManagerStatic as Image;

require '../../includes/app.php';
estaAutenticado();

    // Validar la URL por ID válido
    $id = $_GET['id'];
    $id = filter_var($id, FILTER_VALIDATE_INT);
 
    if(!$id) {
        header('Location: admin/index.php');
    }

    // Obtener los datos de la propiedad
    $propiedad = Propiedad::find($id);

    // Consultar para obtener los vendedores
    $query = "SELECT * FROM vendedores";
    $resultado = mysqli_query($db, $query);

    // Arreglo con mensajes de errores
    $errores = [];

    // Ejecutar el código después de que el usuario envía el formulario
    if($_SERVER['REQUEST_METHOD'] === 'POST') {

        // Asignar los atributos
        $args = $_POST['propiedad'];

        $propiedad->sincronizar($args);

        // Asignar file hacia una variable
        $imagen = $_FILES['imagen'];

        // Validar que los campos no estén vacíos
        if(!$titulo) {
            $errores[] = "Debes añadir un título";
        }

        if(!$precio) {
            $errores[] = "Debes añadir un precio";
        }

        if(strlen($descripcion) < 50) {
            $errores[] = "La descripción es obligatoria y debe tener al menos 50 caracteres";
        }

        if(!$habitaciones) {
            $errores[] = "Debes añadir el número de habitaciones";
        }

        if(!$wc) {
            $errores[] = "Debes añadir el número de baños";
        }

        if(!$estacionamiento) {
            $errores[] = "Debes añadir el número de estacionamientos";
        }

        if(!$vendedorId) {
            $errores[] = "Debes añadir el vendedor";
        }

        // Validar por tamaño (1mb máximo)
        $medida = 1000 * 1000;

        if($imagen['size'] > $medida) {
            $errores[] = "La imagen es muy pesada";
        }

        if(empty($errores)) {

            // Crear carpeta
            $carpetaImagenes = '../../imagenes/';

            if(!is_dir($carpetaImagenes)) {
                mkdir($carpetaImagenes);
            }

            $nombreImagen = '';

            /** SUBIDA DE ARCHIVOS **/
            if ($imagen['name']) {
                // Eliminar la imagen previa
                unlink($carpetaImagenes . $propiedad['imagen']);

                // Generar un nombre único
                $nombreImagen = md5( uniqid( rand(), true ) ) . ".jpg";
    
                // Subir la imagen
                move_uploaded_file($imagen['tmp_name'], $carpetaImagenes . $nombreImagen);
            } else {
                $nombreImagen = $propiedad['imagen'];
            }


            // Insertar en la base de datos
            $query = "UPDATE propiedades SET titulo = '{$titulo}', precio = '{$precio}', imagen = '{$nombreImagen}', descripcion = '{$descripcion}', habitaciones = {$habitaciones}, wc = {$wc}, estacionamiento = {$estacionamiento}, vendedorId = {$vendedorId} WHERE id = {$id}";

            // echo $query;

            $resultado = mysqli_query($db, $query);

            if($resultado) {
                // Redireccionar al usuario
                header('Location: /admin/index.php?resultado=2');
            }
        }
    }
}

incluirTemplate('header');
?>

<main class="contenedor">
    <h1>Actualizar Propiedad</h1>

    <?php foreach ($errores as $error): ?>
        <div class="alerta error">
            <?php echo $error; ?>
        </div>
    <?php endforeach; ?>

    <a href="/admin/index.php" class="boton boton-verde">Volver</a>

    <form method="POST" class="formulario" enctype="multipart/form-data">
        <?php include '../../includes/templates/formulario_propiedades.php'; ?>

        <input type="submit" value="Actualizar Propiedad" class="boton boton-verde">
    </form>
</main>

<?php
incluirTemplate('footer');
?>