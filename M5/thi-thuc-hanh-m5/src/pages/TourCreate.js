import { Field, Form, Formik } from 'formik';
import React from 'react';
import * as Yup from "yup";
import { useNavigate } from "react-router-dom";
import Swal from 'sweetalert2';
import TourModel from '../models/TourModel';

const SignupSchema = Yup.object().shape({
    name: Yup.string()
        .required("Required"),
    price: Yup.string()
        .required("Required"),
    description: Yup.string()
        .required("Required"),
});

function TourCreate(props) {
    const navigate = useNavigate();

    const handleSubmit = (data) => {
        TourModel.store(data)
            .then(() => {
                // Hiển thị thông báo thành công bằng SweetAlert2
                Swal.fire({
                    position: 'center',
                    icon: 'success',
                    title: 'Thêm thành công!',
                    showConfirmButton: false,
                    timer: 2000 // Thời gian hiển thị thông báo (2 giây)
                });

                // Chuyển hướng về trang "Bôklis" sau khi thêm thành công
                navigate('/tours');
            })
            .catch((error) => {
                console.error('Error creating book:', error.message);
            });
    };

    return (
        <div>
            <Formik
                initialValues={{
                    name: '',
                    price: '',
                    description: '',
                }}

                validationSchema={SignupSchema}
                onSubmit={(values) => handleSubmit(values)}
            >
                {({ errors, touched }) => (
                    <Form>
                        <div>
                            <label htmlFor="name">Name</label>
                            <Field name="name" />
                            {errors.name && touched.name ? (
                                <div>{errors.name}</div>
                            ) : null}
                        </div>
                        <div>
                            <label htmlFor="price">Price</label>
                            <Field name="price" />
                            {errors.price && touched.price ? (
                                <div>{errors.price}</div>
                            ) : null}
                        </div>

                        <div>
                            <label htmlFor="description">Description</label>
                            <Field as="textarea" name="description" />
                            {errors.description && touched.description ? (
                                <div>{errors.description}</div>
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

export default TourCreate;
