<?php

namespace Anso\Http;

use Anso\Contract\Http\Response;

class SymfonyResponseAdapter implements Response
{
    private \Symfony\Component\HttpFoundation\Response $response;

    public function __construct(\Symfony\Component\HttpFoundation\Response $response)
    {
        $this->response = $response;
    }

    public function send(): void
    {
        $this->response->send();
    }
}