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
                return redirect()->route('adminsystem.sites.index');
            } else {
                return view('adminsystems.login.login');
            }
        }

        
        public function postLogin(Request $request)
        {
                try {
                    $credentials = $request->only('email', 'password');
                    if (Auth::guard('admins')->attempt($credentials)) {
                        return redirect()->route('adminsystem.sites.index');
                    } else {
                        // Đăng nhập thất bại, quay lại trang đăng nhập với thông báo lỗi
                        return redirect()->route('adminsystem.login')->with('error', 'Invalid credentials');
                    }
                } catch (Exception $e) {
                    Log::error('Bug error: '.$e->getMessage());
                    return redirect()->route('adminsystem.login')->with('error', 'Has Problems, Please Try Again');
                }
        }

        public function logout(Request $request)
            {
                Auth::guard('admins')->logout();
                return redirect()->route('adminsystem.login');
            }
}