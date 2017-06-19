<?php


namespace Dann95\SlimController;

use Slim\Container as SlimContainer;
use Dann95\SlimController\Contracts\ControllerSolver;
use Dann95\SlimController\CallableResolver;

class Container extends SlimContainer
{
    /**
     * Container constructor.
     * @param ControllerSolver $controllerResolver
     */
    public function __construct(ControllerSolver $controllerResolver)
    {
        $this->bindCallableResolver($controllerResolver);
        parent::__construct();
    }

    /**
     * @param ControllerSolver $solver
     */
    private function bindCallableResolver(ControllerSolver $solver)
    {
        $callableResolver = new CallableResolver($solver);
        $this['callableResolver'] = function () use($callableResolver) {
            return $callableResolver;
        };
    }
}