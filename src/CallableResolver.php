<?php


namespace Dann95\SlimController;

use Slim\Interfaces\CallableResolverInterface;
use Dann95\SlimController\Contracts\ControllerSolver;

class CallableResolver implements CallableResolverInterface
{
    /**
     * @var ControllerSolver
     */
    private $solver;

    /**
     * CallableResolver constructor.
     * @param ControllerSolver $solver
     */
    public function __construct(ControllerSolver $solver)
    {
        $this->solver = $solver;
    }

    /**
     * @param mixed $toResolve
     * @return array|\Closure
     */
    public function resolve($toResolve)
    {
        if(is_callable($toResolve))
            return $toResolve;

        return $this->solver->solve($toResolve);
    }
}