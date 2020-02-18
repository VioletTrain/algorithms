<?php

namespace Anso\Framework\Http\Action;

use Algorithms\Boundary\IntMatrix3x3Boundary;
use Algorithms\UseCase\MagicSquareUseCase;
use Anso\Framework\Http\BaseResponse;
use Anso\Framework\Http\Contract\Request;
use Anso\Framework\Http\Contract\Response;
use Anso\Framework\Http\Contract\Routing\Action;

class MagicSquareAction implements Action
{
    private MagicSquareUseCase $magicSquare;

    public function __construct(MagicSquareUseCase $magicSquare)
    {
        $this->magicSquare = $magicSquare;
    }

    public function execute(Request $request): Response
    {
        $matrix = $request->get('matrix');

        $magicSquare = $this->magicSquare->calc3x3MagicSquareCost(new IntMatrix3x3Boundary($matrix));

        return new BaseResponse(['magic_square' => $magicSquare]);
    }
}