<?php

namespace Algorithms\Boundary;

use Algorithms\Exception\BoundaryException;

class IntMatrix3x3Boundary
{
    private array $matrix;

    /**
     * Int3x3MatrixBoundary constructor.
     * @param array $matrix
     * @throws BoundaryException
     */
    public function __construct(array $matrix)
    {
        $this->matrix = $matrix;

        if (!$this->validate($matrix)) {
            throw new BoundaryException('Input matrix size must be 3x3 and contain only integers');
        }
    }

    public function matrix(): array
    {
        return $this->matrix;
    }

    private function validate(array $matrix)
    {
        if (count($matrix) !== 3) {
            return false;
        }

        foreach ($matrix as $row) {
            if (!is_array($row) || count($row) !== 3) {
                return false;
            }

            foreach ($row as $value) {
                if (!is_numeric($value)) {
                    return false;
                }
            }
        }

        return true;
    }
}