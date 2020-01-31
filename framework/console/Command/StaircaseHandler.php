<?php

namespace Anso\Framework\Console\Command;

use Algorithms\Boundary\IntBoundary;
use Algorithms\UseCase\StaircaseUseCase;
use Anso\Framework\Console\IOManager;
use Anso\Framework\Contract\ParameterBag;

class StaircaseHandler extends BaseCommandHandler
{
    private StaircaseUseCase $stairCaseUseCase;

    public function __construct(StaircaseUseCase $stairCaseUseCase)
    {
        $this->stairCaseUseCase = $stairCaseUseCase;
    }

    public function handle(ParameterBag $parameters): string
    {
        $size = $parameters->getOrFirst('size');

        if (!$size) {
            $size = IOManager::readInteger('size');
        }

        return implode(IOManager::NEW_LINE, $this->stairCaseUseCase->build(new IntBoundary($size)));
    }

    public static function description(): string
    {
        return StaircaseUseCase::DESCRIPTION . parent::description() .
            "size - size of staircase, e.g. --size=5";
    }
}