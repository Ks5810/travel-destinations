import React from "react";
import { DestinationForm } from "./DestinationForm";
import DestinationList from "./DestinationList";
import { Button, Container } from "react-bootstrap";
import { useDestinationFetch } from "./useDestinationFetch";
import { useDispatch } from "react-redux";
import { logout } from "../actions/auth";


const DestinationPage = () =>
{
    const destsFetch = useDestinationFetch();
    const dispatch = useDispatch();
    return (
        <Container>
            {
                destsFetch && console.log(destsFetch)
            }
            <div className="page">
                <h1>Travel Destination</h1>
                <Button
                    onClick={() => dispatch(logout())}>Logout</Button>
                <DestinationForm/>
                {
                    destsFetch && <>
                        { destsFetch.fetched && destsFetch.data &&
                          <DestinationList
                              destinations={ destsFetch.data }/>
                        }
                    
                    </>
                }
            </div>
        </Container>
    )
};

export default DestinationPage;
