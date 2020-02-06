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
            static::get('/time-elapsed', \Anso\Framework\Http\Action\TimeElapsedAction::class),
            static::get('/sum', \Anso\Framework\Http\Action\SumAction::class),
            static::post('/plus-minus', \Anso\Framework\Http\Action\PlusMinusAction::class),
            static::get('/staircase', \Anso\Framework\Http\Action\StaircaseAction::class),
            static::post('/mini-max', \Anso\Framework\Http\Action\MiniMaxAction::class),
            static::post('/birthday-cake-candles', \Anso\Framework\Http\Action\BirthdayCakeCandlesAction::class),
            static::get('/time-converter', \Anso\Framework\Http\Action\TimeConverterAction::class),
            static::get('/int-to-roman', \Anso\Framework\Http\Action\IntToRomanAction::class),
            static::get('/largest-decent-number', \Anso\Framework\Http\Action\LargestDecentNumberAction::class),
            static::post('/minimum-containers', \Anso\Framework\Http\Action\MinimumContainersAction::class),
        ];
    }
}