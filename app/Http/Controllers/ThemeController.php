<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ThemeController extends Controller
{
    public function homepageBanner(){
        return view('admin.themes.homepage-banner');
    }
    public function homepageSections(){
        return view('admin.themes.homepage-sections');
    }
}