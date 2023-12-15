<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\Notification;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Log;
use Illuminate\Database\QueryException;
use App\Http\Resources\SiteResource;
use App\Http\Requests\UpdateSiteRequest;
use App\Http\Requests\StoreSiteRequest;
class OrderController extends AdminController
{
    function index(Request $request){
        $notiid = $request->notiid;
        if($notiid){
            Notification::deleteNotification($notiid);
        }
        if( $request->ajax() ){
            $items = Order::where('site_id',$this->site_id) ->orderBy('created_at', 'desc')->paginate(20);
            return view('admin.orders.ajax-index',compact('items'));
        } 
        return view('admin.orders.index');
    }
}
