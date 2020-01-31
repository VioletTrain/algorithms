<?php

namespace Anso\Framework\Console\Contract;

interface ConsoleFrontController
{
    public function handle(Command $command): string;
}