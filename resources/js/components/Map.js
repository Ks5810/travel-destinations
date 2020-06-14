// Google map

import React from 'react'
import ReactDOM from 'react-dom';
import { compose, withProps } from "recompose"
import {
    GoogleMap, Marker, withGoogleMap,
} from "react-google-maps"
import { Container } from "react-bootstrap";

const iconColors = [ 'red', 'black', 'blue', 'green', 'grey', 'orange','purple',
                     'white', 'yellow' ];

const iconPrefixLink = `https://raw.githubusercontent.com/Concept211/Google-Maps-Markers/master/images/marker_`

const MyComponent = compose(
    withProps({
        loadingElement: <div style={ { height: `100%` } }/>,
        containerElement: <div style={ { height: `400px` } }/>,
        mapElement: <div style={ {
            height: `95%`,
            marginTop: `1rem`,
            marginBottom: `1rem`
        } }/>,
    }),
    withGoogleMap,
)((props) =>
    <GoogleMap
        defaultZoom={ 2 }
        defaultCenter={ {
            lat: props.center_lat ? parseInt(props.center_lat): 51.507400, // London
            lng: props.center_lng ? parseInt(props.center_lng) : -0.127800
        } }
    >
        {
            props.isMarkerShown && props.destinations &&
            props.destinations.map((destination, index) =>
            {
                const { lat, lng, name } = destination;
                return (
                    <Marker
                        key={ index }
                        icon={
                            `${iconPrefixLink}${iconColors[index%9]}${index+1}.png`}
                        title={ name }
                        position={ {
                            lat: parseInt(lat),
                            lng: parseInt(lng)
                        } }/>
                )
            })
        }
    </GoogleMap>
);


const Map = (props) =>
{
    const { destinations } = props;
    return (
        <Container>
            <MyComponent
                isMarkerShown
                center_lat={ props.center_lat }
                center_lng={ props.center_lng }
                destinations={ JSON.parse(props.destinations) }/>
        </Container>
    
    )
}

// Render
if(document.getElementById('map'))
{
    const center_lat = document.getElementById('map')
        .getAttribute('center_lat');
    
    const center_lng = document.getElementById('map')
        .getAttribute('center_lng');
    
    const destinations = document.getElementById('map')
        .getAttribute('destinations');
    
    ReactDOM.render(
        <Map
            center_lat={ center_lat }
            center_lng={ center_lng }
            destinations={ destinations }/>,
        document.getElementById('map'));
}

