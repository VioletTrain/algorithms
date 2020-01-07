<?php

require __DIR__ . '/../vendor/autoload.php';

$app = new Anso\Core\App(new \Anso\Config\Configurator());
$kernel = $app->getKernel();

$symfonyRequest = \Symfony\Component\HttpFoundation\Request::createFromGlobals();
$request = new \Anso\Http\SymfonyRequestAdapter($symfonyRequest);

$response = $kernel->handle($request);

$response->send();