<?php

namespace Algorithms\Console\Handler;

use Algorithms\Boundary\IntMatrix3x3Boundary;
use Algorithms\UseCase\MagicSquareUseCase;
use Anso\Framework\Console\Contract\IOManager;
use Anso\Framework\Console\ParameterBag;

class MagicSquareHandler extends BaseCommandHandler
{
    private MagicSquareUseCase $useCase;
    private IOManager $ioManager;

    public function __construct(MagicSquareUseCase $useCase, IOManager $ioManager)
    {
        $this->useCase = $useCase;
        $this->ioManager = $ioManager;
    }

    public function handle(ParameterBag $parameters): string
    {
        $matrix[] = explode(' ', $this->ioManager->readLine('Enter first line of digits:'));
        $matrix[] = explode(' ', $this->ioManager->readLine('Enter second line of digits:'));
        $matrix[] = explode(' ', $this->ioManager->readLine('Enter third line of digits:'));

        return $this->useCase->calcTransformationCost(new IntMatrix3x3Boundary($matrix));
    }

    public static function description(): string
    {
        return MagicSquareUseCase::DESCRIPTION;
    }
}