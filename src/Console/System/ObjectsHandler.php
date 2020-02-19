<?php

namespace Algorithms\Console\System;

use Algorithms\Console\BaseCommandHandler;
use Algorithms\UseCase\DeclaredClassesUseCase;
use Anso\Framework\Console\IOManager;
use Anso\Framework\Console\ParameterBag;

class ObjectsHandler extends BaseCommandHandler
{
    private DeclaredClassesUseCase $useCase;

    public function __construct(DeclaredClassesUseCase $useCase)
    {
        $this->useCase = $useCase;
    }

    public function handle(ParameterBag $parameters): string
    {
        $output = 'Total declared classes: ' . $this->useCase->totalDeclaredClasses() . IOManager::NEW_LINE;

        return $output;
    }

    public static function description(): string
    {
        return DeclaredClassesUseCase::DESCRIPTION;
    }
}