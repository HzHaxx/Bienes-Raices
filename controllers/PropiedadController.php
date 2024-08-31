<?php

namespace Controllers;
use MVC\Router;
use Model\Propiedad;
use Model\Vendedor;

class PropiedadController
{
    public static function index(Router $router)
    {
        $propiedades = Propiedad::all();
        $resultado = null;

        $router->render('propiedades/admin', [
            'propiedades' => $propiedades,
            'resultado' => $resultado
        ]);
    }

    public static function crear(Router $router)
    {
        $propiedad = new Propiedad;
        $vendedores = Vendedor::all();

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $propiedad = new Propiedad($_POST['propiedad']);

            // Subida de archivos
            $imagen = $_FILES['propiedad']['tmp_name']['imagen'];
            $imagen = basename($_FILES['propiedad']['name']['imagen']);
            move_uploaded_file($imagen, __DIR__ . "/../public/imagenes/$imagen");

            $resultado = $propiedad->save();

            if ($resultado) {
                header('Location: /admin?resultado=' . $resultado);
            }
        }

        $router->render('propiedades/crear', [
            'propiedad' => $propiedad,
            'vendedores' => $vendedores
        ]);
    }

    public function actualizar()
    {
        echo 'Actualizar';
    }
}