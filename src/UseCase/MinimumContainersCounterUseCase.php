<?php

namespace Algorithms\UseCase;

use Algorithms\Boundary\IntArrayBoundary;

class MinimumContainersCounterUseCase
{
    public const DESCRIPTION = "Count minimum number of containers that can contain items that are less or equal than minimum container item + 4 (Minimum containers)";

    /**
     * Rules:
     *
     * n - number of items to ship
     *
     * 1 container can fit in only 4 + min item weight items
     *
     * @param IntArrayBoundary $intArrayBoundary
     * @return int
     */
    public function countContainers(IntArrayBoundary $intArrayBoundary): int
    {
        $items = $intArrayBoundary->integers();

        sort($items);
        $lowestItem = $items[0] ?? 0;
        $count = 0;
        $containers = [];

        for ($i = 0; $i < count($items); $i++) {
            if ($items[$i] <= ($lowestItem + 4)) {
                $containers[$count] = $items[$i];
            } else {
                $lowestItem = $items[$i];
                $count++;
                $containers[$count] = $items[$i];
            }
        }

        return count($containers);
    }
}