<?php

namespace Tests\Feature\Console;

class MagicSquareHandlerTest extends ConsoleTestCase
{
    public function test_Action_RespondsWithCost_When3x3IntMatrixIsRequested()
    {
        $this->ioManager->pushCommand('ms')
            ->pushCommand('4 8 2')
            ->pushCommand('4 5 7')
            ->pushCommand('6 1 6');

        $this->application->start();

        $expected = '4';

        $output = $this->findExpected($expected);

        $this->assertEquals($expected, $output);
    }
}
