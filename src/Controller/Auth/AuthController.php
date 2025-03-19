<?php

namespace Blog\Controller\Auth;

use App\Middleware\CSRF;
use Blog\Http\Response;
use Blog\Model\User;
use Blog\Validation\Validator;

class AuthController
{
    private $User;

    public function __construct()
    {
        $this->User = new User();
    }
    public function index()
    {
        view('Auth/Register', []);
    }

    public function view()
    {
        view('Auth/Login', []);
    }

    public function register()
    {
        CSRF::verify($_POST['csrf_token']);

        $validate = new Validator();
        $validate->setRules([
            'name' => 'required|min:3|max:255',
            'email' => 'required|email|unique',
            'password' => 'required|min:6|max:255|alphaNumirec',
        ])->validate($_POST);

        if ($validate->fails()) {
            $errors = $validate->errors();
            view('Auth/Register', ['errors' => $errors, 'old' => $_POST]);
            return;
        }

        $data = [
            'name' => $_POST['name'],
            'email' => $_POST['email'],
            'password' => password_hash($_POST['password'], PASSWORD_DEFAULT)
        ];

        $this->User->save($data);

        Response::redirect('/login');
    }

    public function login()
    {
        CSRF::verify($_POST['csrf_token']);

        $validate = new Validator();
        $validate->setRules([
            'email' => 'required|email',
            'password' => 'required'
        ])->validate($_POST);

        if ($validate->fails()) {
            $errors = $validate->errors();
            view('Auth/Login', ['errors' => $errors, 'old' => $_POST]);
            return;
        }


        $user = $this->User->emailExists(email: $_POST['email']);

        if (!$user || !$this->User->verifyPassword($_POST['password'], $user['password'])) {
            $errors['email'] = 'Invalid email or password.';
            view('Auth/Login', ['errors' => $errors, 'old' => $_POST]);
            return;
        }

        $_SESSION['id'] = $user['id'];
        $_SESSION['email'] = $user['email'];

        Response::redirect('/');
    }

    public function logout()
    {
        session_destroy();
        Response::redirect('/');
    }
}
