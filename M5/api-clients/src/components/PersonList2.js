import React from "react";
import axios from "axios";

export default class PersonList extends React.Component {
  state = {
    id: ""
  };

  handleChange = event => {
    this.setState({ id: event.target.value });
  };

  handleSubmit = event => {
    event.preventDefault();

    axios
      .delete(`https://64bf41e95ee688b6250d3536.mockapi.io/hiiii/user/${this.state.id}`)
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
            Person ID:
            <input type="text" name="id" onChange={this.handleChange} />
          </label>
          <button type="submit">Delete</button>
        </form>
      </div>
    );
  }
}
