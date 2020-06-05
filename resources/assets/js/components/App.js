import React, { Component } from 'react'
import ReactDOM from 'react-dom'
import { BrowserRouter, Route, Switch } from 'react-router-dom'
// import Header from './Header'
// import NewProject from './NewProject'
import TodoList from './TodoList'
// import SingleProject from './SingleProject'

class App extends Component {
    render () {
        return (
            <BrowserRouter>
                <div>
                    <Switch>
                        <Route exact path='/' component={TodoList} />
                    </Switch>
                </div>
            </BrowserRouter>
        )
    }
}

ReactDOM.render(<App />, document.getElementById('app'))