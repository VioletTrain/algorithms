<?php

namespace Tests\Feature\Http;


use Algorithms\Entity\Result;

class MiniMaxActionTest extends HttpTestCase
{
    public function test_Action_RespondsWithMiniMax_WhenArrayOfIntegersIsRequested()
    {
        $response = $this->post('/mini-max', [
            'integers' => [
                1, 2, 3, 4, 5
            ]
        ]);

        $this->assertEquals([
            'mini_max' => [10, 14]
        ], $response);

        $this->db->assertDBHas(Result::class, [
            'useCaseName' => 'mini-max',
            'input' => '1, 2, 3, 4, 5',
            'result' => '10, 14',
        ]);

        $this->db->clearDB(Result::class);
    }

    public function test_Action_RespondsWithMiniMax_WhenUnsortedArrayOfIntegersIsRequested()
    {
        $response = $this->post('/mini-max', [
            'integers' => [
                5, 2, 1, 4, 3
            ]
        ]);

        $this->assertEquals([
            'mini_max' => [10, 14]
        ], $response);

        $this->db->assertDBHas(Result::class, [
            'useCaseName' => 'mini-max',
            'input' => '5, 2, 1, 4, 3',
            'result' => '10, 14',
        ]);

        $this->db->clearDB(Result::class);
    }

    public function test_Action_RespondsWithZeros_WhenOneIntegerIsRequested()
    {
        $response = $this->post('/mini-max', [
            'integers' => [
                10
            ]
        ]);

        $this->assertEquals([
            'mini_max' => [0, 0]
        ], $response);

        $this->db->assertDBHas(Result::class, [
            'useCaseName' => 'mini-max',
            'input' => '10',
            'result' => '0, 0',
        ]);

        $this->db->clearDB(Result::class);
    }
}
