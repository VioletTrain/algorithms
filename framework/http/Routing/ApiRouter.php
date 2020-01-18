<?php

namespace Anso\Framework\Http\Routing;

class ApiRouter extends BaseRouter
{
    public static function getRoutes(): array
    {
        return [
            static::get('/home', \Anso\Framework\Http\Action\HomeAction::class),
            static::get('/help', \Anso\Framework\Http\Action\HelpAction::class),
            static::get('/memory', \Anso\Framework\Http\Action\MemoryAction::class),
            static::get('/objects', \Anso\Framework\Http\Action\ObjectsAction::class),
        ];
    }
}