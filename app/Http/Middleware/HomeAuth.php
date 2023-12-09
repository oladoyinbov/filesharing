<?php

declare(strict_types=1);

namespace App\Http\Middleware;

use FastVolt\Helper\Session;

class HomeAuth extends \FastVolt\Core\Middleware
{
    public function implement(\FastVolt\Core\Http\HttpRequest $request)
    {
        if (Session::has('fs_user')) {

            exit(response()->redirect(route('dashboard')));

        }
    }
}