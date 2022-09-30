<?php

namespace Cms\Modules\Auth\Middlewares;

use Closure;
use Illuminate\Support\Facades\Auth;

class CheckAdminMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param \Illuminate\Http\Request $request
     * @param \Closure $next
     * @param string|null $guard
     * @return mixed
     */
    public function handle($request, Closure $next, $guard = null)
    {
        if (Auth::user()->hasRole('admin')) {
            return      $next($request);
        } elseif (Auth::user()->hasRole('user')) {
            dd ($request->segment(2));
            if ($request->segment(2) == Auth::id()) {
                return $next($request);
            }
            else{
                return redirect(route('todolist', ['user_id'=>Auth::id()]));
            }
        }
    }
}
