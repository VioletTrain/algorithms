<?php

namespace Tests\Feature\Console;

use Anso\Framework\Console\Test\ConsoleTestCase;

class StaircaseHandlerTest extends ConsoleTestCase
{
    public function test_Handler_OutputsStaircase_WhenInputIsIntSize()
    {
        $this->ioManager->pushCommand('sc 4');

        $this->application->start();

        $expected = "   #\n  ##\n ###\n####\n";

        $output = $this->findExpected($expected);

        $this->assertEquals(str_replace("\n", '', $expected), $output);
    }
}
