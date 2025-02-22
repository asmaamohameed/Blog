<?php

use Blog\Http\Route;
use App\Controller\HomeController;

Route::get('/',[HomeController::class, 'index']);