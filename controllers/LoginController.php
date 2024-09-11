<?php

namespace Controllers;
use MVC\Router;
use Model\Admin;

class LoginController
{
    public static function login(Router $router)
    {

        $errores = [];

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $auth = $_POST;

            // Validar que los campos no estén vacíos
            if (!$auth['email']) {
                $errores[] = 'El email es obligatorio';
            }

            if (!$auth['password']) {
                $errores[] = 'El password es obligatorio';
            }

            if (empty($errores)) {
                // Revisar si el usuario existe
                $usuario = Admin::where('email', $auth['email'])->first();

                if ($usuario) {
                    // Revisar si el password es correcto
                    if (password_verify($auth['password'], $usuario->password)) {
                        // Autenticar el usuario
                        session_start();

                        $_SESSION['usuario'] = $usuario->email;
                        $_SESSION['login'] = true;

                        header('Location: /admin');
                    } else {
                        $errores[] = 'El password es incorrecto';
                    }
                } else {
                    $errores[] = 'El usuario no existe';
                }
            }
        }
        
        $router->render('auth/login', [
            'errores' => $errores
        ]);
    }

    public static function logout()
    {
        echo 'Cerrar Sesión';
    }
}