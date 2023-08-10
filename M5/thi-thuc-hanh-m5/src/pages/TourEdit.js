import { Field, Form, Formik } from 'formik';
import React, { useEffect, useState } from 'react';
import * as Yup from "yup";
import { useNavigate, useParams } from "react-router-dom";
import { toast } from 'react-toastify';
import 'react-toastify/dist/ReactToastify.css';
import TourModel from '../models/TourModel';

const SignupSchema = Yup.object().shape({
    name: Yup.string().required("Required"),
    price: Yup.string().required("Required"),
    description: Yup.string().required("Required"),
});


function TourEdit(props) {
    const navigate = useNavigate();
    const { id } = useParams();
    const [form, setForm] = useState({
        name: '',
        price: '',
        description: '',
    });


    useEffect(() => {
        TourModel.find(id) // Lấy dữ liệu sách từ API thông qua BookModel
            .then((res) => {
                setForm(res);
            })
            .catch((err) => {
                throw err;
            });
    }, [id]);

    const handleSubmit = (data) => {
        TourModel.update(id, data)// Thực hiện cập nhật thông tin sách qua BookModel
            .then(() => {
                toast.success('Cập nhật thành công');
                navigate('/tours');
            })
            .catch((error) => {
                console.error('Error creating tour:', error.message);
            });
    };

    return (
        <div className="tour-edit-container">
            <h1>Edit Tour</h1>
            
            <Formik
                initialValues={form}
                validationSchema={SignupSchema}
                onSubmit={(values) => handleSubmit(values)}
                enableReinitialize={true}
            >
                {({ errors, touched }) => (
                    <Form className="tour-edit-form">
                        <div className="form-group">
                            <label htmlFor="name">Name</label>
                            <Field type="text" name="name" className="form-control" />
                            {errors.name && touched.name ? (
                                <div className="error-message">{errors.name}</div>
                            ) : null}
                        </div>
                        <div className="form-group">
                            <label htmlFor="price">Price</label>
                            <Field type="text" name="price" className="form-control" />
                            {errors.price && touched.price ? (
                                <div className="error-message">{errors.price}</div>
                            ) : null}
                        </div>

                        <div className="form-group">
                            <label htmlFor="description">Description</label>
                            <Field
                                as="textarea"
                                className="form-control description-field"
                                name="description"
                            />
                            {errors.description && touched.description ? (
                                <div className="error-message">{errors.description}</div>
                            ) : null}
                        </div>

                        <div className="form-group">
                            <button type="submit" className="btn btn-primary">Submit</button>
                            <button onClick={() => navigate('/tours')} className="btn btn-secondary">Back to Tours</button>
                        </div>
                    </Form>
                )}
            </Formik>
        </div>
    );
}

export default TourEdit;
