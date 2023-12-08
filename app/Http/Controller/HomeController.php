<?php

declare(strict_types=1);

namespace App\Http\Controller;

use FastVolt\Core\Http\{
    HttpRequest as Request,
    HttpResponse as Response
};

class HomeController extends \FastVolt\Core\Controller 
{

    /**
     * Hello World Function
     *
     * @return string
     */
    public function index(): string
    {
        return $this->response->out('Hello World!');
    }

        
}