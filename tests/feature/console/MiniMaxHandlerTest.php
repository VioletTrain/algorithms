<?php

namespace Tests\Feature\Console;

use Anso\Framework\Console\Test\ConsoleTestCase;

class MiniMaxHandlerTest extends ConsoleTestCase
{
    public function test_Handler_OutputsMiniMax_WhenInputIsStringOfIntegers()
    {
        $this->ioManager->pushCommand('mm --integers=1 2 4 10 13 25 10');

        $this->application->start();

        $expected = '40 64';

        $output = $this->findExpected($expected);

        $this->assertEquals($expected, $output);
    }
}
