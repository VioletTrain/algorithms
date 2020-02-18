<?php

use Algorithms\Http\ApiRouter;
use Anso\Framework\Http\Routing\RouteCollection;

return new RouteCollection(array_merge(
    ApiRouter::getRoutes(),
));
