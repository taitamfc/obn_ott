import React, { useEffect, useState } from 'react';
import { Link } from 'react-router-dom';
import TourModel from '../models/TourModel';

function TourList(props) {
  const [tours, setTours] = useState([]);

  useEffect(() => {
    TourModel.all()
      .then((res) => {
        setTours(res);
      })
      .catch(err => {
        throw err;
      });
  }, []);

  return (
    <div>
      <h1>Tour List</h1>
      <Link to="/tours/create" className="create-button">Create</Link>

      <table border={1} width={1000}>
        <thead>
          <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Price</th>
            <th>Action</th>
          </tr>
        </thead>
        <tbody>
          {tours.map((tour, index) => (
            <tr key={index}>
              <td>{index + 1}</td>
              <td>
                <Link to={'/tours/' + tour.id} className="tour-name-link">
                  {tour.name}
                </Link>
              </td>
              <td>{tour.price}</td>
              <td>
                <Link to={'/tours/' + tour.id + '/edit'} className="edit-button">Edit</Link>
                <Link to={'/tours/delete/' + tour.id} className="delete-button">Delete</Link>
              </td>
            </tr>
          ))}
        </tbody>
      </table>
    </div>
  );
}

export default TourList;
