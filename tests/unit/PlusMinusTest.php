<?php

use Algorithms\Boundary\IntArrayBoundary;
use Algorithms\Exception\BoundaryException;
use Algorithms\UseCase\PlusMinusUseCase;
use PHPUnit\Framework\TestCase;

class PlusMinusTest extends TestCase
{
    private $useCase;

    public function __construct($name = null, array $data = [], $dataName = '')
    {
        parent::__construct($name, $data, $dataName);
        $this->useCase = new PlusMinusUseCase();
    }

    /**
     * @throws BoundaryException
     */
    public function test_CountRatios_CountsRatios_whenArrayOfIntegersIsGiven()
    {
        $result = $this->useCase->countRatios(new IntArrayBoundary([1, 3, 3, 0, -5]));

        $this->assertSame([
            'positive' => "0.600000",
            'negative' => "0.200000",
            'zero' => "0.200000"
        ], $result);
    }
}
