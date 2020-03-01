<?php

namespace Tests\Feature\Http;


use Algorithms\Entity\Result;
use Anso\Framework\Http\Test\HttpTestCase;

class MinimumContainersActionTest extends HttpTestCase
{
    public function test_Action_RespondsWithContainersCount_WhenSuitableItemsRequested()
    {
        $response = $this->post('/minimum-containers', [
            'items' => [
                1, 2, 5, 10, 46
            ]
        ]);

        $this->assertEquals([
            'containers_count' => 3
        ], $response);


        $this->db->assertDBHas(Result::class, [
            'useCaseName' => 'minimum-containers',
            'input' => '1, 2, 5, 10, 46',
            'result' => '3',
        ]);

        $this->db->clearDB(Result::class);
    }
}
