<?php

namespace Algorithms\Boundary;

use Algorithms\Exception\BoundaryException;

class IntBoundary
{
    private int $integer;

    /**
     * IntBoundary constructor.
     * @param string $integer
     * @throws BoundaryException
     */
    public function __construct($integer)
    {
        $this->integer = $integer;
        $this->validate($integer);
    }

    /**
     * @param string $integer
     * @throws BoundaryException
     */
    private function validate($integer)
    {
        if ($integer !== 0 && (!$integer || $integer && !is_numeric($integer))) {
            throw new BoundaryException('Input must be numeric');
        }
    }

    public function integer(): int
    {
        return $this->integer;
    }
}