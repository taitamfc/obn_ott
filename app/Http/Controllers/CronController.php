<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CronController extends Controller
{
    public function handleQueue(){
        \Artisan::call("queue:work --timeout=0 --stop-when-empty --max-jobs=1");
    }
}
