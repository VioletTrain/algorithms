<?php

namespace Anso\Framework\Http\Action;

use Algorithms\Boundary\TimeBoundary;
use Algorithms\Entity\Result;
use Algorithms\Entity\ResultManager;
use Algorithms\UseCase\TimeConversionUseCase;
use Anso\Framework\Http\BaseResponse;
use Anso\Framework\Http\Contract\Request;
use Anso\Framework\Http\Contract\Response;
use Anso\Framework\Http\Contract\Routing\Action;

class TimeConverterAction implements Action
{
    private TimeConversionUseCase $useCase;

    private ResultManager $rm;

    public function __construct(TimeConversionUseCase $useCase, ResultManager $rm)
    {
        $this->useCase = $useCase;
        $this->rm = $rm;
    }

    public function execute(Request $request): Response
    {
        $time = $request->get('time');

        $convertedTime = $this->useCase->covertTimeFromRegularToMilitary(new TimeBoundary($time));

        $this->rm->saveResult(new Result('time-converter', $time, $convertedTime));

        return new BaseResponse(['converted_time' => $convertedTime]);
    }
}