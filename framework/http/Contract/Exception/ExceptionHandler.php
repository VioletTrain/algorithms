<?php

namespace Anso\Framework\Http\Contract\Exception;

use Anso\Framework\Http\Request;
use Anso\Framework\Http\Response;
use Throwable;

interface ExceptionHandler
{
    public function handle(Request $request, Throwable $e): Response;
}