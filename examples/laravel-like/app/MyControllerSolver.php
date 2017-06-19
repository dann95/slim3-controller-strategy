<?php

namespace App;

use Dann95\SlimController\Contracts\ControllerSolver;

class MyControllerSolver implements ControllerSolver
{
    public function solve($toResolve)
    {
        $explode = explode('@', $toResolve);
        $namespace = 'App\\Http\\Controllers\\';
        $class = $namespace.$explode[0];
        return [(new $class), $explode[1]];
    }
}