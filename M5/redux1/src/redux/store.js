import { applyMiddleware, combineReducers, createStore } from "redux";
import { counterReducer } from "./countReducer"
import { todosReducer } from "./todosReducer"
import { increaseCount } from "./actions";
const rootReducer = combineReducers({
    count: counterReducer,
    todos: todosReducer,
})

const middleware = (store) => (next) => (action) =>{
//    console.log('middleware', {store, action, next})
   console.log('action', action);
   if(action.type === 'INCREASE_COUNT'){
    action.payload = 100
   }
    next(action)    
}

export const store = createStore(rootReducer, applyMiddleware(middleware))












// if(action.payload?.name?.includes('aaa')){
//     next({
//         type:action.type,
//         payload: {
//             ...action.payload,
//             name:'***'
//         }
//     })
// }else{
//     next(action)
// }