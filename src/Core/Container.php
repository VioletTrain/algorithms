<?php

namespace Anso\Core;

use Anso\Contract\Config\Configurator;
use Anso\Contract\Core\Container as ContainerInterface;
use Anso\Contract\Core\Provider;
use Anso\Exception\BindingException;
use ReflectionClass;
use ReflectionException;

class Container implements ContainerInterface
{
    private Configurator $configurator;
    private array $bindings;
    private array $providers;

    public function __construct(Configurator $configurator)
    {
        $this->configurator = $configurator->configure();

        $this->registerBindings($this->createProviders());
    }

    protected function createProviders(): array
    {
        $config = $this->configurator->providers();

        foreach ($config as $item) {
            $this->providers[] = new $item($this);
        }

        return $this->providers;
    }

    protected function registerBindings(array $providers): void
    {
        foreach ($providers as $provider) {
            if ($provider instanceof Provider) {
                $provider->register();
            }
        }
    }

    public function bind(string $abstract, string $concrete): void
    {
        $this->bindings[$abstract] = $concrete;
    }

    /**
     * @param string $class
     * @param array $parameters
     * @return mixed
     * @throws BindingException
     */
    public function make(string $class, array $parameters)
    {
        if (!$this->hasBindings($class)) {
            throw new BindingException("Class $class has not been bind.");
        }

        try {
            $reflector = new ReflectionClass($class);
        } catch (ReflectionException $e) {
            throw new BindingException("Target class $class does not exist");
        }

        if (!$reflector->isInstantiable()) {
            throw new BindingException("Target class $class can not be instantiated");
        }

        $constructor = $reflector->getConstructor();

        if (is_null($constructor)) {
            return new $class;
        }

        $dependencies = $constructor->getParameters();

        $instances = $this->resolveDependencies($dependencies);

        return $reflector->newInstanceArgs($instances);
    }

    protected function hasBindings(string $class): bool
    {
        return isset($this->bindings[$class]);
    }
}