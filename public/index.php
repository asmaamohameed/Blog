<?php

session_start();

require_once '../vendor/autoload.php';
require_once '../app/Routes/web.php';
require_once '../app/Middleware/Middleware.php';
require_once '../app/Middleware/CSRF.php';

use App\Middleware\CSRF;
use Blog\Application;

CSRF::generate();

$app = new Application();

$app->run();

