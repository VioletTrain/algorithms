<?php

namespace Tests\Feature\Http;


class MiniMaxActionTest extends HttpTestCase
{
    public function test_MiniMaxAction_RespondsWithMiniMax_WhenArrayOfIntegersIsRequested()
    {
        $response = $this->post('/mini-max', [
            'integers' => [
                1, 2, 3, 4, 5
            ]
        ]);

        $this->assertEquals([
            'mini_max' => [10, 14]
        ], $response);
    }

    public function test_MiniMaxAction_RespondsWithMiniMax_WhenUnsortedArrayOfIntegersIsRequested()
    {
        $response = $this->post('/mini-max', [
            'integers' => [
                5, 2, 1, 4, 3
            ]
        ]);

        $this->assertEquals([
            'mini_max' => [10, 14]
        ], $response);
    }

    public function test_MiniMaxAction_RespondsWithZeros_WhenOneIntegerIsRequested()
    {
        $response = $this->post('/mini-max', [
            'integers' => [
                10
            ]
        ]);

        $this->assertEquals([
            'mini_max' => [0, 0]
        ], $response);
    }
}
