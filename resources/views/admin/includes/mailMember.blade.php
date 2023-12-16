<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css">
<div>
    <h3>Hi, {{ $data['name'] }}</h3>
    <p>You have just created an account.</p>
    <p>Click link to page.</p>
    <a href="">Home Page</a>
    <b>Your email: {{ $data['email'] }}<br></b>
    <b>Your password: {{ $data['password'] }}<br></b>
    <p><br>If you do not take any action <br> please contact the administrator via email :<a href="gmail.com">
            nguyenhuukhuong27102000@gmail.com</a></p>
</div>