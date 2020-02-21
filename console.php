<?php
//
//function printer()
//{
//    while (true) {
//        echo yield;
//    }
//}
//
//$print = printer();
//
//$print->send('Hello');
//$print->send('svswrv');
//$print->send('swrgergerg');
//$print->send('debsrth');
//$print->current();
//
//die;

define('FRAMEWORK_START', microtime(true));
define('BASE_PATH', __DIR__);

require __DIR__ . '/vendor/autoload.php';

use Anso\Framework\Base\Container;
use Anso\Framework\Base\Configuration;
use Anso\Framework\Console\ConsoleApp;
use Anso\Framework\Contract\Application;

$configuration = new Configuration('/config/console');
$container = new Container($configuration);
$app = new ConsoleApp($container, $configuration);

$container->addResolved(Application::class, $app);

$app->start();