import React from 'react'; 
import logo from '../../Images/logo.png';
import './Title.css';

export function Title(props)
{   
    const {name} = props
    return (
        <div>
            <img className="logo-title" src={logo} alt="logo Do Green Yourself" />
            <h1>{name}</h1>
        </div>
    ); 
}

export default Title;