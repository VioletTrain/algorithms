<?php

namespace Tests\Feature\Console;

use Anso\Framework\Console\Test\ConsoleTestCase;

class IntToRomanHandlerTest extends ConsoleTestCase
{
    public function test_Handler_OutputsRoman_WhenInputIsInteger()
    {
        $this->ioManager->pushCommand('itr 199');

        $this->application->start();

        $expected = 'CXCIX';

        $output = $this->findExpected($expected);

        $this->assertEquals($expected, $output);
    }
}
