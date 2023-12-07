<?php

namespace App\Http\Controllers\Website;

use App\Http\Controllers\MainController;
use Illuminate\Http\Request;
use App\Models\Subscription;
use App\Models\Course;

class SubscriptionController extends MainController
{
    // public function index($site_name){
    //     $items = Subscription::where('site_id',$this->site_id)->where('status',Subscription::ACTIVE)->get();
        
    //     $params = [
    //         'items' => $items
    //     ];
    //     return view('website.courses.index',$params);
    // }

    public function show($site_name,$id){
        $item = Subscription::find($id);
        // $items = Course::where('subscription_id',$id)->where('site_id',$this->site_id)->get();
        $items = $item->courses;
        $params = [
            'item' => $item,
            'items' => $items
        ];
        return view('website.subscriptions.show',$params);
    }
}
