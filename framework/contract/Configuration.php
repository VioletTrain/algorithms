<?php

namespace Anso\Framework\Contract;

interface Configuration
{
    public function configure(): Configuration;
    public function configPath(): string;
}