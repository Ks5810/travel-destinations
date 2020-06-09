import { applyMiddleware, combineReducers, compose, createStore } from "redux";
import authReducer from "./authReducer";
import thunk from "redux-thunk";

const composeEnhancers = (typeof window !== 'undefined' &&
                          window.__REDUX_DEVTOOLS_EXTENSION_COMPOSE__) || compose;

export const store = createStore(
    combineReducers({
        auth: authReducer,
    }),
    composeEnhancers(applyMiddleware(thunk))
);

export default store;