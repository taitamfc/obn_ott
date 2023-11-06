    import React, { useEffect, useState } from 'react';
    import "slick-carousel/slick/slick.css";
    import "slick-carousel/slick/slick-theme.css";
    import ReactSlider from "react-slick";
    import ProductModel from '../../models/ProductModel';

   
    function BestSeller(props) {


        const [products, setProducts] = useState([]);
        useEffect(() => {
            ProductModel.getAllProduct().then((res) => {
                setProducts(res.data);
                console.log(res);
            })
        }, [])

        const settings = {
            arrows: false,
            slidesMargin: 30,
            dots: true,
            infinite: false,
            speed: 300,
            slidesToShow: 4,
            rows: 2,
            responsive: [
                {
                    "breakpoint": 480,
                    "settings": {
                        "slidesToShow": 2,
                        "slidesMargin": "10"
                    }
                },
                {
                    "breakpoint": 768,
                    "settings": {
                        "slidesToShow": 2,
                        "slidesMargin": "10"
                    }
                },
                {
                    "breakpoint": 992,
                    "settings": {
                        "slidesToShow": 3,
                        "slidesMargin": "20"
                    }
                },
                {
                    "breakpoint": 1200,
                    "settings": {
                        "slidesToShow": 4,
                        "slidesMargin": "20"
                    }
                },
                {
                    "breakpoint": 1500,
                    "settings": {
                        "slidesToShow": 4,
                        "slidesMargin": 30
                    }
                }
            ]

        }
        return (
            <>
                <div className="section-001">
                    <div className="container">
                        <div className="akasha-heading style-01">
                            <div className="heading-inner">
                                <h3 className="title">Best Seller</h3>
                                <div className="subtitle">
                                    Made with care for your little ones, our products are perfect for
                                    every occasion. Check it out.
                                </div>
                            </div>
                        </div>
                        <ReactSlider
                            className="response-product product-list-owl owl-slick equal-container better-height"
                            {...settings}>




                            {products.map((product) => (
                                <div className="product-item featured_products style-02 rows-space-30 post-34 product type-product status-publish has-post-thumbnail product_cat-light product_cat-new-arrivals product_tag-light product_tag-hat product_tag-sock first instock sale featured shipping-taxable product-type-grouped">
                                    <div className="product-inner tooltip-top">
                                        <div className="product-thumb">
                                        <a className="thumb-link" href={`/Detail/${product.id}`} tabIndex={0}>
                                            <img
                                                className="img-responsive"
                                                src={product.image}
                                                alt="Maternity Shoulder"
                                                width={270}
                                                height={350}
                                            />
                                        </a>
                                  
                                            <div className="flash">
                                                <span className="onnew">
                                                    <span className="text">New</span>
                                                </span>
                                            </div>
                                            <a href="#" className="button yith-wcqv-button">
                                                Quick View
                                            </a>
                                        </div>
                                        <div className="product-info">
                                            <div className="rating-wapper nostar">
                                            <div className="star-rating" style={{ color: "#ffc107" }}>
                                                    <span style={{ width: "100%" }}>
                                                        Rated <strong className="rating">0</strong> out of 5
                                                    </span>
                                                </div>
                                                <span className="review">(0)</span>
                                            </div>
                                            <h3 className="product-name product_title">
                                                <a href={`/Detail/${product.id}`} tabIndex={0}>
                                                    {product.name}
                                                </a>
                                            </h3>
                                            <span className="price">
                                                <span className="akasha-Price-amount amount">
                                                    <span className="akasha-Price-currencySymbol"></span>{product.price}
                                                </span>{" VND"}
                                              
                                            </span>
                                        </div>
                                    </div>
                                </div>

                            ))}










                        </ReactSlider>
                    </div>
                </div>

            </>
        );
    }

    export default BestSeller;