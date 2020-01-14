<?php

namespace Anso\Action;

use Anso\Contract\Routing\Action;
use Anso\Contract\Http\Response;
use Anso\Base\BaseResponse;

class HomeAction implements Action
{
    public function execute(): Response
    {
        return new BaseResponse(['Hello there']);
    }
}