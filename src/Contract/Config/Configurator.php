<?php

namespace Anso\Contract\Config;

interface Configurator
{
    public function configure(): Configurator;
    public function providers(): array;
}