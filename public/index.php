<?php

require_once __DIR__.'/../vendor/autoload.php';
use app\Router;
use app\controllers\Controller;

$router = new Router();

$router -> get('/', [new Controller, 'dashboard']);
$router -> get('/dashboard', [new Controller, 'dashboard']);
$router -> get('/analytics_temperature',[new Controller, 'analytics_temperature']);
$router -> get('/analytics_distance', [new Controller, 'analytics_distance']);
$router -> get('/analytics_movement', [new Controller, 'analytics_movement']);
$router -> get('/analytics_light', [new Controller, 'analytics_light']);
$router -> get('/analytics_boton', [new Controller, 'analytics_boton']);

$router -> resolve(); 