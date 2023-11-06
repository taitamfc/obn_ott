import React, { Component } from 'react';

class Content extends Component {
    render() {
        return (
            
            <div>
                <h1 style={this.props.style}>hello</h1>
                <Content1 style={this.props.style}/>
            </div>
        );
    }
}

class Content1 extends Component {
    render() {
        return (
            <div>
                <h1 style={this.props.style}>bổ sung nội dung</h1>
            </div>
        );
    }
}





export default Content;