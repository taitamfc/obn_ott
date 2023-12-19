<div>
    <h3>{{__('login.hi')}}, {{ $data['name'] }}</h3>
    <p>{{__('login.you-have-just-requested-a-password-reset')}}</p>
    <p>{{__('login.click-link-to-reset-password')}}</p>
    <b>{{__('login.your-email')}} {{ $data['email'] }}<br></b>
    <p>{{__('login.remember')}} {{__('login.link-has-active-once-time-on-click')}}</p>
    <a href="{{ route('admin.postReset',[ 'user'=> $data['id'], 'token' => $data['token'] ]) }}">{{__('login.reset-password')}}</a>
    <p>{{__('login.if-you-do not-take-any-action')}}, 
    {{__('login.please-contact-the-administrator-via-email')}}</p>
</div>