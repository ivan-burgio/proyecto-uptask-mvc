<?php

namespace Controllers;

use MVC\Router;
use Model\Proyecto;

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

        if($_SERVER['REQUEST_METHOD'] === 'POST') {
            $proyecto = new Proyecto($_POST);

            // Validación
            $alertas = $proyecto->validarProyecto();

            if(empty($alertas)) {
                // Generar una url unica
                $hash = md5(uniqid());
                $proyecto->url = $hash;

                // Almacenar el creador del proyecto
                $proyecto->propietarioId = $_SESSION['id'];

                // Guardar el proyecto
                $proyecto->guardar();

                // Redireccionar
                header('Location: /proyecto?url=' . $proyecto->url);
            }
        }

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