<?php


require_once '../vendor/autoload.php';
require_once '../Routes/web.php';

use Blog\Application;
use Blog\Http\Route;

$app = new Application();

$app->run();
