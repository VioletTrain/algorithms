<?php

namespace Anso\Framework\Console\Command;

use Anso\UseCase\DeclaredClassesUseCase;

class ObjectsCommand
{
    private DeclaredClassesUseCase $declaredClassesUseCase;

    public function __construct(DeclaredClassesUseCase $declaredClassesUseCase)
    {
        $this->declaredClassesUseCase = $declaredClassesUseCase;
    }

    public function execute()
    {
        $output = 'Total declared classes: ' . $this->declaredClassesUseCase->totalDeclaredClasses() . "\n";

        return $output;
    }
}