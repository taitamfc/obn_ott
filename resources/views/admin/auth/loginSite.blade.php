@extends('admin.layouts.form')
@section('content')
<div class="login-form">
    <form action="{{ route('site.postLogin',['site_name' => $site_name]) }}" method="POST">
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
                <label name="email" for="email">Email address</label>
                <input type="email" id="email" name="email" value="{{ old('email') }}">
                <i class="ti-email"></i>
                @if ($errors->any())
                <p style="color:red">{{ $errors->first('email') }}</p>
                @endif
            </div>
            <div class="form-gp">
                <label for="password">Password</label>
                <input type="password" name="password" id="password" value="{{ old('password') }}">
                <i class="ti-lock"></i>
                @if ($errors->any())
                <p style="color:red">{{ $errors->first('password') }}</p>
                @endif
            </div>
            <div class="submit-btn-area">
                <button id="form_submit" type="submit" class="btn btn-primary">Submit <i
                        class="ti-arrow-right"></i></button>
            </div>
        </div>
    </form>
</div>
@endsection