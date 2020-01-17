<?php

namespace Anso\Framework\Http\Routing;

use Anso\Framework\Http\Action\HomeAction;

class ApiRouter extends BaseRouter
{
    public static function getRoutes(): array
    {
        return [
            static::get('/home', HomeAction::class),
            static::get('/home', HomeAction::class),
            static::get('/home', HomeAction::class),
            static::get('/home', HomeAction::class),
            static::get('/home', HomeAction::class),
        ];
    }
}