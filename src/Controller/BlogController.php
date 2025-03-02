<?php 

namespace Blog\Controller;

class BlogController{

    public function index()
    {
        view('Blogs', []);

    }
    public function view()
    {
        view('Blogs/Blog', []);

    }

}