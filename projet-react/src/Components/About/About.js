import React from 'react'; 
import './About.css';
import Title from '../Title/Title';
import '../Title/Title.css';

export default function About(props)
{   

    return (
        <div className="about">
            <div className="title">
                <Title name="A propos"/>
            </div>
            <h4>Qui sommes nous?</h4>
                <p>Une équipe de 4 développeurs web qui partageons une passion commune pour l’écologie et plus précisément pour le « zéro déchet ».</p>

            <h4>L'état d'esprit "Do Green Yourself"</h4>
                <p>Nos déchets envahissent la planète. Abandonnés dans la nature, enfouis ou incinérés, ils polluent la terre, l’air et les océans et cela n’est pas sans conséquences sur notre santé. Les déchets domestiques représentent une bonne part d'entre eux.</p>

                <p>L’urgence d’agir pour préserver la planète de nos déchets est à l’origine de notre démarche et de la naissance de "Do Green Yourself".</p>

                <p>Do Green Yourself se veut comme une réponse à ces problèmes et veut permettre à chacun d’adopter de nouvelles habitudes et un nouveau mode de vie pour préserver notre planète, protéger sa santé et faire des économies.</p>

                <p>Notre défi est de regrouper sur une unique plateforme tous les tutoriels qui permettent d’adopter la philosophie zéro déchet dans notre quotidien.</p>


            
            <div className="Sign">Les Greeners</div>
        </div>
    ); 
}
