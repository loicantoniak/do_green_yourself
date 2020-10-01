import React from 'react';
import {getUser, getLoginURL, logout} from '../../services/api';
import { FontAwesomeIcon } from '@fortawesome/react-fontawesome'
import { faSignInAlt, faSignOutAlt, faSpinner } from '@fortawesome/free-solid-svg-icons'

class ConnectionButton extends React.Component {

    constructor(props) {
        super(props);
        this.state = {
            user: undefined,
        }
    }

    componentDidMount() {
        getUser()
            .then(json => this.setState({user: json}))
            .catch(() => this.setState({user: null}));
    }

    getButtonContent() {
        switch (this.state.user) {
            case null: 
                return <a href={getLoginURL(window.location)}>Se connecter <FontAwesomeIcon icon={faSignInAlt} /></a>;
            case undefined: 
                return <FontAwesomeIcon icon={faSpinner} pulse />;
            default :
                return <><span>{this.state.user.firstname} {this.state.user.name} </span><a href="#" onClick={logout}><FontAwesomeIcon icon={faSignOutAlt} /></a></>;
        }
    }

    render() {
        return (
            <div className="connection-button">
                {this.getButtonContent()}
            </div>
        );
    }
}

export default ConnectionButton;
