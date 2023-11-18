<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;


class MustBeAdmin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (auth()->guest()){
            return redirect('/')->with('success', 'Access denied (Guest user)');
        }
        if(auth()->user()->username !== 'duncan.smith') {
            //            abort(Response::HTTP_UNAUTHORIZED)
                        return redirect('/')->with('success', 'Access denied (Logged in User)');
                    }
            
        return $next($request);
    }
}
