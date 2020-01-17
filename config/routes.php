<?php

use Anso\Framework\Http\Routing\ApiRouter;

return [
    'http' => array_merge(
        ApiRouter::getRoutes(),
    ),

//    'console' => array_merge(
//        ConsoleRouter::getRoutes()
//    ),
];
