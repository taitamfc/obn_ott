@extends('admin.layouts.form')
@section('content')
<div class="login-form">
    <form action="{{ route('admin.postForgot') }}" method="POST">
        @if (session('error'))
        <div class="alert alert-danger" role="alert">
            {{ session('error') }}
        </div>
        @endif
        @csrf
        <div class="login-form-body">
            <div class="form-gp">
                <label name="email" for="email">Email address</label>
                <input type="email" id="email" name="email" value="{{ old('email') }}">
                <i class="ti-email"></i>
                @if ($errors->any())
                <p style="color:red">{{ $errors->first('email') }}</p>
                @endif
            </div>
            <div class="submit-btn-area">
                <button id="form_submit" type="submit" class="btn btn-primary">Submit <i
                        class="ti-arrow-right"></i></button>
            </div>
            <div class="form-footer text-center mt-5">
                <p class="text-muted">Don't have an account? <a href="{{ route('admin.register') }}" class="text-primary">Sign
                        up</a>
                </p>
            </div>
        </div>
    </form>
</div>
@endsection