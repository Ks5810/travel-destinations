/**
 * DestinationList.js
 * @author [Keisuke Suzuki](https://github.com/Ks5810)
 */

import React from "react";
import { Button, Container } from "react-bootstrap";


const DestinationList = ({ destinations }) =>
{
    return (
        <div className="blog-post">
            {
                destinations &&
                <Container>
                    {
                        destinations.map(destination =>
                        {
                            return <h3>{ destination.name }</h3>
                        })
                    }
                </Container>
            }
        </div>
    )
};

export default DestinationList;