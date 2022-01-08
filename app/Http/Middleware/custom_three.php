<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use App\Models\User;
use Auth;
class custom_three
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
        if (Auth::user()->res1 >=80 or Auth::user()->completed) {
         
            return $next($request);
        }
    
        return redirect('home')->with("status","You need to get a score of 80% and above in Module 2 to attempt Module 3 ");
    }
}
