<?php

namespace Anso\Framework\Http\Contract\Routing;

use Anso\Framework\Http\Contract\Request;
use Anso\Framework\Http\Contract\Response;

interface Action
{
    /**
     * @param Request $request
     * @return Response
     * @throws \Throwable
     */
    public function execute(Request $request): Response;
}