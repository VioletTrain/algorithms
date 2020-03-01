<?php

namespace Tests\Feature\Console;

use Anso\Framework\Console\Test\ConsoleTestCase;

class MinimumContainersHandlerTest extends ConsoleTestCase
{
    public function test_Handler_OutputsMinimumContainersCount_WhenSuitableItemsAreGiven()
    {
        $this->ioManager->pushCommand('mcn --items=1 2 10 11 14 17');

        $this->application->start();

        $expected = '3';

        $output = $this->findExpected($expected);

        $this->assertEquals($expected, $output);
    }
}
