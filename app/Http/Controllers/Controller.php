<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\Auth;

class Controller extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;

    protected $site_name;
    public function __construct()
    {
        // $this->middleware('auth');
        // $this->middleware(function ($request, $next) {
        //     $this->user = Auth::user();
        //     $this->site_id = Auth::id();
        //     $this->user_id = Auth::id();
        //     return $next($request);
        // });
        $this->site_name = session()->get('site_name');
    }  
}