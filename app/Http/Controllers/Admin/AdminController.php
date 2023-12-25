<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Models\Course;
use App\Models\Site;
use App\Models\User;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    protected $user;
    protected $user_id;
    protected $site;
    protected $site_id;
    protected $site_name;
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware(function ($request, $next) {
            $this->user     = Auth::user();
            $this->user_id  = Auth::id();
            $this->site_id  = session()->get('site_id',$this->user->site_id);
            $this->site     = Site::find($this->site_id);
            $this->site_name     = $this->site->slug;
            return $next($request);
        });
    }  

    public function checkCanStore($type = 'number_course'){
        $user_site_ids = Site::where('user_id',$this->user_id)->pluck('id')->toArray();

        if($type == 'number_course'){
            $user_number_course = Course::whereIn('site_id',$user_site_ids)->count();
            $plan_number_course = $this->user->activePlan->plan->number_course;
            if($plan_number_course != -1){
                if( $user_number_course >= $plan_number_course ){
                    return false;
                }
            }
        }

        if($type == 'number_admin'){
            $user_number_admin = User::whereIn('site_id',$user_site_ids)->where('role','site_manager')->count();
            $plan_number_admin = $this->user->activePlan->plan->number_admin;
            if($plan_number_admin != -1){
                if( $user_number_admin >= $plan_number_admin ){
                    return false;
                }
            }
        }
        return true;
    }
}
