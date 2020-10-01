import React from 'react'; 
import Registration from "../Authentification/Registration";
import Title from '../Title/Title';
import '../Title/Title.css';

export function RouteRegistration(props)
{   

    return (
        <div>
            <div className="title">
                <Title name="Inscription"/>
            </div>
            <Registration/>
        </div>
    ); 
}

export default RouteRegistration;