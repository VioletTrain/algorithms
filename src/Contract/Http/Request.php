<?php

namespace Anso\Contract\Http;

interface Request
{
    public function getMethod(): string;
    public function getUri(): string;
    public function getUriWithoutParameters(): string;
    public function getParameters(): array;
}