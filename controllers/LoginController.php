<?php

namespace Controllers;

use MVC\Router;

class LoginController {
    public static function login(Router $router) {
        if($_SERVER['REQUEST_METHOD'] === 'POST') {

        }

        // Render a la vista
        $router->render('auth/login', [
            'titulo' => 'Iniciar Sesión'
        ]);

    }

    public static function logout() {
        echo "desde logout";
    }

    public static function crear(Router $router) {
        if($_SERVER['REQUEST_METHOD'] === 'POST') {
            
        }

        // Render a la vista
        $router->render('auth/crear', [
            'titulo' => 'Crear tu Cuenta'
        ]);

    }

    public static function olvide(Router $router) {
        if($_SERVER['REQUEST_METHOD'] === 'POST') {
            
        }

        // Render a la vista
        $router->render('auth/olvide', [
            'titulo' => 'Olvide mi Contraseña'
        ]);
        
    }

    public static function reestablecer(Router $router) {
        if($_SERVER['REQUEST_METHOD'] === 'POST') {
            
        }

        // Render a la vista
        $router->render('auth/reestablecer', [
            'titulo' => 'Reestablecer Contraseña'
        ]);
    }

    public static function mensaje(Router $router) {
        // Render a la vista
        $router->render('auth/mensaje', [
            'titulo' => 'Cuenta Creada Exitosamente'
        ]);
    }

    public static function confirmar(Router $router) {
        echo "desde confirmar";
    }
}