import React, { Component } from 'react';

class Dem extends Component {
constructor(props){
    super(props);
    this.state = {
        number: 0
    }
}
cong = () => {
    this.setState({number: this.state.number + 1});
};
tru = () => {
    this.setState ({number: this.state.number - 1});
}

    render() {
        return (
            <div style={{ textAlign: "center", padding: 30 }}>
                <button onClick={this.cong}>Cộng</button>
                <span style={{ padding: 10 }}>{this.state.number}</span>
                <button onClick={this.tru}>Trừ</button>
            </div>
        );
    }
}

export default Dem;