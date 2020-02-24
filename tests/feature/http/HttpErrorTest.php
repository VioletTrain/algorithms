<?php

namespace Tests\Feature\Http;

use GuzzleHttp\Exception\ClientException;

class HttpErrorTest extends HttpTestCase
{
    public function test_Application_RespondsWithError_WhenInvalidPageIsRequested()
    {
        try {
            $this->get('/non-existing-page');
        } catch (ClientException $e) {
            $response = json_decode($e->getResponse()->getBody(), true);

            $this->assertEquals(404, $e->getCode());
            $this->assertEquals([
                'error' => '/non-existing-page page was not found'
            ], $response);
        }
    }

    public function test_Action_RespondsWithError_WhenCharIsRequested()
    {
        try {
            $this->get('/int-to-roman?int=sdvsdv');
        } catch (ClientException $e) {
            $response = json_decode($e->getResponse()->getBody(), true);

            $this->assertEquals(400, $e->getCode());
            $this->assertEquals([
                'error' => 'Input must be numeric'
            ], $response);
        }
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

    public function test_Action_RespondsWithError_WhenEmptyArrayIsRequested()
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

    public function test_Action_RespondsWithError_WhenNoArrayIsRequested()
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

    public function test_Action_RespondsWithError_WhenArrayWithCharsIsRequested()
    {
        try {
            $this->post('/plus-minus', [
                'array' => [1, 'char', 3]
            ]);
        } catch (ClientException $e) {
            $response = json_decode($e->getResponse()->getBody(), true);

            $this->assertEquals(400, $e->getCode());
            $this->assertEquals([
                'error' => 'Input must contain only integers'
            ], $response);
        }
    }

    public function test_Action_RespondsWithError_WhenWrongMatrixIsRequested()
    {
        try {
            $this->post('/magic-square', [
                'matrix' => [
                    [1, 3, 3],
                    [3, 5, 10],
                    [3, 8, 9],
                    [4, 2, 4]
                ]
            ]);
        } catch (ClientException $e) {
            $response = json_decode($e->getResponse()->getBody(), true);

            $this->assertEquals(400, $e->getCode());
            $this->assertEquals([
                'error' => 'Input matrix size must be 3x3 and contain only integers'
            ], $response);
        }
    }

    public function test_Action_RespondsWithError_WhenTimeFormatIsInvalid()
    {
        try {
            $this->get('/time-converter?time=13:03:32PM');
        } catch (ClientException $e) {
            $response = json_decode($e->getResponse()->getBody(), true);

            $this->assertEquals(400, $e->getCode());
            $this->assertEquals([
                'error' => 'Invalid time format'
            ], $response);
        }
    }
}
