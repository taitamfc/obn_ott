<?php

namespace App\Http\Controllers\Admin;


use Illuminate\Http\Request;

class ThemeController extends AdminController
{
    public function homepageBanner(){
        return view('admin.themes.homepage-banner');
    }
    public function homepageSections(){
        return view('admin.themes.homepage-sections');
    }
}