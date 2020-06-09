import React from 'react';
import { BrowserRouter, Switch } from 'react-router-dom';
import LoginPage from '../components/accounts/LoginPage';
import RegisterPage from '../components/accounts/RegisterPage';
import PublicRoute from './PublicRoute';
import PrivateRoute from './PrivateRoute';
import DestinationPage from "../components/DestinationPage";


const AppRouter = () =>
{
    return (
        <BrowserRouter>
            <Switch>
                <PrivateRoute path="/" component={ DestinationPage }
                              exact={ true }/>
                <PublicRoute path="/login" component={ LoginPage }/>
                <PublicRoute path="/register" component={ RegisterPage }/>
            </Switch>
        </BrowserRouter>
    );
}

export default AppRouter;
