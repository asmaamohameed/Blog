<?php


require_once '../vendor/autoload.php';
require_once '../app/Routes/web.php';

use Blog\Application;
use Blog\Http\Route;
use Blog\Database\Database;

$app = new Application();

$app->run();

// $db = Database::getInstance()->getConnection();



// dd($db->query('SELECT * FROM articals')->fetchAll());
