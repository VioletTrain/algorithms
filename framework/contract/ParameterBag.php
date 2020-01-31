<?php

namespace Anso\Framework\Contract;

interface ParameterBag
{
    public function first();
    
    public function get(string $parameterName);

    public function getParameters(): array;
}