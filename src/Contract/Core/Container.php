<?php

namespace Anso\Contract\Core;

use Anso\Exception\BindingException;
use ReflectionException;

interface Container
{
    public function bind(string $abstract, string $concrete): void;

    public function singleton(string $abstract, string $concrete): void;

    /**
     * @param string $class
     * @param array $parameters
     * @return mixed
     * @throws BindingException
     * @throws ReflectionException
     */
    public function make(string $class, array $parameters = []);
}