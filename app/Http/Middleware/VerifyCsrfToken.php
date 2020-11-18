<?php

namespace App\Http\Middleware;

use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken as Middleware;
use Closure;

class VerifyCsrfToken extends Middleware
{
    protected $except = [
        'http://localhost:8081/*',
        'http://127.0.0.1:8000/*',
    ];
}
