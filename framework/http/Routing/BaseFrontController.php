<?php

namespace Anso\Framework\Http\Routing;

use Anso\Framework\Contract\Application;
use Anso\Framework\Contract\Configuration;
use Anso\Framework\Http\Contract\Request;
use Anso\Framework\Http\Contract\Response;
use Anso\Framework\Http\Contract\Routing\FrontController;
use Anso\Framework\Http\Exception\HttpNotFoundException;
use Throwable;

class BaseFrontController implements FrontController
{
    protected Application $app;
    protected Configuration $configuration;
    protected RouteCollection $routes;

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
        if (!$route = $this->routes->findRoute($request->getMethod(), $request->getUriWithoutParameters())) {
            throw new HttpNotFoundException($request->getUriWithoutParameters());
        }

        $action = $this->app->make($route);

        return $action->execute();
    }
}