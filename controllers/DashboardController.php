<?php

namespace Controllers;

use MVC\Router;

class DashboardController {
    public static function index(Router $router) {
        session_start();

        // Render a la vista
        $router->render('dashboard/index', [

        ]);
    }
}