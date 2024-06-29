<?php

namespace App\Http\Middleware;

use Closure;
use Flasher\Toastr\Prime\ToastrInterface;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class AdminMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    protected $toastr;
    public function __construct(ToastrInterface $toastr)
    {
        $this->toastr = $toastr;
    }
    public function handle(Request $request, Closure $next): Response
    {
        if (auth()->check() && auth()->user()->is_admin) {
            return $next($request);  // Redirect to admin home
        }

        // abort(403, 'You do not have permission to access this page.');
        $this->toastr->error('You are not an admin!');
        return back();
    }
}
