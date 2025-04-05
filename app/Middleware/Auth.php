<?php 

namespace App\Middleware;

use Blog\Http\Response;

class Auth implements Middleware
{
    public static function handle()
    {
        if(!isset($_SESSION['id']))
        {
            Response::redirect('/login');
        }
    }
}