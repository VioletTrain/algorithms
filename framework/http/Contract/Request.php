<?php

namespace Anso\Framework\Http\Contract;

interface Request
{
    public function getMethod(): string;

    public function getUri(): string;

    public function getUriWithoutParameters(): string;

    public function getParameters(): array;

    public function get(string $key, $default = null);
}