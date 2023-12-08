<?php

# The paths config allows you to configure the paths to your application's folders.

include_once(__DIR__ . '/../../info.php');

return [

    'controllers' => ROOT_DIR. 'app/Http/Controller',

    'models' => ROOT_DIR. '/app/Model',
    
    'middlewares' => ROOT_DIR . '/app/Http/Middleware',

    'routes' => ROOT_DIR . '/routes',

    'helpers' => ROOT_DIR . '/app/Helper',

    'views' => ROOT_DIR . '/views',

    'config' => ROOT_DIR . '/app/Config',

    'resources' => ROOT_DIR . '/resources',

    'storage' => ROOT_DIR . '/storage',

    'devtool' => ROOT_DIR. '/src/Core/DevTool',

    'public' => ROOT_DIR . '/public',

    'database' => ROOT_DIR . '/storage/database',

    'error_log' => ROOT_DIR . '/storage/error_log'

];
