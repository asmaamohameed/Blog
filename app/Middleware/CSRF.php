<?php

namespace App\Middleware;

use Blog\Http\Response;

class CSRF
{
    public static function generate()
    {
        if (!isset($_SESSION['csrf_token'])) {
            $_SESSION['csrf_token'] = bin2hex(random_bytes(32));
        }
    }
    public static function verify($token)
    {
        if (!isset($_SESSION['csrf_token']) || $token !== $_SESSION['csrf_token']) {
            Response::statusCode(403);
            view('errors/403');
            die();
        }
    }
}
