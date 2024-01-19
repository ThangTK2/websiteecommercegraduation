<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class LoginMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        //check xem nếu đăng nhập rồi thì sẽ không đăng nhập lại được nửa, Auth::id() > 0 (tức là đã đăng nhập)
        if(Auth::id() > 0){
            return redirect()->route('dashboard.index');
        };
        return $next($request);
    }
}
