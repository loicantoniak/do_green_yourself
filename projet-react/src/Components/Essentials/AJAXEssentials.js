import React from 'react'; 
import EssentialsList from './EssentialsList';
import Loading from '../HomePage/Loading';
import './Essentials.css'; 

export default class AJAXEssentials extends React.Component {
    constructor(props){
        super(props)
        this.state = {
            ingredients: null,
        }; 
    }

    componentDidMount(){
        fetch('http://localhost:8000/api/ingredients')
          .then(res => res.json())
          .then(json => {
              this.setState({ingredients:json["hydra:member"].filter((ingredient) => ingredient.essential)}) 
          });
        
    }

    render() 
    {
        return(this.state.ingredients === null ? <Loading /> : <EssentialsList ingredients={this.state.ingredients}/>)
    }

}
