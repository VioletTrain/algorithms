<?php

define('FRAMEWORK_START', microtime(true));
define('BASE_PATH', __DIR__ . '/..');

require __DIR__ . '/../vendor/autoload.php';

use Anso\Framework\Base\BaseConfiguration;
use Anso\Framework\Base\BaseContainer;
use Anso\Framework\Http\HttpApp;


$container = new BaseContainer(new BaseConfiguration('/config/http'));
$app = new HttpApp($container);

$app->start();