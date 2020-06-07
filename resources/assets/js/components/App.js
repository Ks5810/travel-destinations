import React, { Component } from 'react'
import ReactDOM from 'react-dom'
// import Header from './Header'
// import NewProject from './NewProject'
import { useDestinationFetch } from './useDestinationFetch'
import { DestinationForm } from "./DestinationForm";
import DestinationList from "./DestinationList";
import { Container } from "react-bootstrap";
// import SingleProject from './SingleProject'

const App = () =>
{
    const destsFetch = useDestinationFetch();
    return (
        <Container>
            <div className="page">
                
                <h1>Travel Destination</h1>
                <DestinationForm/>
                {
                    destsFetch && <>
                        { destsFetch.fetched && destsFetch.data &&
                          <DestinationList destinations={ destsFetch.data }/>
                        }
                    
                    </>
                }
            </div>
        </Container>
    )
}

ReactDOM.render(<App/>, document.getElementById('app'));