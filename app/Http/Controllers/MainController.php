<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Site;
use Illuminate\Support\Facades\Auth;

class MainController extends Controller
{

    protected $user;
    protected $user_id;
    protected $site;
    protected $site_id;
    public function __construct()
    {
        $this->site_name    = request()->route('site_name');
        $this->site         = Site::where('slug',$this->site_name)->first();
        if(!$this->site || !$this->site->user->status){
            abort(404);
        }
        $this->site_id      = $this->site->id;
        $this->user         = Auth::guard('students')->user();
        $this->user_id      = Auth::guard('students')->id();

        session()->put('site_id',$this->site_id);
        session()->put('site_name',$this->site_name);
        session()->put('site',$this->site);
    } 
}