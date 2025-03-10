<?php

namespace Blog\Controller;

use Blog\Model\Blog;
use Blog\Http\Response;

class BlogController
{
    private $Blogs;
    public function __construct()
    {
        $this->Blogs = new Blog();
    }
    public function index()
    {
        $Blogs = $this->Blogs->getAll();

        view('Blogs', ['blogs' => $Blogs]);
    }
    public function view()
    {
        view('Blogs/AddBlog', []);
    }
    public function create()
    {
        $blog = $this->Blogs->getOne();

        view('Blogs/EditBlog', ['blog' => $blog]);
    }
    public function store()
    {
        $data = [
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
