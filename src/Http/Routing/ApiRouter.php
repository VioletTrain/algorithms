<?php

namespace Anso\Http\Routing;

use Anso\Contract\Http\Routing\Router;
use Anso\Controller\HomeController;

class ApiRouter extends BaseRouter implements Router
{
    public static function getRoutes(): array
    {
        return [
            static::get('/home', HomeController::class),
            static::get('/test', HomeController::class)
        ];
    }
}