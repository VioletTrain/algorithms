<?php

namespace Algorithms\Http;

use Anso\Framework\Contract\Logger;
use Anso\Framework\Base\FileLogger;
use Anso\Framework\Contract\Provider;
use Anso\Framework\Contract\Container;
use Anso\Framework\Contract\Application;
use Anso\Framework\Http\HttpApp;
use Anso\Framework\Base\Configuration;
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\ORM\Tools\Setup;

class HttpAppProvider implements Provider
{
    private Container $container;

    public function __construct(Container $container)
    {
        $this->container = $container;
    }

    public function register(): void
    {
        $this->container->singleton(Application::class, HttpApp::class);
        $this->container->singleton(Container::class, HttpApp::class);
        $this->container->singleton(Configuration::class, Configuration::class);
        $this->container->bind(Logger::class, FileLogger::class);
        $this->container->bind(EntityManagerInterface::class, function () {
            $config = include(BASE_PATH . '/config/db.php');
            $doctrineConfig = Setup::createAnnotationMetadataConfiguration($config['entity_paths'], $config['dev_mode']);

            return EntityManager::create($config['db_params'], $doctrineConfig);
        });
    }
}