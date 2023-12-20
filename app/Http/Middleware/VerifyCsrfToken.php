<?php

declare(strict_types=1);

namespace App\Http\Middleware;

class VerifyCsrfToken extends \Fastvolt\Core\Middleware
{
    public function implement(\Fastvolt\Core\Http\HttpRequest $request)
    {
        if ($request->is_post_request() && !verify_csrf_token()) {
            # render csrf error message
            exit(csrf_error());
        }
    }
}