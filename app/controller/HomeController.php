<?php

namespace App\Controller;

use Blog\Views\View;

class HomeController
{
    public function index()
    {
        return View('home');
        
    }

}