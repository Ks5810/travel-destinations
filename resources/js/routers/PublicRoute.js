import React from 'react';
import { Redirect, Route } from 'react-router-dom';
import { Container } from "react-bootstrap";
import { store } from "../components/store";
import { useSelector } from "react-redux";

const PublicRoute = ({
    component: Component,
    ...rest
}) =>
{
    const isAuthenticated = useSelector((state) => !!state.auth.user);
    const isLoading = useSelector(state => state.auth.isLoading);
    return (
        <>
            {
                isLoading ? <h1>Loading user ...</h1> :
                (
                    <Route { ...rest } component={ (props) => (
                        isAuthenticated ? (<Redirect to="/"/>) : (
                            <div className="page">
                                <Container>
                                    <div className="page">
                                        <h3>Please login</h3>
                                        <Component { ...props } />
                                    </div>
                                </Container>
                            </div>
                        )
                    ) }/>
                )
            }
            {console.log(isAuthenticated, isLoading)}
        </>
    )
}

export default PublicRoute;