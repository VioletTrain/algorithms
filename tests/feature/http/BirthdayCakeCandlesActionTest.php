<?php

namespace Tests\Feature\Http;


class BirthdayCakeCandlesActionTest extends HttpTestCase
{
    public function test_Action_RespondsWithTallestCandlesCount_WhenArrayOfIntegersIsRequested()
    {
        $response = $this->post('/birthday-cake-candles', [
            'candles' => [
                1, 2, 3, 3, 3
            ]
        ]);

        $this->assertEquals([
            'tallest_candles_count' => 3
        ], $response);
    }
}
