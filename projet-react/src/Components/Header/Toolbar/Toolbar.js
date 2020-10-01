import React from 'react';
import './Toolbar.css';
import SearchButton from  '../Search/SearchButton/SearchButton';
import SocialIcons from '../SocialIcons/SocialIcons';

export default function Toolbar(props) {

    return (
        <>
            <header className= "row">
                <div className="icons col-2">
                    <SocialIcons/>
                </div>
                <div className="col-8"></div>
                <nav className="nav-bar col-1">
                    <SearchButton click={props.searchClickHandler}/>
                </nav>      
            </header>
        </>
    )

};
