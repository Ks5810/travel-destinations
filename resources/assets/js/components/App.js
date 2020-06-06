import React, { Component } from 'react'
import ReactDOM from 'react-dom'
import { BrowserRouter, Route, Switch } from 'react-router-dom'
// import Header from './Header'
// import NewProject from './NewProject'
import DestinationList from './DestinationList'
// import SingleProject from './SingleProject'

class App extends Component {
    render () {
        return (
            <BrowserRouter>
                <div>
                    <Switch>
                        <Route exact path='/' component={DestinationList} />
                    </Switch>
                </div>
            </BrowserRouter>
        )
    }
}

ReactDOM.render(<App />, document.getElementById('app'))