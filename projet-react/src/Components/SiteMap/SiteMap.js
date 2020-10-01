import React from 'react'; 
import './SiteMap.css';
import {Link} from "react-router-dom";
import Title from "../Title/Title";
import "../Title/Title.css";


export default function SiteMap(props){
    return (
        <div className="SiteMap">
            <div className="title">
                <Title name="Plan du site"/>
            </div>
            <div className="listMap">
                <Link to="/accueil">Accueil</Link>
                <Link to="/nouveaux-tutoriels">Les nouveautés</Link>
                <Link to="/mes-favoris">Mes favoris</Link>
                <Link to="/les-indispensables">Les indispensables</Link>
                <Link to="/liste-de-courses">Liste des courses</Link>
                <Link to="/profil">Profil</Link>
                <Link to="/contact">Contact</Link>
                <Link to="/categorie/:id">Catégories</Link>
                <Link to="/tutoriel/:id">Tutoriels</Link>
                <Link to="/mentions-legales">Mentions Légales</Link>
                <Link to="/liste-magasins">Partenaires</Link>
                <Link to="/about">À propos de</Link>
                <Link to="/plan-du-site">Plan du site</Link>
            </div>
        </div>
    )
}


