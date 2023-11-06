import React from 'react';
import Login from './Login';
import NotLogin from './NotLogin';

class Home extends React.Component {
  constructor(props) {
    super(props);
    this.state = {
     login: false

    };
  }

  login = () => {
    this.setState({ login: true });
  }
  render() {
    if (this.state.login){
        return (
            <div>
            <Login/>
            </div>
            );
    }
    else{
        return(
            <>
            <NotLogin handleLogin = {this.login}  />
            </>
        )
    }
    
  }
}
export default Home;