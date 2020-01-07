<?php

namespace Anso\Contract\Core;

interface Container
{
    public function bind(string $abstract, string $concrete): void;
    public function make(string $class, array $parameters);
}