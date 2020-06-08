/**
 * DestinationForm.js
 * @author [Keisuke Suzuki](https://github.com/Ks5810)
 */

import React, { useState } from 'react';
import { FormControl, FormGroup, Form, Button } from "react-bootstrap";
import { capitalize, requestConfig } from "../lib";

const inputSections = [ 'name' ];
const apiUri = '/api/destinations';

export const DestinationForm = () =>
{
    const [ destination, setDestination ] = useState({
        name: ""
    });
    const [ name, setName ] = useState(null);
    const onChange = ((section, e) =>
    {
        switch(section)
        {
            case 'name':
                return setName(e.target.value);
        }
    });
    
    const onSubmit = async e =>
    {
        e.preventDefault();
        const form = e.currentTarget;
        const postDestination = async destination =>
        {
            try {
                const tmp = await axios.post(apiUri, { name },
                                                requestConfig());
                console.log("Data sent");
                
            } catch(error)
            {
                console.log(error);
            }
        
        }
        if(form.checkValidity() === true)
        {
            postDestination({ name });
        }
    };
    
    return (
        <Form
            onSubmit={ onSubmit }
        >
            {
                inputSections.map((section) =>
                    <FormGroup
                        key={ section }
                        controlId={ `${ section }Validation` }
                        className="form-group">
                        { <>
                            <FormControl
                                required
                                onChange={ e => onChange(section, e) }
                                type="text"
                                placeholder={ `Destination ${ capitalize(
                                    section) }` }
                            />
                            <FormControl.Feedback type="invalid">
                                { `Please type your ${ section }` }
                            </FormControl.Feedback>
                        </>
                        }
                    </FormGroup>
                )
            }
    
            <Button
                type="submit">
                Add Location
            </Button>
        </Form>
    )
}
