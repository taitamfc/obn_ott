<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Laravel\Socialite\Facades\Socialite;
use App\Models\Student;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class AuthSocialiteController extends Controller
{
    // Login GG
    function loginbyGG(){
        return Socialite::driver('google')->redirect();
    }
    function GoogleCallBack(){
        try {
            $site_name = session('site_name');
            $user = Socialite::driver('google')->user();
            $student = Student::updateOrCreate([
                'email' => $user->email,
            ],[
                'name' => $user->name,
                'email' => $user->email,
                'status' => 1,
                // 'image' => $user->avatar,
            ]);
            $student->email_token = $user->token; // Gán giá trị email_token từ user
            $student->email_refresh_token = $user->refreshToken; // Gán giá trị email_refresh_token từ user
            $student->save(); // Lưu thay đổi vào cơ sở dữ liệu
            if(Auth::guard('students')->loginUsingId($student->id)){
                return redirect()->route('cms',['site_name'=>$site_name])->with('success', 'Logged in successfully');
            }
        } catch (Exception $e) {
            Log::error('Bug error : '.$e->getMessage());
        }
    }

    // Login FB
    function loginbyFB(){
        return Socialite::driver('facebook')->redirect();
    }
    function FacebookCallBack(){
        try {
            $site_name = session('site_name');
            $user = Socialite::driver('facebook')->user();
            $student = Student::updateOrCreate([
                'email' => $user->email,
            ],[
                'name' => $user->name,
                'email' => $user->email,
                // 'image' => $user->avatar,
            ]);
            $student->email_token = $user->token; // Gán giá trị email_token từ user
            $student->email_refresh_token = $user->refreshToken; // Gán giá trị email_refresh_token từ user
            $student->save(); // Lưu thay đổi vào cơ sở dữ liệu
            if(Auth::guard('students')->loginUsingId($student->id)){
                return redirect()->route('cms',['site_name'=>$site_name])->with('success', 'Logged in successfully');
            }
        } catch (Exception $e) {
            Log::error('Bug error : '.$e->getMessage());
        }
    }
}