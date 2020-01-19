<?php

namespace Anso\Framework\Console\Contract;

interface Command
{
    public function execute(): string;

    public static function description(): string;
}