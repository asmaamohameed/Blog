<?php 

namespace Blog\View;


class View
{
    public static function render($view, $params=[])
    {
        extract($params);
        
        include base_path(). 'views/'.$view.'.php';

    }

}