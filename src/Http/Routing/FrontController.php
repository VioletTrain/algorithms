<?php

namespace Anso\Http\Routing;

use Anso\Contract\Http\Request;
use Anso\Contract\Http\Response;
use Anso\Exception\HttpNotFoundException;
use Doctrine\Common\Collections\ArrayCollection;
use Throwable;

class FrontController implements \Anso\Contract\Http\Routing\FrontController
{

    private ArrayCollection $routes;

    public function __construct()
    {
        $this->routes = $this->loadRoutes();
    }

    protected function loadRoutes(): ArrayCollection
    {
        $routes = array_merge(
            ApiRouter::getRoutes()
        );

        return new ArrayCollection($routes);
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

        var_dump($route['handler']);die;
    }

    private function findRoute(Request $request)
    {
        foreach ($this->routes as $route) {
            if ($route['method'] === $request->getMethod() && $route['uri'] === $request->getUriWithoutParameters()) {
                return $route;
            }
        }

        return null;
    }

    private function executeHandler()
    {

    }
}