<?php

namespace Anso\Framework\Http\Action\System;

use Anso\Framework\Http\BaseResponse;
use Anso\Framework\Http\Contract\Request;
use Anso\Framework\Http\Contract\Response;
use Anso\Framework\Http\Contract\Routing\Action;
use Anso\Framework\Http\Routing\ApiRouter;

class HelpAction implements Action
{

    public function execute(Request $request): Response
    {
        $availableRoutes = ApiRouter::getRoutes();
        $availableURIs = array_map(fn ($route) => $route['uri'], $availableRoutes);

        return new BaseResponse(['available_uris' => $availableURIs]);
    }
}