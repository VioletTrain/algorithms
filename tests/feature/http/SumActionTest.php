<?php

namespace Tests\Feature\Http;

use Algorithms\Entity\Result;
use Anso\Framework\Http\Test\HttpTestCase;

class SumActionTest extends HttpTestCase
{
    public function test_Action_RespondsWithSum_WhenSumOf2IntegersAreRequested()
    {
        $response = $this->get('/sum?a=3&b=5');

        $this->assertEquals([
            'sum' => 8
        ], $response);

        $this->db->assertDBHas(Result::class, [
            'useCaseName' => 'sum',
            'input' => '3, 5',
            'result' => '8',
        ]);

        $this->db->clearDB(Result::class);
    }

    public function test_Action_RespondsWithError_WhenBIsNull()
    {
        $response = $this->get('/sum?a=3');

        $this->assertEquals([
            'error' => 'Input must be numeric'
        ], $response);

        $this->db->assertDBDoesNotHave(Result::class, [
            'useCaseName' => 'sum'
        ]);
    }

    public function test_Action_RespondsWithError_WhenBIsEmptyString()
    {
        $response = $this->get('/sum?a=3&b=');

        $this->assertEquals([
            'error' => 'Input must be numeric'
        ], $response);

        $this->db->assertDBDoesNotHave(Result::class, [
            'useCaseName' => 'staircase'
        ]);
    }
}
