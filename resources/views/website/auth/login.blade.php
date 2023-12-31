@extends('website.layouts.auth')

@section('title')
{{__('login.login')}}
@endsection

@section('content')
<div class="tab-pane fade active show" id="projects__one" role="tabpanel" aria-labelledby="projects__one">
    <div class="col-xl-8 col-md-8 offset-md-2">
        <div class="loginarea__wraper">
            <div class="login__heading">
                <h5 class="login__title">{{__('login.login')}}</h5>
                <p class="login__description">{{__('login.dont-have-an-account-yet?')}}
                    <a href="{{ route('website.register',['site_name'=>$site_name]) }}">{{__('login.sign-up-for-free')}}</a>
                </p>
                <p>
                    <a href="{{ route('cms',['site_name'=>$site_name]) }}">{{__('login.back-to-home')}}</a>
                </p>
            </div>

            <form action="{{ route('website.postLogin',['site_name'=>$site_name]) }}" method="POST">
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
                <div class="login__form">
                    <label class="form__label">{{__('login.email')}}</label>
                    <input class="common__login__input" type="text" name="email"
                        value="{{ old('email') }}">
                    @if ($errors->any())
                    <p style="color:red">{{ $errors->first('email') }}</p>
                    @endif
                </div>
                <div class="login__form">
                    <label class="form__label">{{__('login.password')}}</label>
                    <input class="common__login__input" type="password"  name="password"
                        value="{{ old('password') }}">
                    @if ($errors->any())
                    <p style="color:red">{{ $errors->first('password') }}</p>
                    @endif
                </div>
                <div class="login__form d-flex justify-content-between flex-wrap gap-2">
                    <div class="form__check">
                        <input id="forgot" type="checkbox" name="remember" id="remember" value="1">
                        <label for="forgot">{{__('login.remember-me')}}</label>
                    </div>
                    <div class="text-end login__form__link">
                        <a href="{{ route('website.forgot',['site_name'=>$site_name]) }}">{{__('login.forgot-your-password?')}}</a>
                    </div>
                </div>
                <div class="submit-btn-area">
                    <button id="form_submit" type="submit" class="default__button"
                        style="display: block; margin: 30px auto 0;">{{__('login.submit')}} <i class="ti-arrow-right"></i></button>
                </div>
            </form>

            <div class="login__social__option">
                <p>{{__('login.or-log-in-with')}}</p>
                <ul class="login__social__btn">
                    <li><a class="default__button login__button__1"
                            href="{{ route('login.facebook',['site_name'=>$site_name]) }}"><i
                                class="icofont-facebook"></i>
                                {{__('login.facebook')}}</a></li>
                    <li><a class="default__button" href="{{ route('login.google',['site_name'=>$site_name]) }}"><i
                                class="icofont-google-plus"></i>{{__('login.google')}} </a></li>
                </ul>
            </div>
        </div>
    </div>
</div>
@endsection