import { BrowserRouter, Routes, Route } from "react-router-dom";
import Login from "./components/Login";
import { Provider } from "react-redux";
import store from "./components/redux/store";
import Cart from "./components/cart/Cart";
import User from "./components/User";

function App() {
  return (
    <Provider store={store}>
      <BrowserRouter>
        <Routes>
          {/* <Route path="/" element={<Cart/>} /> */}
          <Route path="/" element={<Login/>} />
          <Route path="/User" element={<User/>} />
        </Routes>
      </BrowserRouter>
    </Provider>
  );
}
export default App;