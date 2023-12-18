@extends('admin.layouts.form')
@section('title')
{{__('login.register')}}
@endsection
@section('content')
<div class="login-form">
    <form action="{{ route('admin.postRegister') }}" method='post'>
        @if (session('error'))
        <div class="alert alert-danger" role="alert">
            {{ session('error') }}
        </div>
        @endif
        @csrf
        <div class="login-form-body">
            <div class="form-gp">
                <label for="exampleInputName1">{{__('login.full-name')}}</label>
                <input type="text" id="exampleInputName1" name="name">
                <i class="ti-user"></i>
                @if ($errors->any())
                <p style="color:red">{{ $errors->first('name') }}</p>
                @endif
            </div>
            <div class="form-gp">
                <label for="exampleInputEmail1">{{__('login.email-address')}}</label>
                <input type="email" id="exampleInputEmail1" name="email">
                <i class="ti-email"></i>
                @if ($errors->any())
                <p style="color:red">{{ $errors->first('email') }}</p>
                @endif
            </div>
            <div class="form-gp">
                <label for="exampleInputPassword1">{{__('login.password')}}</label>
                <input type="password" id="exampleInputPassword1" name="password">
                <i class="ti-lock"></i>
                @if ($errors->any())
                <p style="color:red">{{ $errors->first('password') }}</p>
                @endif
            </div>
            <div class="form-gp">
                <label for="exampleInputPassword2">{{__('login.confirm-password')}}</label>
                <input type="password" id="exampleInputPassword2" name="repeatpassword">
                <i class="ti-lock"></i>
                @if ($errors->any())
                <p style="color:red">{{ $errors->first('repeatpassword') }}</p>
                @endif
            </div>
            <div class="submit-btn-area">
                <button id="form_submit" class="btn btn-primary" type="submit">{{__('login.submit')}}<i
                        class="ti-arrow-right"></i></button>
            </div>
            <div class="form-footer text-center mt-5">
                <p class="text-muted">{{__('login.you-have-account')}}<a href="{{ route('login') }}">{{__('login.sing-in')}}</a></p>
            </div>
        </div>
    </form>
</div>
@endsection