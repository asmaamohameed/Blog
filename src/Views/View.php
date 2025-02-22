<?php

namespace Blog\Views;

class View
{
    public static function make($view, $params = [])
    {
        $baseContent = self::getBaseContent();
        $viewContent = self::getViewContent($view, $params);

        return (str_replace('{{content}}', $viewContent, $baseContent));
    }
    public function makeError($error)
    {
        return self::getViewContent($error, true);
    }
    protected static function getBaseContent()
    {
        ob_start();

        include view_path(). 'layouts/main.php';

        return ob_get_clean();
    }
    protected static function getViewContent($view, $isError= false, $params=[])
    {
        $path = $isError ? view_path(). 'errors/' : view_path();

     if(str_contains($view, '.'))
     {
        $views = explode('.', $view);
        foreach($views as $view)
        {
            if(is_dir($view))
            {
                $path = $path . $view . '/';
            }
        }
        $view = $path . end($views) . '.php';
     }
     else{
        $view = $path . $view . '.php';
     }

     extract($params); // passing data to the view

     if($isError)
     {
        include $view;
     }
     else
     {
        ob_start();

        include $view;

        return ob_get_clean();
     }
 

    }
}