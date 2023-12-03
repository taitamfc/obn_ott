@extends('website.layouts.auth')

@section('title')
Register
@endsection

@section('content')
<div class="tab-pane fade active show" id="projects__one" role="tabpanel" aria-labelledby="projects__one">
    <div class="col-xl-8 col-md-8 offset-md-2">
        <div class="loginarea__wraper">
            <div class="login__heading">
                <h5 class="login__title">Sing Up</h5>
                <p class="login__description">Already have an account? <a
                        href="{{ route('website.login',['site_name'=>$site_name]) }}">Log In</a></p>
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
                        <label class="form__label">Full Name</label>
                        <input class="common__login__input" type="text" placeholder="Full Name" name="name" value="{{ old('name') }}">
                        @if ($errors->any())
                        <p style="color:red">{{ $errors->first('name') }}</p>
                        @endif
                    </div>

                    <div class="login__form">
                        <label class="form__label">Email</label>
                        <input class="common__login__input" type="email" placeholder="Email" name="email" value="{{ old('email') }}">
                        @if ($errors->any())
                        <p style="color:red">{{ $errors->first('email') }}</p>
                        @endif
                    </div>

                    <div class="login__form">
                        <label class="form__label">Password</label>
                        <input class="common__login__input" type="password" placeholder="Password" name="password" value="{{ old('password') }}">
                        @if ($errors->any())
                        <p style="color:red">{{ $errors->first('password') }}</p>
                        @endif
                    </div>

                    <div class="login__form">
                        <label class="form__label">Confirm Password</label>
                        <input class="common__login__input" type="password" placeholder="Confirm Password"
                            name="repeatpassword" value="{{ old('password') }}">
                        @if ($errors->any())
                        <p style="color:red">{{ $errors->first('repeatpassword') }}</p>
                        @endif
                    </div>

                </div>

                <div class="login__form d-flex justify-content-between flex-wrap gap-2">
                    <div class="form__check">
                        <input id="accept_pp" type="checkbox"> <label for="accept_pp">Accept the Terms and Privacy
                            Policy</label>
                    </div>

                </div>

                <div class="submit-btn-area">
                    <button id="form_submit" class="default__button" style="display: block; margin: 30px auto 0;" type="submit">Submit <i
                            class="ti-arrow-right"></i></button>
                </div>
            </form>


        </div>
    </div>
</div>
@endsection