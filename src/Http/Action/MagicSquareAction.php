<?php

namespace Algorithms\Http\Action;

use Algorithms\Boundary\IntMatrix3x3Boundary;
use Algorithms\Entity\Result;
use Algorithms\Entity\ResultManager;
use Algorithms\UseCase\MagicSquareUseCase;
use Anso\Framework\Http\Response;
use Anso\Framework\Http\Request;
use Anso\Framework\Http\Contract\Routing\Action;

class MagicSquareAction implements Action
{
    private MagicSquareUseCase $useCase;

    private ResultManager $rm;

    public function __construct(MagicSquareUseCase $useCase, ResultManager $rm)
    {
        $this->useCase = $useCase;
        $this->rm = $rm;
    }

    public function execute(Request $request): Response
    {
        $matrix = new IntMatrix3x3Boundary($request->get('matrix'));

        $cost = $this->useCase->calcTransformationCost($matrix);

        $this->rm->saveResult(new Result('magic-square', $matrix, $cost));

        return new Response(['cost' => $cost]);
    }
}