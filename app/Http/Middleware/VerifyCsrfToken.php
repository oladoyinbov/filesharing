<?php

declare(strict_types=1);

namespace App\Http\Middleware;

class VerifyCsrfToken extends \FastVolt\Core\Middleware
{
    public function implement(\FastVolt\Core\Http\HttpRequest $request)
    {
        if ($request->is_post_request() && !verify_csrf_token()) {
            # render csrf error message
            exit(csrf_error());
        }
    }
}