<div>
    <h3>{{__('login.hi')}}, {{ $data['name'] }}</h3>
    <p>Your account has been created.</p>
    <p>Click link to page: <a href="{{ $data['site_link_login'] }}">{{ $data['site_title'] }}</a></p>
    
    <b>Your email: {{ $data['email'] }}<br></b>
    <b>Your password: {{ $data['password'] }}<br></b>
    <p>{{__('login.if-you-do not-take-any-action')}}, 
    {{__('login.please-contact-the-administrator-via-email')}}</p>
</div>