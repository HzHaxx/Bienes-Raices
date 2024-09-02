<?php

namespace Controllers;
use MVC\Router;
use Model\Propiedad;
use Model\Vendedor;
use Intervention\Image\ImageManagerStatic as Image;

class PropiedadController
{
    public static function index(Router $router)
    {
        $propiedades = Propiedad::all();
        
        // Mensaje condicional
        $resultado = $_GET['resultado'] ?? null;

        $router->render('propiedades/admin', [
            'propiedades' => $propiedades,
            'resultado' => $resultado
        ]);
    }

    public static function crear(Router $router)
    {
        $propiedad = new Propiedad;
        $vendedores = Vendedor::all();

        // Arreglo con mensajes de errores
        $errores = Propiedad::getErrores();

        // Ejecutar el código después de que el usuario envía el formulario
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {

            // Subida de archivos
            $imagen = $_FILES['propiedad']['tmp_name']['imagen'];
            $imagen = basename($_FILES['propiedad']['name']['imagen']);
            move_uploaded_file($imagen, __DIR__ . "/../public/imagenes/$imagen");

                // Guardar en la base de datos
                $propiedad->guardar();

            }
        }

        $router->render('propiedades/crear', [
            'propiedad' => $propiedad,
            'vendedores' => $vendedores,
            'errores' => $errores
        ]);
    }

    public function actualizar()
    {
        echo 'Actualizar';
    }
}