<?php

namespace Algorithms\Http\Action\System;

use Anso\Framework\Http\Request;
use Anso\Framework\Http\Response;
use Anso\Framework\Http\Contract\Routing\Action;

class HomeAction implements Action
{
    public function execute(Request $request): Response
    {
        return new Response(['greeting' => 'Hello there']);
    }
}