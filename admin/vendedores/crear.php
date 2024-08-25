<?php

require '../../includes/app.php';

use App\Vendedor;

estaAutenticado();

$vendedor = new Vendedor;

// Arreglo con mensajes de errores
$errores = Vendedor::getErrores();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Crear una nueva instancia
    $vendedor = new Vendedor($_POST['vendedor']);

    // Validar que no haya campos vacíos
    $errores = $vendedor->validar();

    // Revisar que el arreglo de errores esté vacío
    if (empty($errores)) {
        $vendedor->guardar();
    }
}

// Incluye un template
incluirTemplate('header');
?>

<main class="contenedor">
    <h1>Registrar Vendedor(a)</h1>

    <?php foreach ($errores as $error): ?>
        <div class="alerta error">
            <?php echo $error; ?>
        </div>
    <?php endforeach; ?>

    <a href="/admin/index.php" class="boton boton-verde">Volver</a>

    <form action="/admin/vendedores/crear.php" method="POST" class="formulario">
        <?php include '../../includes/templates/formulario_vendedores.php'; ?>

        <input type="submit" value="Registrar Vendedor(a)" class="boton boton-verde">
    </form>
</main>

<?php
incluirTemplate('footer');
?>