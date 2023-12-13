<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class CheckPermission
{
    public function handle($request, Closure $next, $permission)
    {
        // Kiểm tra xem người dùng có quyền truy cập vào route hay không
        if (Auth::check() && Auth::user()->hasPermission($permission)) {
            return $next($request);
        }

        // Nếu không có quyền, bạn có thể điều hướng hoặc thực hiện các hành động khác
        return redirect()->route('home')->with('error', 'You do not have permission to access this page.');
    }
}
