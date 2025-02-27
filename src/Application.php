<?php 

namespace Blog;

use Blog\Http\Route;

class Application
{
    protected Route $route;

    public function __construct()
    {
        $this->route = new Route();

    }
    public function run()
    {
        $this->route->resolve();

    }
}