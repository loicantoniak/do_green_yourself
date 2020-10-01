import React from 'react';
import './Footer.css';
import {Link} from "react-router-dom";
import {SocialMediaIconsReact} from 'social-media-icons-react';
import logo from '../../Images/logo.png';


const twitter = <SocialMediaIconsReact icon="twitter" iconColor="grey" backgroundColor="rgba(255,124,124,0)" iconSize="5"  url="http://twitter.com/" size="35" />
const facebook = <SocialMediaIconsReact icon="facebook" iconColor="grey" backgroundColor="rgba(255,124,124,0)" iconSize="5"  url="http://facebook.com/" size="35" />
const instagram = <SocialMediaIconsReact icon="instagram" iconColor="grey" backgroundColor="rgba(255,124,124,0)" iconSize="5"  url="http://instagram.com/" size="35" />




export default class Footer extends React.Component{
    constructor(props) {
        super(props)
        this.redirectRoute = this.redirectRoute.bind(this);
    }
    
    redirectRoute()
    {
        window.location = 'http://localhost:8000/admin';
    };
  
render() {
    return (
        <footer className="footer-container">
            <div className="footer-top">
                <div className="footer-top-link">
                    {twitter}
                    {facebook}
                    {instagram}
                </div>
            </div>

            <div className="footer-bottom container">

                <div className ="leftside">
                    <ul>
                        <li>
                            <Link to="/mentions-legales">Mentions Légales</Link>
                        </li>
                        <li>
                            <Link to="/liste-magasins">Partenaires</Link>
                        </li>
                        <li>
                            <Link to="/administrateur" onClick={ () => this.redirectRoute() }>Administrateur</Link>
                        </li>
                    </ul>
                </div>

                <div className="logo">
                    <img className="little-logo" src={logo} alt="logo Do Green Yourself" />
                </div>

                <div className ="rightside">
                    <ul>
                        <li>
                            <Link to="/about">À propos</Link>
                        </li>
                        <li>
                            <Link to="/contact">Contactez-nous</Link>
                        </li>
                        <li>
                            <Link to="/plan-du-site">Plan du site</Link>
                        </li>
                    </ul>
                </div>
            </div>

        </footer>
     );
    }
};
