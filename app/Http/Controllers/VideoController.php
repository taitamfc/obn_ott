<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class VideoController extends Controller
{
    public function videoAdvertisement(){
        return view('videoadvertisements.video-advertisement');
    }
}