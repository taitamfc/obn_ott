import React from 'react';
import LayoutMaster from '../layouts/LayoutMaster';
import Bannerwrapper from '../components/global/Bannerwrapper';
import { Formik, Form, Field, ErrorMessage } from 'formik';
import { useNavigate } from 'react-router-dom';
import CustomerModel from '../models/CustomerModel';
import * as Yup from 'yup';
import Swal from 'sweetalert2';
import '../App.css'; 


const SignupSchema = Yup.object().shape({
  email: Yup.string().required("Vui lòng nhập email !"),
  password: Yup.string().required("Vui lòng nhập mật khẩu !"),
});
const initialValues = {
  email: "",
  password: "",
};

const SignupSchema1 = Yup.object().shape({
  email: Yup.string().required("Vui lòng nhập email !"),
  phone: Yup.string().required("Vui lòng nhập phone !"),
  password: Yup.string().required("Vui lòng nhập mật khẩu !"),
  name: Yup.string().required("Vui lòng nhập tên !"),
  address: Yup.string().required("Vui lòng nhập địa chỉ !"),
  confirmPassword: Yup.string()
    .oneOf([Yup.ref('password'), null], "Mật khẩu không khớp") // Validate that it matches the password field
    .required("Vui lòng nhập lại mật khẩu !"),
});
const initialValues1 = {
  email: "",
  password: "",
  confirmPassword: "",
  phone: "",
  name: "",
  address: "",
};



function Login(props) {

  const navigate = useNavigate();
  const handleSubmit = (values) => {

    CustomerModel.login(values)
      .then((res) => {
        // console.log(res);
        CustomerModel.setCookie("customer", JSON.stringify(res.user), res.expires_in);
        localStorage.setItem("token", res.access_token);
        navigate("/");
        handleLoginSuccess();
      })
      .catch((err) => {
        Swal.fire({
          icon: "error",
          title: "Có lổi xảy ra khi đăng nhập !",
          text: err.message,
        });
      });
  };
  const handleLoginSuccess = () => {
    Swal.fire({
      icon: "success",
      title: "Đăng nhập thành công!",
      showConfirmButton: false,
      timer: 1500,
    });
  };
  const handleSubmit1 = async (values, { resetForm }) => {
    try {
      await CustomerModel.register(values);
      handleRegisterSuccess();
      resetForm();
    } catch (err) {
      Swal.fire({
        icon: "error",
        title: "Có lỗi xảy ra khi đăng ký!",
        text: err.message,
      });
    }
  };
  const handleRegisterSuccess = () => {
    Swal.fire({
      icon: "success",
      title: "Đăng ký tài khoản thành công vui lòng đăng nhập!",
      showConfirmButton: false,
      timer: 1500,
    });
  };


  return (
    <LayoutMaster>
      <Bannerwrapper
        pageTitle="Home"
        pageSubTitle="My Account"
      />
      <>
        <main className="site-main  main-container no-sidebar">
          <div className="container">
            <div className="row">
              <div className="main-content col-md-12">
                <div className="page-main-content">
                  <div className="akasha">
                    <div className="akasha-notices-wrapper" />
                    <div className="u-columns col2-set" id="customer_login">
                      <div className="u-column1 col-1">
                        <h2>Login</h2>
                        <Formik
                          initialValues={initialValues}
                          validationSchema={SignupSchema}
                          onSubmit={handleSubmit}
                        >
                          <Form
                            className="akasha-form akasha-form-login login"
                            method="post"
                          >
                            <p className="akasha-form-row akasha-form-row--wide form-row form-row-wide">
                              <label htmlFor="username">
                                Username or email adchair&nbsp;
                                <span className="required">*</span>
                              </label>
                              <Field
                                type="text"
                                className="akasha-Field akasha-Field--text Field-text"
                                name="email"
                                id="username"
                                autoComplete="username"
                                defaultValue=""
                              />
                              <ErrorMessage name="email" component="div" className="error-message" />
                            </p>
                            <p className="akasha-form-row akasha-form-row--wide form-row form-row-wide">
                              <label htmlFor="password">
                                Password&nbsp;<span className="required">*</span>
                              </label>
                              <Field
                                className="akasha-Field akasha-Field--text Field-text"
                                type="password"
                                name="password"
                                id="password"
                                autoComplete="current-password"
                              />
                              <ErrorMessage name="password" component="div" className="error-message" />
                            </p>
                            <p className="form-row">
                              <Field
                                type="hidden"
                                id="akasha-login-nonce"
                                name="akasha-login-nonce"
                                defaultValue="832993cb93"
                              />
                              <Field
                                type="hidden"
                                name="_wp_http_referer"
                                defaultValue="/akasha/my-account/"
                              />
                              <button

                                type="submit"
                                className="akasha-Button button"
                                name="login"
                                value="Log in"
                              >
                                Log in
                              </button>
                              <label className="akasha-form__label akasha-form__label-for-checkbox inline">
                                <Field
                                  className="akasha-form__Field akasha-form__Field-checkbox"
                                  name="rememberme"
                                  type="checkbox"
                                  id="rememberme"
                                  defaultValue="forever"
                                />
                                <span>Remember me</span>
                              </label>
                            </p>
                            <p className="akasha-LostPassword lost_password">
                              <a href="my-account.htmllost-password/">
                                Lost your password?
                              </a>
                            </p>

                          </Form>




                        </Formik>
                      </div>
                      <div className="u-column2 col-2">
                        <h2>Register</h2>
                        <Formik
                          initialValues={initialValues1}
                          validationSchema={SignupSchema1}
                          onSubmit={handleSubmit1}
                        >
                          <Form
                            method="post"
                            className="akasha-form akasha-form-register register"
                          >
                            <p className="akasha-form-row akasha-form-row--wide form-row form-row-wide">
                              <label htmlFor="reg_email">
                                Email adchair&nbsp;<span className="required">*</span>
                              </label>

                              <Field
                                type="email"
                                className="akasha-Field akasha-Field--text Field-text"
                                name="email"
                                id="reg_email"
                                autoComplete="email"
                                defaultValue=""
                              />
                              <ErrorMessage name="email" component="div" className="error-message" />
                            </p>
                            <p className="akasha-form-row akasha-form-row--wide form-row form-row-wide">
                              <label htmlFor="phone">
                                Phone&nbsp;<span className="required">*</span>
                              </label>
                              <Field
                                type="number"
                                id="phone"
                                name="phone"
                                defaultValue=""
                              />
                              <ErrorMessage name="email" component="div" className="error-message" />
                            </p>
                            <p className="akasha-form-row akasha-form-row--wide form-row form-row-wide">
                              <label htmlFor="reg_password">
                                Password&nbsp;<span className="required">*</span>
                              </label>
                              <Field
                                type="password"
                                name="password"
                                id="reg_password"
                              />
                              <ErrorMessage name="password" component="div" className="error-message" />
                            </p>
                            <p className="akasha-form-row akasha-form-row--wide form-row form-row-wide">
                              <label htmlFor="confirmPassword">
                                Confirm Password&nbsp;<span className="required">*</span>
                              </label>
                              <Field
                                type="password"
                                name="confirmPassword"
                                id="confirmPassword"
                              />
                              <ErrorMessage name="confirmPassword" component="div" className="error-message" />
                            </p>
                            <p className="akasha-form-row akasha-form-row--wide form-row form-row-wide">
                              <label htmlFor="address">
                                address&nbsp;<span className="required">*</span>
                              </label>
                              <Field
                                type="text"
                                id="address"
                                name="address"
                                defaultValue=""
                              />
                              <ErrorMessage name="address" component="div" className="error-message" />
                            </p>
                            <p className="akasha-form-row akasha-form-row--wide form-row form-row-wide">
                              <label htmlFor="name">
                                name&nbsp;<span className="required">*</span>
                              </label>
                              <Field
                                type="text"
                                id="name"
                                name="name"
                                defaultValue=""
                              />
                              <ErrorMessage name="name" component="div" className="error-message" />
                            </p>


                            <div className="akasha-privacy-policy-text">
                              <p>
                                Your personal data will be used to support your experience
                                throughout this website, to manage access to your account,
                                and for other purposes described in our{" "}
                                <a
                                  href="#"
                                  className="akasha-privacy-policy-link"
                                  target="_blank"
                                >
                                  privacy policy
                                </a>
                                .
                              </p>
                            </div>
                            <p className="akasha-FormRow form-row">
                              {/* <Field
                                type="hidden"
                                id="akasha-register-nonce"
                                name="phone"
                                defaultValue="45fae70a87"
                              />
                              <ErrorMessage name="email" component="div" className="error-message" />

                              <Field
                                type="hidden"
                                name="password"
                                defaultValue="/akasha/my-account/"
                              />
                              <ErrorMessage name="password" component="div" className="error-message" /> */}

                              <button
                                type="submit"
                                className="akasha-Button button"
                                name="register"
                                value="Register"
                              >
                                Register
                              </button>
                            </p>
                          </Form>
                        </Formik>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </main>

      </>
    </LayoutMaster>

  );
}

export default Login;