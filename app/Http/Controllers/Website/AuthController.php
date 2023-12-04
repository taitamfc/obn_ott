<?php

namespace App\Http\Controllers\Website;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Student;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\Log;
use Illuminate\Http\Request;
use App\Http\Requests\StoreLoginRequest;
use App\Http\Requests\StoreRegisterRequest;
use App\Http\Requests\StoreRegisterStudentRequest;
use App\Http\Requests\ForgotPasswordRequest;
use App\Http\Requests\ForgotPasswordStudentRequest;
use App\Http\Requests\ResetPasswordRequest;
use Illuminate\Support\Str;
use Mail;

class AuthController extends Controller
{
    public function login(){
        if (Auth::guard('students')->check()) {
            return redirect()->route('website.homes',['site_name'=>$this->site_name]);
            // return view('website.auth.login');

        } else {
            return view('website.auth.login');
        }
    }

    public function postLogin(StoreLoginRequest $request){
        // dd($request);
        $dataUser = $request->only('email','password');
        if(Auth::guard('students')->attempt($dataUser,$request->remember)){
            return redirect()->route('website.homes',['site_name'=>$this->site_name])->with('success', 'Logged in successfully');;
        }else {
            return redirect()->route('website.login',['site_name'=>$this->site_name])->with('error','Account or password is incorrect');
        }
    }
    public function Logout(Request $request){
        Auth::guard('students')->logout();
        // return redirect()->route('login');
         return redirect()->route('website.login',['site_name'=>$this->site_name]);
    }

    public function register(){
        if (Auth::check()) {
            // return redirect()->route('website.register',['site_name'=>$this->site_name]);
            return view('website.auth.register');
        } else {
            return view('website.auth.register');
        }
    }
    public function postRegister(StoreRegisterStudentRequest $request){
        try {
            $student = new Student();
            $student->name = $request->name;
            $student->email = $request->email;
            $student->password = $request->password;
            $student->save(); 
            $message = "Successfully register";
            return redirect()->route('website.login',['site_name'=>$this->site_name])->with('success',$message);
        } catch (QueryException $e) { 
            Log::error('Bug occurred: ' . $e->getMessage());
            return view('website.auth.register')->with('error','Register fail');
        }   
    }

    function forgot(Request $request)
    {
        return view('website.auth.forgot');
    }
    function postForgot(ForgotPasswordStudentRequest $request){
        // dd($request);
        $item = Student::where('email', 'LIKE' , $request->email )->first();
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
        Mail::send('website.auth.mail',compact('data'), function($email) use ($item){
            $email->subject('Forgot Password');
            $email->to($item->email, $item->name );
        });
        return redirect()->route('website.login',['site_name'=>$this->site_name])->with('success','Please check mail to reset password');
        }
    }
    function getReset(Request $request){
        $item = Student::findOrfail($request->student);
        // dd($item);
        if($item->token === $request->token){
            $data = [
                'student' => $request->student,
                'token' => $request->token,
            ];
            return view('website.auth.resetpassword',compact('data'));
        }else {
            return redirect()->route('website.login',['site_name'=>$this->site_name])->with('error','Has Problems, Please Try Again');
        }
    }
    function postReset(ResetPasswordRequest $request){
        $item = Student::findOrfail($request->student);
        if($item && $item->token === $request->token){
            $item->password = bcrypt($request->password);
            $item->token = '';
            $item->save();
            return redirect()->route('website.login',['site_name'=>$this->site_name])->with('success','Reset Password Success');
        }else {
            return redirect()->route('website.login',['site_name'=>$this->site_name])->with('error','Has Problems, Please Try Again');
        }
    }

}
