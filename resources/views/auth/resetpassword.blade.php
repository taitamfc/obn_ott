@extends('layouts.form')
@section('content')
<div class="login-form">
    <form action="{{ route('postReset',['user' => $data['user'],'token' => $data['token']]) }}" method="POST">
        @if (session('error'))
        <div class="alert alert-danger" role="alert">
            {{ session('error') }}
        </div>
        @endif
        @csrf
        <div class="login-form-body">
            <div class="form-gp">
                <label name="password" for="password">Password</label>
                <input type="password" id="password" name="password" value="{{ old('password') }}">
                <i class="ti-password"></i>
                @if ($errors->any())
                <p style="color:red">{{ $errors->first('password') }}</p>
                @endif
            </div>
            <div class="form-gp">
                <label name="confirmpassword" for="confirmpassword">Confirm Password</label>
                <input type="password" id="confirmpassword" name="confirmpassword" value="{{ old('confirmpassword') }}">
                <i class="ti-password"></i>
                @if ($errors->any())
                <p style="color:red">{{ $errors->first('confirmpassword') }}</p>
                @endif
            </div>
            <div class="submit-btn-area">
                <button id="form_submit" type="submit" class="btn btn-primary">Submit <i
                        class="ti-arrow-right"></i></button>
            </div>
            <div class="form-footer text-center mt-5">
                <p class="text-muted">Don't have an account? <a href="{{ route('register') }}" class="text-primary">Sign
                        up</a>
                </p>
            </div>
        </div>
    </form>
</div>
@endsection