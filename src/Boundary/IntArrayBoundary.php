<?php

namespace Algorithms\Boundary;

use Algorithms\Exception\BoundaryException;

class IntArrayBoundary
{

    private array $integers;

    /**
     * IntArrayBoundary constructor.
     * @param array $intArray
     * @throws BoundaryException
     */
    public function __construct(array $intArray)
    {
        $this->integers = $intArray;
        $this->validate($intArray);
    }

    /**
     * @param array $intArray
     * @throws BoundaryException
     */
    private function validate(array $intArray)
    {
        foreach ($intArray as $intValue) {
            if (!is_numeric($intValue)) {
                throw new BoundaryException('Input must contain only integers');
            }
        }
    }

    public function integers(): array
    {
        return $this->integers;
    }
}