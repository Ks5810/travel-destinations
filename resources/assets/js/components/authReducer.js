/**
 * auth.js
 * @author [Aisha Khoja, Keisuke Suzuki, Tommi Ann Tsuruga ](https://github.com/aishak7, https://github.com/Ks5810, https://github.com/tommi-tsuruga)
 */

import {
    AUTH_ERROR, LOGIN_FAIL, LOGIN_SUCCESS, LOGOUT_SUCCESS, REGISTER_FAIL,
    REGISTER_SUCCESS, USER_LOADED, USER_LOADING
} from "../actions/types";
// Auth Reducer

export const authDefaultReducer = {
    isAuthenticated: false,
    isLoading: false,
    user: null,
};

export default (state = authDefaultReducer, action) => {
    switch (action.type) {
        case USER_LOADING:
            return { ...state, isLoading: true };

        case USER_LOADED:
            return {
                ...state,
                isAuthenticated: true,
                isLoading: false,
                user: action.payload
            };
        case LOGIN_SUCCESS:
            return {
                ...state,
                ...action.payload,
                isAuthenticated: true,
                isLoading: false,
                errors: null,
                user: action.payload
            };
        case REGISTER_SUCCESS:
            return {
                ...state,
                ...action.payload,
                isAuthenticated: true,
                isLoading: false,
                errors: null,
                user: action.payload
            };
        case LOGOUT_SUCCESS:
            return {
                ...state,
                errors: action.payload,
                token: null,
                user: null,
                isAuthenticated: false,
            };
        case AUTH_ERROR:
        case LOGIN_FAIL:
        case REGISTER_FAIL:
            return {
                ...state,
                token: null,
                user: null,
                isAuthenticated: false,
                isLoading: false
            };

        default:
            return state;
    }
};