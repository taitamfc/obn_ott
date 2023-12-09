<?php

namespace App\Http\Controllers\Website;

use App\Http\Controllers\MainController;
use Illuminate\Http\Request;
use App\Models\Grade;

class HomeController extends MainController
{
    public function index(){

        $grades = Grade::getActiveItems($this->site_id);
        $params = [
            'grades' => $grades
        ];
        return view('website.homes.index',$params);
    }
}
