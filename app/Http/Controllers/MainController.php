<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Site;

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
        $this->site_id      = $this->site->id;

        session()->put('site_id',$this->site_id);
        session()->put('site_name',$this->site_name);
        session()->put('site',$this->site);
    } 
}
