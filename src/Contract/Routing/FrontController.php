<?php

namespace Anso\Contract\Routing;

use Anso\Contract\Http\Request;
use Anso\Contract\Http\Response;

interface FrontController
{
    public function handle(Request $request): Response;
}