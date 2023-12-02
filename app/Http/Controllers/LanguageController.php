<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LanguageController extends Controller
{
    public function changeLanguage($lang){
        session()->put('cr_lang',$lang);
        return redirect()->back();
    }
}
