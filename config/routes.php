<?php

use Anso\Http\Routing\ApiRouter;

return [
    'http' => array_merge(
        ApiRouter::getRoutes(),
    ),

    'console' => [

    ],
];
