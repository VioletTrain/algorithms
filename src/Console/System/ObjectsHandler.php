<?php

namespace Algorithms\Console\System;

use Algorithms\Console\BaseCommandHandler;
use Algorithms\UseCase\DeclaredClassesUseCase;
use Anso\Framework\Console\Contract\IOManager;
use Anso\Framework\Console\ParameterBag;

class ObjectsHandler extends BaseCommandHandler
{
    private DeclaredClassesUseCase $useCase;
    private IOManager $ioManager;


    public function __construct(DeclaredClassesUseCase $useCase, IOManager $ioManager)
    {
        $this->useCase = $useCase;
        $this->ioManager = $ioManager;
    }

    public function handle(ParameterBag $parameters): string
    {
        $output = 'Total declared classes: ' . $this->useCase->totalDeclaredClasses() . $this->ioManager->newLine();

        return $output;
    }

    public static function description(): string
    {
        return DeclaredClassesUseCase::DESCRIPTION;
    }
}