<?php

namespace App\Http\Middleware;

use App\Providers\RouteServiceProvider;
use Closure;
use Illuminate\Support\Facades\Auth;

class RedirectIfAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string|null  $guard
     * @return mixed
     */
    public function handle($request, Closure $next, $guard = null)
    {
        if ($guard == 'web' && Auth::guard('web')->check()) {
            return redirect('/dashboard');
        }
        if ($guard == 'student' && Auth::guard('student')->check()) {
            return redirect('/student/dashboard');
        }
        if ($guard == 'teacher' && Auth::guard('teacher')->check()) {
            return redirect('/teacher/dashboard');
        }
        if ($guard == 'parent' && Auth::guard('parent')->check()) {
            return redirect('/parent/dashboard');
        }

        return $next($request);
    }
}
