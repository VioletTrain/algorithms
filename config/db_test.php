<?php

return [
    'entity_paths' => [
        __DIR__ . '/../src/Entity/'
    ],
    'dev_mode' => true,
    'db_params' => [
        'host'      => 'pgsql_alg_test',
        'port'      => '5432',
        'driver'    => 'pdo_pgsql',
        'user'      => 'algorithms_user',
        'password'  => 'postgres1234',
        'dbname'    => 'algorithms_db_test',
    ]
];