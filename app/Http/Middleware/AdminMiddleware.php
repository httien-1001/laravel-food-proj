<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
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
    public function handle(Request $request, Closure $next)
    {
        if(!Auth::check()){
            return  redirect()->route('login');
        }
        if(Auth::user()->roles_models_id == 1){
            return $next($request);
        }else{
            return redirect()->route('customer.prodfile');
        }
    }
}
