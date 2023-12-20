<?php

declare(strict_types=1);

namespace App\Http\Controller;

use Fastvolt\Core\Http\{HttpResponse as Response};

class HomeController
{
    public function index(): ?Response
    {
        return response('hello world')->send();
    }
}