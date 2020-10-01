import React from 'react';
import Toolbar from '../Header/Toolbar/Toolbar';
import SearchBar from '../Header/Search/SearchBar/SearchBar';
import Backdrop from '../Header/Backdrop/Backdrop';


export default class Header extends React.Component {
    constructor(props) {
      super(props)
      this.state = {
        searchBarOpen : false, 
      }
      this.searchBarClickHandler = this.searchBarClickHandler.bind(this);
      this.backdropClickHandler = this.backdropClickHandler.bind(this);
    };
  
    searchBarClickHandler() 
    {
      const{searchBarOpen} = this.state; 
      this.setState(() => {
        return {searchBarOpen: !searchBarOpen};
      });
    };
  
    backdropClickHandler() 
    {
      this.setState({sideDrawerOpen: false});
      this.setState({searchBarOpen: false});
    };
  
    render() {
    let backdrop;
    let searchBar;

    if(this.state.searchBarOpen) {
      searchBar =  <SearchBar />;
      backdrop = <Backdrop click={this.backdropClickHandler} />
    }
    
    return (
      <>
        <Toolbar searchClickHandler={this.searchBarClickHandler} />
        {searchBar}
        {backdrop}
      </>
    );
  }
}