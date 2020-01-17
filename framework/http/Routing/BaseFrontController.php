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
    protected ArrayCollection $routes;

    public function __construct(Application $app, Configuration $configuration)
    {
        $this->app = $app;
        $this->configuration = $configuration;
        $this->routes = $this->loadRoutes();
    }

    protected function loadRoutes(): ArrayCollection
    {
        return new ArrayCollection($this->configuration->routes());
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

        return $this->executeRouteHandler($route);
    }

    protected function findRoute(Request $request): array
    {
        foreach ($this->routes as $route) {
            if ($route['method'] === $request->getMethod() && $route['uri'] === $request->getUriWithoutParameters()) {
                return $route;
            }
        }

        return [];
    }

    /**
     * @param array $route
     * @return Response
     * @throws Throwable
     */
    protected function executeRouteHandler(array $route): Response
    {
        $action = $route['action'];

        $action = $this->app->make($action);

        return $action->execute();
    }
}