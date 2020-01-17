<?php

namespace Anso\Framework\Http\Contract;

interface Kernel
{
    public function handle(Request $request): Response;
}