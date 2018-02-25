<?php

namespace App\Http\Middleware;

use Closure;

class CheckLogin
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
        if(!$request->session()->get('is_login')){
            return redirect('/'.(empty(config('webset.webdir')) ? 'admin' : config('webset.webdir')).'login');
        }
        return $next($request);
    }
}
