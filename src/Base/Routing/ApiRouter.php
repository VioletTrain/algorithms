<?php

namespace Anso\Base\Routing;

use Anso\Action\HomeAction;

class ApiRouter extends BaseRouter
{
    public static function getRoutes(): array
    {
        return [
            static::get('/home', HomeAction::class),
        ];
    }
}