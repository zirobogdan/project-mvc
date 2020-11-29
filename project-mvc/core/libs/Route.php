<?php

namespace Core\Libs;

use Core\Views\View;

use Core\Controllers\MainController;

class Route
{
    private static $page;
    public  static function start()
    {
        $page = $_GET['page'] ?? '/';
        $routes = require __DIR__ . '/../web.php';

        if (isset($routes[$page])) {
            list($nameController, $nameMethod) = explode('@', $routes[$page]);

            if (file_exists('core/controllers/' . $nameController . '.php')) {

                // require 'core/controllers/' . $nameController . '.php';
                $pathController = 'Core\\Controllers\\' . $nameController;
                $controller = new $pathController();

                if (method_exists($controller, $nameMethod)) {
                    $controller->$nameMethod();
                } else {
                    echo 'Method not found';
                }
            } else {
                echo 'File not found';
            }
        } else {
            View::render('errors/404', [],404);
        }
    }
    public static function getPage()
    {
        return self::$page;
    }
}