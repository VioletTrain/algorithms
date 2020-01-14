<?php

use Anso\Config\ConsoleConfigurator;
use Anso\Contract\Http\Kernel;
use Anso\Core\HttpApp;
use Anso\Base\ConsoleRequest;

require __DIR__ . '/vendor/autoload.php';

define('BASE_PATH', __DIR__ . '/..');

$input = readline("Hello there. Type 'man' to view available commands\n");

$request = new ConsoleRequest($input);

$app = new HttpApp(new ConsoleConfigurator());
$exceptionHandler = $app->getExceptionHandler();

try {
    $kernel = $app->make(Kernel::class);
    $response = $kernel->handle($request);
} catch (Exception $e) {
    $response = $exceptionHandler->handle($request, $e);
}

$response->send();