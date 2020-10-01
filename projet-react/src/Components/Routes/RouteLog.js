import React from 'react'; 
import "./RouteLog.css";
import Login from "../Authentification/Login";

export function Connexion(props)
{   

    return (
        <div>
            <h1>Connexion</h1>
            <hr align="center" width="20%" color="black" size="3"></hr>
            <Login/>
            <br/><br/><br/><br/><br/><br/><br/><br/><br/>
        </div>
        
    ); 
}

export default Connexion;