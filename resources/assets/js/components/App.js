import React, { useEffect } from 'react'
import { Provider, useStore } from 'react-redux';
import ReactDOM from 'react-dom'
import { loadUser } from '../actions/auth'
import AppRouter from "../routers/AppRouter";
import store from "./store"

const App = () =>
{
    useEffect(() => {
        store.dispatch(loadUser());
        
    }, [])
    return (
        <Provider store={store}>
            <AppRouter/>
        </Provider>
    )
}

ReactDOM.render(<App/>, document.getElementById('app'));