@extends('website.layouts.auth')

@section('title')
Reset Password
@endsection

@section('content')
<div class="tab-pane fade active show" id="projects__one" role="tabpanel" aria-labelledby="projects__one">
    <div class="col-xl-8 col-md-8 offset-md-2">
        <div class="loginarea__wraper">
            <div class="login__heading">
                <h5 class="login__title">Forgot Password</h5>
                <p class="login__description">Don't have an account yet?
                    <a href="{{ route('website.register',['site_name'=>$site_name]) }}">Sign up for free</a>
                </p>
            </div>
            <form
                action="{{ route('website.postReset',['site_name' => $site_name,'student' => $data['student'],'token' => $data['token']]) }}"
                method="POST">
                @if (session('error'))
                <div class="alert alert-danger" role="alert">
                    {{ session('error') }}
                </div>
                @endif
                @csrf
                <div class="login__form">
                    <label class="form__label">Password</label>
                    <input class="common__login__input" type="password" placeholder="password" name="password"
                        value="{{ old('password') }}">
                    @if ($errors->any())
                    <p style="color:red">{{ $errors->first('password') }}</p>
                    @endif
                </div>

                <div class="login__form">
                    <label class="form__label">Confirm Password</label>
                    <input class="common__login__input" type="password" placeholder="Confirm Password"
                        name="confirmpassword" value="{{ old('confirmpassword') }}" >
                    @if ($errors->any())
                    <p style="color:red">{{ $errors->first('confirmpassword') }}</p>
                    @endif
                </div>
                <div class="submit-btn-area">
                    <button id="form_submit" type="submit" class="default__button" style="display: block; margin: 30px auto 0;">Submit <i
                            class="ti-arrow-right"></i></button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection