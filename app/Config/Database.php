<?php

# DB CONFIGURATIONS

return [

        'DB_CONNECTION' => env('DB_CONNECTION', 'mysql'),

        'mysql' => [

            'DB_HOST' => env('DB_HOST', '127.0.0.1'),

            'DB_NAME' => env('DB_NAME', ''),

            'DB_PORT' => env('DB_PORT', 3306),

            'DB_USERNAME' => env('DB_USERNAME', 'root'),

            'DB_PASSWORD' => env('DB_PASSWORD', ''),

            'DB_CHARSET' => env('APP_CHARSET', 'UTF-8'),

            'DB_COLLATION' => 'utf8mb4_general_ci',

        ],

];
