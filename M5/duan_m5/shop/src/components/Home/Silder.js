import React from 'react';
import "slick-carousel/slick/slick.css";
import "slick-carousel/slick/slick-theme.css";
import ReactSlider from "react-slick";
import BestSeller from './BestSeller';

function Silder(props) {

    const settings = {
        arrows: false,
        slidesMargin: 0,
        dots: true,
        infinite: false,
        speed: 300,
        slidesToShow: 1,
        rows: 1,
        autoplay:{delay:2500},  
        responsive: [
            {
                "breakpoint": 480,
                "settings": {
                    "slidesToShow": 1,
                    "slidesMargin": "0"
                }
            },
            {
                "breakpoint": 768,
                "settings": {
                    "slidesToShow": 1,
                    "slidesMargin": "0"
                }
            },
            {
                "breakpoint": 992,
                "settings": {
                    "slidesToShow": 1,
                    "slidesMargin": "0"
                }
            },
            {
                "breakpoint": 1200,
                "settings": {
                    "slidesToShow": 1,
                    "slidesMargin": "0"
                }
            },
            {
                "breakpoint": 1500,
                "settings": {
                    "slidesToShow": 1,
                    "slidesMargin": "0"
                }
            }
        ]
    };
    return (

        <>
            <div className="fullwidth-template">
                <div className="slide-home-01">
                    <ReactSlider
                        className="response-product product-list-owl owl-slick equal-container better-height"
                        {...settings}>
                            <div className="slide-wrap">
                                <img src="assets/images/slide2222.jpg" alt="image" />
                                <div className="slide-info">
                                    <div className="container">
                                        <div className="slide-inner">
                                            <h5>Limited Colletion</h5>
                                            <h1>Dreamy</h1>
                                            <h2>&amp; Lovely</h2>
                                            <a href="#">Shop now</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div className="slide-wrap">
                                <img src="assets/images/slide11new.jpg" alt="image" />
                                <div className="slide-info">
                                    <div className="container">
                                        <div className="slide-inner">
                                            <h5>Best Selling</h5>
                                            <h1>
                                                <span>Glamorous</span>
                                            </h1>
                                            <h2>&amp; Cute</h2>
                                            <a href="#">Shop now</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div className="slide-wrap">
                                <img src="assets/images/slide333.jpg" alt="image" />
                                <div className="slide-info">
                                    <div className="container">
                                        <div className="slide-inner">
                                            <h5>This Week Only</h5>
                                            <h1>Mega Sale</h1>
                                            <h2>50% Off</h2>
                                            <a href="#">Shop now</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                    </ReactSlider>
                </div>


                <BestSeller/>

                <div>
                    <div className="akasha-banner style-02 left-center">
                        <div className="banner-inner">
                            <figure className="banner-thumb">
                                <img
                                    src="assets/images/banner101.jpg"
                                    className="attachment-full size-full"
                                    alt="img"
                                />
                            </figure>
                            <div className="banner-info container">
                                <div className="banner-content">
                                    <div className="title-wrap">
                                        <div className="banner-label">Modern Glasses</div>
                                        <h6 className="title">Best Seller </h6>
                                    </div>
                                    <div className="button-wrap">
                                        <div className="subtitle">
                                            Lorem ipsum dolor sit amet consectetur adipiscing elit justo
                                        </div>
                                        <a className="button" target="_self" href="#">
                                            <span>Shop now</span>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </>

    );
}

export default Silder;