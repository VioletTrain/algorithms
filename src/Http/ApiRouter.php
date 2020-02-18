<?php

namespace Algorithms\Http;

use Anso\Framework\Http\Routing\BaseRouter;

class ApiRouter extends BaseRouter
{
    public static function getRoutes(): array
    {
        return [
            static::get('/home', System\HomeAction::class),
            static::get('/help', System\HelpAction::class),
            static::get('/help-doctrine', System\HelpDoctrineAction::class),
            static::get('/results', System\ResultsAction::class),
            static::get('/memory', System\MemoryAction::class),
            static::get('/objects', System\ObjectsAction::class),
            static::get('/time-elapsed', System\TimeElapsedAction::class),
            static::get('/sum', SumAction::class),
            static::post('/plus-minus', PlusMinusAction::class),
            static::get('/staircase', StaircaseAction::class),
            static::post('/mini-max', MiniMaxAction::class),
            static::post('/birthday-cake-candles', BirthdayCakeCandlesAction::class),
            static::get('/time-converter', TimeConverterAction::class),
            static::get('/int-to-roman', IntToRomanAction::class),
            static::get('/largest-decent-number', LargestDecentNumberAction::class),
            static::post('/minimum-containers', MinimumContainersAction::class),
            static::post('/magic-square', MagicSquareAction::class),
        ];
    }
}