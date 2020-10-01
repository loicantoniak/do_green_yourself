import React from "react";
import './SearchButton.css';
import { FontAwesomeIcon } from '@fortawesome/react-fontawesome';
import { faSearch } from '@fortawesome/free-solid-svg-icons';

const search = <FontAwesomeIcon icon={faSearch} color="black" style={{fontSize:"1.7em"}}/>;

export default function SearchButton(props) 
{
    return (
    <button className="search-button" onClick={props.click}>
        {search}
    </button>
    )
};
