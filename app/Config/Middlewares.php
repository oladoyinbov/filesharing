<?php

declare(strict_types=1);

namespace App\Config;

class Middlewares
{

    /**
     * Declare your middleware alias name here
     * 
     * @var array
     */
    public static array $aliases = [

        "verify.csrf" => \App\Http\Middleware\VerifyCsrfToken::class,
        "auth.control" => \App\Http\Middleware\AuthControl::class

    ];
}