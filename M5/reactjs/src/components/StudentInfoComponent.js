import React from 'react';

class StudentInfoComponent extends React.Component {
  render() {
    const students = [
      { ID: 1, Name: 'John Doe', Age: 20, Address: '123 Main St' },
      { ID: 2, Name: 'Jane Smith', Age: 22, Address: '456 Broadway Ave' },
      { ID: 3, Name: 'Mike Johnson', Age: 19, Address: '789 Elm St' },
    ];

    return (
      <div>
        <h1>Student Information</h1>
        <table className='table'>
          <thead>
            <tr>
              <th>ID</th>
              <th>Name</th>
              <th>Age</th>
              <th>Address</th>
            </tr>
          </thead>
          <tbody>
            {students.map((student) => (
              <tr key={student.ID}>
                <td>{student.ID}</td>
                <td>{student.Name}</td>
                <td>{student.Age}</td>
                <td>{student.Address}</td>
              </tr>
            ))}
          </tbody>
        </table>
      </div>
    );
  }
}

export default StudentInfoComponent;
