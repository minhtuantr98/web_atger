<?php

namespace Modules\Admin\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
class CheckLogedIn
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        if (Auth::guard('admin')->check()) {
            return redirect()->route('admin.home');
        }
        return $next($request);
    }
}
