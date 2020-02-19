<?php

namespace Anso\Framework\Http;

use Anso\Framework\Base\BaseApp;
use Exception;

class HttpApp extends BaseApp
{
    public function start(): void
    {
        $request = Request::createInstance();
        $exceptionHandler = $this->configuration->exceptionHandler();

        try {
            $kernel = $this->container->make(Kernel::class);
            $response = $kernel->handle($request);
        } catch (Exception $e) {
            $response = $exceptionHandler->handle($request, $e);
        }

        $response->send();
    }
}