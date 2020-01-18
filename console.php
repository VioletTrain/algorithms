<?php

require __DIR__ . '/vendor/autoload.php';

use Anso\Framework\Console\ConsoleConfiguration;
use Anso\Framework\Base\BaseContainer;
use Anso\Framework\Console\ConsoleApp;

define('BASE_PATH', __DIR__);

$container = new BaseContainer(new ConsoleConfiguration('/config/console'));
$app = new ConsoleApp($container);

$app->start();