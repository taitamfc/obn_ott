<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;

class StudentAuthenticate
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $site_name    = request()->route('site_name');
        if (!Auth::guard('students')->check()) {
            return redirect()->route('website.login',['site_name'=>$site_name]);
        }else{
            return $next($request);
        }
    }
}
