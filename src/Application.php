<?php

namespace Blog;

use Blog\Http\Request;
use Blog\Http\Response;
use Blog\Http\Route;

class Application
{
    protected Route $route;

    public function __construct()
    {
        $this->route = new Route(new Request, new Response);
    }
    public function run()
    {
        $this->route->resolve();
    }
}
