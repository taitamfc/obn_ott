@extends('website.layouts.auth')

@section('title')
{{__('login.forgot-password')}}
@endsection

@section('content')
<div class="tab-pane fade active show" id="projects__one" role="tabpanel" aria-labelledby="projects__one">
    <div class="col-xl-8 col-md-8 offset-md-2">
        <div class="loginarea__wraper">
            <div class="login__heading">
                <h5 class="login__title">{{__('login.forgot-password')}}</h5>
                <p class="login__description">{{__('login.dont-have-an-account-yet?')}}
                    <a href="{{ route('website.register',['site_name'=>$site_name]) }}">{{__('login.sign-up-for-free')}}</a>
                </p>
                <p>
                    <a href="{{ route('cms',['site_name'=>$site_name]) }}">{{__('login.back-to-home')}}</a>
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
                    <label class="form__label">{{__('login.password')}}</label>
                    <input class="common__login__input" type="password" name="password"
                        value="{{ old('password') }}">
                    @if ($errors->any())
                    <p style="color:red">{{ $errors->first('password') }}</p>
                    @endif
                </div>

                <div class="login__form">
                    <label class="form__label">{{__('login.confirm-password')}}</label>
                    <input class="common__login__input" type="password"
                        name="confirmpassword" value="{{ old('confirmpassword') }}" >
                    @if ($errors->any())
                    <p style="color:red">{{ $errors->first('confirmpassword') }}</p>
                    @endif
                </div>
                <div class="submit-btn-area">
                    <button id="form_submit" type="submit" class="default__button" style="display: block; margin: 30px auto 0;">{{__('login.submit')}} <i
                            class="ti-arrow-right"></i></button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection