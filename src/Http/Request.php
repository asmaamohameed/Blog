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
        $path = preg_replace('/\/+/', '/', $_SERVER['REQUEST_URI']) ?? '/';

        return str_contains($path, '?') ? explode('?', $path)[0]  : $path;
    }
}
