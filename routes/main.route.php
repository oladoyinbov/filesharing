<?php

use FastVolt\Router\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

Route::get('/', 'HomeController@index', name: 'home');
Route::get('/test', function() {
    return date('d-m-y');
});

# Login Auth
Route::mixed(['GET', 'POST'], '/login', 'LoginController@index', ['home.auth', 'verify.csrf'], name: 'login');

# Sign Up Auth
Route::mixed(['GET', 'POST'], '/register', 'RegisterController@index', 'home.auth', name: 'register');
Route::post('/register/validate-mail', 'RegisterController@validate_mail', 'home.auth', name: 'register_validate_mail');

# dashboard
Route::group('/user', 'dash.auth')
    ->get('/dashboard', 'DashboardController@index', name: 'dashboard')
    ->get('/dashboard/stats', 'DashboardController@stats', name: 'dashboard_stats')
    ->mixed(['GET', 'POST'], '/myfiles', 'FilesController@myfiles', name: 'dash_myfiles')
    ->mixed(['GET', 'POST'], '/upload', 'FilesController@uploadFilesInterface', name: 'dash_upload_files');