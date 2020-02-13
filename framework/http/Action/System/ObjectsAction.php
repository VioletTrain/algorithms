<?php

namespace Anso\Framework\Http\Action\System;

use Algorithms\UseCase\DeclaredClassesUseCase;
use Anso\Framework\Http\BaseResponse;
use Anso\Framework\Http\Contract\Request;
use Anso\Framework\Http\Contract\Response;
use Anso\Framework\Http\Contract\Routing\Action;

class ObjectsAction implements Action
{
    private DeclaredClassesUseCase $declaredClassesUseCase;

    public function __construct(DeclaredClassesUseCase $declaredClassesUseCase)
    {
        $this->declaredClassesUseCase = $declaredClassesUseCase;
    }

    public function execute(Request $request): Response
    {
        return new BaseResponse(['declared_objects' => $this->declaredClassesUseCase->totalDeclaredClasses()]);
    }
}