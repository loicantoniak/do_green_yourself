import React from 'react';
import UserProfil from '../Profile/UserProfil';
import {getUser} from '../../services/api';
import ConnectionButton from '../Authentification/ConnectionButton';
import {Redirect} from 'react-router-dom';

export class AJAX_Profil extends React.Component {

    constructor(props){
        super(props);
        this.state = {
            user: null,
        }
    }

    componentDidMount (){
        getUser()
            .then(json => this.setState({user: json}))
            .catch(() => this.setState({user: null}));
    }

    render (){
        return (
            this.state.user === null ? <ConnectionButton /> : <UserProfil user={this.state.user} />
        )
    }
}


export default AJAX_Profil;



    
