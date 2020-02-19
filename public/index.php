<?php

define('FRAMEWORK_START', microtime(true));
define('BASE_PATH', __DIR__ . '/..');

require __DIR__ . '/../vendor/autoload.php';

use Anso\Framework\Base\Configuration;
use Anso\Framework\Base\BaseContainer;
use Anso\Framework\Http\HttpApp;

$configuration = new Configuration('/config/http');
$container = new BaseContainer($configuration);
$app = new HttpApp($container, $configuration);

$app->start();