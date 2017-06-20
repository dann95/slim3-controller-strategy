<?php


namespace Dann95\SlimController;

use Slim\Interfaces\CallableResolverInterface;
use Dann95\SlimController\Contracts\ControllerSolver;
use RuntimeException;

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

        $solved = $this->solver->solve($toResolve);

        $this->assetArray($solved);
        $this->assertCallableMethod($solved);

        return $solved;
    }

    /**
     * @param $solved
     */
    private function assetArray($solved)
    {
        if(! (is_array($solved) || count($solved) == 2))
            throw new RuntimeException(sprintf(
                '%s is not resolvable',
                is_array($solved) ? json_encode($solved) : $solved
            ));
    }

    /**
     * @param $solved
     */
    private function assertCallableMethod($solved)
    {
        if(! method_exists($solved[0], $solved[1]))
            throw new RuntimeException(sprintf(
                'The method %s does exist in the class %s',
                $solved[1],
                get_class($solved[0])
            ));
    }
}