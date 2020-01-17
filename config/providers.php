<?php

use Anso\Framework\Console\ConsoleAppProvider;
use Anso\Framework\Http\HttpAppProvider;

return [
    'http' => [
        HttpAppProvider::class,
    ],

    'console' => [
        ConsoleAppProvider::class
    ]
];