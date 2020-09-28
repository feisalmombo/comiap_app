import React from 'react'
import { Map, InfoWindow, Marker, GoogleApiWrapper } from 'google-maps-react'
import { GOOGLE_API_KEY } from '../../api/config'
import Form from './form'
import { connect } from 'react-redux'
import { useState } from 'react'

var TestSiteLocator = ({ google, sites }) => {

    const [selectedPlace, setSelectedPlace] = useState({})
    const [activeMarker, setActiveMarker] = useState({})
    const [showInfo, setShowInfo] = useState(false)

    const toggle = (props, marker) => {
        if (selectedPlace == props && activeMarker == marker) {
            setShowInfo(!showInfo)
        } else {
            setShowInfo(true)
        }
        setSelectedPlace(props)
        setActiveMarker(marker)
    }

    return (
        <Map
            google={google}
            initialCenter={{
                lat: -6.802353,
                lng: 39.279556
            }}
            center={{
                lat: sites.ref.lat,
                lng: sites.ref.lng
            }}
        >

            {sites.data.map(site => (

                <Marker
                    title={site.name}
                    // onClick={toggle}
                    name={site.name}
                    position={{ lat: site.addresses[0].latitude, lng: site.addresses[0].longitude }}>
                    {/* <InfoWindow
                        marker={activeMarker}
                        visible={showInfo}>
                        <div>
                            <h1>{site.name}</h1>
                        </div>
                    </InfoWindow> */}
                </Marker>
            ))}
            <Form />
        </Map>
    )
}

const mapStateToProps = (state) => ({
    sites: state.sites
})

const mapDispatchToProps = {

}

TestSiteLocator = connect(mapStateToProps, mapDispatchToProps)(TestSiteLocator)

TestSiteLocator = GoogleApiWrapper({
    apiKey: GOOGLE_API_KEY
})(TestSiteLocator)

export default TestSiteLocator