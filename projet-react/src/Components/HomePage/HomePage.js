import React from 'react'; 
import './HomePage.css';
import ScrollButton from "./ScrollButton/ScrollButton";
import logo from '../../Images/logo.png';
import AJAX_CategoriesList from '../AJAX/AJAX_CategoriesList';
import { library } from '@fortawesome/fontawesome-svg-core';
import { faSpinner } from '@fortawesome/free-solid-svg-icons';

library.add(faSpinner)

export default function HomePage(props)
{   
    return (
        <div className="HomePage">

            <section className="background">
                <div className="containe-background">
                    <div className="background-image">
                        <div className="img-logo">  
                            <img className="logo" src={logo} alt="logo Do Green Yourself" />
                        </div>

                        <div className="scroll-test">
                           <ScrollButton/>
                        </div>
                    
                    </div>
                    
                    <div className="background-text">
                    
                            <h1>Do Green <br/>Yourself</h1>
                    
                            <div className="description">
                                <p>Réduire ses déchets n'est pas toujours facile. Do Green Yourself regroupe l'essentiel des DIY zéro déchet pour faciliter votre quotidien, faire des économies et protéger l'environnement !</p>
                                <p>Rejoignez l'aventure zéro déchet et devenez un véritable Greener !</p>
                            </div>
                    
                    </div>
                
                </div>
            </section>

            <section className="category">
            <AJAX_CategoriesList />
            </section>

            <section className="about">
            <h1>Pourquoi "Do Green Yourself"</h1>
                <h3>Pour l'environnement</h3>
                <p>Le zéro déchet permet de réduire considérablement notre impact sur l’environnement. Les emballages et les plastiques qui se retrouvent perdus dans la nature perturbent les écosystèmes et polluent les eaux. Le traitement des déchets est quand à lui souvent à l'origine d'émissions de gaz à effet de serre.</p>
                
                <h3>Pour sa santé</h3>
                <p>Le zéro déchet, c’est aussi consommer plus sainement, notamment bio et local. En achetant des produits sains, vous protégez votre santé, mais vous soutenez également le développement durable grâce à votre pouvoir d’achat.</p>
                
                <h3>Pour son bien être</h3>
                <p>Consommer moins et consommer mieux, c’est se recentrer sur l’essentiel. Le fait de vivre en accord avec ses principes et d'opter pour un mode de vie plus serein (moins de temps en supermarché, moins de stress…).</p>
                
                <h3>Pour son portefeuille</h3>
                <p>Que ce soit du carton ou du plastique, le coût de l'emballage est systèmatiquement compris dans le prix d'achat. De plus, le "vrac" (marchandise qui n'est pas emballée ou conditionnée) permet de lutter contre le gaspillage alimentaire en achetant seulement la quantité dont on a réellement besoin. En consommant local et de saison, il est donc facile de réduire ses dépenses tout en limitant ses déchets.  </p>
            </section>
        </div>
        
    ); 
}


