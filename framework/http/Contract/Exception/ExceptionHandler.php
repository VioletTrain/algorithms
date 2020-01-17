<?php

namespace Anso\Framework\Http\Contract\Exception;

use Anso\Framework\Http\Contract\Request;
use Anso\Framework\Http\Contract\Response;
use Throwable;

interface ExceptionHandler
{
    public function handle(Request $request, Throwable $e): Response;
    public function report(Throwable $e): void;
    public function render(Request $request, Throwable $e): Response;
}