<?php

namespace Algorithms\Http\Action\System;

use Algorithms\UseCase\DeclaredClassesUseCase;
use Anso\Framework\Http\Response;
use Anso\Framework\Http\Request;
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
        return new Response(['declared_objects' => $this->declaredClassesUseCase->totalDeclaredClasses()]);
    }
}