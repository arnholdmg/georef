<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class IsAdmin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next, $role)
    {
        if($role == "area" && !Auth::user()->isAdmArea){
            return redirect()->route('home');
        } else if($role == "group" && !Auth::user()->isAdmGroup){
            return redirect()->route('home');
        } else if($role == "patient" && !Auth::user()->isAdmPatient){
            return redirect()->route('home');
        } else if($role == "user" && !Auth::user()->isAdmUser){
            return redirect()->route('home');
        }

        return $next($request);
    }
}
