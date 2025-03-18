<?php

namespace App\Routes;

use Blog\Controller\Auth\AuthController;
use Blog\Http\Route;
use Blog\Controller\HomeController;
use Blog\Controller\AboutController;
use Blog\Controller\BlogController;

Route::get('/', HomeController::class, 'index');
Route::get('/About', AboutController::class, 'index');
Route::get('/Blogs', BlogController::class, 'index');

Route::get('/Blogs/AddBlog', BlogController::class, 'view');

Route::post('/Blogs/AddBlog', BlogController::class, 'store');
Route::post('/Blogs/Delete', BlogController::class, 'delete');

Route::get('/Blogs/EditBlog', BlogController::class, 'edit');
Route::post('/Blogs', BlogController::class, 'update');

Route::get('/register', AuthController::class, 'index');
Route::post('/register', AuthController::class, 'register');

Route::get('/login', AuthController::class, 'view');
Route::post('/login', AuthController::class, 'login');

Route::get('/logout', AuthController::class, 'logout');
