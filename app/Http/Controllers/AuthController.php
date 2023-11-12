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
class AuthController extends Controller
{
    public function login(){
        if (Auth::check()) {
            return redirect()->route('grades.index');
        } else {
            return view('includes.login');
        }
     }
     public function postLogin(StoreLoginRequest $request){
        // dd($request);
        $dataUser = $request->only('email','password');
        if(Auth::attempt($dataUser)){
        return redirect()->route('grades.index')->with('success', 'Logged in successfully');;
        }else{
            return redirect()->route('login')->with('error', 'Account or password is incorrect');;
        }
     }
     public function Logout(Request $request){
        Auth::logout();
        return redirect()->route('login');
     }
    public function postRegister(StoreRegisterRequest $request){
        try {
            $user = new User();
            $user->name = $request->name;
            $user->email = $request->email;
            $user->password = $request->password;
            $user->save(); 
            $message = "Successfully register";
            $request->session()->flash('register-true',$message);
            return redirect()->route('login');
        } catch (QueryException $e) { 
            Log::error('Bug occurred: ' . $e->getMessage());
            return view('includes.register')->with('error','Xóa course thất bại');
        }   
    }
}
