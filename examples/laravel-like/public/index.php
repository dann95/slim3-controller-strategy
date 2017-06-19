<?php

require '../vendor/autoload.php';

use App\MyControllerSolver;
use Dann95\SlimController\Container;
use Slim\App;

$solver = new MyControllerSolver;
$container = new Container($solver);

$app = new App($container);

$app->get('/', 'PagesController@home');
$app->get('/foo', 'BarController@foo');

$app->run();