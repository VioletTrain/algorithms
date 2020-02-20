<?php

namespace Tests\Feature\Http;

use GuzzleHttp\Exception\ClientException;

class IntToRomanActionTest extends HttpTestCase
{
    public function test_Action_RespondsWithRoman_WhenIntIsRequested()
    {
        $response = $this->get('/int-to-roman?int=102');

        $this->assertEquals([
            'roman' => 'CII'
        ], $response);
    }

    public function test_Action_RespondsWithError_WhenEmptyIntIsRequested()
    {
        try {
            $this->get('/int-to-roman?int=');
        } catch (ClientException $e) {
            $response = json_decode($e->getResponse()->getBody(), true);

            $this->assertEquals(400, $e->getCode());
            $this->assertEquals([
                'error' => 'Input must be numeric'
            ], $response);
        }
    }

    public function test_Action_RespondsWithError_WhenNoIntIsRequested()
    {
        try {
            $this->get('/int-to-roman');
        } catch (ClientException $e) {
            $response = json_decode($e->getResponse()->getBody(), true);

            $this->assertEquals(400, $e->getCode());
            $this->assertEquals([
                'error' => 'Input must be numeric'
            ], $response);
        }
    }
}
