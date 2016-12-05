<?php

namespace App\Http\Middleware;

use Closure;
use Auth;

class HasToBeAdmin
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
        $user = $request->user();
        if($user && $user->power ===1){
            return $next($request);
        }
        return redirect('/');
        
    }
}
