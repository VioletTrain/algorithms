<?php

namespace Anso\Framework\Http\Action;

use Algorithms\Boundary\IntMatrix3x3Boundary;
use Algorithms\Entity\Result;
use Algorithms\Entity\ResultManager;
use Algorithms\UseCase\MagicSquareUseCase;
use Anso\Framework\Http\BaseResponse;
use Anso\Framework\Http\Contract\Request;
use Anso\Framework\Http\Contract\Response;
use Anso\Framework\Http\Contract\Routing\Action;

class MagicSquareAction implements Action
{
    private MagicSquareUseCase $magicSquare;

    private ResultManager $rm;

    public function __construct(MagicSquareUseCase $magicSquare, ResultManager $rm)
    {
        $this->magicSquare = $magicSquare;
        $this->rm = $rm;
    }

    public function execute(Request $request): Response
    {
        $matrix = new IntMatrix3x3Boundary($request->get('matrix'));

        $cost = $this->magicSquare->calcTransformationCost($matrix);

        $this->rm->saveResult(new Result('magic-square', $matrix, $cost));

        return new BaseResponse(['cost' => $cost]);
    }
}