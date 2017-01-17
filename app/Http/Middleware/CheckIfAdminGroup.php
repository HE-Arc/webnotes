<?php

namespace WebNote\Http\Middleware;

use Closure;

use Illuminate\Support\Facades\Auth;

class CheckIfAdminGroup
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {

        if(Auth::user()->canModifyGroup($request->group) == 1){
            return $next($request);
        } else {
            return redirect('/group/'.$request->group);
        }
    }
}
