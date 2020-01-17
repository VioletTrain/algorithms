<?php

namespace Anso\Framework\Contract;

interface Configuration
{
    public function configure(): Configuration;
    public function providers(): array;
    public function routes(): array;
}