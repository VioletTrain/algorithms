<?php

namespace Tests\Feature\Http;


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
    }
}
