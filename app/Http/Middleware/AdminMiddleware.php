<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use App\Models\JsonResp;
class AdminMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next, $page)
    {
        $ad = session('utype');
        $p = session('perms');
        if ($ad != null || $ad == 1 || $p != null)
        {
            if (
                ($page == '0' && $p->PERM_ADD_SELLER == false && $p->PERM_ALL == false) ||
                ($page == '1' && $p->PERM_ADD_ADMIN == false && $p->PERM_ALL == false) ||
                ($page == '2' && $p->PERM_EDIT_SELLER == false && $p->PERM_DEL_SELLER == false && $p->PERM_ALL == false) ||
                ($page == '3' && $p->PERM_EDIT_ADMIN == false && $p->PERM_DEL_ADMIN == false && $p->PERM_ALL == false) ||
                ($page == '4' && $p->PERM_DEL_USER == false && $p->PERM_ALL == false) 
            )
            {
                return redirect('/account');
            }
            else {
                return $next($request); 
            }
        } 
    }
}
