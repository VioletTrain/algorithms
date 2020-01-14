<?php

require __DIR__ . '/../vendor/autoload.php';

define('BASE_PATH', __DIR__ . '/..');

$request = \Anso\Http\BaseRequest::createFromGlobals();

$app = new Anso\Core\HttpApp(new \Anso\Config\Configurator());

$exceptionHandler = $app->getExceptionHandler();

try {
    $kernel = $app->make(\Anso\Contract\Http\Kernel::class);
    $response = $kernel->handle($request);
} catch (Exception $e) {
    $response = $exceptionHandler->handle($request, $e);
}

$response->send();
