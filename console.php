<?php

use Anso\Config\BaseConfigurator;
use Anso\Contract\Http\Kernel;

echo "Hello there \n";

$input = readline("Enter command: \n");
echo "$input\n";

require __DIR__ . '/vendor/autoload.php';

define('BASE_PATH', __DIR__ . '/..');

$app = new Anso\Core\HttpApp(new BaseConfigurator());

$exceptionHandler = $app->getExceptionHandler();

try {
    $kernel = $app->make(Kernel::class);
    $response = $kernel->handle($request);
} catch (Exception $e) {
    $response = $exceptionHandler->handle($request, $e);
}

$response->send();