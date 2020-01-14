<?php

use Anso\Base\ConsoleAppProvider;
use Anso\Base\BaseAppProvider;

return [
    'http' => [
        BaseAppProvider::class,
    ],

    'console' => [
        ConsoleAppProvider::class
    ]
];