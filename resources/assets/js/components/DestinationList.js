/**
 * DestinationList.js
 * @author [Keisuke Suzuki](https://github.com/Ks5810)
 */

import React from "react";
import { Button, Container, ListGroup, ListGroupItem } from "react-bootstrap";


const DestinationList = ({ destinations }) =>
{
    return (
        <div className='destination-list'>
            <h3>Your Destination List</h3>
            {
                destinations &&
                <ListGroup>
                    {
                        destinations.map((destination, ind)=>
                        {
                            return <ListGroupItem
                                key={ind}
                                className='destination-list-item'>
                                <h4>{destination.name}</h4>
                                <Button variant='danger'>
                                    Visited
                                </Button>
                            </ListGroupItem>
                        })
                    }
                </ListGroup>
            }
        </div>
    )
};

export default DestinationList;