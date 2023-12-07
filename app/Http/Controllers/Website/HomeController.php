<?php

namespace App\Http\Controllers\Website;

use App\Http\Controllers\MainController;
use Illuminate\Http\Request;
use App\Models\Grade;

class HomeController extends MainController
{
    public function index(){

        $grades = Grade::where('site_id',$this->site_id)->where('status',Grade::ACTIVE)->withCount('')->get();
        $params = [
            'grades' => $grades
        ];
        return view('website.homes.index',$params);
    }
}
