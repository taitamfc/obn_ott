import React from "react";

import axios from "axios";

export default class PersonList extends React.Component {
  state = {
    persons: []
  };

  componentDidMount() {
    axios
    // Axios để thực hiện một yêu cầu GET đến URL 
      .get(`https://64bf41e95ee688b6250d3536.mockapi.io/hiiii/user`)
      // /GET thành công, Axios sẽ trả về phản hồi thông qua biến res
      .then(res => {
        //lấy danh sách người dùng từ res.data
        const persons = res.data;
        this.setState({ persons });
      })
      .catch(error => console.log(error));
  }

  render() {
    return (
      <ul>
        {this.state.persons.map(person => (
          <li>{person.name}</li>
        ))}
      </ul>
    );
  }
}