import axios from 'axios'
import {
    AUTH_ERROR, LOGIN_FAIL, LOGIN_SUCCESS, LOGOUT_SUCCESS, REGISTER_FAIL,
    REGISTER_SUCCESS, USER_LOADED, USER_LOADING, TIMEOUT
} from "./types";
import { returnErrors } from "./messages";
import { requestConfig } from "../lib";

export const loadUser = () => (dispatch, getState) => {
    dispatch({ type: USER_LOADING });
    axios("/api/auth/user", requestConfig(getState))
        .then(res => setTimeout(() =>
             dispatch({ type: USER_LOADED, payload: res.data}), TIMEOUT ))
        .catch(err => {
            console.log(err);
            dispatch(returnErrors(err.response.data, err.status));
            dispatch({ type: AUTH_ERROR });
        })
};

export const login = (email, password) => (dispatch, getState) => {
    dispatch({ type: USER_LOADING });
    const params = { email, password };
    console.log("login() in actions/action called");
    axios.post("/api/auth/login", params, requestConfig(getState))
         .then(res => {
             setTimeout(() => dispatch({ type: LOGIN_SUCCESS, payload: res.data }), TIMEOUT)
         })
         .catch(err => console.log(err));
};

export const logout = () => (dispatch, getState) => {
    dispatch({ type: USER_LOADING });
    axios.get("/api/auth/logout", requestConfig(getState))
         .then(res => setTimeout(() => dispatch(
             { type: LOGOUT_SUCCESS, payload: res.data }), TIMEOUT))
         .catch(err => dispatch(returnErrors(err.response.data, err.status)) );
};

export const register = (username, email, password) => (dispatch, getState) => {
    dispatch({ type: USER_LOADING });
    const params = { name: username, email, password };
    axios.post("/api/auth/register", params, requestConfig(getState))
         .then(res => setTimeout(() => dispatch(
             { type: REGISTER_SUCCESS, payload: res.data }), TIMEOUT))
         .catch(err => {
             dispatch(returnErrors(err.response.data, err.status));
             dispatch({ type: REGISTER_FAIL });
         });
};

