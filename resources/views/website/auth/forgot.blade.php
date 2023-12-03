@extends('website.layouts.auth')

@section('title')
Forgot Password
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

            <form id="forgotForm" action="{{ route('website.postForgot',['site_name'=>$site_name]) }}" method="POST">
                @if (session('error'))
                <div class="alert alert-danger" role="alert">
                    {{ session('error') }}
                </div>
                @endif
                @csrf
                <div class="login__form">
                    <label class="form__label">Email</label>
                    <input class="common__login__input" type="text" placeholder="Email" name="email" value="{{ old('email') }}">
                    @if ($errors->any())
                    <p style="color:red">{{ $errors->first('email') }}</p>
                    @endif
                </div>
                <div class="submit-btn-area">
                    <button id="form_submit" type="submit" class="default__button"  style="display: block; margin: 30px auto 0;" onclick="showLoading()">
                        Submit <i class="ti-arrow-right"></i>
                    </button>
                    <div id="loadingSpinner" class="loading-spinner"></div>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Add the following CSS styles -->
<style>
    .loading-spinner {
        position: fixed;
        top: 50%;
        left: 55%;
        transform: translate(-50%, -50%);
        width: 40px;
        height: 40px;
        border: 4px solid #ffffff;
        border-radius: 50%;
        border-top: 4px solid #3498db;
        border-bottom: 4px solid #3498db;
        animation: spin 1s linear infinite;
        display: none;
    }

    @keyframes spin {
        0% { transform: rotate(0deg); }
        100% { transform: rotate(360deg); }
    }
</style>

<!-- Add the following JavaScript -->
<script>
    function showLoading() {
        var spinner = document.getElementById('loadingSpinner');
        spinner.style.display = 'block';
    }
</script>
@endsection
