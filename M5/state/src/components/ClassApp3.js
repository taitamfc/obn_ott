import React, { Component } from "react";
class ClassApp3 extends Component {
  constructor(props) {
    super(props);
    this.state = {
      name: "Phi",
      age: 18,
      count: 0
    };
  }
  handleClassApp3 = () => {
    this.setState ({
        name: 'Long',
        age: 25
    })
    // this.setState({
    //     count: this.state.count + 1
    //  })
     this.setState(prevState => ({
        count: prevState.count + 1
      }));
  }
  handleClassApp4 = (name) => {
    this.setState ({
        name: name
    })
  }
  render() {
    return (
      <div>
        <h1>{this.state.name}</h1>
        <h1>{this.state.age}</h1>
        <h1>{this.state.count}</h1>
        <button onClick={this.handleClassApp3}>click</button>
        <button onClick={() => this.handleClassApp4("Long")}>click</button>
      </div>
    );
  }
}
export default ClassApp3;