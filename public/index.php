<?php


require_once '../vendor/autoload.php';
require_once '../app/Routes/web.php';

use Blog\Application;
use Blog\Validation\Validator;

$app = new Application();

$app->run();




    

