<?php

namespace Anso\Framework\Contract;

interface ParameterBag
{
    public function get(string $parameterName);

    public function first();

    public function getOrFirst(string $parameterName);

    public function getParameters(): array;
}