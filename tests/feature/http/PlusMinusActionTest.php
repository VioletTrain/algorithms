<?php

namespace Tests\Feature\Http;

use GuzzleHttp\Exception\ClientException;

class PlusMinusActionTest extends HttpTestCase
{
    public function test_PlusMinusAction_RespondsWithRatios_WhenArrayIsRequested()
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
    }

    public function test_PlusMinusAction_RespondsWithError_WhenEmptyArrayIsRequested()
    {
        try {
            $this->post('/plus-minus', [
                'array' => []
            ]);
        } catch (ClientException $e) {
            $response = json_decode($e->getResponse()->getBody(), true);

            $this->assertEquals(400, $e->getCode());
            $this->assertEquals([
                'error' => 'Input is empty'
            ], $response);
        }
    }

    public function test_PlusMinusAction_RespondsWithError_WhenNoArrayIsRequested()
    {
        try {
            $this->post('/plus-minus', []);
        } catch (ClientException $e) {
            $response = json_decode($e->getResponse()->getBody(), true);

            $this->assertEquals(400, $e->getCode());
            $this->assertEquals([
                'error' => 'Input is empty'
            ], $response);
        }
    }
}