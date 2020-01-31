<?php

namespace Algorithms\Boundary;

use Algorithms\Exception\BoundaryException;

class IntBoundary
{
    private string $integer;

    /**
     * IntBoundary constructor.
     * @param string $integer
     * @throws BoundaryException
     */
    public function __construct(string $integer)
    {
        $this->integer = $integer;
        $this->validate($integer);
    }

    /**
     * @param string $integer
     * @throws BoundaryException
     */
    private function validate(string $integer)
    {
        if ($integer && !is_numeric($integer)) {
            throw new BoundaryException('Input must be numeric');
        }
    }

    public function integer(): int
    {
        return $this->integer;
    }
}