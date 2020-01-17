<?php

namespace Anso\Framework\Http\Contract\Routing;


use Anso\Framework\Http\Contract\Request;
use Anso\Framework\Http\Contract\Response;

interface FrontController
{
    public function handle(Request $request): Response;
}