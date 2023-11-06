import React from "react";
import { useSelector } from "react-redux";

function User() {
  const users = useSelector(state => state.users);
  console.log(users);
  return (
    <div>
      <table>
        <thead>
          <tr>
            <th>Id</th>
            <th>Name</th>
         
          </tr>
        </thead>
        <tbody>
          {users.map(user => (
            <tr key={user.id}>
              <td>{user.id}</td>
              <td>{user.name}</td>
         
            </tr>
          ))}
        </tbody>
      </table>
    </div>
  );
}
export default User;