import React from 'react';
import './LegalNotice.css';
import { Link } from "react-router-dom";
import Title from "../Title/Title";
import "../Title/Title.css";

export default function LegalNotice(props) {

    return (
        <div className="legalNotice">
            <div className="title">
                <Title name="Les mentions légales" />
            </div>
            <h4>Editeur(s)</h4>
                <p>Co-directeur(s) de la publication :</p>
                <p>Loïc Antoniak, Maxime Barocco, Fabien Delmotte, Michael Martinsky.</p>
            <h4>Informations Site</h4>
                <a href="www.dogreenyourself.com">www.dogreenyourself.com</a>
                <Link to="/contact">dogreenyourself@gmail.com</Link>

            <h4>Hébergement</h4>
                <p>SAS OVH Siège social : 2 rue Kellermann - 59100 Roubaix - France Téléphone : 0 899 701 761</p>
                <p><a href="https://www.ovh.com/fr/">www.ovh.com</a></p>

            <h4>Objectif et qualité des contenus</h4>
                <p>Ce site a pour objectif de mettre à disposition des tutoriels « zéro déchets ».</p>
                <p>Do Green Yourself s’efforce de fournir une information de qualité et vérifiée, toutefois si une information semble inexacte ou contient une erreur typographique, vous pouvez <Link to="/contact">le signaler à l’administrateur du site.</Link></p>

            <h4>Utilisation des marques de Do Green Yourself</h4>
                <p>Les marques verbales et visuelles (logos) Do Green Yourself sont protégées.Leur utilisation sans autorisation écrite de Do Green Yourself, sur tout support, à des fins de valorisation de produits ou de services, notamment à des fins commerciales, est interdite sous peine de poursuites pénales et civiles. Pour toute réutilisation, <Link to="/contact">nous contacter</Link></p>
        </div>
    );
}
