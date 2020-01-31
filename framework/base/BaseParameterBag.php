<?php

namespace Anso\Framework\Base;

use Anso\Framework\Contract\ParameterBag;

class BaseParameterBag implements ParameterBag
{
    private array $parameters;

    public function __construct(array $parameters)
    {
        $this->parameters = $parameters;
    }

    public function first()
    {
        return reset($this->parameters);
    }

    public function get(string $parameterName)
    {
        return $this->parameters[$parameterName] ??= '';
    }

    public function getParameters(): array
    {
        return $this->parameters;
    }
}