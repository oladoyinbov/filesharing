<?php

declare(strict_types=1);

namespace App\Http\Middleware;

use Fastvolt\Helper\Session;

class DashboardAuth extends \Fastvolt\Core\Middleware
{
    public function implement(\Fastvolt\Core\Http\HttpRequest $request)
    {
        if (! Session::has('fs_user')) {

            exit(response()->redirect(route('login')));

        }
    }
}