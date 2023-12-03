<?php

namespace App\Http\Controllers\Admin;


use Illuminate\Http\Request;

class VideoController extends AdminController
{
    public function videoAdvertisement(){
        return view('admin.videoadvertisements.video-advertisement');
    }
}