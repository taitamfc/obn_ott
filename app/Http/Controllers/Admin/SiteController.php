<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SiteController extends Controller
{
    public function changeSite($site_id){
        session()->put('site_id',$site_id);
        return redirect()->back();
    }
}
