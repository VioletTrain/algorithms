<?php

define('FRAMEWORK_START', microtime(true));
define('BASE_PATH', __DIR__);

require __DIR__ . '/vendor/autoload.php';

use Anso\Framework\Base\BaseContainer;
use Anso\Framework\Base\Configuration;
use Anso\Framework\Console\ConsoleApp;

$container = new BaseContainer(new Configuration('/config/console'));
$app = new ConsoleApp($container);

$app->start();