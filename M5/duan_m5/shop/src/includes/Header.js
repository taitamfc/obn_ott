import React, { useState } from "react";
import { useSelector } from "react-redux";
import { Link } from "react-router-dom";
import Search from "../components/header/Search";
function Header(props) {
    const cart = useSelector((state) => state.cart);
    return (
        <>
            <header id="header" className="header style-02 header-dark">
                <div className="header-wrap-stick">
                    <div className="header-position">
                        <div className="header-middle">
                            <div className="akasha-menu-wapper" />
                            <div className="header-middle-inner">
                                <div className="header-search-menu">
                                    <div className="block-menu-bar">
                                        <a className="menu-bar menu-toggle" href="#">
                                            <span />
                                            <span />
                                            <span />
                                        </a>
                                    </div>
                                </div>
                                <div className="header-logo-nav">
                                    <div className="header-logo">
                                        <Link to="/">
                                            <img
                                                alt="Akasha"
                                                src="assets/images/logo.png"
                                                className="logo"
                                                />
                                        </Link>
                                    </div>
                                    <div className="box-header-nav menu-nocenter">
                                        <ul
                                            id="menu-primary-menu"
                                            className="clone-main-menu akasha-clone-mobile-menu akasha-nav main-menu"
                                            >
                                            <li
                                                id="menu-item-230"
                                                className="menu-item menu-item-type-post_type menu-item-object-megamenu menu-item-230 parent parent-megamenu item-megamenu menu-item-has-children"
                                                >
                                                <a
                                                    className="akasha-menu-item-title"
                                                    title="Home"
                                                    href="/"
                                                    >
                                                    Home
                                                </a>
                                                <span className="toggle-submenu" />
                                             
                                            </li>
                                            <li
                                                id="menu-item-228"
                                                className="menu-item menu-item-type-post_type menu-item-object-megamenu menu-item-228 parent parent-megamenu item-megamenu menu-item-has-children"
                                            >
                                                <a
                                                    className="akasha-menu-item-title"
                                                    title="Shop"
                                                    href="shop.html"
                                                >
                                                    Shop
                                                </a>
                                                <span className="toggle-submenu" />
                                              
                                            </li>
                                            <li
                                                id="menu-item-229"
                                                className="menu-item menu-item-type-post_type menu-item-object-megamenu menu-item-229 parent parent-megamenu item-megamenu menu-item-has-children"
                                            >
                                                <a
                                                    className="akasha-menu-item-title"
                                                    title="Elements"
                                                    href="#"
                                                >
                                                    Elements
                                                </a>
                                                
                                                <span className="toggle-submenu" />
                                              
                                            </li>
                                            <li
                                                id="menu-item-996"
                                                className="menu-item menu-item-type-post_type menu-item-object-megamenu menu-item-996 parent parent-megamenu item-megamenu menu-item-has-children"
                                            >
                                                <a
                                                    className="akasha-menu-item-title"
                                                    title="Blog"
                                                    href="blog.html"
                                                >
                                                    Blog
                                                </a>
                                                <span className="toggle-submenu" />
                                            
                                            </li>
                                            <li
                                                id="menu-item-237"
                                                className="menu-item menu-item-type-custom menu-item-object-custom menu-item-has-children menu-item-237 parent"
                                            >
                                                <a
                                                    className="akasha-menu-item-title"
                                                    title="Pages"
                                                    href="#"
                                                >
                                                    Pages
                                                </a>
                                                <span className="toggle-submenu" />
                                             
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <div className="header-control">
                                    <div className="header-control-inner">
                                        <div className="meta-dreaming">
                                            <ul className="wpml-menu">
                                                <li className="menu-item akasha-dropdown block-language">
                                                    <a href="#" data-akasha="akasha-dropdown">
                                                        <img src="assets/images/en.png" alt="en" />
                                                        English
                                                    </a>
                                                    <span className="toggle-submenu" />
                                                    <ul className="sub-menu">
                                                        <li className="menu-item">
                                                            <a href="#">
                                                                <img src="assets/images/it.png" alt="it" />
                                                                Italiano
                                                            </a>
                                                        </li>
                                                    </ul>
                                                </li>
                                                <li className="menu-item">
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
                                                </li>
                                            </ul>
                                            <div className="header-search akasha-dropdown">
                                                <div
                                                    className="header-search-inner"
                                                    data-akasha="akasha-dropdown"
                                                >
                                                    <a href="#" className="link-dropdown block-link">
                                                        <span className="flaticon-magnifying-glass-1" />
                                                    </a>
                                                </div>
                                                <div className="block-search">
                                                    <form
                                                        role="search"
                                                        method="get"
                                                        className="form-search block-search-form akasha-live-search-form"
                                                    >
                                                        <div className="form-content search-box results-search">
                                                            <div className="inner">
                                                                <input
                                                                    autoComplete="off"
                                                                    className="searchfield txt-livesearch input"
                                                                    name="s"
                                                                    defaultValue=""
                                                                    placeholder="Search here..."
                                                                    type="text"
                                                                />
                                                            </div>
                                                        </div>
                                                        <div className="category">
                                                            
                                                        </div>
                                                        <button type="submit" className="btn-submit">
                                                            <span className="flaticon-magnifying-glass-1" />
                                                        </button>
                                                    </form>
                                                    {/* block search */}
                                                </div>
                                            </div>
                                            <div className="akasha-dropdown-close">x</div>
                                            <div className="menu-item block-user block-dreaming akasha-dropdown">
                                                <a className="block-link" href="#">
                                                    <span className="flaticon-profile" />
                                                </a>
                                                <ul className="sub-menu">
                                                  
                                                    <li className="menu-item akasha-MyAccount-navigation-link akasha-MyAccount-navigation-link--customer-logout">
                                                        <Link to="/login">Logout</Link>
                                                    </li>
                                                </ul>
                                            </div>
                                            <div className="block-minicart block-dreaming akasha-mini-cart akasha-dropdown">
                                                <div
                                                    className="shopcart-dropdown block-cart-link"
                                                    data-akasha="akasha-dropdown"
                                                >
                                                    <Link className="block-link link-dropdown" to="/cart">
                                                        <span className="flaticon-bag" />
                                                        <span className="count">{cart.length}</span>
                                                    </Link>
                                                </div>
                                             
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div className="header-mobile">
                    <div className="header-mobile-left">
                        <div className="block-menu-bar">
                            <a className="menu-bar menu-toggle" href="#">
                                <span />
                                <span />
                                <span />
                            </a>
                        </div>
                        <div className="header-search akasha-dropdown">
                            <div className="header-search-inner" data-akasha="akasha-dropdown">
                                <a href="#" className="link-dropdown block-link">
                                    <span className="flaticon-magnifying-glass-1" />
                                </a>
                            </div>
                            <div className="block-search">
                                <form
                                    role="search"
                                    method="get"
                                    className="form-search block-search-form akasha-live-search-form"
                                >
                                    <div className="form-content search-box results-search">
                                        <div className="inner">
                                            <input
                                                autoComplete="off"
                                                className="searchfield txt-livesearch input"
                                                name="s"
                                                defaultValue=""
                                                placeholder="Search here..."
                                                type="text"
                                            />
                                        </div>
                                    </div>
                                  
                                    <button type="submit" className="btn-submit">
                                        <span className="flaticon-magnifying-glass-1" />
                                    </button>
                                </form>
                                {/* block search */}
                            </div>
                        </div>
                        
                        <ul className="wpml-menu">
                            <li className="menu-item akasha-dropdown block-language">
                                <a href="#" data-akasha="akasha-dropdown">
                                    <img src="assets/images/en.png" alt="en" />
                                    English
                                </a>
                                <span className="toggle-submenu" />
                                <ul className="sub-menu">
                                    <li className="menu-item">
                                        <a href="#">
                                            <img src="assets/images/it.png" alt="it" />
                                            Italiano
                                        </a>
                                    </li>
                                </ul>
                            </li>
                            <li className="menu-item">
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
                            </li>
                        </ul>
                    </div>
               
               
                </div>
            </header>
        </>

    );
}

export default Header;
