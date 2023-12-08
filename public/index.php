<?php

/*
|--------------------------------------------------------------------------
| Initialize Composer Package Autoloader
|--------------------------------------------------------------------------
|
*/
if(file_exists(__DIR__."/../vendor/autoload.php")){

    require_once realpath(__DIR__."/../vendor/autoload.php");

} else {

    die('
    <div style="background-color:#15161C;padding:50px;">
        <span style="color:red;">
            Fastvolt Framework Needs Composer Autoloader to Function Properly! Please Install Composer (https://composer.org) And <a href="https://fastvolt.gitbook.io/docs/overview/installation" style="background-color:#2D333B;color:white;padding:3px;text-decoration:none;">Read Docs</a> To Configure Your Application.</h4>
        </span>
    </div>');
}


/**
 * The Application Bootstrap File
 * 
 * This file load and render our main application
 * 
 */
if(file_exists(__DIR__.'/../src/bootstrap.php')){

    require_once realpath(__DIR__.'/../src/bootstrap.php');
}
