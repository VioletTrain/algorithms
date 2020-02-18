<?php

namespace Tests\Feature\Http;

use GuzzleHttp\Client;
use GuzzleHttp\RequestOptions;
use PHPUnit\Framework\TestCase;

abstract class HttpTestCase extends TestCase
{
    protected Client $client;

    public function __construct($name = null, array $data = [], $dataName = '')
    {
        parent::__construct($name, $data, $dataName);

        $this->client = new Client([
            'base_uri' => 'http://172.23.0.4:80',
        ]);
    }

    protected function get(string $uri): array
    {
        return json_decode($this->client->get($uri)->getBody(), true);
    }

    protected function post(string $uri, array $body): array
    {
        return json_decode($this->client->post($uri, [
            RequestOptions::JSON => $body,
            'headers' => ['Content-Type' => 'application/json']
        ])->getBody(), true);
    }
}