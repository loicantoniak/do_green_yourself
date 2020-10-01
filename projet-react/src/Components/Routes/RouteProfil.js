import React from 'react'; 
import Title from "../Title/Title";
import "../Title/Title.css";
import AJAX_Profil from '../AJAX/AJAX_Profile';


export function RouteProfil(props)
{   

    return (
        <div>
            <div className="title">
                <Title name="Profil" />
            </div>
                <AJAX_Profil/>
        </div>
        
    ); 
}

export default RouteProfil;