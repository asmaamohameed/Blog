<?php

namespace App\Middleware;

use Blog\Http\Response;
use App\Middleware\Middleware;
use Blog\Model\Blog;

class BlogOwner implements Middleware
{
    public static function handle()
    {
        $blog = new Blog();
        $blog = $blog->getOne($_GET['id']);

        if (!isset($_GET['id']) || !is_numeric($_GET['id']) || !$blog) {
            Response::statusCode(404);
            view(view: 'errors/404');
            die();
        }

        if ($blog['user_id'] != $_SESSION['id']) {
            Response::statusCode(403);
            view(view: 'errors/403');
            die();
        }
    }
}
