<?php

namespace Tests\Feature\Http;

use Algorithms\Entity\Result;
use Anso\Framework\Http\Test\HttpTestCase;

class PlusMinusActionTest extends HttpTestCase
{
    public function test_Action_RespondsWithRatios_WhenArrayIsRequested()
    {
        $response = $this->post('/plus-minus', [
            'array' => [1, 2, 3, 0, -1]
        ]);

        $this->assertEquals([
            'ratios' => [
                "positive" => "0.600000",
                "negative" => "0.200000",
                "zero"     => "0.200000",
            ]
        ], $response);

        $this->db->assertDBHas(Result::class, [
            'useCaseName' => 'plus-minus',
            'input' => '1, 2, 3, 0, -1',
            'result' => '0.600000, 0.200000, 0.200000',
        ]);

        $this->db->clearDB(Result::class);
    }

    public function test_Action_RespondsWithError_WhenEmptyArrayIsRequested()
    {
            $response = $this->post('/plus-minus', [
                'array' => []
            ]);

            $this->assertEquals([
                'error' => 'Input is empty'
            ], $response);

            $this->db->assertDBDoesNotHave(Result::class, [
                'useCaseName' => 'plus-minus'
            ]);
    }

    public function test_Action_RespondsWithError_WhenNoArrayIsRequested()
    {
        $response = $this->post('/plus-minus', []);

        $this->assertEquals([
            'error' => 'Input is empty'
        ], $response);

        $this->db->assertDBDoesNotHave(Result::class, [
            'useCaseName' => 'plus-minus'
        ]);
    }
}