<?php

use FastVolt\Router\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

Route::get('/', 'HomeController@index', name: 'home');
Route::get('/test', function() {
   [$db, $mui] = [new stdClass, []];
   $db->name = 'cool';
   $db->class = 'grad';

   print_r(count((array)$db));
});

# Login Auth
Route::mixed(['GET', 'POST'], '/login', 'LoginController@index', ['home.auth', 'verify.csrf'], name: 'login');

# Sign Up Auth
Route::mixed(['GET', 'POST'], '/register', 'RegisterController@index', 'home.auth', name: 'register');
Route::post('/register/validate-mail', 'RegisterController@validate_mail', 'home.auth', name: 'register_validate_mail');

# dashboard
Route::group('/user', 'dash.auth')
    -> get('/dashboard', 'DashboardController@index', name: 'dashboard')
    -> get('/dashboard/stats', 'DashboardController@stats', name: 'dashboard_stats')
    -> mixed(['GET', 'POST'], '/myfiles', 'MyFilesController@index', name: 'dash_myfiles')
    -> get('/myfiles/fopt', 'MyFilesController@loadOptions', name: 'dash_myfiles_load_opt')
    -> post('/myfiles/opt/rename', 'MyFilesController@renameFile', 'verify.csrf' , name: 'dash_update_file_name')
    -> get('/myfiles/opt/preview/{id}', 'MyFilesController@previewFile', name: 'dash_myfiles_preview_file')
    -> get('/myfiles/opt/folder/new', 'FolderController@create', name: 'dash_create_folder')
    -> mixed(['GET', 'POST'], '/upload', 'FileUploadController@uploadFilesInterface', name: 'dash_upload_files');