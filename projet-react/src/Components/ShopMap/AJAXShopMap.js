import React from 'react'; 
import ShopMap from './ShopMap';
import Loading from '../HomePage/Loading';


export default class AJAXShopMap extends React.Component {
    constructor(props) {
      super(props)
      this.state = {
        shops: null,
        selectedShop : false,
      }
      this.handleClick = this.handleClick.bind(this);
    }

    componentDidMount(){
        fetch('http://localhost:8000/api/shops')
          .then(res => res.json())
          .then(json => {
            this.setState({shops:json["hydra:member"]}) 
          });
    }

    handleClick = (shop) => {
      this.setState({ selectedShop: shop })
    }

    render()
    {   
        return(this.state.shops === null ? <Loading /> :  <ShopMap shops={this.state.shops} selectedShop={this.state.selectedShop} onClick={this.handleClick}/>);
    }
}