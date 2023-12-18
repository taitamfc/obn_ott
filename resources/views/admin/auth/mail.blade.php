<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css">
<div>
    <h3>{{__('login.hi')}}, {{ $data['name'] }}</h3>
    <p>{{__('login.you-have-just-requested-a-password-reset')}}</p>
    <p>{{__('login.click-link-to-reset-password')}}</p>
    <b>{{__('login.your-email')}} {{ $data['email'] }}<br></b>
    <p>{{__('login.remember')}} {{__('login.link-has-active-once-time-on-click')}}</p>
    <a href="{{ route('admin.postReset',[ 'user'=> $data['id'], 'token' => $data['token'] ]) }}">{{__('login.reset-password')}}</a>
    <p><br>{{__('login.if-you-do not-take-any-action')}} <br> {{__('login.please-contact-the-administrator-via-email')}}<a href="gmail.com">
            nguyenhuukhuong27102000@gmail.com</a></p>
</div>