<?php

namespace Anso\Base;

use Anso\Contract\Http\Request as RequestContract;
use Symfony\Component\HttpFoundation\Request as SymfonyRequest;

class BaseRequest extends SymfonyRequest implements RequestContract
{

    public function getMethod(): string
    {
        return parent::getMethod();
    }

    public function getUri(): string
    {
        return parent::getRequestUri();
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