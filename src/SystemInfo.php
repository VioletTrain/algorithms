<?php

namespace Anso;

class SystemInfo
{
    public function memoryUsage(): int
    {
        return memory_get_usage(true);
    }

    public function totalDeclaredClasses(): int
    {
        return count(get_declared_classes());
    }
}