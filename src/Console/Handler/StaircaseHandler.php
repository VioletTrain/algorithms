<?php

namespace Algorithms\Console\Handler;

use Algorithms\Boundary\IntBoundary;
use Algorithms\UseCase\StaircaseUseCase;
use Anso\Framework\Console\Contract\IOManager;
use Anso\Framework\Console\ParameterBag;

class StaircaseHandler extends BaseCommandHandler
{
    private StaircaseUseCase $useCase;
    private IOManager $ioManager;

    public function __construct(StaircaseUseCase $useCase, IOManager $ioManager)
    {
        $this->useCase = $useCase;
        $this->ioManager = $ioManager;
    }

    public function handle(ParameterBag $parameters): string
    {
        $size = $parameters->getOrFirst('size');

        if (!$size) {
            $size = $this->ioManager->readInteger('size');
        }

        return implode($this->ioManager->newLine(), $this->useCase->build(new IntBoundary($size)));
    }

    public static function description(): string
    {
        return StaircaseUseCase::DESCRIPTION . parent::description() .
            "size - size of staircase, e.g. --size=5";
    }
}