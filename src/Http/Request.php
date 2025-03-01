<?php

namespace Blog\Http;
class Request
{
    public function method()
    {
        return $_SERVER['REQUEST_METHOD'];
    }
    public function path()
    {
        return $_SERVER["REQUEST_URI"] ?? '/';

    }
}