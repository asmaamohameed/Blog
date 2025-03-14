<?php

namespace Blog\Controller\Auth;

class AuthController
{
    public function index()
    {
        view('Auth/Register', []);
    }

    public function view()
    {
        view('Auth/Login', []);
    }
}
