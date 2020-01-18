<?php

namespace Anso\Framework\Http\Routing;

use Anso\Framework\Contract\Application;
use Anso\Framework\Contract\Configuration;
use Anso\Framework\Http\Contract\Request;
use Anso\Framework\Http\Contract\Response;
use Anso\Framework\Http\Contract\Routing\FrontController;
use Anso\Framework\Http\Exception\HttpNotFoundException;
use Doctrine\Common\Collections\ArrayCollection;
use Throwable;

class BaseFrontController implements FrontController
{
    protected Application $app;
    protected Configuration $configuration;
    protected array $routes;

    public function __construct(Application $app, Configuration $configuration)
    {
        $this->app = $app;
        $this->configuration = $configuration;
        $this->loadRoutes();
    }

    protected function loadRoutes()
    {
        $this->routes = include($this->configuration->configPath() . '/routes.php');
    }

    /**
     * @param Request $request
     * @return Response
     * @throws Throwable
     */
    public function handle(Request $request): Response
    {
        if (!$route = $this->findRoute($request)) {
            throw new HttpNotFoundException($request->getUriWithoutParameters());
        }

        return $this->makeAndExecuteRouteHandler($route);
    }

    protected function findRoute(Request $request): string
    {
        foreach ($this->routes as $route) {
            if ($route['method'] === $request->getMethod() && $route['uri'] === $request->getUriWithoutParameters()) {
                return $route['action'];
            }
        }

        return '';
    }

    /**
     * @param string $action
     * @return Response
     * @throws Throwable
     */
    protected function makeAndExecuteRouteHandler(string $action): Response
    {
        $action = $this->app->make($action);

        return $action->execute();
    }
}