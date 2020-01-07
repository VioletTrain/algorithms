<?php

namespace Anso\Contract;

use Anso\Contract\Http\Request;
use Anso\Contract\Http\Response;
use Throwable;

interface ExceptionHandler
{
    public function report(Throwable $e): void;
    public function render(Request $request, Throwable $e): Response;
}