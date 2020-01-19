<?php

namespace Algorithms\UseCase;

use Algorithms\SystemInfo;

class DeclaredClassesUseCase
{
    private SystemInfo $systemInfo;

    public const DESCRIPTION = 'Show number of declared classes';

    public function __construct(SystemInfo $systemInfo)
    {
        $this->systemInfo = $systemInfo;
    }

    public function totalDeclaredClasses(): int
    {
        return $this->systemInfo->totalDeclaredClasses();
    }
}