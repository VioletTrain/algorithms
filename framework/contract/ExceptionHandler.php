<?php

namespace Anso\Framework\Contract;

use Throwable;

interface ExceptionHandler
{
    public function handle(Throwable $e);
}