<?php

namespace Anso\Contract\Http;


interface Kernel
{
    public function handle(Request $request): Response;
}