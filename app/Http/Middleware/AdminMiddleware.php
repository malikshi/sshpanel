<?php

namespace App\Http\Middleware;
use Auth;
use Closure;

class AdminMiddleware
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
        // do an action
        if(Auth::check())
        {
          if(Auth::user()->role == 0)
          {
            return redirect()->intended('home');
          }
          else
          {
            return $next($request);
          }
        }

    }
}
