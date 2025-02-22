<?php

namespace Blog\Http;

use Blog\Http\Request;
use Blog\Http\Response;

class Route
{
    protected Request $request;
    protected Response $response;

    protected static array $routes = [];

    public function __construct(Request $request, Response $response)
    {
        $this->request = $request;
        $this->response = $response;
    }
  
    public static function get($route, $action)
    {
        self::$routes['get'][$route] = $action;
    }
    public static function post($route, $action)
    {
        self::$routes['post'][$route] = $action;
    }

    public function resolve()
    {
        $path = $this->request->path();
        $method = $this->request->method();
        $action = self::$routes[$method][$path] ?? false;

        if(!array_key_exists($path, self::$routes[$method]))
        {
            return $this->response->setStatusCode(404);
        }

        if(!$action)
        {
            return;
        }

        if(is_callable($action))
        {
            return call_user_func_array($action, []);
        }

        if(is_array($action))
        {
            $controller = new $action[0];
            $method = $action[1];
            return call_user_func_array([$controller, $method], []);
        }
    }
 
}