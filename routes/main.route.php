<?php

use FastVolt\Router\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

Route::get('/', 'HomeController@index', name: 'home');

# Login Auth
Route::mixed(['GET', 'POST'], '/login', 'LoginController@index', ['auth.control', 'verify.csrf'], name: 'login');

# Sign Up Auth
Route::mixed(['GET', 'POST'], '/register', 'RegisterController@index', 'auth.control', name: 'register');

Route::post('/register/validate-mail', 'RegisterController@validate_mail', '', name: 'register_validate_mail');