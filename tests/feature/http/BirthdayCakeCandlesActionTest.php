<?php

namespace Tests\Feature\Http;


use Algorithms\Entity\Result;
use Anso\Framework\Http\Test\HttpTestCase;

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

        $this->db->assertDBHas(Result::class, [
            'useCaseName' => 'birthday-cake-candles',
            'input' => '1, 2, 3, 3, 3',
            'result' => '3',
        ]);

        $this->db->clearDB(Result::class);
    }
}
