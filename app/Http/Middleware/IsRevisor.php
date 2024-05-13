<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Symfony\Component\HttpFoundation\Response;

class IsRevisor
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {   if (Auth::check() && Auth::user()->is_revisor && Route::currentRouteName()!='become.revisor'
        ) {
        return $next($request);
    }
    if(Auth::check() && Auth::user()->is_revisor && Route::currentRouteName()=='become.revisor'){
        return redirect('/')->with('access.denied', 'Sei già un revisore!');

    }
        return redirect('/')->with('access.denied', ' is revisor Attenzione! Accesso riservato ai revisori.');
    }
}
