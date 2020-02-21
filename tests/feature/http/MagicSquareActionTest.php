<?php

namespace Tests\Feature\Http;


class MagicSquareActionTest extends HttpTestCase
{
    public function test_Action_RespondsWithCost_When3x3IntMatrixIsRequested()
    {
        $response = $this->post('/magic-square', [
            'matrix' => [
                [4, 8, 2],
                [4, 5, 7],
                [6, 1, 6]
            ]
        ]);

        $this->assertEquals([
            'cost' => 4
        ], $response);
    }
}
