<?php

namespace Anso\Action;

use Anso\Http\Response;

class HomeAction
{
    public function execute()
    {
        return new Response(['test']);
    }
}