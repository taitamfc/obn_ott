<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css">
<div>
    <h3>{{__('login.hi')}}, {{ $data['name'] }}</h3>
    <p>Your account has been created.</p>
    <p>Click link to page.</p>
    <a href="{{ $data['login_link'] }}">Home Page</a>
    <b>Your email: {{ $data['email'] }}<br></b>
    <b>Your password: {{ $data['password'] }}<br></b>
    <p>{{__('login.if-you-do not-take-any-action')}}, 
    {{__('login.please-contact-the-administrator-via-email')}}</p>
</div>