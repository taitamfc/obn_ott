import React, { useState } from "react";
import axios from "axios";
import { useNavigate } from "react-router-dom";
import { useDispatch, useSelector } from "react-redux";
import { SET_SEARCH } from "../../redux/action";
function Search() {
  const [search, setSearch] = useState("");
  const navigate = useNavigate();
  const dispatch = useDispatch();

  const handleClickSearch = async (event) => {
    event.preventDefault();

    try {
      dispatch({
        type:SET_SEARCH,
        payload: search
      });
      navigate("/shop?s="+search);
    } catch (error) {
      console.error("error:", error.message);
    }
  };

  const handleChangeSearch = (event) => {
    setSearch(event.target.value);
  };

  return (
    <div className="col-lg-7 col-sm-8 col-md-6 col-xs-5 col-ts-12">
      <div className="block-search-block">
        <form className="form-search form-search-width-category" onSubmit={handleClickSearch}>
          <div className="form-content">
            <div className="category"></div>
            <div className="inner">
              <input
                type="text"
                className="input"
                name="s"
                value={search}
                onChange={handleChangeSearch}
                placeholder="Tìm kiếm tại đây"
              />
            </div>
            <button className="btn-search" type="submit">
              <span className="icon-search" id="123" />
            </button>
          </div>
        </form>
      </div>
    </div>
  );
}

export default Search;