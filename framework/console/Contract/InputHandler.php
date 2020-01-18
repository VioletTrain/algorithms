<?php

namespace Anso\Framework\Console\Contract;

interface InputHandler
{
    public function handle(string $input): string;
}