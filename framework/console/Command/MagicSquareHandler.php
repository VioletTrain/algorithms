<?php

namespace Anso\Framework\Console\Command;

use Algorithms\Boundary\IntMatrix3x3Boundary;
use Algorithms\UseCase\MagicSquareUseCase;
use Anso\Framework\Console\IOManager;
use Anso\Framework\Contract\ParameterBag;

class MagicSquareHandler extends BaseCommandHandler
{
    private MagicSquareUseCase $magicSquare;

    public function __construct(MagicSquareUseCase $magicSquare)
    {
        $this->magicSquare = $magicSquare;
    }

    public function handle(ParameterBag $parameters): string
    {
        $matrix[] = explode(' ', IOManager::readLine('Enter first line of digits:'));
        $matrix[] = explode(' ', IOManager::readLine('Enter second line of digits:'));
        $matrix[] = explode(' ', IOManager::readLine('Enter third line of digits:'));

        return $this->magicSquare->calcTransformationCost(new IntMatrix3x3Boundary($matrix));
    }

    public static function description(): string
    {
        return MagicSquareUseCase::DESCRIPTION;
    }
}