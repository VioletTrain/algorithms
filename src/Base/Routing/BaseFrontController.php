<?php

namespace Anso\Base\Routing;

use Anso\Contract\Core\Application;
use Anso\Contract\Http\Request;
use Anso\Contract\Http\Response;
use Anso\Contract\Routing\FrontController;
use Anso\Exception\HttpNotFoundException;
use Doctrine\Common\Collections\ArrayCollection;
use Throwable;

class BaseFrontController implements FrontController
{
    protected Application $app;
    protected ArrayCollection $routes;

    public function __construct(Application $app)
    {
        $this->app = $app;
        $this->routes = $this->loadRoutes();
    }

    protected function loadRoutes(): ArrayCollection
    {
        return new ArrayCollection($this->app->getRoutes());
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