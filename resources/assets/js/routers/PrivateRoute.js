import React from 'react';
import { Redirect, Route } from 'react-router-dom';
import { store } from "../components/store";
import { useSelector } from "react-redux";



const PrivateRoute = ({
    component: Component,
    ...rest
}) =>
{
    const isAuthenticated = useSelector((state) => state.auth.isAuthenticated);
    const isLoading = useSelector(state => state.auth.isLoading);
    return(
    <>
        {
            isLoading ? <h3>Loading User...</h3> : (
                <Route { ...rest } component={ (props) => (
                    isAuthenticated ? (
                        <div className="page">
                            <Component { ...props } />
                        </div>
                    ) : (
                        <Redirect to="/login"/>
                    )
                ) }/>)
        }
        
    </>
    )
};

export default PrivateRoute;

