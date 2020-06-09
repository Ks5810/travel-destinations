/**
 * LoginPage.js
 * @author [Aisha Khoja, Keisuke Suzuki, Tommi Ann Tsuruga
 *     ](https://github.com/aishak7, https://github.com/Ks5810,
 *     https://github.com/tommi-tsuruga)
 */
import React, { useContext, useReducer } from "react";
import { login } from "../../actions/auth";
import AccountFrom from "./AccountFrom";
import { store } from "../store";
import { useDispatch } from "react-redux";


export const LoginPage = () =>
{
    const dispatch = useDispatch();
    return (
        <div className="section">
            <AccountFrom
                btnText="Login"
                link="/register"
                onSubmit={ ({ email, password }) =>
                {
                    dispatch(login(email, password))
                } }
            />
        </div>
    )
};

export default LoginPage;
