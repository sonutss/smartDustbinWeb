<?php

namespace App\Http\Middleware;

use Closure;
use Session;

class CheckUserSession
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
        $val  = Session::get('auth_key');
       
        if ($val == null) {
            // dd($val);
            // dd($name);
            //dd(session()->all());
            return redirect()->route('index');
        }
        return $next($request);
    }

}
