<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;

use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Http\Request;
use App\Http\Requests\StoreLoginRequest;
use App\Http\Requests\StoreRegisterRequest;
use App\Http\Requests\ForgotPasswordRequest;
use App\Http\Requests\ResetPasswordRequest;
use Illuminate\Support\Str;
use Mail;
use Illuminate\Support\Facades\Session;
use App\Jobs\SendEmail;
use App\Models\User;
use App\Models\Site;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{

    public function __construct(){}

    public function login(){
        if (Auth::check()) {
            return redirect()->route('admin.home');
        } else {
            return view('admin.auth.login');
        }
    }

    public function postLogin(StoreLoginRequest $request){
        try {
            $dataUser = $request->only('email','password');
            $email      = $request->email;
            $password   = $request->password;
            $check = User::where('email',$email)->where('role','site_owner')->first();
            $canLogin = false;
            if( $check ){
                if (Hash::check($password, $check->password)) {
                    $canLogin = true;
                }
            }
            if($canLogin && Auth::attempt($dataUser)){
                $user = Auth::user();
                session()->put('site_id',$user->site_id);
                return redirect()->route('admin.home')->with('success',__('auth.login_success'));
            }else {
                return redirect()->back()->with('error',__('auth.login_error'));
            }
        } catch (Exception $e) {
            Log::error('Bug error : '.$e->getMessage());
            return redirect()->route('login')->with('error','Has Problems, Please Try Again');
        }
    }

    public function loginSite (){
        if (Auth::check()) {
            return redirect()->route('cms');
        } else {
            $site_name = request()->route('site_name');
            return view('admin.auth.loginSite',compact('site_name'));
        }
    }

    public function postLoginSite(StoreLoginRequest $request){
        try {
            $dataUser = $request->only('email','password');
            $email      = $request->email;
            $password   = $request->password;
            $check = User::where('email',$email)->where('role','site_manager')->first();
            $canLogin = false;
            if( $check ){
                if (Hash::check($password, $check->password)) {
                    $canLogin = true;
                }
            }
            if($canLogin && Auth::attempt($dataUser)){
                $user = Auth::user();
                session()->put('site_id',$user->site_id);
                return redirect()->route('admin.home')->with('success',__('auth.login_success'));
            }else {
                return redirect()->back()->with('error',__('auth.login_error'));
            }
        } catch (Exception $e) {
            Log::error('Bug error : '.$e->getMessage());
            return redirect()->route('login')->with('error','Has Problems, Please Try Again');
        }
    }

    public function logout(Request $request){
        session()->forget('site_id');
        $user = Auth::user();
        Auth::logout();
        if( $user->role == 'site_owner' ){
            return redirect()->route('login');
        }else{
            $site_name = $user->defaultsite->slug;
            return redirect()->route('cms',['site_name'=>$site_name]);
        }
    }
    
    public function register(){
        if (Auth::check()) {
            return redirect()->route('admin.home');
        } else {
            return view('admin.auth.register');
        }
    }
    public function postRegister(StoreRegisterRequest $request){
        try {
            DB::beginTransaction();
            //Prepare slug
            $slug = $maybe_slug = $maybe_slug = Str::slug($request->name);
            $next = 2;
            while (Site::where('slug', $slug)->first()) {
                $slug = "{$maybe_slug}-{$next}";
                $next++;
            }
            // Register user
            $user = new User();
            $user->name = $request->name;
            $user->email = $request->email;
            $user->password = bcrypt($request->password);
            $user->group_id = env('DEFAULT_ADMIN_GROUP',1);
            $user->role = 'site_owner';
            // Register sites
            if($user->save()){
                $site = new Site();
                $site->name = $request->name;
                $site->slug = $slug;
                $site->user_id = $user->id;
                $site->status = Site::ACTIVE;
                $site->save();

                // Set default site id for user
                if($site->save()){
                    $user->site_id = $site->id;
                    $user->save();
                }
            }
            DB::commit();
            return redirect()->route('login')->with('success',__('auth.register_success'));
        } catch (QueryException $e) { 
            Log::error($e->getMessage());
            return redirect()->back()->with('error',__('auth.register_error'));
        }   
    }

    function forgot(Request $request)
    {
        return view('admin.auth.forgot');
    }
    function postForgot(ForgotPasswordRequest $request){
        // dd($request);
        $item = User::where('email', 'LIKE' , $request->email )->first();
        try {
            if ($item) {
                $token = strtoupper(Str::random(10));
                $item->token = $token;
                $item->save();
                $data = [
                    'id' => $item->id,
                    'name' => $item->name,
                    'email' => $item->email,
                    'token' => $token
                ];
                SendEmail::dispatch($item,$data,'forgot_pass');
                return redirect()->route('login')->with('success','Please check mail to reset password');
            }
        } catch (\Exception $e) {
            return redirect()->route('admin.forgot')->with('error','Have problem, Please try again late!');
        }
    }
    function getReset(Request $request){
        try {
            $item = User::findOrfail($request->user);
            if($item->token === $request->token){
                $data = [
                    'user' => $request->user,
                    'token' => $request->token,
                ];
                return view('admin.auth.resetpassword',compact('data'));
            }else {
                return redirect()->route('login')->with('error','Has Problems, Please Try Again');
            }
        } catch (\Exception $e) {
            return redirect()->route('admin.forgot')->with('error','Have problem, Please try again late!');
        }
    }
    function postReset(ResetPasswordRequest $request){
        try {
            $item = User::findOrfail($request->user);
            if($item && $item->token === $request->token){
                $item->password = bcrypt($request->password);
                $item->token = '';
                $item->save();
                return redirect()->route('login')->with('success','Reset Password Success');
            }else {
                return redirect()->back()->with('error','Has Problems, Please Try Again');
            }
        } catch (\Exception $e) {
            return redirect()->route('admin.forgot')->with('error','Have problem, Please try again late!');
        }
    }
}