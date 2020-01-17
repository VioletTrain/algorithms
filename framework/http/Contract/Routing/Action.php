<?php

namespace Anso\Framework\Http\Contract\Routing;

use Anso\Framework\Http\Contract\Response;

interface Action
{
    public function execute(): Response;
}