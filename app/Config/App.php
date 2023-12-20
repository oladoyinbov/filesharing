<?php

# APP CONFIGURATION

include_once(__DIR__ . '/../../info.php');

return [

    /*
    |--------------------------------------------------------------------------
    | App Name Config
    |--------------------------------------------------------------------------
    |
    */
    "APP_NAME" => env('APP_NAME', 'Fastvolt'),


    /*
    |--------------------------------------------------------------------------
    | App Url Config
    |--------------------------------------------------------------------------
    |
    */
    "APP_URL" => env('APP_URL', 'http://127.0.0.1'),


    /*
    |--------------------------------------------------------------------------
    | Enable Debug Mode
    |--------------------------------------------------------------------------
    |
    */
    "APP_DEBUG" => env('APP_DEBUG', false),


    /*
    |--------------------------------------------------------------------------
    | Enable Secret Key
    |--------------------------------------------------------------------------
    |
    */
    "APP_KEY" => env('APP_KEY', 'xFoster193pe82238989sjjusnxn92_iw'),



    /*
    |--------------------------------------------------------------------------
    | Set Application TimeZone
    |--------------------------------------------------------------------------
    |
    */
    "APP_TIMEZONE" => 'Lagos/Africa',


    /*
    |--------------------------------------------------------------------------
    | Set Application's Default Error Page
    |--------------------------------------------------------------------------
    |- locate or create "404.tpl" template file in "views" folder in app root to customize
    |
    */
    "APP_ERROR_PAGE" => '404.tpl',


    /*
    |--------------------------------------------------------------------------
    | Application Default Root Directory
    |--------------------------------------------------------------------------
    |- This make use of "info.php" file in app root directory to get accurate root url
    |
    */
    "ROOT_DIR" => ROOT_DIR,


    /*
    |--------------------------------------------------------------------------
    | Use Router Static Instance
    |--------------------------------------------------------------------------
    |- This make use of "info.php" file in app root directory to get Fastvolt current version
    |
    */
    "APP_VERSION" => APP_VERSION,



    /*
    |--------------------------------------------------------------------------
    | Lists Of Function To Disable In This Application
    |--------------------------------------------------------------------------
    |- Review and list any dangerous PHP functions that can be misused to execute arbitrary code on this application. 
    |- Functions like eval(), system(), exec(), and passthru().
    |- Some functions should be disabled or restricted to specific trusted users if their usage is necessary.
    |
    */
    "DISABLE_FUNCTIONS" => ['eval', 'system', 'exec', 'passthru']

];