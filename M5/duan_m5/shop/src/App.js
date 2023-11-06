import logo from './logo.svg';
import './App.css';
import Checkout from './pages/Checkout';
import { Route, Routes } from 'react-router-dom';
import Cart from './pages/Cart';
import Product from './pages/Product';
import Contact from './pages/Contact';
import Category from './pages/Category';
import Home from './pages/Home';
import Detail from './pages/Detail';
import Login from './pages/Login';

function App() {
  return (
    <>
    <Routes>
      <Route path="/"element={<Home/>}/>
      <Route path="/Checkout"element={<Checkout/>}/>
      <Route path="/Cart"element={<Cart/>}/>
      <Route path="/Contact"element={<Contact/>}/>
      <Route path="/Detail/:id"element={<Detail/>}/>
      <Route path="/Login"element={<Login/>}/>
    </Routes>
    </>
   );
 }

export default App;
