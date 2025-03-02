<?php

namespace Blog\Controller;

class HomeController
{

    public function index()
    {
        view('Home', []);

    }
}