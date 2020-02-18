<?php

namespace Algorithms\Boundary;

use Algorithms\Exception\BoundaryException;

class IntArrayBoundary
{
    private $integers;

    /**
     * IntArrayBoundary constructor.
     * @param array $intArray
     * @throws BoundaryException
     */
    public function __construct($intArray)
    {
        $this->integers = $intArray;
        $this->validate($intArray);
    }

    /**
     * @param array $intArray
     * @throws BoundaryException
     */
    private function validate($intArray)
    {
        if (!$intArray || !is_array($intArray)) {
            throw new BoundaryException('Input is empty');
        }

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