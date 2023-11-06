import React from 'react';
import LayoutMaster from '../layouts/LayoutMaster';
import Bannerwrapper from '../components/global/Bannerwrapper';

function Product(props) {
    return (
            <LayoutMaster>

            <>
            <Bannerwrapper
              pageTitle="Product"
              pageSubTitle="Home"
            />
                <main className="site-main main-container no-sidebar">
                    <div>
                        <div className="container">
                            <div className="akasha-heading style-01">
                                <div className="heading-inner">
                                    <h3 className="title">Product Carousel </h3>
                                    <div className="subtitle">
                                        Made with care for your little ones, our products are perfect for
                                        every occasion. Check it out.
                                    </div>
                                </div>
                            </div>
                            <div className="akasha-products style-02">
                                <div
                                    className="response-product product-list-owl owl-slick equal-container better-height"
                                    data-slick='{"arrows":false,"slidesMargin":30,"dots":true,"infinite":false,"speed":300,"slidesToShow":4,"rows":2}'
                                    data-responsive='[{"breakpoint":480,"settings":{"slidesToShow":2,"slidesMargin":"10"}},{"breakpoint":768,"settings":{"slidesToShow":2,"slidesMargin":"10"}},{"breakpoint":992,"settings":{"slidesToShow":3,"slidesMargin":"20"}},{"breakpoint":1200,"settings":{"slidesToShow":3,"slidesMargin":"20"}},{"breakpoint":1500,"settings":{"slidesToShow":4,"slidesMargin":"30"}}]'
                                >
                                    <div className="product-item featured_products style-02 rows-space-30 post-34 product type-product status-publish has-post-thumbnail product_cat-light product_cat-new-arrivals product_tag-light product_tag-hat product_tag-sock first instock sale featured shipping-taxable product-type-grouped">
                                        <div className="product-inner tooltip-top">
                                            <div className="product-thumb">
                                                <a className="thumb-link" href="#" tabIndex={0}>
                                                    <img
                                                        className="img-responsive"
                                                        src="assets/images/apro61-1-270x350.jpg"
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
                                                    <div className="star-rating">
                                                        <span style={{ width: "0%" }}>
                                                            Rated <strong className="rating">0</strong> out of 5
                                                        </span>
                                                    </div>
                                                    <span className="review">(0)</span>
                                                </div>
                                                <h3 className="product-name product_title">
                                                    <a href="#" tabIndex={0}>
                                                        Maternity Shoulder
                                                    </a>
                                                </h3>
                                                <span className="price">
                                                    <span className="akasha-Price-amount amount">
                                                        <span className="akasha-Price-currencySymbol">$</span>79.00
                                                    </span>{" "}
                                                    –{" "}
                                                    <span className="akasha-Price-amount amount">
                                                        <span className="akasha-Price-currencySymbol">$</span>139.00
                                                    </span>
                                                </span>
                                            </div>
                                            <div className="group-button clearfix">
                                                <div className="yith-wcwl-add-to-wishlist">
                                                    <div className="yith-wcwl-add-button show">
                                                        <a href="#" className="add_to_wishlist">
                                                            Add to Wishlist
                                                        </a>
                                                    </div>
                                                </div>
                                                <div className="add-to-cart">
                                                    <a href="#" className="button product_type_grouped">
                                                        View products
                                                    </a>
                                                </div>
                                                <div className="akasha product compare-button">
                                                    <a href="#" className="compare button">
                                                        Compare
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div className="product-item featured_products style-02 rows-space-30 post-32 product type-product status-publish has-post-thumbnail product_cat-light product_cat-chair product_cat-sofas product_tag-hat product_tag-sock  instock sale featured shipping-taxable purchasable product-type-simple">
                                        <div className="product-inner tooltip-top">
                                            <div className="product-thumb">
                                                <a className="thumb-link" href="#" tabIndex={0}>
                                                    <img
                                                        className="img-responsive"
                                                        src="assets/images/apro71-1-270x350.jpg"
                                                        alt="Women Bags"
                                                        width={270}
                                                        height={350}
                                                    />
                                                </a>
                                                <div className="flash">
                                                    <span className="onsale">
                                                        <span className="number">-18%</span>
                                                    </span>
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
                                                    <div className="star-rating">
                                                        <span style={{ width: "0%" }}>
                                                            Rated <strong className="rating">0</strong> out of 5
                                                        </span>
                                                    </div>
                                                    <span className="review">(0)</span>
                                                </div>
                                                <h3 className="product-name product_title">
                                                    <a href="#" tabIndex={0}>
                                                        Women Bags
                                                    </a>
                                                </h3>
                                                <span className="price">
                                                    <del>
                                                        <span className="akasha-Price-amount amount">
                                                            <span className="akasha-Price-currencySymbol">$</span>
                                                            109.00
                                                        </span>
                                                    </del>{" "}
                                                    <ins>
                                                        <span className="akasha-Price-amount amount">
                                                            <span className="akasha-Price-currencySymbol">$</span>
                                                            89.00
                                                        </span>
                                                    </ins>
                                                </span>
                                            </div>
                                            <div className="group-button clearfix">
                                                <div className="yith-wcwl-add-to-wishlist">
                                                    <div className="yith-wcwl-add-button show">
                                                        <a href="#" className="add_to_wishlist">
                                                            Add to Wishlist
                                                        </a>
                                                    </div>
                                                </div>
                                                <div className="add-to-cart">
                                                    <a href="#" className="button product_type_grouped">
                                                        Add to cart
                                                    </a>
                                                </div>
                                                <div className="akasha product compare-button">
                                                    <a href="#" className="compare button">
                                                        Compare
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div className="product-item featured_products style-02 rows-space-30 post-30 product type-product status-publish has-post-thumbnail product_cat-light product_cat-bed product_cat-specials product_tag-light product_tag-table product_tag-sock last instock featured downloadable shipping-taxable purchasable product-type-simple">
                                        <div className="product-inner tooltip-top">
                                            <div className="product-thumb">
                                                <a className="thumb-link" href="#" tabIndex={0}>
                                                    <img
                                                        className="img-responsive"
                                                        src="assets/images/apro101-1-270x350.jpg"
                                                        alt="Long Oversized"
                                                        width={270}
                                                        height={350}
                                                    />
                                                </a>
                                                <div className="flash">
                                                    <span className="onnew">
                                                        <span className="text">New</span>
                                                    </span>
                                                </div>
                                                <a
                                                    href="#"
                                                    className="button yith-wcqv-button"
                                                    data-product_id={30}
                                                    tabIndex={0}
                                                >
                                                    Quick View
                                                </a>
                                            </div>
                                            <div className="product-info">
                                                <div className="rating-wapper nostar">
                                                    <div className="star-rating">
                                                        <span style={{ width: "0%" }}>
                                                            Rated <strong className="rating">0</strong> out of 5
                                                        </span>
                                                    </div>
                                                    <span className="review">(0)</span>
                                                </div>
                                                <h3 className="product-name product_title">
                                                    <a href="#" tabIndex={0}>
                                                        Long Oversized
                                                    </a>
                                                </h3>
                                                <span className="price">
                                                    <span className="akasha-Price-amount amount">
                                                        <span className="akasha-Price-currencySymbol">$</span>60.00
                                                    </span>
                                                </span>
                                            </div>
                                            <div className="group-button clearfix">
                                                <div className="yith-wcwl-add-to-wishlist">
                                                    <div className="yith-wcwl-add-button show">
                                                        <a href="#" className="add_to_wishlist">
                                                            Add to Wishlist
                                                        </a>
                                                    </div>
                                                </div>
                                                <div className="add-to-cart">
                                                    <a href="#" className="button product_type_grouped">
                                                        Add to cart
                                                    </a>
                                                </div>
                                                <div className="akasha product compare-button">
                                                    <a href="#" className="compare button">
                                                        Compare
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div className="product-item featured_products style-02 rows-space-30 post-31 product type-product status-publish has-post-thumbnail product_cat-light product_cat-sofas product_tag-hat first instock sale featured shipping-taxable product-type-grouped">
                                        <div className="product-inner tooltip-top">
                                            <div className="product-thumb">
                                                <a className="thumb-link" href="#" tabIndex={0}>
                                                    <img
                                                        className="img-responsive"
                                                        src="assets/images/apro91-1-270x350.jpg"
                                                        alt="Swing Dress"
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
                                                    <div className="star-rating">
                                                        <span style={{ width: "0%" }}>
                                                            Rated <strong className="rating">0</strong> out of 5
                                                        </span>
                                                    </div>
                                                    <span className="review">(0)</span>
                                                </div>
                                                <h3 className="product-name product_title">
                                                    <a href="#" tabIndex={0}>
                                                        Swing Dress
                                                    </a>
                                                </h3>
                                                <span className="price">
                                                    <span className="akasha-Price-amount amount">
                                                        <span className="akasha-Price-currencySymbol">$</span>89.00
                                                    </span>{" "}
                                                    –{" "}
                                                    <span className="akasha-Price-amount amount">
                                                        <span className="akasha-Price-currencySymbol">$</span>139.00
                                                    </span>
                                                </span>
                                            </div>
                                            <div className="group-button clearfix">
                                                <div className="yith-wcwl-add-to-wishlist">
                                                    <div className="yith-wcwl-add-button show">
                                                        <a href="#" className="add_to_wishlist">
                                                            Add to Wishlist
                                                        </a>
                                                    </div>
                                                </div>
                                                <div className="add-to-cart">
                                                    <a href="#" className="button product_type_grouped">
                                                        View products
                                                    </a>
                                                </div>
                                                <div className="akasha product compare-button">
                                                    <a href="#" className="compare button">
                                                        Compare
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div className="product-item featured_products style-02 rows-space-30 post-29 product type-product status-publish has-post-thumbnail product_cat-new-arrivals product_cat-specials product_tag-light product_tag-sock  instock featured downloadable shipping-taxable purchasable product-type-simple">
                                        <div className="product-inner tooltip-top">
                                            <div className="product-thumb">
                                                <a className="thumb-link" href="#" tabIndex={0}>
                                                    <img
                                                        className="img-responsive"
                                                        src="assets/images/apro1113-270x350.jpg"
                                                        alt="Abstract Sweatshirt"
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
                                                    <div className="star-rating">
                                                        <span style={{ width: "0%" }}>
                                                            Rated <strong className="rating">0</strong> out of 5
                                                        </span>
                                                    </div>
                                                    <span className="review">(0)</span>
                                                </div>
                                                <h3 className="product-name product_title">
                                                    <a href="#" tabIndex={0}>
                                                        Abstract Sweatshirt
                                                    </a>
                                                </h3>
                                                <span className="price">
                                                    <span className="akasha-Price-amount amount">
                                                        <span className="akasha-Price-currencySymbol">$</span>129.00
                                                    </span>
                                                </span>
                                            </div>
                                            <div className="group-button clearfix">
                                                <div className="yith-wcwl-add-to-wishlist">
                                                    <div className="yith-wcwl-add-button show">
                                                        <a href="#" className="add_to_wishlist">
                                                            Add to Wishlist
                                                        </a>
                                                    </div>
                                                </div>
                                                <div className="add-to-cart">
                                                    <a href="#" className="button product_type_grouped">
                                                        Add to cart
                                                    </a>
                                                </div>
                                                <div className="akasha product compare-button">
                                                    <a href="#" className="compare button">
                                                        Compare
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div className="product-item featured_products style-02 rows-space-30 post-28 product type-product status-publish has-post-thumbnail product_cat-light product_cat-chair product_cat-sofas product_tag-light product_tag-sock last instock sale featured shipping-taxable purchasable product-type-simple">
                                        <div className="product-inner tooltip-top">
                                            <div className="product-thumb">
                                                <a className="thumb-link" href="#" tabIndex={0}>
                                                    <img
                                                        className="img-responsive"
                                                        src="assets/images/apro1211-2-270x350.jpg"
                                                        alt="Classic Shirt"
                                                        width={270}
                                                        height={350}
                                                    />
                                                </a>
                                                <div className="flash">
                                                    <span className="onsale">
                                                        <span className="number">-14%</span>
                                                    </span>
                                                    <span className="onnew">
                                                        <span className="text">New</span>
                                                    </span>
                                                </div>
                                                <a href="#" className="button yith-wcqv-button">
                                                    Quick View
                                                </a>
                                            </div>
                                            <div className="product-info">
                                                <div className="rating-wapper ">
                                                    <div className="star-rating">
                                                        <span style={{ width: "100%" }}>
                                                            Rated <strong className="rating">5.00</strong> out of 5
                                                        </span>
                                                    </div>
                                                    <span className="review">(1)</span>
                                                </div>
                                                <h3 className="product-name product_title">
                                                    <a href="#" tabIndex={0}>
                                                        Classic Shirt
                                                    </a>
                                                </h3>
                                                <span className="price">
                                                    <del>
                                                        <span className="akasha-Price-amount amount">
                                                            <span className="akasha-Price-currencySymbol">$</span>
                                                            138.00
                                                        </span>
                                                    </del>{" "}
                                                    <ins>
                                                        <span className="akasha-Price-amount amount">
                                                            <span className="akasha-Price-currencySymbol">$</span>
                                                            119.00
                                                        </span>
                                                    </ins>
                                                </span>
                                            </div>
                                            <div className="group-button clearfix">
                                                <div className="yith-wcwl-add-to-wishlist">
                                                    <div className="yith-wcwl-add-button show">
                                                        <a href="#" className="add_to_wishlist">
                                                            Add to Wishlist
                                                        </a>
                                                    </div>
                                                </div>
                                                <div className="add-to-cart">
                                                    <a href="#" className="button product_type_grouped">
                                                        Add to cart
                                                    </a>
                                                </div>
                                                <div className="akasha product compare-button">
                                                    <a href="#" className="compare button">
                                                        Compare
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div className="product-item featured_products style-02 rows-space-30 post-26 product type-product status-publish has-post-thumbnail product_cat-light product_cat-chair product_cat-sofas product_tag-light product_tag-hat first instock featured shipping-taxable product-type-external">
                                        <div className="product-inner tooltip-top">
                                            <div className="product-thumb">
                                                <a className="thumb-link" href="#" tabIndex={0}>
                                                    <img
                                                        className="img-responsive"
                                                        src="assets/images/apro141-1-270x350.jpg"
                                                        alt="Mini Dress"
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
                                                <div className="rating-wapper ">
                                                    <div className="star-rating">
                                                        <span style={{ width: "100%" }}>
                                                            Rated <strong className="rating">5.00</strong> out of 5
                                                        </span>
                                                    </div>
                                                    <span className="review">(1)</span>
                                                </div>
                                                <h3 className="product-name product_title">
                                                    <a href="#" tabIndex={0}>
                                                        Mini Dress
                                                    </a>
                                                </h3>
                                                <span className="price">
                                                    <span className="akasha-Price-amount amount">
                                                        <span className="akasha-Price-currencySymbol">$</span>207.00
                                                    </span>
                                                </span>
                                            </div>
                                            <div className="group-button clearfix">
                                                <div className="yith-wcwl-add-to-wishlist">
                                                    <div className="yith-wcwl-add-button show">
                                                        <a href="#" className="add_to_wishlist">
                                                            Add to Wishlist
                                                        </a>
                                                    </div>
                                                </div>
                                                <div className="add-to-cart">
                                                    <a href="#" className="button product_type_grouped">
                                                        Buy it on Amazon
                                                    </a>
                                                </div>
                                                <div className="akasha product compare-button">
                                                    <a href="#" className="compare button">
                                                        Compare
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div className="product-item featured_products style-02 rows-space-30 post-25 product type-product status-publish has-post-thumbnail product_cat-light product_cat-chair product_cat-specials product_tag-light product_tag-sock  instock sale featured shipping-taxable purchasable product-type-simple">
                                        <div className="product-inner tooltip-top">
                                            <div className="product-thumb">
                                                <a className="thumb-link" href="#" tabIndex={0}>
                                                    <img
                                                        className="img-responsive"
                                                        src="assets/images/apro151-1-270x350.jpg"
                                                        alt="Utility Pockets"
                                                        width={270}
                                                        height={350}
                                                    />
                                                </a>
                                                <div className="flash">
                                                    <span className="onsale">
                                                        <span className="number">-11%</span>
                                                    </span>
                                                    <span className="onnew">
                                                        <span className="text">New</span>
                                                    </span>
                                                </div>
                                                <a
                                                    href="#"
                                                    className="button yith-wcqv-button"
                                                    data-product_id={25}
                                                    tabIndex={0}
                                                >
                                                    Quick View
                                                </a>
                                            </div>
                                            <div className="product-info">
                                                <div className="rating-wapper nostar">
                                                    <div className="star-rating">
                                                        <span style={{ width: "0%" }}>
                                                            Rated <strong className="rating">0</strong> out of 5
                                                        </span>
                                                    </div>
                                                    <span className="review">(0)</span>
                                                </div>
                                                <h3 className="product-name product_title">
                                                    <a href="#" tabIndex={0}>
                                                        Utility Pockets
                                                    </a>
                                                </h3>
                                                <span className="price">
                                                    <del>
                                                        <span className="akasha-Price-amount amount">
                                                            <span className="akasha-Price-currencySymbol">$</span>
                                                            89.00
                                                        </span>
                                                    </del>{" "}
                                                    <ins>
                                                        <span className="akasha-Price-amount amount">
                                                            <span className="akasha-Price-currencySymbol">$</span>
                                                            79.00
                                                        </span>
                                                    </ins>
                                                </span>
                                            </div>
                                            <div className="group-button clearfix">
                                                <div className="yith-wcwl-add-to-wishlist">
                                                    <div className="yith-wcwl-add-button show">
                                                        <a href="#" className="add_to_wishlist">
                                                            Add to Wishlist
                                                        </a>
                                                    </div>
                                                </div>
                                                <div className="add-to-cart">
                                                    <a href="#" className="button product_type_grouped">
                                                        Add to cart
                                                    </a>
                                                </div>
                                                <div className="akasha product compare-button">
                                                    <a href="#" className="compare button">
                                                        Compare
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div className="product-item featured_products style-02 rows-space-30 post-24 product type-product status-publish has-post-thumbnail product_cat-chair product_cat-table product_cat-new-arrivals product_tag-light product_tag-hat product_tag-sock last instock featured shipping-taxable purchasable product-type-variable has-default-attributes">
                                        <div className="product-inner tooltip-top">
                                            <div className="product-thumb">
                                                <a className="thumb-link" href="#" tabIndex={-1}>
                                                    <img
                                                        className="img-responsive"
                                                        src="assets/images/apro161-1-270x350.jpg"
                                                        alt="Women Bags"
                                                        width={270}
                                                        height={350}
                                                    />
                                                </a>
                                                <div className="flash">
                                                    <span className="onnew">
                                                        <span className="text">New</span>
                                                    </span>
                                                </div>
                                                <form className="variations_form cart">
                                                    <table className="variations">
                                                        <tbody>
                                                            <tr>
                                                                <td className="value">
                                                                    <select
                                                                        title="box_style"
                                                                        data-attributetype="box_style"
                                                                        data-id="pa_color"
                                                                        className="attribute-select "
                                                                        name="attribute_pa_color"
                                                                        data-attribute_name="attribute_pa_color"
                                                                        data-show_option_none="yes"
                                                                        tabIndex={-1}
                                                                    >
                                                                        <option data-type="" data-pa_color="" value="">
                                                                            Choose an option
                                                                        </option>
                                                                        <option
                                                                            data-width={30}
                                                                            data-height={30}
                                                                            data-type="color"
                                                                            data-pa_color="#3155e2"
                                                                            value="blue"
                                                                        >
                                                                            Blue
                                                                        </option>
                                                                        <option
                                                                            data-width={30}
                                                                            data-height={30}
                                                                            data-type="color"
                                                                            data-pa_color="#49aa51"
                                                                            value="green"
                                                                        >
                                                                            Green
                                                                        </option>
                                                                        <option
                                                                            data-width={30}
                                                                            data-height={30}
                                                                            data-type="color"
                                                                            data-pa_color="#ff63cb"
                                                                            value="pink"
                                                                        >
                                                                            Pink
                                                                        </option>
                                                                    </select>
                                                                    <div
                                                                        className="data-val attribute-pa_color"
                                                                        data-attributetype="box_style"
                                                                    >
                                                                        <a
                                                                            className="change-value color"
                                                                            href="#"
                                                                            style={{ background: "#3155e2" }}
                                                                            data-value="blue"
                                                                        />
                                                                        <a
                                                                            className="change-value color"
                                                                            href="#"
                                                                            style={{ background: "#49aa51" }}
                                                                            data-value="green"
                                                                        />
                                                                        <a
                                                                            className="change-value color"
                                                                            href="#"
                                                                            style={{ background: "#ff63cb" }}
                                                                            data-value="pink"
                                                                        />
                                                                    </div>
                                                                    <a
                                                                        className="reset_variations"
                                                                        href="#"
                                                                        tabIndex={-1}
                                                                    >
                                                                        Clear
                                                                    </a>
                                                                </td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </form>
                                                <a href="#" className="button yith-wcqv-button">
                                                    Quick View
                                                </a>
                                            </div>
                                            <div className="product-info">
                                                <div className="rating-wapper nostar">
                                                    <div className="star-rating">
                                                        <span style={{ width: "0%" }}>
                                                            Rated <strong className="rating">0</strong> out of 5
                                                        </span>
                                                    </div>
                                                    <span className="review">(0)</span>
                                                </div>
                                                <h3 className="product-name product_title">
                                                    <a href="#" tabIndex={-1}>
                                                        Women Bags
                                                    </a>
                                                </h3>
                                                <span className="price">
                                                    <span className="akasha-Price-amount amount">
                                                        <span className="akasha-Price-currencySymbol">$</span>45.00
                                                    </span>{" "}
                                                    –{" "}
                                                    <span className="akasha-Price-amount amount">
                                                        <span className="akasha-Price-currencySymbol">$</span>54.00
                                                    </span>
                                                </span>
                                            </div>
                                            <div className="group-button clearfix">
                                                <div className="yith-wcwl-add-to-wishlist">
                                                    <div className="yith-wcwl-add-button show">
                                                        <a href="#" className="add_to_wishlist">
                                                            Add to Wishlist
                                                        </a>
                                                    </div>
                                                </div>
                                                <div className="add-to-cart">
                                                    <a href="#" className="button product_type_grouped">
                                                        Select options
                                                    </a>
                                                </div>
                                                <div className="akasha product compare-button">
                                                    <a href="#" className="compare button">
                                                        Compare
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div className="product-item featured_products style-02 rows-space-30 post-22 product type-product status-publish has-post-thumbnail product_cat-table product_cat-bed product_cat-lamp product_tag-table product_tag-hat product_tag-sock first instock featured downloadable shipping-taxable purchasable product-type-simple">
                                        <div className="product-inner tooltip-top">
                                            <div className="product-thumb">
                                                <a className="thumb-link" href="#" tabIndex={-1}>
                                                    <img
                                                        className="img-responsive"
                                                        src="assets/images/apro181-2-270x350.jpg"
                                                        alt="Floral Stripe"
                                                        width={270}
                                                        height={350}
                                                    />
                                                </a>
                                                <div className="flash">
                                                    <span className="onnew">
                                                        <span className="text">New</span>
                                                    </span>
                                                </div>
                                                <a
                                                    href="#"
                                                    className="button yith-wcqv-button"
                                                    data-product_id={22}
                                                    tabIndex={-1}
                                                >
                                                    Quick View
                                                </a>
                                            </div>
                                            <div className="product-info">
                                                <div className="rating-wapper nostar">
                                                    <div className="star-rating">
                                                        <span style={{ width: "0%" }}>
                                                            Rated <strong className="rating">0</strong> out of 5
                                                        </span>
                                                    </div>
                                                    <span className="review">(0)</span>
                                                </div>
                                                <h3 className="product-name product_title">
                                                    <a href="#" tabIndex={-1}>
                                                        Floral Stripe
                                                    </a>
                                                </h3>
                                                <span className="price">
                                                    <span className="akasha-Price-amount amount">
                                                        <span className="akasha-Price-currencySymbol">$</span>98.00
                                                    </span>
                                                </span>
                                            </div>
                                            <div className="group-button clearfix">
                                                <div className="yith-wcwl-add-to-wishlist">
                                                    <div className="yith-wcwl-add-button show">
                                                        <a href="#" className="add_to_wishlist">
                                                            Add to cart
                                                        </a>
                                                    </div>
                                                </div>
                                                <div className="add-to-cart">
                                                    <a href="#" className="button product_type_grouped">
                                                        Add to cart
                                                    </a>
                                                </div>
                                                <div className="akasha product compare-button">
                                                    <a href="#" className="compare button">
                                                        Compare
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div className="section-001">
                        <div className="container">
                            <div className="akasha-heading style-01">
                                <div className="heading-inner">
                                    <h3 className="title">Product Grid </h3>
                                    <div className="subtitle">
                                        Browse our website for the hottest items in the marketplace now.
                                    </div>
                                </div>
                            </div>
                            <div className="akasha-products style-04">
                                <div className="response-product product-list-grid row auto-clear equal-container better-height ">
                                    <div className="product-item best-selling style-04 rows-space-30 col-bg-3 col-xl-3 col-lg-4 col-md-4 col-sm-6 col-ts-6 post-25 product type-product status-publish has-post-thumbnail product_cat-light product_cat-chair product_cat-specials product_tag-light product_tag-sock first instock sale featured shipping-taxable purchasable product-type-simple">
                                        <div className="product-inner tooltip-top tooltip-all-top">
                                            <div className="product-thumb">
                                                <a className="thumb-link" href="#">
                                                    <img
                                                        className="img-responsive"
                                                        src="assets/images/apro151-1-270x350.jpg"
                                                        alt="Utility Pockets"
                                                        width={270}
                                                        height={350}
                                                    />
                                                </a>
                                                <div className="flash">
                                                    <span className="onsale">
                                                        <span className="number">-11%</span>
                                                    </span>
                                                    <span className="onnew">
                                                        <span className="text">New</span>
                                                    </span>
                                                </div>
                                                <div className="group-button">
                                                    <div className="add-to-cart">
                                                        <a
                                                            href="#"
                                                            className="button product_type_simple add_to_cart_button ajax_add_to_cart"
                                                        >
                                                            Add to cart
                                                        </a>
                                                    </div>
                                                    <a href="#" className="button yith-wcqv-button">
                                                        Quick View
                                                    </a>
                                                    <div className="akasha product compare-button">
                                                        <a href="#" className="compare button">
                                                            Compare
                                                        </a>
                                                    </div>
                                                    <div className="yith-wcwl-add-to-wishlist">
                                                        <div className="yith-wcwl-add-button show">
                                                            <a href="#" className="add_to_wishlist">
                                                                Add to Wishlist
                                                            </a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div className="product-info">
                                                <h3 className="product-name product_title">
                                                    <a href="#">Utility Pockets</a>
                                                </h3>
                                                <span className="price">
                                                    <del>
                                                        <span className="akasha-Price-amount amount">
                                                            <span className="akasha-Price-currencySymbol">$</span>
                                                            89.00
                                                        </span>
                                                    </del>{" "}
                                                    <ins>
                                                        <span className="akasha-Price-amount amount">
                                                            <span className="akasha-Price-currencySymbol">$</span>
                                                            79.00
                                                        </span>
                                                    </ins>
                                                </span>
                                                <div className="rating-wapper nostar">
                                                    <div className="star-rating">
                                                        <span style={{ width: "0%" }}>
                                                            Rated <strong className="rating">0</strong> out of 5
                                                        </span>
                                                    </div>
                                                    <span className="review">(0)</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div className="product-item best-selling style-04 rows-space-30 col-bg-3 col-xl-3 col-lg-4 col-md-4 col-sm-6 col-ts-6 post-23 product type-product status-publish has-post-thumbnail product_cat-chair product_cat-lamp product_cat-sofas product_tag-hat  instock shipping-taxable purchasable product-type-variable has-default-attributes">
                                        <div className="product-inner tooltip-top tooltip-all-top">
                                            <div className="product-thumb">
                                                <a className="thumb-link" href="#">
                                                    <img
                                                        className="img-responsive"
                                                        src="assets/images/apro171-1-270x350.jpg"
                                                        alt="Knitted Stripe "
                                                        width={270}
                                                        height={350}
                                                    />
                                                </a>
                                                <div className="flash">
                                                    <span className="onnew">
                                                        <span className="text">New</span>
                                                    </span>
                                                </div>
                                                <form className="variations_form cart">
                                                    <table className="variations">
                                                        <tbody>
                                                            <tr>
                                                                <td className="value">
                                                                    <select
                                                                        title="box_style"
                                                                        data-attributetype="box_style"
                                                                        data-id="pa_color"
                                                                        className="attribute-select "
                                                                        name="attribute_pa_color"
                                                                        data-attribute_name="attribute_pa_color"
                                                                        data-show_option_none="yes"
                                                                    >
                                                                        <option data-type="" data-pa_color="" value="">
                                                                            Choose an option
                                                                        </option>
                                                                        <option
                                                                            data-width={30}
                                                                            data-height={30}
                                                                            data-type="color"
                                                                            data-pa_color="#ff63cb"
                                                                            value="pink"
                                                                            className="attached enabled"
                                                                        >
                                                                            Pink
                                                                        </option>
                                                                        <option
                                                                            data-width={30}
                                                                            data-height={30}
                                                                            data-type="color"
                                                                            data-pa_color="#a825ea"
                                                                            value="purple"
                                                                            className="attached enabled"
                                                                        >
                                                                            Purple
                                                                        </option>
                                                                        <option
                                                                            data-width={30}
                                                                            data-height={30}
                                                                            data-type="color"
                                                                            data-pa_color="#db2b00"
                                                                            value="red"
                                                                            className="attached enabled"
                                                                        >
                                                                            Red
                                                                        </option>
                                                                    </select>
                                                                    <div
                                                                        className="data-val attribute-pa_color"
                                                                        data-attributetype="box_style"
                                                                    >
                                                                        <a
                                                                            className="change-value color"
                                                                            href="#"
                                                                            style={{ background: "#ff63cb" }}
                                                                            data-value="pink"
                                                                        />
                                                                        <a
                                                                            className="change-value color"
                                                                            href="#"
                                                                            style={{ background: "#a825ea" }}
                                                                            data-value="purple"
                                                                        />
                                                                        <a
                                                                            className="change-value color"
                                                                            href="#"
                                                                            style={{ background: "#db2b00" }}
                                                                            data-value="red"
                                                                        />
                                                                    </div>
                                                                    <a
                                                                        className="reset_variations"
                                                                        href="#"
                                                                        style={{ visibility: "hidden" }}
                                                                    >
                                                                        Clear
                                                                    </a>
                                                                </td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </form>
                                                <div className="group-button">
                                                    <div className="add-to-cart">
                                                        <a
                                                            href="#"
                                                            className="button product_type_simple add_to_cart_button ajax_add_to_cart"
                                                        >
                                                            Select options
                                                        </a>
                                                    </div>
                                                    <a href="#" className="button yith-wcqv-button">
                                                        Quick View
                                                    </a>
                                                    <div className="akasha product compare-button">
                                                        <a href="#" className="compare button">
                                                            Compare
                                                        </a>
                                                    </div>
                                                    <div className="yith-wcwl-add-to-wishlist">
                                                        <div className="yith-wcwl-add-button show">
                                                            <a href="#" className="add_to_wishlist">
                                                                Add to Wishlist
                                                            </a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div className="product-info">
                                                <h3 className="product-name product_title">
                                                    <a href="#">Knitted Stripe </a>
                                                </h3>
                                                <span className="price">
                                                    <span className="akasha-Price-amount amount">
                                                        <span className="akasha-Price-currencySymbol">$</span>105.00
                                                    </span>{" "}
                                                    –{" "}
                                                    <span className="akasha-Price-amount amount">
                                                        <span className="akasha-Price-currencySymbol">$</span>110.00
                                                    </span>
                                                </span>
                                                <div className="rating-wapper nostar">
                                                    <div className="star-rating">
                                                        <span style={{ width: "0%" }}>
                                                            Rated <strong className="rating">0</strong> out of 5
                                                        </span>
                                                    </div>
                                                    <span className="review">(0)</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div className="product-item best-selling style-04 rows-space-30 col-bg-3 col-xl-3 col-lg-4 col-md-4 col-sm-6 col-ts-6 post-32 product type-product status-publish has-post-thumbnail product_cat-light product_cat-chair product_cat-sofas product_tag-hat product_tag-sock last instock sale featured shipping-taxable purchasable product-type-simple">
                                        <div className="product-inner tooltip-top tooltip-all-top">
                                            <div className="product-thumb">
                                                <a className="thumb-link" href="#">
                                                    <img
                                                        className="img-responsive"
                                                        src="assets/images/apro71-1-270x350.jpg"
                                                        alt="Women Bags"
                                                        width={270}
                                                        height={350}
                                                    />
                                                </a>
                                                <div className="flash">
                                                    <span className="onsale">
                                                        <span className="number">-18%</span>
                                                    </span>
                                                    <span className="onnew">
                                                        <span className="text">New</span>
                                                    </span>
                                                </div>
                                                <div className="group-button">
                                                    <div className="add-to-cart">
                                                        <a
                                                            href="#"
                                                            className="button product_type_simple add_to_cart_button ajax_add_to_cart"
                                                        >
                                                            Add to cart
                                                        </a>
                                                    </div>
                                                    <a href="#" className="button yith-wcqv-button">
                                                        Quick View
                                                    </a>
                                                    <div className="akasha product compare-button">
                                                        <a href="#" className="compare button">
                                                            Compare
                                                        </a>
                                                    </div>
                                                    <div className="yith-wcwl-add-to-wishlist">
                                                        <div className="yith-wcwl-add-button show">
                                                            <a href="#" className="add_to_wishlist">
                                                                Add to Wishlist
                                                            </a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div className="product-info">
                                                <h3 className="product-name product_title">
                                                    <a href="#">Women Bags</a>
                                                </h3>
                                                <span className="price">
                                                    <del>
                                                        <span className="akasha-Price-amount amount">
                                                            <span className="akasha-Price-currencySymbol">$</span>
                                                            109.00
                                                        </span>
                                                    </del>{" "}
                                                    <ins>
                                                        <span className="akasha-Price-amount amount">
                                                            <span className="akasha-Price-currencySymbol">$</span>
                                                            89.00
                                                        </span>
                                                    </ins>
                                                </span>
                                                <div className="rating-wapper nostar">
                                                    <div className="star-rating">
                                                        <span style={{ width: "0%" }}>
                                                            Rated <strong className="rating">0</strong> out of 5
                                                        </span>
                                                    </div>
                                                    <span className="review">(0)</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div className="product-item best-selling style-04 rows-space-30 col-bg-3 col-xl-3 col-lg-4 col-md-4 col-sm-6 col-ts-6 post-20 product type-product status-publish has-post-thumbnail product_cat-light product_cat-new-arrivals product_cat-specials product_tag-table product_tag-hat product_tag-sock first instock sale featured shipping-taxable purchasable product-type-simple">
                                        <div className="product-inner tooltip-top tooltip-all-top">
                                            <div className="product-thumb">
                                                <a className="thumb-link" href="#">
                                                    <img
                                                        className="img-responsive"
                                                        src="assets/images/apro201-1-270x350.jpg"
                                                        alt="Mini Dress"
                                                        width={270}
                                                        height={350}
                                                    />
                                                </a>
                                                <div className="flash">
                                                    <span className="onsale">
                                                        <span className="number">-7%</span>
                                                    </span>
                                                    <span className="onnew">
                                                        <span className="text">New</span>
                                                    </span>
                                                </div>
                                                <div className="group-button">
                                                    <div className="add-to-cart">
                                                        <a
                                                            href="#"
                                                            className="button product_type_simple add_to_cart_button ajax_add_to_cart"
                                                        >
                                                            Add to cart
                                                        </a>
                                                    </div>
                                                    <a href="#" className="button yith-wcqv-button">
                                                        Quick View
                                                    </a>
                                                    <div className="akasha product compare-button">
                                                        <a href="#" className="compare button">
                                                            Compare
                                                        </a>
                                                    </div>
                                                    <div className="yith-wcwl-add-to-wishlist">
                                                        <div className="yith-wcwl-add-button show">
                                                            <a href="#" className="add_to_wishlist">
                                                                Add to Wishlist
                                                            </a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div className="product-info">
                                                <h3 className="product-name product_title">
                                                    <a href="#">Mini Dress</a>
                                                </h3>
                                                <span className="price">
                                                    <del>
                                                        <span className="akasha-Price-amount amount">
                                                            <span className="akasha-Price-currencySymbol">$</span>
                                                            150.00
                                                        </span>
                                                    </del>{" "}
                                                    <ins>
                                                        <span className="akasha-Price-amount amount">
                                                            <span className="akasha-Price-currencySymbol">$</span>
                                                            139.00
                                                        </span>
                                                    </ins>
                                                </span>
                                                <div className="rating-wapper nostar">
                                                    <div className="star-rating">
                                                        <span style={{ width: "0%" }}>
                                                            Rated <strong className="rating">0</strong> out of 5
                                                        </span>
                                                    </div>
                                                    <span className="review">(0)</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div className="product-item best-selling style-04 rows-space-30 col-bg-3 col-xl-3 col-lg-4 col-md-4 col-sm-6 col-ts-6 post-36 product type-product status-publish has-post-thumbnail product_cat-table product_cat-bed product_tag-light product_tag-table product_tag-sock  instock sale shipping-taxable purchasable product-type-simple">
                                        <div className="product-inner tooltip-top tooltip-all-top">
                                            <div className="product-thumb">
                                                <a className="thumb-link" href="#">
                                                    <img
                                                        className="img-responsive"
                                                        src="assets/images/apro51012-1-270x350.jpg"
                                                        alt="Print In White"
                                                        width={270}
                                                        height={350}
                                                    />
                                                </a>
                                                <div className="flash">
                                                    <span className="onsale">
                                                        <span className="number">-21%</span>
                                                    </span>
                                                    <span className="onnew">
                                                        <span className="text">New</span>
                                                    </span>
                                                </div>
                                                <div className="group-button">
                                                    <div className="add-to-cart">
                                                        <a
                                                            href="#"
                                                            className="button product_type_simple add_to_cart_button ajax_add_to_cart"
                                                        >
                                                            Add to cart
                                                        </a>
                                                    </div>
                                                    <a href="#" className="button yith-wcqv-button">
                                                        Quick View
                                                    </a>
                                                    <div className="akasha product compare-button">
                                                        <a href="#" className="compare button">
                                                            Compare
                                                        </a>
                                                    </div>
                                                    <div className="yith-wcwl-add-to-wishlist">
                                                        <div className="yith-wcwl-add-button show">
                                                            <a href="#" className="add_to_wishlist">
                                                                Add to Wishlist
                                                            </a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div className="product-info">
                                                <h3 className="product-name product_title">
                                                    <a href="#">Print In White</a>
                                                </h3>
                                                <span className="price">
                                                    <del>
                                                        <span className="akasha-Price-amount amount">
                                                            <span className="akasha-Price-currencySymbol">$</span>
                                                            125.00
                                                        </span>
                                                    </del>{" "}
                                                    <ins>
                                                        <span className="akasha-Price-amount amount">
                                                            <span className="akasha-Price-currencySymbol">$</span>
                                                            99.00
                                                        </span>
                                                    </ins>
                                                </span>
                                                <div className="rating-wapper nostar">
                                                    <div className="star-rating">
                                                        <span style={{ width: "0%" }}>
                                                            Rated <strong className="rating">0</strong> out of 5
                                                        </span>
                                                    </div>
                                                    <span className="review">(0)</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div className="product-item best-selling style-04 rows-space-30 col-bg-3 col-xl-3 col-lg-4 col-md-4 col-sm-6 col-ts-6 post-49 product type-product status-publish has-post-thumbnail product_cat-light product_cat-bed product_cat-sofas product_tag-multi product_tag-lamp last instock shipping-taxable purchasable product-type-simple">
                                        <div className="product-inner tooltip-top tooltip-all-top">
                                            <div className="product-thumb">
                                                <a className="thumb-link" href="#">
                                                    <img
                                                        className="img-responsive"
                                                        src="assets/images/apro302-270x350.jpg"
                                                        alt="Smock Dress"
                                                        width={270}
                                                        height={350}
                                                    />
                                                </a>
                                                <div className="flash">
                                                    <span className="onnew">
                                                        <span className="text">New</span>
                                                    </span>
                                                </div>
                                                <div className="group-button">
                                                    <div className="add-to-cart">
                                                        <a
                                                            href="#"
                                                            className="button product_type_simple add_to_cart_button ajax_add_to_cart"
                                                        >
                                                            Add to cart
                                                        </a>
                                                    </div>
                                                    <a href="#" className="button yith-wcqv-button">
                                                        Quick View
                                                    </a>
                                                    <div className="akasha product compare-button">
                                                        <a href="#" className="compare button">
                                                            Compare
                                                        </a>
                                                    </div>
                                                    <div className="yith-wcwl-add-to-wishlist">
                                                        <div className="yith-wcwl-add-button show">
                                                            <a href="#" className="add_to_wishlist">
                                                                Add to Wishlist
                                                            </a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div className="product-info">
                                                <h3 className="product-name product_title">
                                                    <a href="#">Smock Dress</a>
                                                </h3>
                                                <span className="price">
                                                    <span className="akasha-Price-amount amount">
                                                        <span className="akasha-Price-currencySymbol">$</span>79.00
                                                    </span>
                                                </span>
                                                <div className="rating-wapper nostar">
                                                    <div className="star-rating">
                                                        <span style={{ width: "0%" }}>
                                                            Rated <strong className="rating">0</strong> out of 5
                                                        </span>
                                                    </div>
                                                    <span className="review">(0)</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div className="product-item best-selling style-04 rows-space-30 col-bg-3 col-xl-3 col-lg-4 col-md-4 col-sm-6 col-ts-6 post-93 product type-product status-publish has-post-thumbnail product_cat-light product_cat-table product_cat-new-arrivals product_tag-table product_tag-sock first instock shipping-taxable purchasable product-type-simple">
                                        <div className="product-inner tooltip-top tooltip-all-top">
                                            <div className="product-thumb">
                                                <a className="thumb-link" href="#">
                                                    <img
                                                        className="img-responsive"
                                                        src="assets/images/apro13-1-270x350.jpg"
                                                        alt="Black Shirt"
                                                        width={270}
                                                        height={350}
                                                    />
                                                </a>
                                                <div className="flash">
                                                    <span className="onnew">
                                                        <span className="text">New</span>
                                                    </span>
                                                </div>
                                                <div className="group-button">
                                                    <div className="add-to-cart">
                                                        <a
                                                            href="#"
                                                            className="button product_type_simple add_to_cart_button ajax_add_to_cart"
                                                        >
                                                            Add to cart
                                                        </a>
                                                    </div>
                                                    <a href="#" className="button yith-wcqv-button">
                                                        Quick View
                                                    </a>
                                                    <div className="akasha product compare-button">
                                                        <a href="#" className="compare button">
                                                            Compare
                                                        </a>
                                                    </div>
                                                    <div className="yith-wcwl-add-to-wishlist">
                                                        <div className="yith-wcwl-add-button show">
                                                            <a href="#" className="add_to_wishlist">
                                                                Add to Wishlist
                                                            </a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div className="product-info">
                                                <h3 className="product-name product_title">
                                                    <a href="#">Black Shirt</a>
                                                </h3>
                                                <span className="price">
                                                    <span className="akasha-Price-amount amount">
                                                        <span className="akasha-Price-currencySymbol">$</span>109.00
                                                    </span>
                                                </span>
                                                <div className="rating-wapper nostar">
                                                    <div className="star-rating">
                                                        <span style={{ width: "0%" }}>
                                                            Rated <strong className="rating">0</strong> out of 5
                                                        </span>
                                                    </div>
                                                    <span className="review">(0)</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div className="product-item best-selling style-04 rows-space-30 col-bg-3 col-xl-3 col-lg-4 col-md-4 col-sm-6 col-ts-6 post-28 product type-product status-publish has-post-thumbnail product_cat-light product_cat-chair product_cat-sofas product_tag-light product_tag-sock  instock sale featured shipping-taxable purchasable product-type-simple">
                                        <div className="product-inner tooltip-top tooltip-all-top">
                                            <div className="product-thumb">
                                                <a className="thumb-link" href="#">
                                                    <img
                                                        className="img-responsive"
                                                        src="assets/images/apro1211-2-270x350.jpg"
                                                        alt="Classic Shirt"
                                                        width={270}
                                                        height={350}
                                                    />
                                                </a>
                                                <div className="flash">
                                                    <span className="onsale">
                                                        <span className="number">-14%</span>
                                                    </span>
                                                    <span className="onnew">
                                                        <span className="text">New</span>
                                                    </span>
                                                </div>
                                                <div className="group-button">
                                                    <div className="add-to-cart">
                                                        <a
                                                            href="#"
                                                            className="button product_type_simple add_to_cart_button ajax_add_to_cart"
                                                        >
                                                            Add to cart
                                                        </a>
                                                    </div>
                                                    <a href="#" className="button yith-wcqv-button">
                                                        Quick View
                                                    </a>
                                                    <div className="akasha product compare-button">
                                                        <a href="#" className="compare button">
                                                            Compare
                                                        </a>
                                                    </div>
                                                    <div className="yith-wcwl-add-to-wishlist">
                                                        <div className="yith-wcwl-add-button show">
                                                            <a href="#" className="add_to_wishlist">
                                                                Add to Wishlist
                                                            </a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div className="product-info">
                                                <h3 className="product-name product_title">
                                                    <a href="#">Classic Shirt</a>
                                                </h3>
                                                <span className="price">
                                                    <del>
                                                        <span className="akasha-Price-amount amount">
                                                            <span className="akasha-Price-currencySymbol">$</span>
                                                            138.00
                                                        </span>
                                                    </del>{" "}
                                                    <ins>
                                                        <span className="akasha-Price-amount amount">
                                                            <span className="akasha-Price-currencySymbol">$</span>
                                                            119.00
                                                        </span>
                                                    </ins>
                                                </span>
                                                <div className="rating-wapper ">
                                                    <div className="star-rating">
                                                        <span style={{ width: "100%" }}>
                                                            Rated <strong className="rating">5.00</strong> out of 5
                                                        </span>
                                                    </div>
                                                    <span className="review">(1)</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div className="product-item best-selling style-04 rows-space-30 col-bg-3 col-xl-3 col-lg-4 col-md-4 col-sm-6 col-ts-6 post-22 product type-product status-publish has-post-thumbnail product_cat-table product_cat-bed product_cat-lamp product_tag-table product_tag-hat product_tag-sock last instock featured downloadable shipping-taxable purchasable product-type-simple">
                                        <div className="product-inner tooltip-top tooltip-all-top">
                                            <div className="product-thumb">
                                                <a className="thumb-link" href="#">
                                                    <img
                                                        className="img-responsive"
                                                        src="assets/images/apro181-2-270x350.jpg"
                                                        alt="Floral Stripe"
                                                        width={270}
                                                        height={350}
                                                    />
                                                </a>
                                                <div className="flash">
                                                    <span className="onnew">
                                                        <span className="text">New</span>
                                                    </span>
                                                </div>
                                                <div className="group-button">
                                                    <div className="add-to-cart">
                                                        <a
                                                            href="#"
                                                            className="button product_type_simple add_to_cart_button ajax_add_to_cart"
                                                        >
                                                            Add to cart
                                                        </a>
                                                    </div>
                                                    <a href="#" className="button yith-wcqv-button">
                                                        Quick View
                                                    </a>
                                                    <div className="akasha product compare-button">
                                                        <a href="#" className="compare button">
                                                            Compare
                                                        </a>
                                                    </div>
                                                    <div className="yith-wcwl-add-to-wishlist">
                                                        <div className="yith-wcwl-add-button show">
                                                            <a href="#" className="add_to_wishlist">
                                                                Add to Wishlist
                                                            </a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div className="product-info">
                                                <h3 className="product-name product_title">
                                                    <a href="#">Floral Stripe</a>
                                                </h3>
                                                <span className="price">
                                                    <span className="akasha-Price-amount amount">
                                                        <span className="akasha-Price-currencySymbol">$</span>98.00
                                                    </span>
                                                </span>
                                                <div className="rating-wapper nostar">
                                                    <div className="star-rating">
                                                        <span style={{ width: "0%" }}>
                                                            Rated <strong className="rating">0</strong> out of 5
                                                        </span>
                                                    </div>
                                                    <span className="review">(0)</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div className="product-item best-selling style-04 rows-space-30 col-bg-3 col-xl-3 col-lg-4 col-md-4 col-sm-6 col-ts-6 post-30 product type-product status-publish has-post-thumbnail product_cat-light product_cat-bed product_cat-specials product_tag-light product_tag-table product_tag-sock first instock featured downloadable shipping-taxable purchasable product-type-simple">
                                        <div className="product-inner tooltip-top tooltip-all-top">
                                            <div className="product-thumb">
                                                <a className="thumb-link" href="#">
                                                    <img
                                                        className="img-responsive"
                                                        src="assets/images/apro101-1-270x350.jpg"
                                                        alt="Long Oversized"
                                                        width={270}
                                                        height={350}
                                                    />
                                                </a>
                                                <div className="flash">
                                                    <span className="onnew">
                                                        <span className="text">New</span>
                                                    </span>
                                                </div>
                                                <div className="group-button">
                                                    <div className="add-to-cart">
                                                        <a
                                                            href="#"
                                                            className="button product_type_simple add_to_cart_button ajax_add_to_cart"
                                                        >
                                                            Add to cart
                                                        </a>
                                                    </div>
                                                    <a href="#" className="button yith-wcqv-button">
                                                        Quick View
                                                    </a>
                                                    <div className="akasha product compare-button">
                                                        <a href="#" className="compare button">
                                                            Compare
                                                        </a>
                                                    </div>
                                                    <div className="yith-wcwl-add-to-wishlist">
                                                        <div className="yith-wcwl-add-button show">
                                                            <a href="#" className="add_to_wishlist">
                                                                Add to Wishlist
                                                            </a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div className="product-info">
                                                <h3 className="product-name product_title">
                                                    <a href="#">Long Oversized</a>
                                                </h3>
                                                <span className="price">
                                                    <span className="akasha-Price-amount amount">
                                                        <span className="akasha-Price-currencySymbol">$</span>60.00
                                                    </span>
                                                </span>
                                                <div className="rating-wapper nostar">
                                                    <div className="star-rating">
                                                        <span style={{ width: "0%" }}>
                                                            Rated <strong className="rating">0</strong> out of 5
                                                        </span>
                                                    </div>
                                                    <span className="review">(0)</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div className="product-item best-selling style-04 rows-space-30 col-bg-3 col-xl-3 col-lg-4 col-md-4 col-sm-6 col-ts-6 post-35 product type-product status-publish has-post-thumbnail product_cat-chair product_cat-new-arrivals product_cat-lamp product_tag-light product_tag-hat product_tag-sock  instock shipping-taxable purchasable product-type-simple">
                                        <div className="product-inner tooltip-top tooltip-all-top">
                                            <div className="product-thumb">
                                                <a className="thumb-link" href="#">
                                                    <img
                                                        className="img-responsive"
                                                        src="assets/images/apro41-1-270x350.jpg"
                                                        alt="Brown Shirt"
                                                        width={270}
                                                        height={350}
                                                    />
                                                </a>
                                                <div className="flash">
                                                    <span className="onnew">
                                                        <span className="text">New</span>
                                                    </span>
                                                </div>
                                                <div className="group-button">
                                                    <div className="add-to-cart">
                                                        <a
                                                            href="#"
                                                            className="button product_type_simple add_to_cart_button ajax_add_to_cart"
                                                        >
                                                            Add to cart
                                                        </a>
                                                    </div>
                                                    <a href="#" className="button yith-wcqv-button">
                                                        Quick View
                                                    </a>
                                                    <div className="akasha product compare-button">
                                                        <a href="#" className="compare button">
                                                            Compare
                                                        </a>
                                                    </div>
                                                    <div className="yith-wcwl-add-to-wishlist">
                                                        <div className="yith-wcwl-add-button show">
                                                            <a href="#" className="add_to_wishlist">
                                                                Add to Wishlist
                                                            </a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div className="product-info">
                                                <h3 className="product-name product_title">
                                                    <a href="#">Brown Shirt</a>
                                                </h3>
                                                <span className="price">
                                                    <span className="akasha-Price-amount amount">
                                                        <span className="akasha-Price-currencySymbol">$</span>134.00
                                                    </span>
                                                </span>
                                                <div className="rating-wapper nostar">
                                                    <div className="star-rating">
                                                        <span style={{ width: "0%" }}>
                                                            Rated <strong className="rating">0</strong> out of 5
                                                        </span>
                                                    </div>
                                                    <span className="review">(0)</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div className="product-item best-selling style-04 rows-space-30 col-bg-3 col-xl-3 col-lg-4 col-md-4 col-sm-6 col-ts-6 post-24 product type-product status-publish has-post-thumbnail product_cat-chair product_cat-table product_cat-new-arrivals product_tag-light product_tag-hat product_tag-sock last instock featured shipping-taxable purchasable product-type-variable has-default-attributes">
                                        <div className="product-inner tooltip-top tooltip-all-top">
                                            <div className="product-thumb">
                                                <a className="thumb-link" href="#">
                                                    <img
                                                        className="img-responsive"
                                                        src="assets/images/apro161-1-270x350.jpg"
                                                        alt="Women Bags"
                                                        width={270}
                                                        height={350}
                                                    />
                                                </a>
                                                <div className="flash">
                                                    <span className="onnew">
                                                        <span className="text">New</span>
                                                    </span>
                                                </div>
                                                <form className="variations_form cart">
                                                    <table className="variations">
                                                        <tbody>
                                                            <tr>
                                                                <td className="value">
                                                                    <select
                                                                        title="box_style"
                                                                        data-attributetype="box_style"
                                                                        data-id="pa_color"
                                                                        className="attribute-select "
                                                                        name="attribute_pa_color"
                                                                        data-attribute_name="attribute_pa_color"
                                                                        data-show_option_none="yes"
                                                                    >
                                                                        <option data-type="" data-pa_color="" value="">
                                                                            Choose an option
                                                                        </option>
                                                                        <option
                                                                            data-width={30}
                                                                            data-height={30}
                                                                            data-type="color"
                                                                            data-pa_color="#3155e2"
                                                                            value="blue"
                                                                            className="attached enabled"
                                                                        >
                                                                            Blue
                                                                        </option>
                                                                        <option
                                                                            data-width={30}
                                                                            data-height={30}
                                                                            data-type="color"
                                                                            data-pa_color="#49aa51"
                                                                            value="green"
                                                                            className="attached enabled"
                                                                        >
                                                                            Green
                                                                        </option>
                                                                        <option
                                                                            data-width={30}
                                                                            data-height={30}
                                                                            data-type="color"
                                                                            data-pa_color="#ff63cb"
                                                                            value="pink"
                                                                            className="attached enabled"
                                                                        >
                                                                            Pink
                                                                        </option>
                                                                    </select>
                                                                    <div
                                                                        className="data-val attribute-pa_color"
                                                                        data-attributetype="box_style"
                                                                    >
                                                                        <a
                                                                            className="change-value color"
                                                                            href="#"
                                                                            style={{ background: "#3155e2" }}
                                                                            data-value="blue"
                                                                        />
                                                                        <a
                                                                            className="change-value color"
                                                                            href="#"
                                                                            style={{ background: "#49aa51" }}
                                                                            data-value="green"
                                                                        />
                                                                        <a
                                                                            className="change-value color"
                                                                            href="#"
                                                                            style={{ background: "#ff63cb" }}
                                                                            data-value="pink"
                                                                        />
                                                                    </div>
                                                                    <a
                                                                        className="reset_variations"
                                                                        href="#"
                                                                        style={{ visibility: "hidden" }}
                                                                    >
                                                                        Clear
                                                                    </a>
                                                                </td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </form>
                                                <div className="group-button">
                                                    <div className="add-to-cart">
                                                        <a
                                                            href="#"
                                                            className="button product_type_simple add_to_cart_button ajax_add_to_cart"
                                                        >
                                                            Select options
                                                        </a>
                                                    </div>
                                                    <a href="#" className="button yith-wcqv-button">
                                                        Quick View
                                                    </a>
                                                    <div className="akasha product compare-button">
                                                        <a href="#" className="compare button">
                                                            Compare
                                                        </a>
                                                    </div>
                                                    <div className="yith-wcwl-add-to-wishlist">
                                                        <div className="yith-wcwl-add-button show">
                                                            <a href="#" className="add_to_wishlist">
                                                                Add to Wishlist
                                                            </a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div className="product-info">
                                                <h3 className="product-name product_title">
                                                    <a href="#">Women Bags</a>
                                                </h3>
                                                <span className="price">
                                                    <span className="akasha-Price-amount amount">
                                                        <span className="akasha-Price-currencySymbol">$</span>45.00
                                                    </span>{" "}
                                                    –{" "}
                                                    <span className="akasha-Price-amount amount">
                                                        <span className="akasha-Price-currencySymbol">$</span>54.00
                                                    </span>
                                                </span>
                                                <div className="rating-wapper nostar">
                                                    <div className="star-rating">
                                                        <span style={{ width: "0%" }}>
                                                            Rated <strong className="rating">0</strong> out of 5
                                                        </span>
                                                    </div>
                                                    <span className="review">(0)</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                {/* OWL Products */}
                                <div className="shop-all">
                                    <a target=" _blank" href="#">
                                        Shop All
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div>
                        <div className="container">
                            <div className="akasha-heading style-01">
                                <div className="heading-inner">
                                    <h3 className="title">Product Tab</h3>
                                    <div className="subtitle">
                                        Made with care for your little ones, our products are perfect for
                                        every occasion. Check it out.
                                    </div>
                                </div>
                            </div>
                            <div className="akasha-tabs style-01">
                                <div className="tab-head">
                                    <ul className="tab-link equal-container " data-loop={1}>
                                        <li className="active">
                                            <a
                                                className="loaded"
                                                data-ajax={0}
                                                data-animate=""
                                                data-section="1547652538969-4e9e849f-123a"
                                                data-id={330}
                                                href="#1547652538969-4e9e849f-123a-5d80aefaa70e2"
                                            >
                                                <span>New Arrival</span>
                                            </a>
                                        </li>
                                        <li className="">
                                            <a
                                                className=""
                                                data-ajax={0}
                                                data-animate=""
                                                data-section="1547652726354-2b0cdba5-80e9"
                                                data-id={330}
                                                href="#1547652726354-2b0cdba5-80e9-5d80aefaa70e2"
                                            >
                                                <span>Top Rated</span>
                                            </a>
                                        </li>
                                        <li className="">
                                            <a
                                                className=""
                                                data-ajax={0}
                                                data-animate=""
                                                data-section="1547652725565-7e88bea3-ede2"
                                                data-id={330}
                                                href="#1547652725565-7e88bea3-ede2-5d80aefaa70e2"
                                            >
                                                <span>Featured</span>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                                <div className="tab-container">
                                    <div
                                        className="tab-panel active"
                                        id="1547652538969-4e9e849f-123a-5d80aefaa70e2"
                                    >
                                        <div className="akasha-products style-01">
                                            <div className="response-product product-list-grid row auto-clear equal-container better-height ">
                                                <div className="product-item recent-product style-01 rows-space-30 col-bg-3 col-xl-3 col-lg-4 col-md-4 col-sm-6 col-ts-6 post-93 product type-product status-publish has-post-thumbnail product_cat-light product_cat-table product_cat-new-arrivals product_tag-table product_tag-sock first instock shipping-taxable purchasable product-type-simple">
                                                    <div className="product-inner tooltip-left">
                                                        <div className="product-thumb">
                                                            <a className="thumb-link" href="#">
                                                                <img
                                                                    className="img-responsive"
                                                                    src="assets/images/apro13-1-270x350.jpg"
                                                                    alt="Black Shirt"
                                                                    width={270}
                                                                    height={350}
                                                                />
                                                            </a>
                                                            <div className="flash">
                                                                <span className="onnew">
                                                                    <span className="text">New</span>
                                                                </span>
                                                            </div>
                                                            <div className="group-button">
                                                                <div className="yith-wcwl-add-to-wishlist">
                                                                    <div className="yith-wcwl-add-button show">
                                                                        <a href="#" className="add_to_wishlist">
                                                                            Add to Wishlist
                                                                        </a>
                                                                    </div>
                                                                </div>
                                                                <div className="akasha product compare-button">
                                                                    <a href="#" className="compare button">
                                                                        Compare
                                                                    </a>
                                                                </div>
                                                                <a href="#" className="button yith-wcqv-button">
                                                                    Quick View
                                                                </a>
                                                                <div className="add-to-cart">
                                                                    <a
                                                                        href="#"
                                                                        className="button product_type_simple add_to_cart_button ajax_add_to_cart"
                                                                    >
                                                                        Add to cart
                                                                    </a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div className="product-info equal-elem">
                                                            <h3 className="product-name product_title">
                                                                <a href="#">Black Shirt</a>
                                                            </h3>
                                                            <div className="rating-wapper nostar">
                                                                <div className="star-rating">
                                                                    <span style={{ width: "0%" }}>
                                                                        Rated <strong className="rating">0</strong> out of 5
                                                                    </span>
                                                                </div>
                                                                <span className="review">(0)</span>
                                                            </div>
                                                            <span className="price">
                                                                <span className="akasha-Price-amount amount">
                                                                    <span className="akasha-Price-currencySymbol">$</span>
                                                                    109.00
                                                                </span>
                                                            </span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div className="product-item recent-product style-01 rows-space-30 col-bg-3 col-xl-3 col-lg-4 col-md-4 col-sm-6 col-ts-6 post-49 product type-product status-publish has-post-thumbnail product_cat-light product_cat-bed product_cat-sofas product_tag-multi product_tag-lamp  instock shipping-taxable purchasable product-type-simple">
                                                    <div className="product-inner tooltip-left">
                                                        <div className="product-thumb">
                                                            <a className="thumb-link" href="#">
                                                                <img
                                                                    className="img-responsive"
                                                                    src="assets/images/apro302-270x350.jpg"
                                                                    alt="Smock Dress"
                                                                    width={270}
                                                                    height={350}
                                                                />
                                                            </a>
                                                            <div className="flash">
                                                                <span className="onnew">
                                                                    <span className="text">New</span>
                                                                </span>
                                                            </div>
                                                            <div className="group-button">
                                                                <div className="yith-wcwl-add-to-wishlist">
                                                                    <div className="yith-wcwl-add-button show">
                                                                        <a href="#" className="add_to_wishlist">
                                                                            Add to Wishlist
                                                                        </a>
                                                                    </div>
                                                                </div>
                                                                <div className="akasha product compare-button">
                                                                    <a href="#" className="compare button">
                                                                        Compare
                                                                    </a>
                                                                </div>
                                                                <a href="#" className="button yith-wcqv-button">
                                                                    Quick View
                                                                </a>
                                                                <div className="add-to-cart">
                                                                    <a
                                                                        href="#"
                                                                        className="button product_type_simple add_to_cart_button ajax_add_to_cart"
                                                                    >
                                                                        Add to cart
                                                                    </a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div className="product-info equal-elem">
                                                            <h3 className="product-name product_title">
                                                                <a href="#">Smock Dress</a>
                                                            </h3>
                                                            <div className="rating-wapper nostar">
                                                                <div className="star-rating">
                                                                    <span style={{ width: "0%" }}>
                                                                        Rated <strong className="rating">0</strong> out of 5
                                                                    </span>
                                                                </div>
                                                                <span className="review">(0)</span>
                                                            </div>
                                                            <span className="price">
                                                                <span className="akasha-Price-amount amount">
                                                                    <span className="akasha-Price-currencySymbol">$</span>
                                                                    79.00
                                                                </span>
                                                            </span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div className="product-item recent-product style-01 rows-space-30 col-bg-3 col-xl-3 col-lg-4 col-md-4 col-sm-6 col-ts-6 post-37 product type-product status-publish has-post-thumbnail product_cat-chair product_cat-bed product_tag-light product_tag-hat product_tag-sock last instock shipping-taxable purchasable product-type-simple">
                                                    <div className="product-inner tooltip-left">
                                                        <div className="product-thumb">
                                                            <a className="thumb-link" href="#">
                                                                <img
                                                                    className="img-responsive"
                                                                    src="assets/images/apro31-1-270x350.jpg"
                                                                    alt="Shirred Front"
                                                                    width={270}
                                                                    height={350}
                                                                />
                                                            </a>
                                                            <div className="flash">
                                                                <span className="onnew">
                                                                    <span className="text">New</span>
                                                                </span>
                                                            </div>
                                                            <div className="group-button">
                                                                <div className="yith-wcwl-add-to-wishlist">
                                                                    <div className="yith-wcwl-add-button show">
                                                                        <a href="#" className="add_to_wishlist">
                                                                            Add to Wishlist
                                                                        </a>
                                                                    </div>
                                                                </div>
                                                                <div className="akasha product compare-button">
                                                                    <a href="#" className="compare button">
                                                                        Compare
                                                                    </a>
                                                                </div>
                                                                <a href="#" className="button yith-wcqv-button">
                                                                    Quick View
                                                                </a>
                                                                <div className="add-to-cart">
                                                                    <a
                                                                        href="#"
                                                                        className="button product_type_simple add_to_cart_button ajax_add_to_cart"
                                                                    >
                                                                        Add to cart
                                                                    </a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div className="product-info equal-elem">
                                                            <h3 className="product-name product_title">
                                                                <a href="#">Shirred Front</a>
                                                            </h3>
                                                            <div className="rating-wapper nostar">
                                                                <div className="star-rating">
                                                                    <span style={{ width: "0%" }}>
                                                                        Rated <strong className="rating">0</strong> out of 5
                                                                    </span>
                                                                </div>
                                                                <span className="review">(0)</span>
                                                            </div>
                                                            <span className="price">
                                                                <span className="akasha-Price-amount amount">
                                                                    <span className="akasha-Price-currencySymbol">$</span>
                                                                    120.00
                                                                </span>
                                                            </span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div className="product-item recent-product style-01 rows-space-30 col-bg-3 col-xl-3 col-lg-4 col-md-4 col-sm-6 col-ts-6 post-36 product type-product status-publish has-post-thumbnail product_cat-table product_cat-bed product_tag-light product_tag-table product_tag-sock first instock sale shipping-taxable purchasable product-type-simple">
                                                    <div className="product-inner tooltip-left">
                                                        <div className="product-thumb">
                                                            <a className="thumb-link" href="#">
                                                                <img
                                                                    className="img-responsive"
                                                                    src="assets/images/apro51012-1-270x350.jpg"
                                                                    alt="Print In White"
                                                                    width={270}
                                                                    height={350}
                                                                />
                                                            </a>
                                                            <div className="flash">
                                                                <span className="onsale">
                                                                    <span className="number">-21%</span>
                                                                </span>
                                                                <span className="onnew">
                                                                    <span className="text">New</span>
                                                                </span>
                                                            </div>
                                                            <div className="group-button">
                                                                <div className="yith-wcwl-add-to-wishlist">
                                                                    <div className="yith-wcwl-add-button show">
                                                                        <a href="#" className="add_to_wishlist">
                                                                            Add to Wishlist
                                                                        </a>
                                                                    </div>
                                                                </div>
                                                                <div className="akasha product compare-button">
                                                                    <a href="#" className="compare button">
                                                                        Compare
                                                                    </a>
                                                                </div>
                                                                <a href="#" className="button yith-wcqv-button">
                                                                    Quick View
                                                                </a>
                                                                <div className="add-to-cart">
                                                                    <a
                                                                        href="#"
                                                                        className="button product_type_simple add_to_cart_button ajax_add_to_cart"
                                                                    >
                                                                        Add to cart
                                                                    </a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div className="product-info equal-elem">
                                                            <h3 className="product-name product_title">
                                                                <a href="#">Print In White</a>
                                                            </h3>
                                                            <div className="rating-wapper nostar">
                                                                <div className="star-rating">
                                                                    <span style={{ width: "0%" }}>
                                                                        Rated <strong className="rating">0</strong> out of 5
                                                                    </span>
                                                                </div>
                                                                <span className="review">(0)</span>
                                                            </div>
                                                            <span className="price">
                                                                <del>
                                                                    <span className="akasha-Price-amount amount">
                                                                        <span className="akasha-Price-currencySymbol">
                                                                            $
                                                                        </span>
                                                                        125.00
                                                                    </span>
                                                                </del>{" "}
                                                                <ins>
                                                                    <span className="akasha-Price-amount amount">
                                                                        <span className="akasha-Price-currencySymbol">
                                                                            $
                                                                        </span>
                                                                        99.00
                                                                    </span>
                                                                </ins>
                                                            </span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div className="product-item recent-product style-01 rows-space-30 col-bg-3 col-xl-3 col-lg-4 col-md-4 col-sm-6 col-ts-6 post-35 product type-product status-publish has-post-thumbnail product_cat-chair product_cat-new-arrivals product_cat-lamp product_tag-light product_tag-hat product_tag-sock  instock shipping-taxable purchasable product-type-simple">
                                                    <div className="product-inner tooltip-left">
                                                        <div className="product-thumb">
                                                            <a className="thumb-link" href="#">
                                                                <img
                                                                    className="img-responsive"
                                                                    src="assets/images/apro41-1-270x350.jpg"
                                                                    alt="Brown Shirt"
                                                                    width={270}
                                                                    height={350}
                                                                />
                                                            </a>
                                                            <div className="flash">
                                                                <span className="onnew">
                                                                    <span className="text">New</span>
                                                                </span>
                                                            </div>
                                                            <div className="group-button">
                                                                <div className="yith-wcwl-add-to-wishlist">
                                                                    <div className="yith-wcwl-add-button show">
                                                                        <a href="#" className="add_to_wishlist">
                                                                            Add to Wishlist
                                                                        </a>
                                                                    </div>
                                                                </div>
                                                                <div className="akasha product compare-button">
                                                                    <a href="#" className="compare button">
                                                                        Compare
                                                                    </a>
                                                                </div>
                                                                <a href="#" className="button yith-wcqv-button">
                                                                    Quick View
                                                                </a>
                                                                <div className="add-to-cart">
                                                                    <a
                                                                        href="#"
                                                                        className="button product_type_simple add_to_cart_button ajax_add_to_cart"
                                                                    >
                                                                        Add to cart
                                                                    </a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div className="product-info equal-elem">
                                                            <h3 className="product-name product_title">
                                                                <a href="#">Brown Shirt</a>
                                                            </h3>
                                                            <div className="rating-wapper nostar">
                                                                <div className="star-rating">
                                                                    <span style={{ width: "0%" }}>
                                                                        Rated <strong className="rating">0</strong> out of 5
                                                                    </span>
                                                                </div>
                                                                <span className="review">(0)</span>
                                                            </div>
                                                            <span className="price">
                                                                <span className="akasha-Price-amount amount">
                                                                    <span className="akasha-Price-currencySymbol">$</span>
                                                                    134.00
                                                                </span>
                                                            </span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div className="product-item recent-product style-01 rows-space-30 col-bg-3 col-xl-3 col-lg-4 col-md-4 col-sm-6 col-ts-6 post-34 product type-product status-publish has-post-thumbnail product_cat-light product_cat-new-arrivals product_tag-light product_tag-hat product_tag-sock last instock sale featured shipping-taxable product-type-grouped">
                                                    <div className="product-inner tooltip-left">
                                                        <div className="product-thumb">
                                                            <a className="thumb-link" href="#">
                                                                <img
                                                                    className="img-responsive"
                                                                    src="assets/images/apro61-1-270x350.jpg"
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
                                                            <div className="group-button">
                                                                <div className="yith-wcwl-add-to-wishlist">
                                                                    <div className="yith-wcwl-add-button show">
                                                                        <a href="#" className="add_to_wishlist">
                                                                            Add to Wishlist
                                                                        </a>
                                                                    </div>
                                                                </div>
                                                                <div className="akasha product compare-button">
                                                                    <a href="#" className="compare button">
                                                                        Compare
                                                                    </a>
                                                                </div>
                                                                <a href="#" className="button yith-wcqv-button">
                                                                    Quick View
                                                                </a>
                                                                <div className="add-to-cart">
                                                                    <a
                                                                        href="#"
                                                                        className="button product_type_simple add_to_cart_button ajax_add_to_cart"
                                                                    >
                                                                        Add to cart
                                                                    </a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div className="product-info equal-elem">
                                                            <h3 className="product-name product_title">
                                                                <a href="#">Maternity Shoulder</a>
                                                            </h3>
                                                            <div className="rating-wapper nostar">
                                                                <div className="star-rating">
                                                                    <span style={{ width: "0%" }}>
                                                                        Rated <strong className="rating">0</strong> out of 5
                                                                    </span>
                                                                </div>
                                                                <span className="review">(0)</span>
                                                            </div>
                                                            <span className="price">
                                                                <span className="akasha-Price-amount amount">
                                                                    <span className="akasha-Price-currencySymbol">$</span>
                                                                    79.00
                                                                </span>{" "}
                                                                –{" "}
                                                                <span className="akasha-Price-amount amount">
                                                                    <span className="akasha-Price-currencySymbol">$</span>
                                                                    139.00
                                                                </span>
                                                            </span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div className="product-item recent-product style-01 rows-space-30 col-bg-3 col-xl-3 col-lg-4 col-md-4 col-sm-6 col-ts-6 post-32 product type-product status-publish has-post-thumbnail product_cat-light product_cat-chair product_cat-sofas product_tag-hat product_tag-sock first instock sale featured shipping-taxable purchasable product-type-simple">
                                                    <div className="product-inner tooltip-left">
                                                        <div className="product-thumb">
                                                            <a className="thumb-link" href="#">
                                                                <img
                                                                    className="img-responsive"
                                                                    src="assets/images/apro71-1-270x350.jpg"
                                                                    alt="Women Bags"
                                                                    width={270}
                                                                    height={350}
                                                                />
                                                            </a>
                                                            <div className="flash">
                                                                <span className="onsale">
                                                                    <span className="number">-18%</span>
                                                                </span>
                                                                <span className="onnew">
                                                                    <span className="text">New</span>
                                                                </span>
                                                            </div>
                                                            <div className="group-button">
                                                                <div className="yith-wcwl-add-to-wishlist">
                                                                    <div className="yith-wcwl-add-button show">
                                                                        <a href="#" className="add_to_wishlist">
                                                                            Add to Wishlist
                                                                        </a>
                                                                    </div>
                                                                </div>
                                                                <div className="akasha product compare-button">
                                                                    <a href="#" className="compare button">
                                                                        Compare
                                                                    </a>
                                                                </div>
                                                                <a href="#" className="button yith-wcqv-button">
                                                                    Quick View
                                                                </a>
                                                                <div className="add-to-cart">
                                                                    <a
                                                                        href="#"
                                                                        className="button product_type_simple add_to_cart_button ajax_add_to_cart"
                                                                    >
                                                                        Add to cart
                                                                    </a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div className="product-info equal-elem">
                                                            <h3 className="product-name product_title">
                                                                <a href="#">Women Bags</a>
                                                            </h3>
                                                            <div className="rating-wapper nostar">
                                                                <div className="star-rating">
                                                                    <span style={{ width: "0%" }}>
                                                                        Rated <strong className="rating">0</strong> out of 5
                                                                    </span>
                                                                </div>
                                                                <span className="review">(0)</span>
                                                            </div>
                                                            <span className="price">
                                                                <del>
                                                                    <span className="akasha-Price-amount amount">
                                                                        <span className="akasha-Price-currencySymbol">
                                                                            $
                                                                        </span>
                                                                        109.00
                                                                    </span>
                                                                </del>{" "}
                                                                <ins>
                                                                    <span className="akasha-Price-amount amount">
                                                                        <span className="akasha-Price-currencySymbol">
                                                                            $
                                                                        </span>
                                                                        89.00
                                                                    </span>
                                                                </ins>
                                                            </span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div className="product-item recent-product style-01 rows-space-30 col-bg-3 col-xl-3 col-lg-4 col-md-4 col-sm-6 col-ts-6 post-33 product type-product status-publish has-post-thumbnail product_cat-chair product_cat-table product_cat-lamp product_tag-light product_tag-table product_tag-hat  instock shipping-taxable purchasable product-type-variable has-default-attributes">
                                                    <div className="product-inner tooltip-left">
                                                        <div className="product-thumb">
                                                            <a className="thumb-link" href="#">
                                                                <img
                                                                    className="img-responsive"
                                                                    src="assets/images/apro83-1-270x350.jpg"
                                                                    alt="Glasses"
                                                                    width={270}
                                                                    height={350}
                                                                />
                                                            </a>
                                                            <div className="flash">
                                                                <span className="onnew">
                                                                    <span className="text">New</span>
                                                                </span>
                                                            </div>
                                                            <form className="variations_form cart">
                                                                <table className="variations">
                                                                    <tbody>
                                                                        <tr>
                                                                            <td className="value">
                                                                                <select
                                                                                    title="box_style"
                                                                                    data-attributetype="box_style"
                                                                                    data-id="pa_color"
                                                                                    className="attribute-select "
                                                                                    name="attribute_pa_color"
                                                                                    data-attribute_name="attribute_pa_color"
                                                                                    data-show_option_none="yes"
                                                                                >
                                                                                    <option
                                                                                        data-type=""
                                                                                        data-pa_color=""
                                                                                        value=""
                                                                                    >
                                                                                        Choose an option
                                                                                    </option>
                                                                                    <option
                                                                                        data-width={30}
                                                                                        data-height={30}
                                                                                        data-type="color"
                                                                                        data-pa_color="#000000"
                                                                                        value="black"
                                                                                        className="attached enabled"
                                                                                    >
                                                                                        Black
                                                                                    </option>
                                                                                    <option
                                                                                        data-width={30}
                                                                                        data-height={30}
                                                                                        data-type="color"
                                                                                        data-pa_color="#db2b00"
                                                                                        value="red"
                                                                                        className="attached enabled"
                                                                                    >
                                                                                        Red
                                                                                    </option>
                                                                                </select>
                                                                                <div
                                                                                    className="data-val attribute-pa_color"
                                                                                    data-attributetype="box_style"
                                                                                >
                                                                                    <a
                                                                                        className="change-value color"
                                                                                        href="#"
                                                                                        style={{ background: "#000000" }}
                                                                                        data-value="black"
                                                                                    />
                                                                                    <a
                                                                                        className="change-value color"
                                                                                        href="#"
                                                                                        style={{ background: "#db2b00" }}
                                                                                        data-value="red"
                                                                                    />
                                                                                </div>
                                                                                <a
                                                                                    className="reset_variations"
                                                                                    href="#"
                                                                                    style={{ visibility: "hidden" }}
                                                                                >
                                                                                    Clear
                                                                                </a>
                                                                            </td>
                                                                        </tr>
                                                                    </tbody>
                                                                </table>
                                                            </form>
                                                            <div className="group-button">
                                                                <div className="yith-wcwl-add-to-wishlist">
                                                                    <div className="yith-wcwl-add-button show">
                                                                        <a href="#" className="add_to_wishlist">
                                                                            Add to Wishlist
                                                                        </a>
                                                                    </div>
                                                                </div>
                                                                <div className="akasha product compare-button">
                                                                    <a href="#" className="compare button">
                                                                        Compare
                                                                    </a>
                                                                </div>
                                                                <a href="#" className="button yith-wcqv-button">
                                                                    Quick View
                                                                </a>
                                                                <div className="add-to-cart">
                                                                    <a
                                                                        href="#"
                                                                        className="button product_type_simple add_to_cart_button ajax_add_to_cart"
                                                                    >
                                                                        Select options
                                                                    </a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div className="product-info equal-elem">
                                                            <h3 className="product-name product_title">
                                                                <a href="#">Leopard Print</a>
                                                            </h3>
                                                            <div className="rating-wapper nostar">
                                                                <div className="star-rating">
                                                                    <span style={{ width: "0%" }}>
                                                                        Rated <strong className="rating">0</strong> out of 5
                                                                    </span>
                                                                </div>
                                                                <span className="review">(0)</span>
                                                            </div>
                                                            <span className="price">
                                                                <span className="akasha-Price-amount amount">
                                                                    <span className="akasha-Price-currencySymbol">$</span>
                                                                    56.00
                                                                </span>{" "}
                                                                –{" "}
                                                                <span className="akasha-Price-amount amount">
                                                                    <span className="akasha-Price-currencySymbol">$</span>
                                                                    60.00
                                                                </span>
                                                            </span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            {/* OWL Products */}
                                        </div>
                                    </div>
                                    <div
                                        className="tab-panel "
                                        id="1547652726354-2b0cdba5-80e9-5d80aefaa70e2"
                                    >
                                        <div className="akasha-products style-01   akasha_custom_5d67efefedff9 ">
                                            <div className="response-product product-list-grid row auto-clear equal-container better-height ">
                                                <div className="product-item top-rated style-01 rows-space-30 col-bg-3 col-xl-3 col-lg-4 col-md-4 col-sm-6 col-ts-6 post-26 product type-product status-publish has-post-thumbnail product_cat-light product_cat-chair product_cat-sofas product_tag-light product_tag-hat last instock featured shipping-taxable product-type-external">
                                                    <div className="product-inner tooltip-left">
                                                        <div className="product-thumb">
                                                            <a className="thumb-link" href="#">
                                                                <img
                                                                    className="img-responsive"
                                                                    src="assets/images/apro141-1-270x350.jpg"
                                                                    alt="Mini Dress"
                                                                    width={270}
                                                                    height={350}
                                                                />
                                                            </a>
                                                            <div className="flash">
                                                                <span className="onnew">
                                                                    <span className="text">New</span>
                                                                </span>
                                                            </div>
                                                            <div className="group-button">
                                                                <div className="yith-wcwl-add-to-wishlist">
                                                                    <div className="yith-wcwl-add-button show">
                                                                        <a href="#" className="add_to_wishlist">
                                                                            Add to Wishlist
                                                                        </a>
                                                                    </div>
                                                                </div>
                                                                <div className="akasha product compare-button">
                                                                    <a href="#" className="compare button">
                                                                        Compare
                                                                    </a>
                                                                </div>
                                                                <a href="#" className="button yith-wcqv-button">
                                                                    Quick View
                                                                </a>
                                                                <div className="add-to-cart">
                                                                    <a
                                                                        href="#"
                                                                        className="button product_type_simple add_to_cart_button ajax_add_to_cart"
                                                                    >
                                                                        Buy it on Amazon
                                                                    </a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div className="product-info equal-elem">
                                                            <h3 className="product-name product_title">
                                                                <a href="#">Dining Accessories</a>
                                                            </h3>
                                                            <div className="rating-wapper ">
                                                                <div className="star-rating">
                                                                    <span style={{ width: "100%" }}>
                                                                        Rated <strong className="rating">5.00</strong> out
                                                                        of 5
                                                                    </span>
                                                                </div>
                                                                <span className="review">(1)</span>
                                                            </div>
                                                            <span className="price">
                                                                <span className="akasha-Price-amount amount">
                                                                    <span className="akasha-Price-currencySymbol">$</span>
                                                                    207.00
                                                                </span>
                                                            </span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div className="product-item top-rated style-01 rows-space-30 col-bg-3 col-xl-3 col-lg-4 col-md-4 col-sm-6 col-ts-6 post-28 product type-product status-publish has-post-thumbnail product_cat-light product_cat-chair product_cat-sofas product_tag-light product_tag-sock first instock sale featured shipping-taxable purchasable product-type-simple">
                                                    <div className="product-inner tooltip-left">
                                                        <div className="product-thumb">
                                                            <a className="thumb-link" href="#">
                                                                <img
                                                                    className="img-responsive"
                                                                    src="assets/images/apro1211-2-270x350.jpg"
                                                                    alt="Classic Shirt"
                                                                    width={270}
                                                                    height={350}
                                                                />
                                                            </a>
                                                            <div className="flash">
                                                                <span className="onsale">
                                                                    <span className="number">-14%</span>
                                                                </span>
                                                                <span className="onnew">
                                                                    <span className="text">New</span>
                                                                </span>
                                                            </div>
                                                            <div className="group-button">
                                                                <div className="yith-wcwl-add-to-wishlist">
                                                                    <div className="yith-wcwl-add-button show">
                                                                        <a href="#" className="add_to_wishlist">
                                                                            Add to Wishlist
                                                                        </a>
                                                                    </div>
                                                                </div>
                                                                <div className="akasha product compare-button">
                                                                    <a href="#" className="compare button">
                                                                        Compare
                                                                    </a>
                                                                </div>
                                                                <a href="#" className="button yith-wcqv-button">
                                                                    Quick View
                                                                </a>
                                                                <div className="add-to-cart">
                                                                    <a
                                                                        href="#"
                                                                        className="button product_type_simple add_to_cart_button ajax_add_to_cart"
                                                                    >
                                                                        Add to cart
                                                                    </a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div className="product-info equal-elem">
                                                            <h3 className="product-name product_title">
                                                                <a href="#">Classic Shirt</a>
                                                            </h3>
                                                            <div className="rating-wapper ">
                                                                <div className="star-rating">
                                                                    <span style={{ width: "100%" }}>
                                                                        Rated <strong className="rating">5.00</strong> out
                                                                        of 5
                                                                    </span>
                                                                </div>
                                                                <span className="review">(1)</span>
                                                            </div>
                                                            <span className="price">
                                                                <del>
                                                                    <span className="akasha-Price-amount amount">
                                                                        <span className="akasha-Price-currencySymbol">
                                                                            $
                                                                        </span>
                                                                        138.00
                                                                    </span>
                                                                </del>{" "}
                                                                <ins>
                                                                    <span className="akasha-Price-amount amount">
                                                                        <span className="akasha-Price-currencySymbol">
                                                                            $
                                                                        </span>
                                                                        119.00
                                                                    </span>
                                                                </ins>
                                                            </span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div className="product-item top-rated style-01 rows-space-30 col-bg-3 col-xl-3 col-lg-4 col-md-4 col-sm-6 col-ts-6 post-20 product type-product status-publish has-post-thumbnail product_cat-light product_cat-new-arrivals product_cat-specials product_tag-table product_tag-hat product_tag-sock  instock sale featured shipping-taxable purchasable product-type-simple">
                                                    <div className="product-inner tooltip-left">
                                                        <div className="product-thumb">
                                                            <a className="thumb-link" href="#">
                                                                <img
                                                                    className="img-responsive"
                                                                    src="assets/images/apro201-1-270x350.jpg"
                                                                    alt="Mini Dress"
                                                                    width={270}
                                                                    height={350}
                                                                />
                                                            </a>
                                                            <div className="flash">
                                                                <span className="onsale">
                                                                    <span className="number">-7%</span>
                                                                </span>
                                                                <span className="onnew">
                                                                    <span className="text">New</span>
                                                                </span>
                                                            </div>
                                                            <div className="group-button">
                                                                <div className="yith-wcwl-add-to-wishlist">
                                                                    <div className="yith-wcwl-add-button show">
                                                                        <a href="#" className="add_to_wishlist">
                                                                            Add to Wishlist
                                                                        </a>
                                                                    </div>
                                                                </div>
                                                                <div className="akasha product compare-button">
                                                                    <a href="#" className="compare button">
                                                                        Compare
                                                                    </a>
                                                                </div>
                                                                <a href="#" className="button yith-wcqv-button">
                                                                    Quick View
                                                                </a>
                                                                <div className="add-to-cart">
                                                                    <a
                                                                        href="#"
                                                                        className="button product_type_simple add_to_cart_button ajax_add_to_cart"
                                                                    >
                                                                        Add to cart
                                                                    </a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div className="product-info equal-elem">
                                                            <h3 className="product-name product_title">
                                                                <a href="#">Mini Dress</a>
                                                            </h3>
                                                            <div className="rating-wapper nostar">
                                                                <div className="star-rating">
                                                                    <span style={{ width: "0%" }}>
                                                                        Rated <strong className="rating">0</strong> out of 5
                                                                    </span>
                                                                </div>
                                                                <span className="review">(0)</span>
                                                            </div>
                                                            <span className="price">
                                                                <del>
                                                                    <span className="akasha-Price-amount amount">
                                                                        <span className="akasha-Price-currencySymbol">
                                                                            $
                                                                        </span>
                                                                        150.00
                                                                    </span>
                                                                </del>{" "}
                                                                <ins>
                                                                    <span className="akasha-Price-amount amount">
                                                                        <span className="akasha-Price-currencySymbol">
                                                                            $
                                                                        </span>
                                                                        139.00
                                                                    </span>
                                                                </ins>
                                                            </span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div className="product-item top-rated style-01 rows-space-30 col-bg-3 col-xl-3 col-lg-4 col-md-4 col-sm-6 col-ts-6 post-33 product type-product status-publish has-post-thumbnail product_cat-chair product_cat-table product_cat-lamp product_tag-light product_tag-table product_tag-hat last instock shipping-taxable purchasable product-type-variable has-default-attributes">
                                                    <div className="product-inner tooltip-left">
                                                        <div className="product-thumb">
                                                            <a className="thumb-link" href="#">
                                                                <img
                                                                    className="img-responsive"
                                                                    src="assets/images/apro83-1-270x350.jpg"
                                                                    alt="Glasses"
                                                                    width={270}
                                                                    height={350}
                                                                />
                                                            </a>
                                                            <div className="flash">
                                                                <span className="onnew">
                                                                    <span className="text">New</span>
                                                                </span>
                                                            </div>
                                                            <form className="variations_form cart">
                                                                <table className="variations">
                                                                    <tbody>
                                                                        <tr>
                                                                            <td className="value">
                                                                                <select
                                                                                    title="box_style"
                                                                                    data-attributetype="box_style"
                                                                                    data-id="pa_color"
                                                                                    className="attribute-select "
                                                                                    name="attribute_pa_color"
                                                                                    data-attribute_name="attribute_pa_color"
                                                                                    data-show_option_none="yes"
                                                                                >
                                                                                    <option
                                                                                        data-type=""
                                                                                        data-pa_color=""
                                                                                        value=""
                                                                                    >
                                                                                        Choose an option
                                                                                    </option>
                                                                                    <option
                                                                                        data-width={30}
                                                                                        data-height={30}
                                                                                        data-type="color"
                                                                                        data-pa_color="#000000"
                                                                                        value="black"
                                                                                        className="attached enabled"
                                                                                    >
                                                                                        Black
                                                                                    </option>
                                                                                    <option
                                                                                        data-width={30}
                                                                                        data-height={30}
                                                                                        data-type="color"
                                                                                        data-pa_color="#db2b00"
                                                                                        value="red"
                                                                                        className="attached enabled"
                                                                                    >
                                                                                        Red
                                                                                    </option>
                                                                                </select>
                                                                                <div
                                                                                    className="data-val attribute-pa_color"
                                                                                    data-attributetype="box_style"
                                                                                >
                                                                                    <a
                                                                                        className="change-value color"
                                                                                        href="#"
                                                                                        style={{ background: "#000000" }}
                                                                                        data-value="black"
                                                                                    />
                                                                                    <a
                                                                                        className="change-value color"
                                                                                        href="#"
                                                                                        style={{ background: "#db2b00" }}
                                                                                        data-value="red"
                                                                                    />
                                                                                </div>
                                                                                <a
                                                                                    className="reset_variations"
                                                                                    href="#"
                                                                                    style={{ visibility: "hidden" }}
                                                                                >
                                                                                    Clear
                                                                                </a>
                                                                            </td>
                                                                        </tr>
                                                                    </tbody>
                                                                </table>
                                                            </form>
                                                            <div className="group-button">
                                                                <div className="yith-wcwl-add-to-wishlist">
                                                                    <div className="yith-wcwl-add-button show">
                                                                        <a href="#" className="add_to_wishlist">
                                                                            Add to Wishlist
                                                                        </a>
                                                                    </div>
                                                                </div>
                                                                <div className="akasha product compare-button">
                                                                    <a href="#" className="compare button">
                                                                        Compare
                                                                    </a>
                                                                </div>
                                                                <a href="#" className="button yith-wcqv-button">
                                                                    Quick View
                                                                </a>
                                                                <div className="add-to-cart">
                                                                    <a
                                                                        href="#"
                                                                        className="button product_type_simple add_to_cart_button ajax_add_to_cart"
                                                                    >
                                                                        Select options
                                                                    </a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div className="product-info equal-elem">
                                                            <h3 className="product-name product_title">
                                                                <a href="#">Leopard Print</a>
                                                            </h3>
                                                            <div className="rating-wapper nostar">
                                                                <div className="star-rating">
                                                                    <span style={{ width: "0%" }}>
                                                                        Rated <strong className="rating">0</strong> out of 5
                                                                    </span>
                                                                </div>
                                                                <span className="review">(0)</span>
                                                            </div>
                                                            <span className="price">
                                                                <span className="akasha-Price-amount amount">
                                                                    <span className="akasha-Price-currencySymbol">$</span>
                                                                    56.00
                                                                </span>{" "}
                                                                –{" "}
                                                                <span className="akasha-Price-amount amount">
                                                                    <span className="akasha-Price-currencySymbol">$</span>
                                                                    60.00
                                                                </span>
                                                            </span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div className="product-item top-rated style-01 rows-space-30 col-bg-3 col-xl-3 col-lg-4 col-md-4 col-sm-6 col-ts-6 post-21 product type-product status-publish has-post-thumbnail product_cat-light product_cat-bed product_cat-lamp product_tag-light product_tag-sock first outofstock featured shipping-taxable purchasable product-type-simple">
                                                    <div className="product-inner tooltip-left">
                                                        <div className="product-thumb">
                                                            <a className="thumb-link" href="#">
                                                                <img
                                                                    className="img-responsive"
                                                                    src="assets/images/apro191-1-270x350.jpg"
                                                                    alt="Dagger Oversized"
                                                                    width={270}
                                                                    height={350}
                                                                />
                                                            </a>
                                                            <div className="flash">
                                                                <span className="sold-out">
                                                                    <span>Sold out</span>
                                                                </span>
                                                            </div>
                                                            <div className="group-button">
                                                                <div className="yith-wcwl-add-to-wishlist">
                                                                    <div className="yith-wcwl-add-button show">
                                                                        <a href="#" className="add_to_wishlist">
                                                                            Add to Wishlist
                                                                        </a>
                                                                    </div>
                                                                </div>
                                                                <div className="akasha product compare-button">
                                                                    <a href="#" className="compare button">
                                                                        Compare
                                                                    </a>
                                                                </div>
                                                                <a href="#" className="button yith-wcqv-button">
                                                                    Quick View
                                                                </a>
                                                                <div className="add-to-cart">
                                                                    <a
                                                                        href="#"
                                                                        className="button product_type_simple add_to_cart_button ajax_add_to_cart"
                                                                    >
                                                                        Read more
                                                                    </a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div className="product-info equal-elem">
                                                            <h3 className="product-name product_title">
                                                                <a href="#">Long Sleeve Shirt</a>
                                                            </h3>
                                                            <div className="rating-wapper nostar">
                                                                <div className="star-rating">
                                                                    <span style={{ width: "0%" }}>
                                                                        Rated <strong className="rating">0</strong> out of 5
                                                                    </span>
                                                                </div>
                                                                <span className="review">(0)</span>
                                                            </div>
                                                            <span className="price">
                                                                <span className="akasha-Price-amount amount">
                                                                    <span className="akasha-Price-currencySymbol">$</span>
                                                                    35.00
                                                                </span>
                                                            </span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div className="product-item top-rated style-01 rows-space-30 col-bg-3 col-xl-3 col-lg-4 col-md-4 col-sm-6 col-ts-6 post-34 product type-product status-publish has-post-thumbnail product_cat-light product_cat-new-arrivals product_tag-light product_tag-hat product_tag-sock  instock sale featured shipping-taxable product-type-grouped">
                                                    <div className="product-inner tooltip-left">
                                                        <div className="product-thumb">
                                                            <a className="thumb-link" href="#">
                                                                <img
                                                                    className="img-responsive"
                                                                    src="assets/images/apro61-1-270x350.jpg"
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
                                                            <div className="group-button">
                                                                <div className="yith-wcwl-add-to-wishlist">
                                                                    <div className="yith-wcwl-add-button show">
                                                                        <a href="#" className="add_to_wishlist">
                                                                            Add to Wishlist
                                                                        </a>
                                                                    </div>
                                                                </div>
                                                                <div className="akasha product compare-button">
                                                                    <a href="#" className="compare button">
                                                                        Compare
                                                                    </a>
                                                                </div>
                                                                <a href="#" className="button yith-wcqv-button">
                                                                    Quick View
                                                                </a>
                                                                <div className="add-to-cart">
                                                                    <a
                                                                        href="#"
                                                                        className="button product_type_simple add_to_cart_button ajax_add_to_cart"
                                                                    >
                                                                        View products
                                                                    </a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div className="product-info equal-elem">
                                                            <h3 className="product-name product_title">
                                                                <a href="#">Maternity Shoulder</a>
                                                            </h3>
                                                            <div className="rating-wapper nostar">
                                                                <div className="star-rating">
                                                                    <span style={{ width: "0%" }}>
                                                                        Rated <strong className="rating">0</strong> out of 5
                                                                    </span>
                                                                </div>
                                                                <span className="review">(0)</span>
                                                            </div>
                                                            <span className="price">
                                                                <span className="akasha-Price-amount amount">
                                                                    <span className="akasha-Price-currencySymbol">$</span>
                                                                    79.00
                                                                </span>{" "}
                                                                –{" "}
                                                                <span className="akasha-Price-amount amount">
                                                                    <span className="akasha-Price-currencySymbol">$</span>
                                                                    139.00
                                                                </span>
                                                            </span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div className="product-item top-rated style-01 rows-space-30 col-bg-3 col-xl-3 col-lg-4 col-md-4 col-sm-6 col-ts-6 post-22 product type-product status-publish has-post-thumbnail product_cat-table product_cat-bed product_cat-lamp product_tag-table product_tag-hat product_tag-sock last instock featured downloadable shipping-taxable purchasable product-type-simple">
                                                    <div className="product-inner tooltip-left">
                                                        <div className="product-thumb">
                                                            <a className="thumb-link" href="#">
                                                                <img
                                                                    className="img-responsive"
                                                                    src="assets/images/apro181-2-270x350.jpg"
                                                                    alt="Floral Stripe"
                                                                    width={270}
                                                                    height={350}
                                                                />
                                                            </a>
                                                            <div className="flash">
                                                                <span className="onnew">
                                                                    <span className="text">New</span>
                                                                </span>
                                                            </div>
                                                            <div className="group-button">
                                                                <div className="yith-wcwl-add-to-wishlist">
                                                                    <div className="yith-wcwl-add-button show">
                                                                        <a href="#" className="add_to_wishlist">
                                                                            Add to Wishlist
                                                                        </a>
                                                                    </div>
                                                                </div>
                                                                <div className="akasha product compare-button">
                                                                    <a href="#" className="compare button">
                                                                        Compare
                                                                    </a>
                                                                </div>
                                                                <a href="#" className="button yith-wcqv-button">
                                                                    Quick View
                                                                </a>
                                                                <div className="add-to-cart">
                                                                    <a
                                                                        href="#"
                                                                        className="button product_type_simple add_to_cart_button ajax_add_to_cart"
                                                                    >
                                                                        Add to cart
                                                                    </a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div className="product-info equal-elem">
                                                            <h3 className="product-name product_title">
                                                                <a href="#">Floral Stripe</a>
                                                            </h3>
                                                            <div className="rating-wapper nostar">
                                                                <div className="star-rating">
                                                                    <span style={{ width: "0%" }}>
                                                                        Rated <strong className="rating">0</strong> out of 5
                                                                    </span>
                                                                </div>
                                                                <span className="review">(0)</span>
                                                            </div>
                                                            <span className="price">
                                                                <span className="akasha-Price-amount amount">
                                                                    <span className="akasha-Price-currencySymbol">$</span>
                                                                    98.00
                                                                </span>
                                                            </span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div className="product-item top-rated style-01 rows-space-30 col-bg-3 col-xl-3 col-lg-4 col-md-4 col-sm-6 col-ts-6 post-35 product type-product status-publish has-post-thumbnail product_cat-chair product_cat-new-arrivals product_cat-lamp product_tag-light product_tag-hat product_tag-sock first instock shipping-taxable purchasable product-type-simple">
                                                    <div className="product-inner tooltip-left">
                                                        <div className="product-thumb">
                                                            <a className="thumb-link" href="#">
                                                                <img
                                                                    className="img-responsive"
                                                                    src="assets/images/apro41-1-270x350.jpg"
                                                                    alt="Brown Shirt"
                                                                    width={270}
                                                                    height={350}
                                                                />
                                                            </a>
                                                            <div className="flash">
                                                                <span className="onnew">
                                                                    <span className="text">New</span>
                                                                </span>
                                                            </div>
                                                            <div className="group-button">
                                                                <div className="yith-wcwl-add-to-wishlist">
                                                                    <div className="yith-wcwl-add-button show">
                                                                        <a href="#" className="add_to_wishlist">
                                                                            Add to Wishlist
                                                                        </a>
                                                                    </div>
                                                                </div>
                                                                <div className="akasha product compare-button">
                                                                    <a href="#" className="compare button">
                                                                        Compare
                                                                    </a>
                                                                </div>
                                                                <a href="#" className="button yith-wcqv-button">
                                                                    Quick View
                                                                </a>
                                                                <div className="add-to-cart">
                                                                    <a
                                                                        href="#"
                                                                        className="button product_type_simple add_to_cart_button ajax_add_to_cart"
                                                                    >
                                                                        Add to cart
                                                                    </a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div className="product-info equal-elem">
                                                            <h3 className="product-name product_title">
                                                                <a href="#">Brown Shirt</a>
                                                            </h3>
                                                            <div className="rating-wapper nostar">
                                                                <div className="star-rating">
                                                                    <span style={{ width: "0%" }}>
                                                                        Rated <strong className="rating">0</strong> out of 5
                                                                    </span>
                                                                </div>
                                                                <span className="review">(0)</span>
                                                            </div>
                                                            <span className="price">
                                                                <span className="akasha-Price-amount amount">
                                                                    <span className="akasha-Price-currencySymbol">$</span>
                                                                    134.00
                                                                </span>
                                                            </span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            {/* OWL Products */}
                                        </div>
                                    </div>
                                    <div
                                        className="tab-panel "
                                        id="1547652725565-7e88bea3-ede2-5d80aefaa70e2"
                                    >
                                        <div className="akasha-products style-01   akasha_custom_5d67efefee7c9 ">
                                            <div className="response-product product-list-grid row auto-clear equal-container better-height ">
                                                <div className="product-item featured_products style-01 rows-space-30 col-bg-3 col-xl-3 col-lg-4 col-md-4 col-sm-6 col-ts-6 post-34 product type-product status-publish has-post-thumbnail product_cat-light product_cat-new-arrivals product_tag-light product_tag-hat product_tag-sock  instock sale featured shipping-taxable product-type-grouped">
                                                    <div className="product-inner tooltip-left">
                                                        <div className="product-thumb">
                                                            <a className="thumb-link" href="#">
                                                                <img
                                                                    className="img-responsive"
                                                                    src="assets/images/apro61-1-270x350.jpg"
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
                                                            <div className="group-button">
                                                                <div className="yith-wcwl-add-to-wishlist">
                                                                    <div className="yith-wcwl-add-button show">
                                                                        <a href="#" className="add_to_wishlist">
                                                                            Add to Wishlist
                                                                        </a>
                                                                    </div>
                                                                </div>
                                                                <div className="akasha product compare-button">
                                                                    <a href="#" className="compare button">
                                                                        Compare
                                                                    </a>
                                                                </div>
                                                                <a href="#" className="button yith-wcqv-button">
                                                                    Quick View
                                                                </a>
                                                                <div className="add-to-cart">
                                                                    <a
                                                                        href="#"
                                                                        className="button product_type_simple add_to_cart_button ajax_add_to_cart"
                                                                    >
                                                                        Add to cart
                                                                    </a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div className="product-info equal-elem">
                                                            <h3 className="product-name product_title">
                                                                <a href="#">Maternity Shoulder</a>
                                                            </h3>
                                                            <div className="rating-wapper nostar">
                                                                <div className="star-rating">
                                                                    <span style={{ width: "0%" }}>
                                                                        Rated <strong className="rating">0</strong> out of 5
                                                                    </span>
                                                                </div>
                                                                <span className="review">(0)</span>
                                                            </div>
                                                            <span className="price">
                                                                <span className="akasha-Price-amount amount">
                                                                    <span className="akasha-Price-currencySymbol">$</span>
                                                                    79.00
                                                                </span>{" "}
                                                                –{" "}
                                                                <span className="akasha-Price-amount amount">
                                                                    <span className="akasha-Price-currencySymbol">$</span>
                                                                    139.00
                                                                </span>
                                                            </span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div className="product-item featured_products style-01 rows-space-30 col-bg-3 col-xl-3 col-lg-4 col-md-4 col-sm-6 col-ts-6 post-32 product type-product status-publish has-post-thumbnail product_cat-light product_cat-chair product_cat-sofas product_tag-hat product_tag-sock last instock sale featured shipping-taxable purchasable product-type-simple">
                                                    <div className="product-inner tooltip-left">
                                                        <div className="product-thumb">
                                                            <a className="thumb-link" href="#">
                                                                <img
                                                                    className="img-responsive"
                                                                    src="assets/images/apro71-1-270x350.jpg"
                                                                    alt="Women Bags"
                                                                    width={270}
                                                                    height={350}
                                                                />
                                                            </a>
                                                            <div className="flash">
                                                                <span className="onsale">
                                                                    <span className="number">-18%</span>
                                                                </span>
                                                                <span className="onnew">
                                                                    <span className="text">New</span>
                                                                </span>
                                                            </div>
                                                            <div className="group-button">
                                                                <div className="yith-wcwl-add-to-wishlist">
                                                                    <div className="yith-wcwl-add-button show">
                                                                        <a href="#" className="add_to_wishlist">
                                                                            Add to Wishlist
                                                                        </a>
                                                                    </div>
                                                                </div>
                                                                <div className="akasha product compare-button">
                                                                    <a href="#" className="compare button">
                                                                        Compare
                                                                    </a>
                                                                </div>
                                                                <a href="#" className="button yith-wcqv-button">
                                                                    Quick View
                                                                </a>
                                                                <div className="add-to-cart">
                                                                    <a
                                                                        href="#"
                                                                        className="button product_type_simple add_to_cart_button ajax_add_to_cart"
                                                                    >
                                                                        Add to cart
                                                                    </a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div className="product-info equal-elem">
                                                            <h3 className="product-name product_title">
                                                                <a href="#">Women Bags</a>
                                                            </h3>
                                                            <div className="rating-wapper nostar">
                                                                <div className="star-rating">
                                                                    <span style={{ width: "0%" }}>
                                                                        Rated <strong className="rating">0</strong> out of 5
                                                                    </span>
                                                                </div>
                                                                <span className="review">(0)</span>
                                                            </div>
                                                            <span className="price">
                                                                <del>
                                                                    <span className="akasha-Price-amount amount">
                                                                        <span className="akasha-Price-currencySymbol">
                                                                            $
                                                                        </span>
                                                                        109.00
                                                                    </span>
                                                                </del>{" "}
                                                                <ins>
                                                                    <span className="akasha-Price-amount amount">
                                                                        <span className="akasha-Price-currencySymbol">
                                                                            $
                                                                        </span>
                                                                        89.00
                                                                    </span>
                                                                </ins>
                                                            </span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div className="product-item featured_products style-01 rows-space-30 col-bg-3 col-xl-3 col-lg-4 col-md-4 col-sm-6 col-ts-6 post-30 product type-product status-publish has-post-thumbnail product_cat-light product_cat-bed product_cat-specials product_tag-light product_tag-table product_tag-sock first instock featured downloadable shipping-taxable purchasable product-type-simple">
                                                    <div className="product-inner tooltip-left">
                                                        <div className="product-thumb">
                                                            <a className="thumb-link" href="#">
                                                                <img
                                                                    className="img-responsive"
                                                                    src="assets/images/apro101-1-270x350.jpg"
                                                                    alt="Long Oversized"
                                                                    width={270}
                                                                    height={350}
                                                                />
                                                            </a>
                                                            <div className="flash">
                                                                <span className="onnew">
                                                                    <span className="text">New</span>
                                                                </span>
                                                            </div>
                                                            <div className="group-button">
                                                                <div className="yith-wcwl-add-to-wishlist">
                                                                    <div className="yith-wcwl-add-button show">
                                                                        <a href="#" className="add_to_wishlist">
                                                                            Add to Wishlist
                                                                        </a>
                                                                    </div>
                                                                </div>
                                                                <div className="akasha product compare-button">
                                                                    <a href="#" className="compare button">
                                                                        Compare
                                                                    </a>
                                                                </div>
                                                                <a href="#" className="button yith-wcqv-button">
                                                                    Quick View
                                                                </a>
                                                                <div className="add-to-cart">
                                                                    <a
                                                                        href="#"
                                                                        className="button product_type_simple add_to_cart_button ajax_add_to_cart"
                                                                    >
                                                                        Add to cart
                                                                    </a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div className="product-info equal-elem">
                                                            <h3 className="product-name product_title">
                                                                <a href="#">Long Oversized</a>
                                                            </h3>
                                                            <div className="rating-wapper nostar">
                                                                <div className="star-rating">
                                                                    <span style={{ width: "0%" }}>
                                                                        Rated <strong className="rating">0</strong> out of 5
                                                                    </span>
                                                                </div>
                                                                <span className="review">(0)</span>
                                                            </div>
                                                            <span className="price">
                                                                <span className="akasha-Price-amount amount">
                                                                    <span className="akasha-Price-currencySymbol">$</span>
                                                                    60.00
                                                                </span>
                                                            </span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div className="product-item featured_products style-01 rows-space-30 col-bg-3 col-xl-3 col-lg-4 col-md-4 col-sm-6 col-ts-6 post-31 product type-product status-publish has-post-thumbnail product_cat-light product_cat-sofas product_tag-hat  instock sale featured shipping-taxable product-type-grouped">
                                                    <div className="product-inner tooltip-left">
                                                        <div className="product-thumb">
                                                            <a className="thumb-link" href="#">
                                                                <img
                                                                    className="img-responsive"
                                                                    src="assets/images/apro91-1-270x350.jpg"
                                                                    alt="Swing Dress"
                                                                    width={270}
                                                                    height={350}
                                                                />
                                                            </a>
                                                            <div className="flash">
                                                                <span className="onnew">
                                                                    <span className="text">New</span>
                                                                </span>
                                                            </div>
                                                            <div className="group-button">
                                                                <div className="yith-wcwl-add-to-wishlist">
                                                                    <div className="yith-wcwl-add-button show">
                                                                        <a href="#" className="add_to_wishlist">
                                                                            Add to Wishlist
                                                                        </a>
                                                                    </div>
                                                                </div>
                                                                <div className="akasha product compare-button">
                                                                    <a href="#" className="compare button">
                                                                        Compare
                                                                    </a>
                                                                </div>
                                                                <a href="#" className="button yith-wcqv-button">
                                                                    Quick View
                                                                </a>
                                                                <div className="add-to-cart">
                                                                    <a
                                                                        href="#"
                                                                        className="button product_type_simple add_to_cart_button ajax_add_to_cart"
                                                                    >
                                                                        Add to cart
                                                                    </a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div className="product-info equal-elem">
                                                            <h3 className="product-name product_title">
                                                                <a href="#">Swing Dress</a>
                                                            </h3>
                                                            <div className="rating-wapper nostar">
                                                                <div className="star-rating">
                                                                    <span style={{ width: "0%" }}>
                                                                        Rated <strong className="rating">0</strong> out of 5
                                                                    </span>
                                                                </div>
                                                                <span className="review">(0)</span>
                                                            </div>
                                                            <span className="price">
                                                                <span className="akasha-Price-amount amount">
                                                                    <span className="akasha-Price-currencySymbol">$</span>
                                                                    89.00
                                                                </span>{" "}
                                                                –{" "}
                                                                <span className="akasha-Price-amount amount">
                                                                    <span className="akasha-Price-currencySymbol">$</span>
                                                                    139.00
                                                                </span>
                                                            </span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div className="product-item featured_products style-01 rows-space-30 col-bg-3 col-xl-3 col-lg-4 col-md-4 col-sm-6 col-ts-6 post-29 product type-product status-publish has-post-thumbnail product_cat-new-arrivals product_cat-specials product_tag-light product_tag-sock last instock featured downloadable shipping-taxable purchasable product-type-simple">
                                                    <div className="product-inner tooltip-left">
                                                        <div className="product-thumb">
                                                            <a className="thumb-link" href="#">
                                                                <img
                                                                    className="img-responsive"
                                                                    src="assets/images/apro1113-270x350.jpg"
                                                                    alt="Abstract Sweatshirt"
                                                                    width={270}
                                                                    height={350}
                                                                />
                                                            </a>
                                                            <div className="flash">
                                                                <span className="onnew">
                                                                    <span className="text">New</span>
                                                                </span>
                                                            </div>
                                                            <div className="group-button">
                                                                <div className="yith-wcwl-add-to-wishlist">
                                                                    <div className="yith-wcwl-add-button show">
                                                                        <a href="#" className="add_to_wishlist">
                                                                            Add to Wishlist
                                                                        </a>
                                                                    </div>
                                                                </div>
                                                                <div className="akasha product compare-button">
                                                                    <a href="#" className="compare button">
                                                                        Compare
                                                                    </a>
                                                                </div>
                                                                <a href="#" className="button yith-wcqv-button">
                                                                    Quick View
                                                                </a>
                                                                <div className="add-to-cart">
                                                                    <a
                                                                        href="#"
                                                                        className="button product_type_simple add_to_cart_button ajax_add_to_cart"
                                                                    >
                                                                        Add to cart
                                                                    </a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div className="product-info equal-elem">
                                                            <h3 className="product-name product_title">
                                                                <a href="#">Abstract Sweatshirt</a>
                                                            </h3>
                                                            <div className="rating-wapper nostar">
                                                                <div className="star-rating">
                                                                    <span style={{ width: "0%" }}>
                                                                        Rated <strong className="rating">0</strong> out of 5
                                                                    </span>
                                                                </div>
                                                                <span className="review">(0)</span>
                                                            </div>
                                                            <span className="price">
                                                                <span className="akasha-Price-amount amount">
                                                                    <span className="akasha-Price-currencySymbol">$</span>
                                                                    129.00
                                                                </span>
                                                            </span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div className="product-item featured_products style-01 rows-space-30 col-bg-3 col-xl-3 col-lg-4 col-md-4 col-sm-6 col-ts-6 post-28 product type-product status-publish has-post-thumbnail product_cat-light product_cat-chair product_cat-sofas product_tag-light product_tag-sock first instock sale featured shipping-taxable purchasable product-type-simple">
                                                    <div className="product-inner tooltip-left">
                                                        <div className="product-thumb">
                                                            <a className="thumb-link" href="#">
                                                                <img
                                                                    className="img-responsive"
                                                                    src="assets/images/apro1211-2-270x350.jpg"
                                                                    alt="Classic Shirt"
                                                                    width={270}
                                                                    height={350}
                                                                />
                                                            </a>
                                                            <div className="flash">
                                                                <span className="onsale">
                                                                    <span className="number">-14%</span>
                                                                </span>
                                                                <span className="onnew">
                                                                    <span className="text">New</span>
                                                                </span>
                                                            </div>
                                                            <div className="group-button">
                                                                <div className="yith-wcwl-add-to-wishlist">
                                                                    <div className="yith-wcwl-add-button show">
                                                                        <a href="#" className="add_to_wishlist">
                                                                            Add to Wishlist
                                                                        </a>
                                                                    </div>
                                                                </div>
                                                                <div className="akasha product compare-button">
                                                                    <a href="#" className="compare button">
                                                                        Compare
                                                                    </a>
                                                                </div>
                                                                <a href="#" className="button yith-wcqv-button">
                                                                    Quick View
                                                                </a>
                                                                <div className="add-to-cart">
                                                                    <a
                                                                        href="#"
                                                                        className="button product_type_simple add_to_cart_button ajax_add_to_cart"
                                                                    >
                                                                        Add to cart
                                                                    </a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div className="product-info equal-elem">
                                                            <h3 className="product-name product_title">
                                                                <a href="#">Classic Shirt</a>
                                                            </h3>
                                                            <div className="rating-wapper ">
                                                                <div className="star-rating">
                                                                    <span style={{ width: "100%" }}>
                                                                        Rated <strong className="rating">5.00</strong> out
                                                                        of 5
                                                                    </span>
                                                                </div>
                                                                <span className="review">(1)</span>
                                                            </div>
                                                            <span className="price">
                                                                <del>
                                                                    <span className="akasha-Price-amount amount">
                                                                        <span className="akasha-Price-currencySymbol">
                                                                            $
                                                                        </span>
                                                                        138.00
                                                                    </span>
                                                                </del>{" "}
                                                                <ins>
                                                                    <span className="akasha-Price-amount amount">
                                                                        <span className="akasha-Price-currencySymbol">
                                                                            $
                                                                        </span>
                                                                        119.00
                                                                    </span>
                                                                </ins>
                                                            </span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div className="product-item featured_products style-01 rows-space-30 col-bg-3 col-xl-3 col-lg-4 col-md-4 col-sm-6 col-ts-6 post-26 product type-product status-publish has-post-thumbnail product_cat-light product_cat-chair product_cat-sofas product_tag-light product_tag-hat  instock featured shipping-taxable product-type-external">
                                                    <div className="product-inner tooltip-left">
                                                        <div className="product-thumb">
                                                            <a className="thumb-link" href="#">
                                                                <img
                                                                    className="img-responsive"
                                                                    src="assets/images/apro141-1-270x350.jpg"
                                                                    alt="Mini Dress"
                                                                    width={270}
                                                                    height={350}
                                                                />
                                                            </a>
                                                            <div className="flash">
                                                                <span className="onnew">
                                                                    <span className="text">New</span>
                                                                </span>
                                                            </div>
                                                            <div className="group-button">
                                                                <div className="yith-wcwl-add-to-wishlist">
                                                                    <div className="yith-wcwl-add-button show">
                                                                        <a href="#" className="add_to_wishlist">
                                                                            Add to Wishlist
                                                                        </a>
                                                                    </div>
                                                                </div>
                                                                <div className="akasha product compare-button">
                                                                    <a href="#" className="compare button">
                                                                        Compare
                                                                    </a>
                                                                </div>
                                                                <a href="#" className="button yith-wcqv-button">
                                                                    Quick View
                                                                </a>
                                                                <div className="add-to-cart">
                                                                    <a
                                                                        href="#"
                                                                        className="button product_type_simple add_to_cart_button ajax_add_to_cart"
                                                                    >
                                                                        Add to cart
                                                                    </a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div className="product-info equal-elem">
                                                            <h3 className="product-name product_title">
                                                                <a href="#">Dining Accessories</a>
                                                            </h3>
                                                            <div className="rating-wapper ">
                                                                <div className="star-rating">
                                                                    <span style={{ width: "100%" }}>
                                                                        Rated <strong className="rating">5.00</strong> out
                                                                        of 5
                                                                    </span>
                                                                </div>
                                                                <span className="review">(1)</span>
                                                            </div>
                                                            <span className="price">
                                                                <span className="akasha-Price-amount amount">
                                                                    <span className="akasha-Price-currencySymbol">$</span>
                                                                    207.00
                                                                </span>
                                                            </span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div className="product-item featured_products style-01 rows-space-30 col-bg-3 col-xl-3 col-lg-4 col-md-4 col-sm-6 col-ts-6 post-25 product type-product status-publish has-post-thumbnail product_cat-light product_cat-chair product_cat-specials product_tag-light product_tag-sock last instock sale featured shipping-taxable purchasable product-type-simple">
                                                    <div className="product-inner tooltip-left">
                                                        <div className="product-thumb">
                                                            <a className="thumb-link" href="#">
                                                                <img
                                                                    className="img-responsive"
                                                                    src="assets/images/apro151-1-270x350.jpg"
                                                                    alt="Utility Pockets"
                                                                    width={270}
                                                                    height={350}
                                                                />
                                                            </a>
                                                            <div className="flash">
                                                                <span className="onsale">
                                                                    <span className="number">-11%</span>
                                                                </span>
                                                                <span className="onnew">
                                                                    <span className="text">New</span>
                                                                </span>
                                                            </div>
                                                            <div className="group-button">
                                                                <div className="yith-wcwl-add-to-wishlist">
                                                                    <div className="yith-wcwl-add-button show">
                                                                        <a href="#" className="add_to_wishlist">
                                                                            Add to Wishlist
                                                                        </a>
                                                                    </div>
                                                                </div>
                                                                <div className="akasha product compare-button">
                                                                    <a href="#" className="compare button">
                                                                        Compare
                                                                    </a>
                                                                </div>
                                                                <a href="#" className="button yith-wcqv-button">
                                                                    Quick View
                                                                </a>
                                                                <div className="add-to-cart">
                                                                    <a
                                                                        href="#"
                                                                        className="button product_type_simple add_to_cart_button ajax_add_to_cart"
                                                                    >
                                                                        Add to cart
                                                                    </a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div className="product-info equal-elem">
                                                            <h3 className="product-name product_title">
                                                                <a href="#">Utility Pockets</a>
                                                            </h3>
                                                            <div className="rating-wapper nostar">
                                                                <div className="star-rating">
                                                                    <span style={{ width: "0%" }}>
                                                                        Rated <strong className="rating">0</strong> out of 5
                                                                    </span>
                                                                </div>
                                                                <span className="review">(0)</span>
                                                            </div>
                                                            <span className="price">
                                                                <del>
                                                                    <span className="akasha-Price-amount amount">
                                                                        <span className="akasha-Price-currencySymbol">
                                                                            $
                                                                        </span>
                                                                        89.00
                                                                    </span>
                                                                </del>{" "}
                                                                <ins>
                                                                    <span className="akasha-Price-amount amount">
                                                                        <span className="akasha-Price-currencySymbol">
                                                                            $
                                                                        </span>
                                                                        79.00
                                                                    </span>
                                                                </ins>
                                                            </span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            {/* OWL Products */}
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

export default Product;