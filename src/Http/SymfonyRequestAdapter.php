<?php

namespace Anso\Http;

use Anso\Contract\Http\Request;
use Symfony\Component\HttpFoundation\Request as SymfonyRequest;

class SymfonyRequestAdapter implements Request
{
    private SymfonyRequest $request;

    public function __construct(SymfonyRequest $request)
    {
        $this->request = $request;
    }

    public function getMethod(): string
    {
        return $this->request->getMethod();
    }

    public function getUri(): string
    {
        return $this->request->getRequestUri();
    }

    public function getUriWithoutParameters(): string
    {
        return explode('?', $this->getUri())[0];
    }

    public function getParameters(): array
    {
        $parameters = [];
        $uri = explode('?', $this->getUri());

        if (!isset($uri[1])) {
            return $parameters;
        }

        $parametersAsStrings = explode('&', $uri[1]);

        foreach ($parametersAsStrings as $parameter) {
            $keyValue = explode('=', $parameter);

            if ($keyValue[0]) {
                $parameters[$keyValue[0]] = isset($keyValue[1]) ? $keyValue[1] : null;
            }
        }

        return $parameters;
    }
}