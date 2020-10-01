import React from "react";
import { slide as Menu } from "react-burger-menu";
import "./sideBar.css";
import {Link} from "react-router-dom";
import {getUser} from '../../../services/api';
import ConnectionButton from '../../Authentification/ConnectionButton';

export default class sideBar extends React.Component {
    constructor (props) {
      super(props)
      this.state = {
        menuOpen: false,
        user: null,
      }
      this.redirectRoute = this.redirectRoute.bind(this)
    }
  
    // This keeps your state in sync with the opening/closing of the menu
    // via the default means, e.g. clicking the X, pressing the ESC key etc.
    handleStateChange (state) {
      this.setState({menuOpen: state.isOpen})  
    }
    
    // This can be used to close the menu, e.g. when a user clicks a menu item
    closeMenu () {
      this.setState({menuOpen: false})
    }
  
    // This can be used to toggle the menu, e.g. when using a custom icon
    // Tip: You probably want to hide either/both default icons if using a custom icon
    // See https://github.com/negomi/react-burger-menu#custom-icons
    toggleMenu () {
      this.setState(state => ({menuOpen: !state.menuOpen}))
    }

    componentDidMount (){
      getUser()
          .then(json => this.setState({user: json}))
          .catch(() => this.setState({user: null}));
    }

    redirectRoute (){
      if(this.state.user !== null){
        this.closeMenu()
      } else {
        window.location = 'http://localhost:8000/login';
      }
    }
  
    render () {
      return (
        <div>
          <Menu 
            isOpen={this.state.menuOpen}
            onStateChange={(state) => this.handleStateChange(state)}
            right
            width={ 280 }
          >
              <div className="connectButton">
                  <ConnectionButton />
              </div>

            {this.state.user ? null : <Link to="/inscription" onClick={() => this.closeMenu()}>S'inscrire</Link> }

            <Link to="/accueil" onClick={() => this.closeMenu()}>Accueil</Link>

            <Link to="/nouveaux-tutoriels" onClick={() => this.closeMenu()}>Nouveautés</Link>

            <Link to="/les-indispensables" onClick={() => this.closeMenu()}>Les indispensables</Link>

            {this.state.user ? <Link to="/profil" onClick={ () => this.redirectRoute() }>Profil</Link> : null }

            {this.state.user ? <Link to="/mes-favoris" onClick={ () => this.redirectRoute() }>Mes favoris</Link> : null }

            {this.state.user ? <Link to="/liste-de-courses" onClick={ () => this.redirectRoute() }>Liste de courses</Link> : null }


            <Link to="/contact" onClick={() => this.closeMenu()}>Contact</Link>

          </Menu>
        </div>
      )
    }
  }