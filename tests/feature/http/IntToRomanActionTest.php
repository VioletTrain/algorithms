<?php

namespace Tests\Feature\Http;


use Algorithms\Entity\Result;

class IntToRomanActionTest extends HttpTestCase
{
    public function test_Action_RespondsWithRoman_WhenIntIsRequested()
    {
        $response = $this->get('/int-to-roman?int=102');

        $this->assertEquals([
            'roman' => 'CII'
        ], $response);

        $this->db->assertDBHas(Result::class, [
            'useCaseName' => 'int-to-roman',
            'input' => '102',
            'result' => 'CII',
        ]);

        $this->db->clearDB(Result::class);
    }

    public function test_Action_RespondsWithError_WhenEmptyIntIsRequested()
    {
        $response = $this->get('/int-to-roman?int=');

        $this->assertEquals([
            'error' => 'Input must be numeric'
        ], $response);

        $this->db->assertDBDoesNotHave(Result::class, [
            'useCaseName' => 'int-to-roman'
        ]);
    }

    public function test_Action_RespondsWithError_WhenNoIntIsRequested()
    {
        $response = $this->get('/int-to-roman');

        $this->assertEquals([
            'error' => 'Input must be numeric'
        ], $response);

        $this->db->assertDBDoesNotHave(Result::class, [
            'useCaseName' => 'int-to-roman'
        ]);
    }
}
