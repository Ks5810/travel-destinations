import axios from 'axios'
import React, { useState, useEffect } from 'react'
import { Link } from 'react-router-dom'
import { requestConfig } from "../lib";

export const useDestinationFetch = () =>
{
    const [ destsFetch, setDestsFetch ] = useState({
        loading: false,
        error: false,
        complete: false,
        fetched: false,
    });
    
    useEffect(() =>
    {
        console.log("in useEffect");
        let unmounted = false;
        const fetchDestinations = async() =>
        {
            
            setDestsFetch(prevState => ({ ...prevState, loading: true, }));
            try
            {
                if(!unmounted)
                {
                    const tmp = await axios.get("/destinations", requestConfig());
                    const data = tmp.data ? tmp.data : [];
                    await setDestsFetch(prevState => ({
                        ...prevState,
                        data,
                        loading: false,
                        complete: true,
                        fetched: true
                    }));
                }
            } catch(error)
            {
                if(!unmounted)
                {
                    setDestsFetch(prevState => ({
                        ...prevState,
                        error: error.response,
                        loading: false,
                        complete: true,
                    }));
                }
            }
        };
        fetchDestinations();
        return () => { unmounted = true; }
    }, []);
    
    return destsFetch;
};
