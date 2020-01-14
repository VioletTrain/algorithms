<?php

use Anso\Base\Routing\ApiRouter;

return [
    'http' => array_merge(
        ApiRouter::getRoutes(),
    ),

    'console' => [

    ],
];
