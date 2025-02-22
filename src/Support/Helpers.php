<?php

use Blog\Views\View;

if(!function_exists('env'))
{
    function env($key, $default = null)
    {
        if(array_key_exists($key, $_ENV))
        {
            return $_ENV($key);
        }
        return $default;
    }
}

if(!function_exists('value'))
{
    function value($value)
    {
        return $value instanceof Closure ? $value() : $value;
    }
}

if(!function_exists('base_path'))
{
    function base_path()
    {
        return dirname(__DIR__) . '/../';
    }
}
if(!function_exists('view_path'))
{
    function view_path()
    {
        return base_path() . '/views';
    }
}
if(!function_exists('view'))
{
    function view($view, $params = [])
    {
        return View::make($view, $params);

    }
}
