<?php

use  Blog\View\View;

if(!function_exists('dd'))
{
    function dd($value)
    {
        echo "<pre>";
        var_dump($value);
        echo "</pre>";
        die();

    }
}
if(!function_exists('base_path'))
{
    function base_path()
    {
        return dirname(__DIR__). '/../';

    }
}
if(!function_exists('view'))
{
    function view($view, $params=[])
    {
        return View::render($view, $params);

    }
}