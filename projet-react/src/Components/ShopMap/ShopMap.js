import React from 'react'; 
import Title from '../Title/Title';
import "../Title/Title.css";
import './ShopMap.css'; 
import {GoogleMap, withScriptjs, withGoogleMap, Marker, InfoWindow} from 'react-google-maps';

export default function ShopMap(props)
{
    return (
        <>
            <div className="shops">
                <div className="title">
                    <Title name="Nos partenaires"/>
                </div>
                <div style={{ width: "60vw", height: "70vh", margin: "0 auto" }}>
                    <WrappeMap
                        shops={props.shops}
                        onClick={props.onClick}
                        selectedShop={props.selectedShop}
                        googleMapURL={"https://maps.googleapis.com/maps/api/js?key=AIzaSyBkNaAGLEVq0YLQMi-PYEMabFeREadYe1Q&v=3.exp&libraries=geometry,drawing,places&key=AIzaSyDAATDIcbFzmpvKN1XU7DayXCXdHDibPow"}
                
                        loadingElement={<div style={{ height: `100%` }} />}
                        containerElement={<div style={{ height: `100%` }} />}
                        mapElement={<div style={{ height: `100%` }} />}
                    />
                </div> 
            </div>
        </>
    ); 

}


function Map(props) {

    return (
        <GoogleMap 
            defaultZoom={13}
            defaultCenter={{lat : 49.25, lng: 4.0333}}
        >
            {props.shops.map(shop => (
                <Marker
                    key={shop.id}
                    position={{
                        lat: shop.latitude,
                        lng: shop.longitude
                    }}
                    onClick= {() => props.onClick(shop)}
                >
                    {props.selectedShop === shop &&
                      <InfoWindow>
                        <div className="infoShop">
                            <img className="imageShop" src={"http://localhost:8000/api/shop/"+shop.id+"/photo"} alt={shop.name}/>
                            <h1>{shop.name}</h1>
                            <p>{shop.address}</p>
                            <p>{shop.postalCode} {shop.city}</p>
                            <p>{shop.phone}</p>
                            <p>{shop.email}</p>
                        </div>
                      </InfoWindow>
                    }
                </Marker>
            ))}

        </GoogleMap>
    );
}

const WrappeMap = withScriptjs(withGoogleMap(Map)); 