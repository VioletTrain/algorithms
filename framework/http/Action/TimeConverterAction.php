<?php

namespace Anso\Framework\Http\Action;

use Algorithms\Boundary\TimeBoundary;
use Algorithms\UseCase\TimeConversionUseCase;
use Anso\Framework\Http\BaseResponse;
use Anso\Framework\Http\Contract\Request;
use Anso\Framework\Http\Contract\Response;
use Anso\Framework\Http\Contract\Routing\Action;

class TimeConverterAction implements Action
{
    private TimeConversionUseCase $useCase;

    public function __construct(TimeConversionUseCase $useCase)
    {
        $this->useCase = $useCase;
    }

    public function execute(Request $request): Response
    {
        $time = $request->get('time') ?? '';

        $convertedTime = $this->useCase->covertTimeFromRegularToMilitary(new TimeBoundary($time));

        return new BaseResponse(['converted_time' => $convertedTime]);
    }
}