<?php

namespace Anso\Contract\Http\Routing;

use Anso\Contract\Http\Response;

interface Action
{
    public function execute(): Response;
}