<?php


namespace Dann95\SlimController\Contracts;


interface ControllerSolver
{
    /**
     * @param $toResolve
     * @return array
     */
    public function solve($toResolve);
}