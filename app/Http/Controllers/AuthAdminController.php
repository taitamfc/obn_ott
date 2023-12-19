<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Admin;

class AuthAdminController extends Controller
{

    public function __construct(){}

    public function login()
        {
            if (Auth::guard('admins')->check()) {
                return redirect()->route('admin.home');
            } else {
                return view('adminsystems.login.login');
            }
        }

        
        public function postLogin(Request $request)
            {
                try {
                    $credentials = $request->only('email', 'password');
                    if (Auth::guard('admins')->attempt($credentials)) {
                        // Đăng nhập thành công, chuyển hướng đến trang admin.home
                        return redirect()->route('admin.home');
                    } else {
                        // Đăng nhập thất bại, quay lại trang đăng nhập với thông báo lỗi
                        return redirect()->route('login')->with('error', 'Invalid credentials');
                    }
                } catch (Exception $e) {
                    Log::error('Bug error: '.$e->getMessage());
                    return redirect()->route('login')->with('error', 'Has Problems, Please Try Again');
                }
            }
}