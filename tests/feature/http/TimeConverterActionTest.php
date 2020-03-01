<?php

namespace Tests\Feature\Http;

use Algorithms\Entity\Result;

class TimeConverterActionTest extends HttpTestCase
{
    public function test_Action_RespondsWithMilitaryTime_WhenCommonTimeIsRequested()
    {
        $response = $this->get('/time-converter?time=02:03:32PM');

        $this->assertEquals([
            'converted_time' => '14:03:32'
        ], $response);

        $this->db->assertDBHas(Result::class, [
            'useCaseName' => 'time-converter',
            'input' => '02:03:32PM',
            'result' => '14:03:32',
        ]);

        $this->db->clearDB(Result::class);
    }

    public function test_Action_RespondsWithError_WhenTimeFormatIsInvalid()
    {
        $response = $this->get('/time-converter?time=13:03:32PM');

        $this->assertEquals([
            'error' => 'Invalid time format'
        ], $response);

        $this->db->assertDBDoesNotHave(Result::class, [
            'useCaseName' => 'time-converter'
        ]);
    }
}
