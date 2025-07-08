<?php

use Illuminate\Foundation\Application;
use Illuminate\Http\Request;

define('LARAVEL_START', microtime(true));

// Determine if the application is in maintenance mode...
<<<<<<< HEAD
if (file_exists($maintenance = __DIR__.'/../storage/framework/maintenance.php')) {
=======
if (file_exists($maintenance = __DIR__ . '/../storage/framework/maintenance.php')) {
>>>>>>> 7094211 (create login and sign up pages)
    require $maintenance;
}

// Register the Composer autoloader...
<<<<<<< HEAD
require __DIR__.'/../vendor/autoload.php';

// Bootstrap Laravel and handle the request...
/** @var Application $app */
$app = require_once __DIR__.'/../bootstrap/app.php';
=======
require __DIR__ . '/../vendor/autoload.php';

// Bootstrap Laravel and handle the request...
/** @var Application $app */
$app = require_once __DIR__ . '/../bootstrap/app.php';
>>>>>>> 7094211 (create login and sign up pages)

$app->handleRequest(Request::capture());
