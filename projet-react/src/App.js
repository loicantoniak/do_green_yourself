import React from 'react';
import './App.css';

import HomePage from './Components/HomePage/HomePage'; 
import Contact from './Components/Contact/Contact';
import AJAXEssentials from './Components/Essentials/AJAXEssentials';
import LegalNotice from './Components/LegalNotice/LegalNotice'; 
import About from './Components/About/About'; 
import AJAXShopMap from './Components/ShopMap/AJAXShopMap'; 
import SiteMap from './Components/SiteMap/SiteMap'; 


import RouteCategoryDetail from './Components/Routes/RouteCategoryDetail'; 
import RouteTutorialDetails from './Components/Routes/RouteTutorialDetails'; 
import AJAXNews from './Components/News/AJAXNews'; 
import RouteBookmarkTutorial from './Components/Routes/RouteBookmarkTutorial'; 
import RouteProfil from './Components/Routes/RouteProfil'; 
import RouteShoppingList from './Components/Routes/RouteShoppingList'; 
import RouteLog from './Components/Routes/RouteLog'; 
import RouteRegistration from './Components/Routes/RouteRegistration'; 


import Header from './Components/Header/Header';
import Footer from './Components/Footer/Footer';
import SideBar from "./Components/Header/SideBar/sideBar";


import {
  BrowserRouter as Router,
  Switch,
  Redirect,
  Route,
} from "react-router-dom";


export default class App extends React.Component {
  constructor(props) {
    super(props)
    this.state= {
      height: 0, 
    }
  };

componentDidMount() {
  this.setState(
    {height : this.divApp.clientHeight}
    );
}


  render() {
    
    return (
      <Router>
        <div className="App" ref={(elt) => this.divApp=elt}>
          <SideBar pageWrapId={"page-wrap"} outerContainerId={"App"}/>

            <div id="page-wrap">
            <Header />
            <Switch>
              <Route path="/accueil">
                <HomePage height={this.state.height} />
              </Route>
              <Route path="/categorie/:id">
              <RouteCategoryDetail />
                </Route>
              <Route path="/tutoriels/:id">
              <RouteTutorialDetails />
                </Route>
              <Route path="/nouveaux-tutoriels">
                <AJAXNews />
              </Route>
              <Route path="/mes-favoris">
                <RouteBookmarkTutorial />
              </Route>
              <Route path="/les-indispensables">
                <AJAXEssentials />
              </Route>
              <Route path="/liste-de-courses">
                <RouteShoppingList />
              </Route>
              <Route path="/profil">
                <RouteProfil />
              </Route>
              <Route path="/mentions-legales">
                <LegalNotice/>
              </Route>
              <Route path="/about">
                <About />
              </Route>
              <Route path="/contact">
                <Contact />
              </Route>
              <Route path="/connexion">
                <RouteLog />
              </Route>
              <Route path="/inscription">
                <RouteRegistration />
              </Route>
              <Route path="/liste-magasins">
                <AJAXShopMap />
              </Route>
              <Route path="/plan-du-site">
                <SiteMap />
              </Route>
              <Route path="/">
                <Redirect to="/accueil" /> 
              </Route>
          </Switch>
          <Footer/>
          </div>
        </div>
      </Router>
    );
  }
}