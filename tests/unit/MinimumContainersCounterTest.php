<?php

use Algorithms\UseCase\MinimumContainersCounterUseCase;
use PHPUnit\Framework\TestCase;

class MinimumContainersCounterTest extends TestCase
{
    private MinimumContainersCounterUseCase $useCase;

    public function __construct($name = null, array $data = [], $dataName = '')
    {
        parent::__construct($name, $data, $dataName);
        $this->useCase = new MinimumContainersCounterUseCase();
    }

    public function test_Counter_CountsMinimumContainersRequired_WhenUnsortedIntegerArrayIsGiven()
    {
        $items = [12, 15, 7, 8, 19, 24];

        $containers = $this->useCase->countContainers($items);

        $this->assertEquals(4, $containers);
    }

    public function test_Counter_CountsMinimumContainersRequired_WhenSortedIntegerArrayIsGiven()
    {
        $items = [1, 2, 3, 10, 17];

        $containers = $this->useCase->countContainers($items);

        $this->assertEquals(3, $containers);
    }

    public function test_Counter_CountsMinimumContainersRequired_WhenArrayWithOneItegerIsGiven()
    {
        $items = [1];

        $containers = $this->useCase->countContainers($items);

        $this->assertEquals(1, $containers);
    }
}