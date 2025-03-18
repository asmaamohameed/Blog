<?php

namespace Blog\Http;

require_once '../src/Support/helper.php';

class Route
{

    public static array $routes = [];
    protected Request $request;
    protected Response $response;

    public function __construct(Request $request, Response $response)
    {
        $this->request = $request;
        $this->response = $response;
    }
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

    public static function delete($path, $controller, $action)
    {
        self::route($path, $controller, $action, 'DELETE');
    }

    public function resolve()
    {

        $URI = $this->request->path();
        $method = $this->request->method();

        if (isset(self::$routes[$method][$URI])) {
            $controller = self::$routes[$method][$URI]['controller'];
            $action = self::$routes[$method][$URI]['action'];

            if (!class_exists($controller)) {
                throw new \Exception("No Controller found");
            }

            $controllerInstance = new $controller;

            if (!method_exists($controllerInstance, $action)) {
                throw new \Exception("No action found");
            }

            $controllerInstance->$action();
        } else {
            Response::statusCode(404);
            view(view: 'errors/404');
        }
    }
}
