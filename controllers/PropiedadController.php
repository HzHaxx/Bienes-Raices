<?php

namespace Controllers;
use MVC\Router;

class PropiedadController
{
    public static function index(Router $router)
    {
        $router->render('propiedades/admin', []);
    }

    public function crear()
    {
        echo 'Crear';
    }

    public function actualizar()
    {
        echo 'Actualizar';
    }
}