import axios from "axios";
import {
  FETCH_USER_DATA_START,
  FETCH_USER_DATA_SUCCESS,
  FETCH_USER_DATA_ERROR,
} from "./types";

const apiUrl = "https://64bf41e95ee688b6250d3536.mockapi.io/hiiii/user";

export const fetchUserDataStart = () => ({
  type: FETCH_USER_DATA_START,
});

export const fetchUserDataSuccess = (userData) => ({
  type: FETCH_USER_DATA_SUCCESS,
  payload: userData,
});

export const fetchUserDataError = (error) => ({
  type: FETCH_USER_DATA_ERROR,
  payload: error,
});

export const fetchUserData = () => {
  return (dispatch) => {
    dispatch(fetchUserDataStart());
    axios
      .get(apiUrl)
      .then((response) => {
        dispatch(fetchUserDataSuccess(response.data));
      })
      .catch((error) => {
        dispatch(fetchUserDataError(error.message));
      });
  };
};