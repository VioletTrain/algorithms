<?php

namespace Anso\Framework\Http\Action;

use Anso\Framework\Http\BaseResponse;
use Anso\Framework\Http\Contract\Request;
use Anso\Framework\Http\Contract\Response;
use Anso\Framework\Http\Contract\Routing\Action;
use Doctrine\DBAL\Types\Type;

class HelpDoctrineAction implements Action
{
    public function execute(Request $request): Response
    {
        return new BaseResponse(Type::getTypesMap());
    }
}