import {
    FETCH_USER_DATA_START,
    FETCH_USER_DATA_SUCCESS,
    FETCH_USER_DATA_ERROR,
  } from "../actions/types";
  
  const initialState = {
    loading: false,
    userData: null,
    error: null,
  };
  
  const userReducer = (state = initialState, action) => {
    switch (action.type) {
      case FETCH_USER_DATA_START:
        return {
          ...state,
          loading: true,
          userData: null,
          error: null,
        };
      case FETCH_USER_DATA_SUCCESS:
        return {
          ...state,
          loading: false,
          userData: action.payload,
          error: null,
        };
      case FETCH_USER_DATA_ERROR:
        return {
          ...state,
          loading: false,
          userData: null,
          error: action.payload,
        };
      default:
        return state;
    }
  };
  
  export default userReducer;