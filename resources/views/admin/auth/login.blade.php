@extends('admin.layouts.form')
@section('title')
{{__('login.login')}}
@endsection
@section('content')
<div class="login-form">
    <form action="{{ route('admin.postLogin') }}" method="POST">
        @if (session('error'))
        <div class="alert alert-danger" role="alert">
            {{ session('error') }}
        </div>
        @endif
        @if (session('success'))
        <div class="alert alert-success" role="alert">
            {{ session('success') }}
        </div>
        @endif
        @csrf
        <div class="login-form-body">
            <div class="form-gp">
                <label name="email" for="email">{{__('login.email-address')}}</label>
                <input type="email" id="email" name="email" value="{{ old('email') }}">
                <i class="ti-email"></i>
                @if ($errors->any())
                <p style="color:red">{{ $errors->first('email') }}</p>
                @endif
            </div>
            <div class="form-gp">
                <label for="password">{{__('login.password')}}</label>
                <input type="password" name="password" id="password" value="{{ old('password') }}">
                <i class="ti-lock"></i>
                @if ($errors->any())
                <p style="color:red">{{ $errors->first('password') }}</p>
                @endif
            </div>
            <div class="row mb-4 rmber-area">
                <div class="col-6">
                    <!-- <div class="custom-control custom-checkbox primary-checkbox mr-sm-2">
                        <input type="checkbox" class="custom-control-input" id="customControlAutosizing">
                        <label class="custom-control-label" for="customControlAutosizing">Remember Me</label>
                    </div> -->
                </div>
                <div class="col-6 text-right">
                    <a href="{{ route('admin.forgot') }}" class="text-primary" data-action="{{ route('admin.postForgot') }}">{{__('login.forgot-your-password?')}}</a>
                </div>
            </div>
            <div class="submit-btn-area">
                <button id="form_submit" type="submit" class="btn btn-primary">{{__('login.submit')}} <i
                        class="ti-arrow-right"></i></button>
            </div>
            <div class="form-footer text-center mt-5">
                <p class="text-muted">{{__('login.dont-have-an-account-yet?')}} <a href="{{ route('planpage.index') }}" class="text-primary">{{__('login.sing-up')}} </a>
                </p>
            </div>
        </div>
    </form>
</div>
@endsection