<?php

namespace Tests\Feature\Console;

use Anso\Framework\Console\Test\ConsoleTestCase;

class ConsoleErrorTest extends ConsoleTestCase
{
    public function test_Application_OutputsCommandErrorMessage_WhenInvalidCommandIsGiven()
    {
        $this->ioManager->pushCommand('non-existing-command');

        $this->application->start();

        $expected = '\'non-existing-command\' command was not found';
        $output = $this->findExpected($expected);

        $this->assertEquals($expected, $output);
    }

    public function test_Handler_OutputsIntegerErrorMessage_WhenCharsAreGiven()
    {
        $this->ioManager->pushCommand('sc --size=string');

        $this->application->start();

        $expected = 'Input must be numeric';
        $output = $this->findExpected($expected);

        $this->assertEquals($expected, $output);
    }

    public function test_Handler_OutputsIntegerErrorMessage_WhenEmptyStringIsGiven()
    {
        $this->ioManager->pushCommand('sc --size=');

        $this->application->start();

        $expected = 'Input must be numeric';
        $output = $this->findExpected($expected);

        $this->assertEquals($expected, $output);
    }

    public function test_Handler_OutputsIntegersErrorMessage_WhenInputContainsChars()
    {
        $this->ioManager->pushCommand('mm --integers=test 23 15');

        $this->application->start();

        $expected = 'Input must contain only integers';
        $output = $this->findExpected($expected);

        $this->assertEquals($expected, $output);
    }

    public function test_Handler_OutputsIntegersErrorMessage_WhenInputIsEmpty()
    {
        $this->ioManager->pushCommand('mm --integers=');

        $this->application->start();

        $expected = 'Input must contain only integers';
        $output = $this->findExpected($expected);

        $this->assertEquals($expected, $output);
    }

    public function test_Handler_OutputsMatrixError_WhenWrongMatrixIsGiven()
    {
        $this->ioManager->pushCommand('ms');

        $this->application->start();

        $expected = 'Input matrix size must be 3x3 and contain only integers';
        $output = $this->findExpected($expected);

        $this->assertEquals($expected, $output);
    }

    public function test_Handler_OutputsTimeErrorMessage_WhenInvalidTimeIsGiven()
    {
        $this->ioManager->pushCommand('tc --time=13:02:43PM');

        $this->application->start();

        $expected = 'Invalid time format';
        $output = $this->findExpected($expected);

        $this->assertEquals($expected, $output);
    }
}
