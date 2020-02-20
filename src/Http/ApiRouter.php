<?php

namespace Algorithms\Http;

use Anso\Framework\Http\Routing\BaseRouter;
use Algorithms\Http\Action as Action;

class ApiRouter extends BaseRouter
{
    public static function getRoutes(): array
    {
        return [
            static::get('/home', Action\System\HomeAction::class),
            static::get('/help', Action\System\HelpAction::class),
            static::get('/help-doctrine', Action\System\HelpDoctrineAction::class),
            static::get('/results', Action\System\ResultsAction::class),
            static::get('/memory', Action\System\MemoryAction::class),
            static::get('/objects', Action\System\ObjectsAction::class),
            static::get('/time-elapsed', Action\System\TimeElapsedAction::class),
            static::get('/sum', Action\SumAction::class),
            static::post('/plus-minus', Action\PlusMinusAction::class),
            static::get('/staircase', Action\StaircaseAction::class),
            static::post('/mini-max', Action\MiniMaxAction::class),
            static::post('/birthday-cake-candles', Action\BirthdayCakeCandlesAction::class),
            static::get('/time-converter', Action\TimeConverterAction::class),
            static::get('/int-to-roman', Action\IntToRomanAction::class),
            static::get('/largest-decent-number', Action\LargestDecentNumberAction::class),
            static::post('/minimum-containers', Action\MinimumContainersAction::class),
            static::post('/magic-square', Action\MagicSquareAction::class),
        ];
    }
}