import React from 'react';
import { Router, Route, Switch } from 'react-router-dom';
import LoginPage from '../components/accounts/LoginPage';
import RegisterPage from '../components/accounts/RegisterPage';
import PublicRoute from './PublicRoute';
import PrivateRoute from './PrivateRoute';
import DestinationPage from "../components/DestinationPage";
import { createBrowserHistory } from 'history';
import NotFoundPage from "../components/NotFoundPage";

export const history = createBrowserHistory();

const AppRouter = () =>
{
    return (
        <Router history={history}>
            <Switch>
                <PrivateRoute path="/" component={ DestinationPage }
                              exact={ true }/>
                <PublicRoute path="/login" component={ LoginPage }/>
                <PublicRoute path="/register" component={ RegisterPage }/>
                <Route component={NotFoundPage} />
            </Switch>
        </Router>
    );
}

export default AppRouter;
