<?php

namespace Tests\Feature\Http;

use GuzzleHttp\Exception\ClientException;

class TimeConverterActionTest extends HttpTestCase
{
    public function test_TimeConverterAction_RespondsWithMilitaryTime_WhenCommonTimeIsRequested()
    {
        $response = $this->get('/time-converter?time=02:03:32PM');

        $this->assertEquals([
            'converted_time' => '14:03:32'
        ], $response);
    }

    public function test_TimeConverterAction_RespondsWithError_WhenTimeFormatIsInvalid()
    {
        try {
            $this->get('/time-converter?time=13:03:32PM');
        } catch (ClientException $e) {
            $response = json_decode($e->getResponse()->getBody(), true);

            $this->assertEquals(400, $e->getCode());
            $this->assertEquals([
                'error' => 'Invalid time format'
            ], $response);
        }
    }
}
