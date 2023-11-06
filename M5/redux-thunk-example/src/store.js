import { createStore, applyMiddleware, combineReducers } from "redux";
import thunk from "redux-thunk";
import userReducer from "./reducers/userReducer";

const rootReducer = combineReducers({
  user: userReducer,
});

const middleware = applyMiddleware(thunk);

const store = createStore(rootReducer, middleware);

export default store;