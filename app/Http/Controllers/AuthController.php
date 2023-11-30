<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\Log;
use Illuminate\Http\Request;
use App\Http\Requests\StoreLoginRequest;
use App\Http\Requests\StoreRegisterRequest;
use App\Http\Requests\ForgotPasswordRequest;
use App\Http\Requests\ResetPasswordRequest;
use Illuminate\Support\Str;
use Mail;
use Illuminate\Support\Facades\Session;

class AuthController extends Controller
{

    public function __construct(){}

    public function login(){
        if (Auth::check()) {
            return redirect()->route('homes.index');
        } else {
            return view('admin.auth.login');
        }
    }

    public function postLogin(StoreLoginRequest $request){
            $dataUser = $request->only('email','password');
            if(Auth::attempt($dataUser)){
                return redirect()->route('home')->with('success', 'Logged in successfully');;
            }else {
                return redirect()->route('login')->with('error','Account or password is incorrect');
            }
    }

    public function Logout(Request $request){
        Auth::logout();
        return redirect()->route('login');
    }

    public function register(){
        if (Auth::check()) {
            return redirect()->route('home');
        } else {
            return view('admin.auth.register');
        }
    }
    

    public function postRegister(StoreRegisterRequest $request){
        try {
            $user = new User();
            $user->name = $request->name;
            $user->email = $request->email;
            $user->password = $request->password;
            $user->group_id = 2;
            $user->save(); 
            $message = "Successfully register";
            return redirect()->route('login')->with('success',$message);
        } catch (QueryException $e) { 
            Log::error('Bug occurred: ' . $e->getMessage());
            return view('admin.auth.register')->with('error','Register fail');
        }   
    }

    function forgot(Request $request)
    {
        return view('admin.auth.forgot');
    }
    function postForgot(ForgotPasswordRequest $request){
        $item = User::where('email', 'LIKE' , $request->email )->first();
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
        Mail::send('auth.mail',compact('data'), function($email) use ($item){
            $email->subject('Forgot Password');
            $email->to($item->email, $item->name );
        });
        return redirect()->route('login')->with('success','Please check mail to reset password');
        }
    }
    function getReset(Request $request){
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
    }
    function postReset(ResetPasswordRequest $request){
        $item = User::findOrfail($request->user);
        if($item && $item->token === $request->token){
            $item->password = bcrypt($request->password);
            $item->token = '';
            $item->save();
            return redirect()->route('login')->with('success','Reset Password Success');
        }else {
            return redirect()->route('login')->with('error','Has Problems, Please Try Again');
        }
    }
}