<?php 

use Blog\Http\Route;
use Blog\Controller\HomeController;
use Blog\Controller\AboutController;
use Blog\Controller\BlogController;

Route::get('/', HomeController::class, 'index');
Route::get('/About', AboutController::class, 'index');
Route::get('/Blogs', BlogController::class, 'index');

