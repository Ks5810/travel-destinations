import React, { Component } from 'react'
import ReactDOM from 'react-dom'
// import Header from './Header'
// import NewProject from './NewProject'
import { useDestinationFetch } from './useDestinationFetch'
// import SingleProject from './SingleProject'

const App = () =>
{
    const destsFetch = useDestinationFetch();
    return (
        <>
            {`In Main page`}
            {
            destsFetch && <>
            { destsFetch.fetched && destsFetch.data &&
              destsFetch.data.map(destination =>
              {
                  return <p>{ `name ${ destination.name }` }</p>
              }) }
        </>
            }
        </>
    )
}

ReactDOM.render(<App/>, document.getElementById('app'));