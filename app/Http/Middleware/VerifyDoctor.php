<?php

namespace App\Http\Middleware;

use Closure;
use Session;

class VerifyDoctor
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

        if(Session::has('doctor'))
        {
            return $next($request);
        }
        else{
            return response()->view('User.login');
        }
    }
}
