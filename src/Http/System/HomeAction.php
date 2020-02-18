<?php

namespace Algorithms\Http\System;

use Anso\Framework\Http\Request;
use Anso\Framework\Http\Contract\Response;
use Anso\Framework\Http\Contract\Routing\Action;
use Anso\Framework\Http\BaseResponse;

class HomeAction implements Action
{
    public function execute(Request $request): Response
    {
        return new BaseResponse(['greeting' => 'Hello there']);
    }
}