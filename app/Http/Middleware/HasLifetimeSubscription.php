<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class HasLifetimeSubscription
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {   # $request->user() is equivalent to Auth::user()
        if (!$request->user()->lifetime_subscription) { # verify whether the user has a lifetime subscription or not 
            return redirect("lifetime");
        }
        return $next($request);
    }
}
