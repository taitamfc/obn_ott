    import React from 'react';
    import { useDispatch, useSelector } from 'react-redux';
    import { SET_CART } from '../redux/action';
    function Cart() {
    const cart = useSelector(state => state.cart);
    const dispatch = useDispatch();
    const handleSubmit = () => {
        // alert(123);
        let newcart = [...cart];
        newcart.push("toan","ly","hoa")
        dispatch({
            type: SET_CART,
            payload: newcart
        })
    }
    return (
        <div>
        <h1>Cart Items:</h1>
        <h2>{cart}</h2>
        <button onClick={handleSubmit}>submit</button>
        {/* <ul>
            {cart.map(item => (
            <li key={item}>{item}</li>
            ))}
        </ul> */}
        </div>
    );
    }
    export default Cart;