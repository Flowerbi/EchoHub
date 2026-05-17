<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use App\Models\User;

class CurrentProfile
{
    /**
     * Handle an incoming request.
     *
     * @param  Closure(Request): (Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if(auth()->check() && auth()->user()->id === $request->route('profile')->id){
            return $next($request);
        }else{
            if(auth()->check()){
                return redirect()->route('profile.page', auth()->user()->id);
            }else{
                return redirect()->route('home.page');
            }
        }
    }
}
