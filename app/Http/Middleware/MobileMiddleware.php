<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use App\Models\XToken;
use App\Models\Responses;
class MobileMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        if (!$request->has('token'))
            return response()->json(Responses::BadRequest());
        switch (XToken::restoreSession($request->input('token'))) {
            case XToken::E_Success:
                return $next($request);
            case XToken::E_InvalidToken:
                return response()->json(Responses::InvalidToken());
            case XToken::E_ExpiredToken:
                return response()->json(Responses::TokenExpired());
        }
        return $next($request);
    }
}
