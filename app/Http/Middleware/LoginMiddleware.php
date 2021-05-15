<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class LoginMiddleware
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
        $data = session('logined');
        echo $data;
        if ($data == null || $data == 0){
            return $next($request);
        }
        else {
            $utype = session('utype');
            if ($utype == 1)
                return redirect('/admin/dashboard');
            else if ($utype == 2) 
                return redirect('/seller/dashboard');
            else 
                return redirect('/');
        }
    }
}
