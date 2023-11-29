@extends('admin.layouts.form')
@section('content')
<div class="login-form">
    <form action="{{route('register')}}" method="POST">
        @csrf
        <div class="login-form-body">
            <div class="form-gp">
                <label for="name">Full Name</label>
                <input type="text" name="name" id="name" value="{{ old('name') }}">
                <i class="ti-user"></i>
                @if ($errors->any())
                    <p style="color:red">{{ $errors->first('name') }}</p>
                @endif
            </div>
            <div class="form-gp">
                <label for="email">Email address</label>
                <input type="email" name="email" id="email" value="{{ old('email') }}"> 
                <i class="ti-email"></i>
                @if ($errors->any())
                    <p style="color:red">{{ $errors->first('email') }}</p>
                @endif
            </div>
            <div class="form-gp">
                <label for="Password">Password</label>
                <input type="password" name="password" id="Password" value="{{ old('Password') }}">
                <i class="ti-lock"></i>
                @if ($errors->any())
                    <p style="color:red">{{ $errors->first('password') }}</p>
                @endif
            </div>
            <div class="form-gp">
                <label for="Password">Confirm Password</label>
                <input type="password" name="repeatpassword" id="Password" value="{{ old('repeatpassword') }}">
                <i class="ti-lock"></i>
                @if ($errors->any())
                    <p style="color:red">{{ $errors->first('repeatpassword') }}</p>
                @endif
            </div>
            <div class="submit-btn-area">
                <button id="form_submit" class="btn btn-primary" type="submit">Submit <i
                        class="ti-arrow-right"></i></button>

            </div>
            <div class="form-footer text-center mt-5">
                <p class="text-muted">Don't have an account? <a href="/login">Sign in</a></p>
            </div>
        </div>
    </form>
</div>
<!--login-form-->
@endsection