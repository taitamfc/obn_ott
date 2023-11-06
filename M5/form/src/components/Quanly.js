import React, { useState } from 'react';
import { Formik, Field, Form } from 'formik';

function App() {
  const [books, setBooks] = useState([]);
  const [form, setForm] = useState({});
  const [indexSelected, setIndexSelected] = useState(-1);

  const handleChange = (event) => {
     setForm({
          ...form,
          [event.target.name]: event.target.value
        });
      }

  const handleSelect = (book, index) => {
    setForm(book);
    setIndexSelected(index);
  };

  const handleDelete = (index) => {
    const newBooks = [...books];
    newBooks.splice(index, 1);
    setBooks(newBooks);
  };

  const handleSubmit = () => {
    const newBooks = [...books];
    if (indexSelected > -1) {
      newBooks.splice(indexSelected, 1, form);
    } else {
      newBooks.push(form);
    }
    setBooks(newBooks);
    setForm({});
    setIndexSelected(-1);
  };

  return (
    <div className="container">
      <h1>Book Management</h1>
      <Formik
        initialValues={form}
        onSubmit={handleSubmit}
        enableReinitialize={true}
      >
        <Form>
          <div className="custom-input">
            <label>Title:</label>
            <Field type="text" name="title" onChange={handleChange} />
          </div>

          <div className="custom-input">
            <label>Quantity:</label>
            <Field type="text" name="quantity" onChange={handleChange} />
          </div>

          <button type="submit">Submit</button>
        </Form>
      </Formik>

      <table>
        <thead>
          <tr>
            <th>Title</th>
            <th>Quantity</th>
            <th>Action</th>
          </tr>
        </thead>
        <tbody>
          {books.map((book, index) => (
            <tr key={index}>
              <td>{book.title}</td>
              <td>{book.quantity}</td>
              <td>
                <button onClick={() => handleSelect(book, index)}>Edit</button>
                <button onClick={() => handleDelete(index)}>Delete</button>
              </td>
            </tr>
          ))}
        </tbody>
      </table>
    </div>
  );
}

export default App;
