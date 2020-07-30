<?php

namespace App\Http\Middleware;

use Closure;
use Auth;

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
        if(Auth::check()){
            if(Auth::user()->role >0){
                return $next($request);
            }
            else
            {
                return redirect()->route('viewAdmin.login')->with('errors','Bạn không có quền vào trang này');
            }
        }
        else
        {
            return redirect()->route('viewAdmin.login');
        }
        
    }
}
