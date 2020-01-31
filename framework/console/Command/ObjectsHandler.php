<?php

namespace Anso\Framework\Console\Command;

use Algorithms\UseCase\DeclaredClassesUseCase;
use Anso\Framework\Console\IOManager;
use Anso\Framework\Contract\ParameterBag;

class ObjectsHandler extends BaseCommandHandler
{
    private DeclaredClassesUseCase $declaredClassesUseCase;

    public function __construct(DeclaredClassesUseCase $declaredClassesUseCase)
    {
        $this->declaredClassesUseCase = $declaredClassesUseCase;
    }

    public function handle(ParameterBag $parameters): string
    {
        $output = 'Total declared classes: ' . $this->declaredClassesUseCase->totalDeclaredClasses() . IOManager::NEW_LINE;

        return $output;
    }

    public static function description(): string
    {
        return DeclaredClassesUseCase::DESCRIPTION;
    }
}