<?php

session_start();

require_once '../vendor/autoload.php';
require_once '../app/Routes/web.php';
require_once '../app/Middleware/Middleware.php';

use Blog\Application;

$app = new Application();

$app->run();

