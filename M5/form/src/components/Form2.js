import React, { useState} from 'react';

function Form2(props) {
    const [form, setForm] = useState({
        usename: '',
        password:''

    })
    const handleChange = (e) => {
        setForm({
            ...form,
            [e.target.name]: e.target.value
        })
    }

    const handleSubmit = (e) => {
        e.preventDefault()
        if(form.usename==''){
            alert('vui lòng nhập tên')
        }
        if(form.password==''){
            alert('vui lòng nhập password')
        }
    }
    return (
        <div>
            <h1>{form.usename} - {form.password}</h1>
            <form onSubmit={handleSubmit}>
               usename: <input type='text' name='usename' onChange={handleChange}/> <br/>
              password: <input type='password' name='password' onChange={handleChange}/> <br/>
              
              <button type='submit'>Submit</button>
            </form>
        </div>
    );
}

export default Form2;