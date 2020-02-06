<?php

namespace Tests\Feature\Http;

use GuzzleHttp\Exception\ClientException;

class SumActionTest extends HttpTestCase
{
    public function test_SumAction_RespondsWithSum_WhenSumOf2IntegersAreRequested()
    {
        $response = $this->get('/sum?a=3&b=5');

        $this->assertEquals([
            'sum' => 8
        ], $response);
    }

    public function test_SumAction_RespondsWithError_WhenBIsNull()
    {
        try {
            $this->client->get('/sum?a=3')->getBody();
        } catch (ClientException $e) {
            $response = json_decode($e->getResponse()->getBody(), true);

            $this->assertEquals(400, $e->getCode());
            $this->assertEquals([
                'error' => 'Input must be numeric'
            ], $response);
        }
    }

    public function test_SumAction_RespondsWithError_WhenBIsEmptyString()
    {
        try {
            $this->client->get('/sum?a=3&b=')->getBody();
        } catch (ClientException $e) {
            $response = json_decode($e->getResponse()->getBody(), true);

            $this->assertEquals(400, $e->getCode());
            $this->assertEquals([
                'error' => 'Input must be numeric'
            ], $response);
        }
    }
}
