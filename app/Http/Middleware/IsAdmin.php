<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class IsAdmin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {

        if (auth()->user() && isset(auth()->user()->is_admin) && auth()->user()->is_admin==1) {
            return $next($request);  // Redirect to admin home
        }

        // abort(403, 'You do not have permission to access this page.');
        return redirect()->route('home');

    }

}
