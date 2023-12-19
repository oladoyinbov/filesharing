<?php

declare(strict_types=1);

namespace App\Http\Controller;

use Fastvolt\Core\Http\{HttpRequest as Request, HttpResponse as Response};

class HomeController
{
    public function sample(Request $request): ?Response
    {
        # checking request method using the Request object
        if ($request->is_get_request()) {

            response()->out('hello'); // hello
            response()->json(['result' => 'success']); // {'result': 'success}
            response(['result' => 'success'])->toJson(); // array to json
            response()->render('template.html'); // render template
            response()->setStatusCode(200); // status code
        }

        return null;
    }
}