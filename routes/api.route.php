<?php

use FastVolt\Router\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
*/

Route::get('/api/v1/', function() {

    return response()->json('hello, world!', 201); // {"hello, world"}
});