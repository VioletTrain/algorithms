<?php

namespace Anso\Framework\Http;

use Anso\Framework\Base\BaseApp;
use Anso\Framework\Http\Contract\Kernel;
use Anso\Framework\Http\Exception\BaseExceptionHandler;
use Exception;

class HttpApp extends BaseApp
{
    public function start(): void
    {
        $request = BaseRequest::createFromGlobals();
        $exceptionHandler = new BaseExceptionHandler();

        try {
            $kernel = $this->container->make(Kernel::class);
            $response = $kernel->handle($request);
        } catch (Exception $e) {
            $response = $exceptionHandler->handle($request, $e);
        }

        $response->send();
    }
}