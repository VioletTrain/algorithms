<?php

namespace Tests\Feature\Http;

use GuzzleHttp\Exception\ClientException;

class StaircaseActionTest extends HttpTestCase
{
    public function test_StaircaseAction_RespondsWithStaircase_WhenSizeIsRequested()
    {
        $response = $this->get('/staircase?size=3');

        $this->assertEquals([
            'staircase' => [
                '  #',
                ' ##',
                '###',
            ]
        ], $response);
    }

    public function test_StaircaseAction_RespondsWithError_WhenEmptySizeIsRequested()
    {
        try {
            $this->get('/staircase?size=');
        } catch (ClientException $e) {
            $response = json_decode($e->getResponse()->getBody(), true);

            $this->assertEquals(400, $e->getCode());
            $this->assertEquals([
                'error' => 'Input must be numeric'
            ], $response);
        }
    }

    public function test_StaircaseAction_RespondsWithError_WhenNoSizeIsRequested()
    {
        try {
            $this->get('/staircase');
        } catch (ClientException $e) {
            $response = json_decode($e->getResponse()->getBody(), true);

            $this->assertEquals(400, $e->getCode());
            $this->assertEquals([
                'error' => 'Input must be numeric'
            ], $response);
        }
    }
}