<?php

namespace Modules\Admin\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CheckLevel
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
        if(Auth::guard('admin')->user()->level==1)
        {
            return redirect()->route('admin.home')->with(['flash-message'=>'Warning ! Quyền của bạn không được phép truy cập mục này !','flash-level'=>'warning']);
        }
        return $next($request);
    }
}
