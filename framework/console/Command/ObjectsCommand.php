<?php

namespace Anso\Framework\Console\Command;

use Algorithms\UseCase\DeclaredClassesUseCase;
use Anso\Framework\Console\Contract\Command;
use Anso\Framework\Console\IOManager;

class ObjectsCommand implements Command
{
    private DeclaredClassesUseCase $declaredClassesUseCase;

    public function __construct(DeclaredClassesUseCase $declaredClassesUseCase)
    {
        $this->declaredClassesUseCase = $declaredClassesUseCase;
    }

    public function execute(): string
    {
        $output = 'Total declared classes: ' . $this->declaredClassesUseCase->totalDeclaredClasses() . IOManager::NEW_LINE;

        return $output;
    }

    public static function description(): string
    {
        return DeclaredClassesUseCase::DESCRIPTION;
    }
}