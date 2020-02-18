<?php

namespace Algorithms\Http\System;

use Anso\Framework\Http\Response;
use Anso\Framework\Http\Request;
use Anso\Framework\Http\Contract\Routing\Action;
use Doctrine\DBAL\Types\Type;

class HelpDoctrineAction implements Action
{
    public function execute(Request $request): Response
    {
        return new Response(['types' => Type::getTypesMap()]);
    }
}