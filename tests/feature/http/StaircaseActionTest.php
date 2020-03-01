<?php

namespace Tests\Feature\Http;

use Algorithms\Entity\Result;
use Anso\Framework\Http\Test\HttpTestCase;

class StaircaseActionTest extends HttpTestCase
{
    public function test_Action_RespondsWithStaircase_WhenSizeIsRequested()
    {
        $response = $this->get('/staircase?size=3');

        $this->assertEquals([
            'staircase' => [
                '  #',
                ' ##',
                '###',
            ]
        ], $response);

        $this->db->assertDBHas(Result::class, [
            'useCaseName' => 'staircase',
            'input' => '3',
            'result' => '  #,  ##, ###',
        ]);

        $this->db->clearDB(Result::class);
    }

    public function test_Action_RespondsWithError_WhenEmptySizeIsRequested()
    {
        $response = $this->get('/staircase?size=');

        $this->assertEquals([
            'error' => 'Input must be numeric'
        ], $response);

        $this->db->assertDBDoesNotHave(Result::class, [
            'useCaseName' => 'staircase'
        ]);
    }

    public function test_Action_RespondsWithError_WhenNoSizeIsRequested()
    {
        $response = $this->get('/staircase');

        $this->assertEquals([
            'error' => 'Input must be numeric'
        ], $response);

        $this->db->assertDBDoesNotHave(Result::class, [
            'useCaseName' => 'staircase'
        ]);
    }
}