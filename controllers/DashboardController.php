<?php

namespace Controllers;

use MVC\Router;

class DashboardController {
    public static function index(Router $router) {
        session_start();
        isAuth();

        // Render a la vista
        $router->render('dashboard/index', [
            'titulo' => 'Proyectos',
        ]);
    }

    public static function crear_proyecto(Router $router) {
        session_start();
        isAuth();

        $alertas = [];

        // Render a la vista
        $router->render('dashboard/crear-proyecto', [
            'titulo' => 'Crear Proyecto',
            'alertas' => $alertas,
        ]);
    }

    public static function perfil(Router $router) {
        session_start();
        isAuth();

        // Render a la vista
        $router->render('dashboard/perfil', [
            'titulo' => 'Perfil',
        ]);
    }
}