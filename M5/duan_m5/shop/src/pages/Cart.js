import React, { useState, useEffect } from "react";
import { useDispatch, useSelector } from "react-redux";
import LayoutMaster from "../layouts/LayoutMaster";
import { SET_CART } from "../redux/action";
import { Link, useNavigate, useParams } from "react-router-dom";
import { NumericFormat } from "react-number-format";
import Swal from 'sweetalert2';
import Bannerwrapper from "../components/global/Bannerwrapper";

function Cart(props) {
  const url = 'http://127.0.0.1:8000/';
  
  
  const cart = useSelector((state) => state.cart);
  const dispatch = useDispatch();
  const [cartTotal, setCartTotal] = useState(0);
  const [isRemoving, setIsRemoving] = useState(false);
  const [alertMessage, setAlertMessage] = useState("");
  const navigate = useNavigate();
  const { id } = useParams();

  useEffect(() => {
    let total = 0;
    cart.forEach((cartItem) => {
      total += cartItem.product.price * cartItem.quantity;
    });
    setCartTotal(total);
  }, [cart]);

  const handleQuantityChange = (e) => {
    const id = e.target.id;
    const qty = e.target.value;
    const newCart = [...cart];
    if (newCart[id]) {
      newCart[id].quantity = qty;
      localStorage.setItem("cart", JSON.stringify(newCart));
      dispatch({
        type: SET_CART,
        payload: newCart,
      });
    }
  };

  const handleRemove = (index) => {
    Swal.fire({
      title: 'Are you sure?',
      text: 'You are about to remove this item from the cart.',
      icon: 'warning',
      showCancelButton: true,
      confirmButtonText: 'Yes, remove it!',
      cancelButtonText: 'Cancel',
      reverseButtons: true,
    }).then((result) => {
      if (result.isConfirmed) {
        const newCart = [...cart];
        newCart.splice(index, 1);
        localStorage.setItem("cart", JSON.stringify(newCart));
        dispatch({
          type: SET_CART,
          payload: newCart,
        });
        setIsRemoving(true);
        Swal.fire('Removed!', 'The item has been removed from the cart.', 'success');
      }
    });
  };
  const handleUpdateCart = (index, quantity) => {
    const newCart = [...cart];
    newCart[index].quantity = quantity;
    localStorage.setItem("cart", JSON.stringify(newCart));
    dispatch({
      type: SET_CART,
      payload: newCart,
    });
  };

  const handleDecreaseQuantity = (index) => {
    const newCart = [...cart];
    if (newCart[index].quantity > 1) {
      newCart[index].quantity--;
      handleUpdateCart(index, newCart[index].quantity);
    }
  };

  const handleIncreaseQuantity = (index) => {
    const newCart = [...cart];
    newCart[index].quantity++;
    handleUpdateCart(index, newCart[index].quantity);
  };


  const handleLogoutOrSwitchAccount = () => {
    dispatch({
      type: SET_CART,
      payload: [], // Set an empty array to clear the cart
    });
  };

  return (
    <LayoutMaster>
      <>
      <Bannerwrapper
         pageTitle="Home"
         pageSubTitle="Cart"
        />
        <div className="container-fluid">
          <div className="row px-xl-5">
            <div className="col-12">
              <nav className="breadcrumb bg-light mb-30">
                <a className="breadcrumb-item text-dark" href="#">
                  Home
                </a>
                <a className="breadcrumb-item text-dark" href="#">
                  Shop
                </a>
                <span className="breadcrumb-item active">Shopping Cart</span>
              </nav>
            </div>
          </div>
        </div>
        <div className="container-fluid">
          <div className="row px-xl-5">
            <div className="col-lg-8 table-responsive mb-5">
              <table className="table table-light table-borderless table-hover text-center mb-0">
                <thead className="thead-dark">
                  <tr>
                    <th>Image</th>
                    <th>Product</th>
                    <th>Price</th>
                    <th>Quantity</th>
                    <th>Total</th>
                    <th>Remove</th>
                  </tr>
                </thead>
                <tbody className="align-middle">
                  {cart.map((CartItem, index) => (
                    <tr key={index}>
                      <td className="align-middle">
                        <img
                          src={url + CartItem.product.image}
                          alt={CartItem.product.name}
                          style={{ width: 100 }}
                        />
                      </td>
                      <td className="align-middle">
                        {CartItem.product.name}
                      </td>
                      <td className="align-middle">
                        <NumericFormat
                          value={CartItem.product.price}
                          allowLeadingZeros
                          thousandSeparator="."
                          decimalSeparator=","
                          displayType="text"
                        />{" "}
                        VND
                      </td>
                      <td className="align-middle">
                        <div
                          className="input-group quantity mx-auto"
                          style={{ width: 100 }}
                        >
                          <div className="akasha-variation-add-to-cart variations_button akasha-variation-add-to-cart-disabled">
                            <div className="quantity">
                              <span className="qty-label">Quantity:</span>
                              <div className="control">
                              <a
                        className="btn-number qtyminus quantity-minus"
                        href="#"
                        onClick={() => handleDecreaseQuantity(index)}
                      >
                        -
                      </a>
                      <input
                        type="text"
                        data-step={1}
                        min={0}
                        max=""
                        name="quantity[25]"
                        value={CartItem.quantity}
                        title="Qty"
                        className="input-qty input-text qty text"
                        size={4}
                        pattern="[0-9]*"
                        inputMode="numeric"
                        onChange={(e) => handleQuantityChange(e, index)} // Add index to identify the cart item
                      />
                      <a
                        className="btn-number qtyplus quantity-plus"
                        href="#"
                        onClick={() => handleIncreaseQuantity(index)}
                      >
                        +
                      </a>
                              </div>
                            </div>
                          </div>
                        </div>
                      </td>
                      <td className="align-middle">
                        <NumericFormat
                          value={CartItem.product.price * CartItem.quantity}
                          allowLeadingZeros
                          thousandSeparator="."
                          decimalSeparator=","
                          displayType="text"
                        />{" "}
                        VND
                      </td>

                      {/* <td className="align-middle">
                        <button
                          onClick={() => handleRemove(index)}
                          className="btn btn-sm btn-danger"
                        >
                          <i className="fa fa-times" />
                        </button>
                      </td> */}

                      <td class="align-middle" width="100px">
                        
                            <div class="d-flex justify-content-center align-items-center">
                               

                                <button onClick={() => handleRemove(index)}  class="btn btn-danger btn-sm remove-from-cart" data-id="{{ $id }}"><i
                                        class="fa fa-trash"></i></button>
                            </div>
                            
                        </td>
                    </tr>
                  ))}
                </tbody>
              </table>
            </div>
            <div className="col-lg-4">
              <form className="mb-30" action="">
                <div className="input-group">
                  <input
                    type="text"
                    className="form-control border-0 p-4"
                    placeholder="Coupon Code"
                  />
                  <div className="input-group-append">
                    <button className="btn btn-primary">Apply Coupon</button>
                  </div>
                </div>
              </form>
              <h5 className="section-title position-relative text-uppercase mb-3">
                <span className="bg-secondary pr-3">Cart Summary</span>
              </h5>
              <div className="bg-light p-30 mb-5">
                <div className="border-bottom pb-2">
                  <div className="d-flex justify-content-between mb-3">
                    <h6>Subtotal</h6>
                    <h6>5.000 VND</h6>
                  </div>
                  <div className="d-flex justify-content-between">
                    <h6 className="font-weight-medium">Shipping</h6>
                    <h6 className="font-weight-medium">15.000 VND</h6>
                  </div>
                </div>
                <div className="pt-2">
                  <div className="d-flex justify-content-between mt-2">
                    <h5>Total</h5>
                    <h5>
                      <NumericFormat
                        value={cartTotal}
                        allowLeadingZeros
                        thousandSeparator="."
                        decimalSeparator=","
                        displayType="text"
                      />{" "}VND
                    </h5>
                  </div>
                  <Link to="/checkout" className="btn btn-block btn-primary font-weight-bold my-3 py-3">
                    Proceed To Checkout
                  </Link>
                </div>
              </div>
            </div>
          </div>
        </div>
      </>
    </LayoutMaster>
  );
}

export default Cart;