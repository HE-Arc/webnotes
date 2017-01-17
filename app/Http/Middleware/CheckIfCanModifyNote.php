<?php

namespace WebNote\Http\Middleware;

use Closure;


use Illuminate\Support\Facades\Auth;

class CheckIfCanModifyNote
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
        if(Auth::user()->canModifyNote($request->note) == 1){
            return $next($request);
        } else {
            return redirect('/notes/'.$request->note);
        }
    }
}
