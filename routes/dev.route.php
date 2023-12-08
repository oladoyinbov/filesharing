<?php

use FastVolt\Router\Route as DevPages;
use FastVolt\Core\DevTool\DevMode;

/*
|--------------------------------------------------------------------------
| DevTool Routes (Don't Change Anything Here!!!!!!!!)
|--------------------------------------------------------------------------
*/

DevPages::get('/devtool', [DevMode::class, 'index'], name: 'devtool');

DevPages::get('/devtool/controller', [DevMode::class, 'controller']);

DevPages::get('/devtool/model', [DevMode::class, 'generateModel']);

DevPages::get('/devtool/controller/default', [DevMode::class, 'generateController']);

DevPages::get('/devtool/controller/resources', [DevMode::class, 'generateResourcesController']);

DevPages::get('/devtool/database', [DevMode::class, 'DisplayDbInterface']);

DevPages::mixed(['GET', 'POST'], '/devtool/database/tables', [DevMode::class, 'ListAllDbTables']);

DevPages::mixed(['GET', 'POST'], '/devtool/database/create-new-table', [DevMode::class, 'CreateNewTable'], name: 'devtool_table');

DevPages::post('/devtool/generate/controller', [DevMode::class, 'generateControllerHandler']);

DevPages::post('/devtool/generate/rscontroller', [DevMode::class, 'generateResourcesControllerHandler']);

DevPages::post('/devtool/generate/model', [DevMode::class, 'generateModelHandler']);