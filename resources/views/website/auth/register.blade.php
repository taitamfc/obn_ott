@extends('website.layouts.auth')

@section('title')
{{__('login.register')}}
@endsection

@section('content')
<div class="tab-pane fade active show" id="projects__one" role="tabpanel" aria-labelledby="projects__one">
    <div class="col-xl-8 col-md-8 offset-md-2">
        <div class="loginarea__wraper">
            <div class="login__heading">
                <h5 class="login__title">{{__('login.sing-up')}}</h5>
                <p class="login__description">{{__('login.already-have-an-account?')}}
                    <a href="{{ route('website.login',['site_name'=>$site_name]) }}">{{__('login.login')}}</a>
                </p>
                <p>
                    <a href="{{ route('cms',['site_name'=>$site_name]) }}">{{__('login.back-to-home')}}</a>
                </p>
            </div>
            <form action="{{ route('website.postRegister',['site_name'=>$site_name]) }}" method='post'>
                @if (session('error'))
                <div class="alert alert-danger" role="alert">
                    {{ session('error') }}
                </div>
                @endif
                @csrf
                <div class="row">
                    <div class="login__form">
                        <label class="form__label">{{__('login.full-name')}}</label>
                        <input class="common__login__input" type="text" name="name"
                            value="{{ old('name') }}">
                        @if ($errors->any())
                        <p style="color:red">{{ $errors->first('name') }}</p>
                        @endif
                    </div>

                    <div class="login__form">
                        <label class="form__label">{{__('login.email')}}</label>
                        <input class="common__login__input" type="email" name="email"
                            value="{{ old('email') }}">
                        @if ($errors->any())
                        <p style="color:red">{{ $errors->first('email') }}</p>
                        @endif
                    </div>

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
                            name="repeatpassword" value="{{ old('password') }}">
                        @if ($errors->any())
                        <p style="color:red">{{ $errors->first('repeatpassword') }}</p>
                        @endif
                    </div>


                    <div class="form__check" style="margin-top: 30px;">
                        <input id="accept_pp" type="checkbox" name="accept_pp" >
                        <label for="accept_pp">{{__('login.accept-the-terms-and-privacy-policy')}}</label>
                        @if ($errors->has('accept_pp'))
                        <div class="error-message" style="color:red">{{ $errors->first('accept_pp') }}</div>
                        @endif
                    </div>
                </div>


                <div class="submit-btn-area">
                    <button id="form_submit" class="default__button" style="display: block; margin: 30px auto 0;"
                        type="submit">{{__('login.submit')}} <i class="ti-arrow-right"></i></button>
                </div>
            </form>


        </div>
    </div>
</div>
@endsection