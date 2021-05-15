<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class TestMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next, $arg1)
    {
    }
    public function terminate($request, $response) {
        echo "<br>Executing statements of terminate method of TerminateMiddleware.";
    }
}
