<?php

namespace Anso\Framework\Http\Routing;

use Anso\Framework\Http\Action as Action;

class ApiRouter extends BaseRouter
{
    public static function getRoutes(): array
    {
        return [
            static::get('/home', Action\HomeAction::class),
            static::get('/help', Action\HelpAction::class),
            static::get('/help-doctrine', Action\HelpDoctrineAction::class),
            static::get('/results', Action\ResultsAction::class),
            static::get('/memory', Action\MemoryAction::class),
            static::get('/objects', Action\ObjectsAction::class),
            static::get('/time-elapsed', Action\TimeElapsedAction::class),
            static::get('/sum', Action\SumAction::class),
            static::post('/plus-minus', Action\PlusMinusAction::class),
            static::get('/staircase', Action\StaircaseAction::class),
            static::post('/mini-max', Action\MiniMaxAction::class),
            static::post('/birthday-cake-candles', Action\BirthdayCakeCandlesAction::class),
            static::get('/time-converter', Action\TimeConverterAction::class),
            static::get('/int-to-roman', Action\IntToRomanAction::class),
            static::get('/largest-decent-number', Action\LargestDecentNumberAction::class),
            static::post('/minimum-containers', Action\MinimumContainersAction::class),
        ];
    }
}