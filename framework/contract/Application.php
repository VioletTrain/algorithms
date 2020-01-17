<?php

namespace Anso\Framework\Contract;

interface Application extends Container
{
    public function start(): void;
}