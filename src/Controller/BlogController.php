<?php

namespace Blog\Controller;

use Blog\Model\Blog;
use Blog\Http\Response;
use Blog\Validation\Validator;
use App\Middleware\Auth;
use App\Middleware\BlogOwner;

class BlogController
{
    private $Blogs;
    public function __construct()
    {
        Auth::handle();
        $this->Blogs = new Blog();
    }
    public function index()
    {
        $Blogs = $this->Blogs->getForUser($_SESSION['id']);

        view('Blogs', ['blogs' => $Blogs]);
    }
    public function view()
    {
        view('Blogs/AddBlog', []);
    }
    public function edit()
    {
        BlogOwner::handle();

        $blog = $this->Blogs->getOne($_GET['id']);

        view('Blogs/EditBlog', ['blog' => $blog]);
    }
    public function store()
    {
        $validate = new Validator();

        $validate->setRules([
            'title' => 'required|min:3|max:255',
            'article' => 'required|min:10|max:1000',
        ])->validate($_POST);

        if ($validate->fails()) {
            $errors = $validate->errors();
            view('Blogs/AddBlog', ['errors' => $errors, 'old' => $_POST]);
            return;
        }

        $data = [
            'user_id' => $_SESSION['id'],
            'title' => $_POST['title'],
            'category' => $_POST['category'],
            'article' => $_POST['article'],
            'articleDate' => date('Y-m-d H:i:s'),
            'publisher' => "Ashley",
            'publisherTitle' => "CEO"
        ];

        $this->Blogs->create($data);

        Response::redirect('/Blogs');
    }
    public function delete()
    {
        $this->Blogs->delete();

        Response::redirect('/Blogs');
    }
    public function update()
    {
        $validate = new Validator();

        $validate->setRules([
            'title' => 'required|min:3|max:255',
            'article' => 'required|min:10|max:1000',
        ])->validate($_POST);

        if ($validate->fails()) {
            $errors = $validate->errors();
            view('Blogs/EditBlog', ['errors' => $errors, 'blog' => $_POST]);
            return;
        }

        $data = [
            'id' => $_POST['id'],
            'title' => $_POST['title'],
            'category' => $_POST['category'],
            'article' => $_POST['article'],
            'articleDate' => date('Y-m-d H:i:s'),
            'publisher' => "Ashley",
            'publisherTitle' => "CEO"
        ];

        $this->Blogs->update($data);

        Response::redirect('/Blogs');
    }
}
