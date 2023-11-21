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
use Illuminate\Support\Str;

class AuthController extends Controller
{
    public function login(){
        if (Auth::check()) {
            return redirect()->route('grades.index');
        } else {
            return view('auth.login');
        }
    }

    public function postLogin(StoreLoginRequest $request){
            $dataUser = $request->only('email','password');
            if(Auth::attempt($dataUser)){
                return redirect()->route('grades.index')->with('success', 'Logged in successfully');;
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
            return redirect()->route('grades.index');
        } else {
            return view('auth.register');
        }
    }
    

    public function postRegister(StoreRegisterRequest $request){
        try {
            $user = new User();
            $user->name = $request->name;
            $user->email = $request->email;
            $user->password = $request->password;
            $user->slug = Str::slug($request->name);
            $user->group_id = 2;
            $user->save(); 
            $message = "Successfully register";
            return redirect()->route('login')->with('success',$message);
        } catch (QueryException $e) { 
            Log::error('Bug occurred: ' . $e->getMessage());
            return view('auth.register')->with('error','Register fail');
        }   
    }
}