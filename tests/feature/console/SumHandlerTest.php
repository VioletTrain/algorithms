<?php

namespace Tests\Feature\Console;

use Anso\Framework\Console\Test\ConsoleTestCase;

class SumHandlerTest extends ConsoleTestCase
{
    public function test_Handler_OutputsSum_When2IntegersAreGiven()
    {
        $this->ioManager->pushCommand('sum --a=3 --b=5');

        $this->application->start();

        $expected = '8';

        $output = $this->findExpected($expected);

        $this->assertEquals($expected, $output);
    }
}
