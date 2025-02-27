<?php

namespace Blog\Http;
require_once '../src/Helpers/helper.php';

class Route{

    public static array $routes = [];

   public static function route($path, $controller, $action, $method)
   {

    self::$routes[$method][$path] = [
        'controller' => $controller,
        'action' => $action
    ];

   }

   public static function get($path, $controller, $action)
   {
    self::route($path, $controller, $action, 'GET');
   }
   public static function post($path, $controller, $action)
   {
    self::route($path, $controller, $action, 'POST');
   }
    
   public function resolve()
   {
    
    $URI = $_SERVER["REQUEST_URI"] ?? '/';
    $method = $_SERVER['REQUEST_METHOD'];
    
    if(isset(self::$routes[$method][$URI]))
    {
        $controller = self::$routes[$method][$URI]['controller'];
        $action = self::$routes[$method][$URI]['action'];

        if(!class_exists($controller))
        {
            throw new \Exception("No Controller found");
        }

        $controllerInstance = new $controller;

        if(!method_exists($controllerInstance, $action))
        {
            throw new \Exception("No action found");
        }

        $controllerInstance->$action();
    }
    else
    {
        throw new \Exception("No Route found");
    }
   }
}