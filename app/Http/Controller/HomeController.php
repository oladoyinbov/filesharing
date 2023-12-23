<?php

declare(strict_types=1);

namespace App\Http\Controller;

use Fastvolt\Core\Http\{HttpRequest as Request, HttpResponse as Response};

class HomeController
{
    public function index(Request $request): ?Response
    {
        return response('hello world')->out();
    }
}