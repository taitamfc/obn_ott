@extends('admin.layouts.form')
@section('title')
{{__('login.forgot-password')}}
@endsection
@section('content')
<div class="login-form">
    <form action="{{ route('admin.postReset',['user' => $data['user'],'token' => $data['token']]) }}" method="POST">
        @if (session('error'))
        <div class="alert alert-danger" role="alert">
            {{ session('error') }}
        </div>
        @endif
        @csrf
        <div class="login-form-body">
            <div class="form-gp">
                <label name="password" for="password">{{__('login.password')}}</label>
                <input type="password" id="password" name="password" value="{{ old('password') }}">
                <i class="ti-password"></i>
                @if ($errors->any())
                <p style="color:red">{{ $errors->first('password') }}</p>
                @endif
            </div>
            <div class="form-gp">
                <label name="confirmpassword" for="confirmpassword">{{__('login.confirm-password')}}</label>
                <input type="password" id="confirmpassword" name="confirmpassword" value="{{ old('confirmpassword') }}">
                <i class="ti-password"></i>
                @if ($errors->any())
                <p style="color:red">{{ $errors->first('confirmpassword') }}</p>
                @endif
            </div>
            <div class="submit-btn-area">
                <button id="form_submit" type="submit" class="btn btn-primary">{{__('login.submit')}} <i
                        class="ti-arrow-right"></i></button>
            </div>
            <div class="form-footer text-center mt-5">
                <p class="text-muted">{{__('login.dont-have-an-account-yet?')}}<a href="{{ route('admin.register') }}" class="text-primary">{{__('login.sing-up')}}</a>
                </p>
            </div>
        </div>
    </form>
</div>
@endsection