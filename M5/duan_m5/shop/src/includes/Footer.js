import React from 'react';

function Footer(props) {
    return (
        
            <>
                <footer id="footer" className="footer style-01">
                    <div className="section-001 section-009">
                        <div className="container">
                            <div className="akasha-newsletter style-01">
                                <div className="newsletter-inner">
                                    <div className="newsletter-info">
                                        <div className="newsletter-wrap">
                                            <h3 className="title">Newsletter</h3>
                                            <h4 className="subtitle">Get Discount 30% Off</h4>
                                            <p className="desc">
                                                Suspendisse netus proin eleifend fusce sollicitudin potenti vel
                                                magnis nascetur
                                            </p>
                                        </div>
                                    </div>
                                    <div className="newsletter-form-wrap">
                                        <div className="newsletter-form-inner">
                                            <input
                                                className="email email-newsletter"
                                                name="email"
                                                placeholder="Enter your email ..."
                                                type="email"
                                            />
                                            <a href="#" className="button btn-submit submit-newsletter">
                                                <span className="text">Subscribe</span>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div className="section-010">
                        <div className="container">
                            <div className="row">
                                <div className="col-md-6">
                                    <p>
                                        © Copyright 2020 <a href="#">Akasha</a>. All Rights Reserved.
                                    </p>
                                </div>
                                <div className="col-md-6">
                                    <div className="akasha-socials style-01">
                                        <div className="content-socials">
                                            <ul className="socials-list">
                                                <li>
                                                    <a href="https://facebook.com" target="_blank">
                                                        <i className="fa fa-facebook" />
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="https://www.instagram.com" target="_blank">
                                                        <i className="fa fa-instagram" />
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="https://twitter.com" target="_blank">
                                                        <i className="fa fa-twitter" />
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="https://www.pinterest.com" target="_blank">
                                                        <i className="fa fa-pinterest-p" />
                                                    </a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </footer>

            </>
        
    );
}

export default Footer;