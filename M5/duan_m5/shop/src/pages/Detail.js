import React, { useEffect, useState } from 'react';
import LayoutMaster from '../layouts/LayoutMaster';
import ProductModel from '../models/ProductModel';
import { useParams } from 'react-router-dom';
import { useDispatch, useSelector } from 'react-redux';
import { SET_CART } from '../redux/action';
import Swal from 'sweetalert2';


function Detail(props) {
  const url = 'http://127.0.0.1:8000/';
  const cart = useSelector((state) => state.cart);
  const dispatch = useDispatch();
  const { id } = useParams();
  const [count, setCount] = useState(1);
  const [product, setProduct] = useState({
    name: "",
    price: "",
    description: "",
    image: "",
  });
  useEffect(() => {
    ProductModel.getProductById(id).then((res) => {
      setProduct(res.data)
      console.log(res.data);
    })
  }, [])

  const handleAddToCart = () => {
    let item = {
      product_id: id,
      quantity: count,
      product: product,
    };
    let update = false;
    for (let index = 0; index < cart.length; index++) {
      const element = cart[index];
      if (element.product_id == id) {
        update = true;
        cart[index].quantity = cart[index].quantity + count;
      }
    }
    if (update) {
      var newCart = [...cart];
    } else {
      var newCart = [...cart, item];
    }
    localStorage.setItem("cart", JSON.stringify(newCart));
    dispatch({ type: SET_CART, payload: newCart });
    Swal.fire({
      position: 'center',
      icon: 'success',
      title: 'Thêm vào giỏ hàng thành công!',
      showConfirmButton: false,
      timer: 2000 // Adjust the time (in milliseconds) the notification will be shown
    });
  };




  return (
    <LayoutMaster>


        <div className="banner-wrapper no_background">
          <div className="banner-wrapper-inner">
            <nav className="akasha-breadcrumb">
              <a href="/">Home</a>
              <i className="fa fa-angle-right" />
              <a href="#">Shop</a>
              <i className="fa fa-angle-right" />
              Single Product
            </nav>
          </div>
        </div>
        <div className="single-thumb-vertical main-container shop-page no-sidebar">
          <div className="container">
            <div className="row">
              <div className="main-content col-md-12">
                <div className="akasha-notices-wrapper" />
                <div
                  id="product-27"
                  className="post-27 product type-product status-publish has-post-thumbnail product_cat-table product_cat-new-arrivals product_cat-lamp product_tag-table product_tag-sock first instock shipping-taxable purchasable product-type-variable has-default-attributes"
                >
                  <div className="main-contain-summary">
                    <div className="contain-left has-gallery">
                      <div className="single-left">
                        <div className="akasha-product-gallery akasha-product-gallery--with-images akasha-product-gallery--columns-4 images">
                          <a href="#" className="akasha-product-gallery__trigger">
                            <img
                              draggable="false"
                              className="emoji"
                              alt="🔍"
                              src="https://s.w.org/images/core/emoji/11/svg/1f50d.svg"
                            />
                          </a>
                          <div className="flex-viewport">
                            <figure className="akasha-product-gallery__wrapper">

                              <div className="akasha-product-gallery__image">
                                <img src={url + product.image} alt="img" />
                              </div>

                            </figure>
                          </div>

                        </div>
                      </div>
                      <div className="summary entry-summary">
                        <div className="flash">
                          <span className="onnew">
                            <span className="text">New</span>
                          </span>
                        </div>
                        <h1 className="product_title entry-title">
                          {product.name}
                        </h1>
                        <p className="price">
                          <span className="akasha-Price-amount amount">
                            <span className="akasha-Price-currencySymbol"></span>
                            {product.price}
                          </span>{" VND"}
                         
                        </p>
                        <p className="stock in-stock">
                          Availability: <span> In stock</span>
                        </p>
                        <div className="akasha-product-details__short-description">
                          <div dangerouslySetInnerHTML={{ __html: product.description }} />

                          <ul>
                            <li>
                              Water-resistant fabric with soft lycra detailing inside
                            </li>
                            <li>CLean zip-front, and three piece hood</li>
                            <li>Subtle branding and diagonal panel detail</li>
                          </ul>
                        </div>

                        <form className="variations_form cart">
                          <div className="single_variation_wrap">
                            <div className="akasha-variation single_variation" />
                            <div className="akasha-variation-add-to-cart variations_button akasha-variation-add-to-cart-disabled">
                           
                              
                              <button
                              type='button'
                                onClick={handleAddToCart}
                                className="btn btn-primary px-3"
                              >
                                <i className="fa fa-shopping-cart mr-1" /> Add To Cart
                              </button>
                            </div>
                          </div>
                        </form>
                        <div className="yith-wcwl-add-to-wishlist">
                          <div className="yith-wcwl-add-button show">
                            <a
                              href="#"
                              rel="nofollow"
                              data-product-id={27}
                              data-product-type="variable"
                              className="add_to_wishlist"
                            >
                              Add to Wishlist
                            </a>
                          </div>
                        </div>
                        <div className="clear" />
                        <a
                          href="#"
                          className="compare button"
                          data-product_id={27}
                          rel="nofollow"
                        >
                          Compare
                        </a>
                        <div className="product_meta">
                          <div className="wcml-dropdown product wcml_currency_switcher">
                            <ul>
                              <li className="wcml-cs-active-currency">
                                <a className="wcml-cs-item-toggle">USD</a>
                                <ul className="wcml-cs-submenu">
                                  <li>
                                    <a>EUR</a>
                                  </li>
                                </ul>
                              </li>
                            </ul>
                          </div>
                          <span className="sku_wrapper">
                            SKU: <span className="sku">885B712</span>
                          </span>
                          <span className="posted_in">
                            Categories:{" "}
                            <a href="#" rel="tag">
                              Bags
                            </a>
                            ,{" "}
                            <a href="#" rel="tag">
                              New arrivals
                            </a>
                            ,{" "}
                            <a href="#" rel="tag">
                              Summer Sale
                            </a>
                          </span>
                          <span className="tagged_as">
                            Tags:{" "}
                            <a href="#" rel="tag">
                              Bags
                            </a>
                            ,{" "}
                            <a href="#" rel="tag">
                              Sock
                            </a>
                          </span>
                        </div>
                        <div className="akasha-share-socials">
                          <h5 className="social-heading">Share: </h5>
                          <a target="_blank" className="facebook" href="#">
                            <i className="fa fa-facebook-f" />
                          </a>
                          <a target="_blank" className="twitter" href="#">
                            <i className="fa fa-twitter" />
                          </a>
                          <a target="_blank" className="pinterest" href="#">
                            {" "}
                            <i className="fa fa-pinterest" />
                          </a>
                          <a target="_blank" className="googleplus" href="#">
                            <i className="fa fa-google-plus" />
                          </a>
                        </div>
                      </div>
                    </div>
                  </div>

                </div>
              </div>


            </div>
          </div>
        </div>
      

    </LayoutMaster>

  );
}

export default Detail;


