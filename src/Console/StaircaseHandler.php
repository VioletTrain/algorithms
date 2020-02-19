<?php

namespace Algorithms\Console;

use Algorithms\Boundary\IntBoundary;
use Algorithms\UseCase\StaircaseUseCase;
use Anso\Framework\Console\IOManager;
use Anso\Framework\Console\ParameterBag;

class StaircaseHandler extends BaseCommandHandler
{
    private StaircaseUseCase $useCase;

    public function __construct(StaircaseUseCase $useCase)
    {
        $this->useCase = $useCase;
    }

    public function handle(ParameterBag $parameters): string
    {
        $size = $parameters->getOrFirst('size');

        if (!$size) {
            $size = IOManager::readInteger('size');
        }

        return implode(IOManager::NEW_LINE, $this->useCase->build(new IntBoundary($size)));
    }

    public static function description(): string
    {
        return StaircaseUseCase::DESCRIPTION . parent::description() .
            "size - size of staircase, e.g. --size=5";
    }
}