<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Models\Site;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    protected $user;
    protected $user_id;
    protected $site;
    protected $site_id;
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware(function ($request, $next) {
            $this->user     = Auth::user();
            $this->user_id  = Auth::id();
            $this->site_id  = session()->get('site_id',$this->user->site_id);
            $this->site     = Site::find($this->site_id);
            return $next($request);
        });
    }  
}
