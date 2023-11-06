import React from "react";
import axios from "axios";

export default class PersonList extends React.Component {
  state = {
    name: ""
  };

  handleChange = event => {
    this.setState({ name: event.target.value });
  };

  handleSubmit = event => {
    event.preventDefault();

    const user = {
      name: this.state.name
    };

    axios
      .post(`https://64bf41e95ee688b6250d3536.mockapi.io/hiiii/user`, { user })
      .then(res => {
        console.log(res);
        console.log(res.data);
      });
      
  };

  render() {
    return (
      <div>
        <form onSubmit={this.handleSubmit}>
          <label>
            Person Name:
            <input type="text" name="name" onChange={this.handleChange} />
          </label>
          <button type="submit">Add</button>
        </form>
      </div>
    );
  }
}