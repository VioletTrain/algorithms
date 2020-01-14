<?php

namespace Anso\Contract\Routing;

use Anso\Contract\Http\Response;

interface Action
{
    public function execute(): Response;
}