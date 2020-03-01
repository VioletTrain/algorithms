<?php

namespace Tests\Feature\Http;


use Algorithms\Entity\Result;

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

        $this->db->assertDBHas(Result::class, [
            'useCaseName' => 'magic-square',
            'input' => '4 8 2, 4 5 7, 6 1 6',
            'result' => '4',
        ]);

        $this->db->clearDB(Result::class);
    }
}
