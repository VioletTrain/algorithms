<?php

namespace Tests\Feature\Http;


use Algorithms\Entity\Result;

class LargestDecentNumberActionTest extends HttpTestCase
{
    public function test_Action_RespondsWithLargestDecentNumber_WhenSuitableLengthIsRequested()
    {
        $response = $this->get('/largest-decent-number?length=10');

        $this->assertEquals([
            'largest_decent_number' => '3333333333'
        ], $response);

        $this->db->assertDBHas(Result::class, [
            'useCaseName' => 'largest-decent-number',
            'input' => '10',
            'result' => '3333333333',
        ]);

        $this->db->clearDB(Result::class);
    }

    public function test_Action_RespondsWithError_WhenEmptyLengthIsRequested()
    {
        $response = $this->get('/largest-decent-number?length=');

        $this->assertEquals([
            'error' => 'Input must be numeric'
        ], $response);

        $this->db->assertDBDoesNotHave(Result::class, [
            'useCaseName' => 'largest-decent-number'
        ]);
}

    public function test_Action_RespondsWithError_WhenNoLengthIsRequested()
    {
        $response = $this->get('/largest-decent-number');

        $this->assertEquals([
            'error' => 'Input must be numeric'
        ], $response);

        $this->db->assertDBDoesNotHave(Result::class, [
            'useCaseName' => 'largest-decent-number'
        ]);
    }
}
