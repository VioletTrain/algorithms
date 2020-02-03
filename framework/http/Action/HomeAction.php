<?php

namespace Anso\Framework\Http\Action;

use Anso\Framework\Http\Contract\Request;
use Anso\Framework\Http\Contract\Response;
use Anso\Framework\Http\Contract\Routing\Action;
use Anso\Framework\Http\BaseResponse;

class HomeAction implements Action
{
    public function execute(Request $request): Response
    {
        return new BaseResponse(['Hello there']);
    }
}