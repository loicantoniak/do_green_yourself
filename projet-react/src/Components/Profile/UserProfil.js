import React from 'react';
import './UserProfil.css';
import { FontAwesomeIcon } from '@fortawesome/react-fontawesome';
import { faAt, faEnvelope,faBirthdayCake } from '@fortawesome/free-solid-svg-icons'

const mailIcon =  <FontAwesomeIcon icon={faAt} />;
const postalCodeIcon =  <FontAwesomeIcon icon={faEnvelope} />;
const birthDateIcon =  <FontAwesomeIcon icon={faBirthdayCake} />;


export function Profile ({user}) {

    let birthDate = user.birthDate;

    if (birthDate === null) {
        birthDate = false;
    } else {
        birthDate = birthDate.substring(0,10);
    }

    return(
        <>
            <div className="profil-position">
                <div className="profil-border">
                    <div className="profil-item">
                        <div className="hello-user">
                            <h2>Bonjour {user.firstname} !</h2>
                        </div>
                        <div className="side-profil">
                            <div className="left-side">
                                <div className="img-user">
                                    <img alt="img profil" src="http://placehold.it/300x350"/>
                                </div>
                            </div>
                            <div className="right-side">
                                <p>Pseudo : {user.pseudo? user.pseudo : <span className="empty-detail">Champ non renseigné</span>}</p>
                                <p>Nom : {user.name? user.name : <span>Champ non renseigné</span>}</p>
                                <p>Prénom : {user.firstname? user.firstname : <span>Champ non renseigné</span>}</p>
                                <p>Sexe : {user.sex? user.sex : <span>Champ non renseigné</span>}</p>
                                <p>{mailIcon} : {user.email}</p>
                                <p>
                                    {postalCodeIcon} : {user.address? user.address : <span>Champ non renseigné</span>}&nbsp;
                                    {user.postalCode}&nbsp;
                                    {user.city}&nbsp;
                                    {user.country}
                                </p>
                                
                                <p>{birthDateIcon} : {birthDate? birthDate : <span>Champ non renseigné</span> }</p>
                                
                            </div>
                        </div>
                    </div>
                </div>    
            </div>
        </>
    )
}

export default Profile;