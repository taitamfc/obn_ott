import React, { useEffect } from "react";
import { useDispatch, useSelector } from "react-redux";
import { fetchUserData } from "./actions/userActions";

const App = () => {
  const dispatch = useDispatch();
  const { loading, userData, error } = useSelector((state) => state.user);

  useEffect(() => {
    dispatch(fetchUserData());
  }, [dispatch]);

  return (
    <div>
      {loading ? (
        <p>Loading...</p>
      ) : error ? (
        <p>Error: {error}</p>
      ) : userData ? (
        <div>
          <h1>{userData.name}</h1>
          <p>name: {userData.name}</p>
          <p>price: {userData.price}</p>
        </div>
      ) : null}
    </div>
  );
};

export default App;