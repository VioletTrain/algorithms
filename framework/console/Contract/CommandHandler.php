<?php

namespace Anso\Framework\Console\Contract;

use Anso\Framework\Contract\ParameterBag;

interface CommandHandler
{
    /**
     * @param ParameterBag $parameters
     * @return string
     * @throws \Throwable
     */
    public function handle(ParameterBag $parameters): string;

    public static function description(): string;
}