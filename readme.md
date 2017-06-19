# Slim 3 Controller Strategy
> This package will help you to change the way Slim 3 loads your project controllers, it’s a little boring to bind every each controller into Slim\Container to make it after behind scenes Slim determine the Controller and Method, with this package you can write your own rules to determine which controller and method that the router is looking for.

## Installation
```bash
composer require dann95/slim3-controller-strategy
```

## Usage
```php
<?php

require 'vendor/autoload.php'; // composer autoload

use Dann95\SlimController\Contracts\ControllerSolver;

class MyControllerSolver implements ControllerSolver
{
    public function solve($toResolve)
    {
        // Here we have the code to find and make new instance of class (this is just an example, you must build your logic)
        $explode = explode("@", $toResolve);
        
        // You must return an array like: [$instanceOfController, $methodName];
        $controller = new $explode[0]; // $explode[0] == TheControllerImLookingFor
        return [$controller, $explode[1]]; // $explode[1] == theMethodName
    }
    
}

$myControllerSolver = new MyControllerSolver;
$container = new Dann95\SlimController\Container($myControllerSolver);

$app = new Slim\App($container);
$app->get('/', 'TheControllerImLookingFor@theMethodName');

$app->run();
```