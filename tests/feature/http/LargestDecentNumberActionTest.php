<?php

namespace Tests\Feature\Http;


use GuzzleHttp\Exception\ClientException;

class LargestDecentNumberActionTest extends HttpTestCase
{
    public function test_Action_RespondsWithLargestDecentNumber_WhenSuitableLengthIsRequested()
    {
        $response = $this->get('/largest-decent-number?length=10');

        $this->assertEquals([
            'largest_decent_number' => '3333333333'
        ], $response);
    }

    public function test_Action_RespondsWithError_WhenEmptyLengthIsRequested()
    {
        try {
            $this->get('/largest-decent-number?length=');
        } catch (ClientException $e) {
            $response = json_decode($e->getResponse()->getBody(), true);

            $this->assertEquals(400, $e->getCode());
            $this->assertEquals([
                'error' => 'Input must be numeric'
            ], $response);
        }
    }

    public function test_Action_RespondsWithError_WhenNoLengthIsRequested()
    {
        try {
            $this->get('/largest-decent-number');
        } catch (ClientException $e) {
            $response = json_decode($e->getResponse()->getBody(), true);

            $this->assertEquals(400, $e->getCode());
            $this->assertEquals([
                'error' => 'Input must be numeric'
            ], $response);
        }
    }
}
