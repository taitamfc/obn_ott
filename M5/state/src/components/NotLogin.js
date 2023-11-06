import React from 'react';

function NotLogin(props) {
    return (
        <div>
            <h1>Bạn phải đăng nhập</h1>
            <button onClick={props.handleLogin}>Login</button>
        </div>

    );
}

export default NotLogin;