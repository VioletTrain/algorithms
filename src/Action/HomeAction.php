<?php

namespace Anso\Action;

use Anso\Contract\Http\Routing\Action;
use Anso\Contract\Http\Response;
use Anso\Http\BaseResponse;

class HomeAction implements Action
{
    public function execute(): Response
    {
        return new BaseResponse(['test']);
    }
}