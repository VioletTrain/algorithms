<?php

namespace Anso\Framework\Console\Command;

use Algorithms\Boundary\IntMatrix3x3Boundary;
use Algorithms\UseCase\MagicSquareUseCase;
use Anso\Framework\Console\IOManager;
use Anso\Framework\Contract\ParameterBag;

class MagicSquareHandler extends BaseCommandHandler
{
    private MagicSquareUseCase $useCase;

    public function __construct(MagicSquareUseCase $useCase)
    {
        $this->useCase = $useCase;
    }

    public function handle(ParameterBag $parameters): string
    {
        $matrix[] = explode(' ', IOManager::readLine('Enter first line of digits:'));
        $matrix[] = explode(' ', IOManager::readLine('Enter second line of digits:'));
        $matrix[] = explode(' ', IOManager::readLine('Enter third line of digits:'));

        return $this->useCase->calcTransformationCost(new IntMatrix3x3Boundary($matrix));
    }

    public static function description(): string
    {
        return MagicSquareUseCase::DESCRIPTION;
    }
}