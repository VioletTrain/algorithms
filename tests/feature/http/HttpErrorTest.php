<?php

namespace Tests\Feature\Http;

use Anso\Framework\Http\Test\HttpTestCase;

class HttpErrorTest extends HttpTestCase
{
    public function test_Application_RespondsWithError_WhenInvalidPageIsRequested()
    {
        $response = $this->get('/non-existing-page');

        $this->assertEquals([
            'error' => '/non-existing-page page was not found'
        ], $response);
    }

    public function test_Action_RespondsWithError_WhenCharIsRequested()
    {
        $response = $this->get('/int-to-roman?int=sdvsdv');

        $this->assertEquals([
            'error' => 'Input must be numeric'
        ], $response);
    }

    public function test_Action_RespondsWithError_WhenEmptyIntIsRequested()
    {
        $response = $this->get('/int-to-roman?int=');

        $this->assertEquals([
            'error' => 'Input must be numeric'
        ], $response);
    }

    public function test_Action_RespondsWithError_WhenNoIntIsRequested()
    {
        $response = $this->get('/int-to-roman');

        $this->assertEquals([
            'error' => 'Input must be numeric'
        ], $response);
    }

    public function test_Action_RespondsWithError_WhenEmptyArrayIsRequested()
    {
        $response = $this->post('/plus-minus', [
            'array' => []
        ]);

        $this->assertEquals([
            'error' => 'Input is empty'
        ], $response);
    }

    public function test_Action_RespondsWithError_WhenNoArrayIsRequested()
    {
        $response = $this->post('/plus-minus', []);

        $this->assertEquals([
            'error' => 'Input is empty'
        ], $response);
    }

    public function test_Action_RespondsWithError_WhenArrayWithCharsIsRequested()
    {
        $response = $this->post('/plus-minus', [
            'array' => [1, 'char', 3]
        ]);

        $this->assertEquals([
            'error' => 'Input must contain only integers'
        ], $response);
    }

    public function test_Action_RespondsWithError_WhenWrongMatrixIsRequested()
    {
        $response = $this->post('/magic-square', [
            'matrix' => [
                [1, 3, 3],
                [3, 5, 10],
                [3, 8, 9],
                [4, 2, 4]
            ]
        ]);

        $this->assertEquals([
            'error' => 'Input matrix size must be 3x3 and contain only integers'
        ], $response);
    }

    public function test_Action_RespondsWithError_WhenTimeFormatIsInvalid()
    {
        $response = $this->get('/time-converter?time=13:03:32PM');

        $this->assertEquals([
            'error' => 'Invalid time format'
        ], $response);
    }
}
