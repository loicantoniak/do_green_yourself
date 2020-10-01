import React from 'react'; 
import NewsList from './NewsList';
import Loading from '../HomePage/Loading';
import './News.css'; 

export default class AJAXNews extends React.Component {
    constructor(props){
        super(props)
        this.state = {
            tutorials: null,
        }; 
    }


    componentDidMount(){
        fetch('http://localhost:8000/api/tutorials?order%5Bdate%5D=asc')
          .then(res => {
              if(res.ok) {
                return res.json()
              }
              else {
                throw res
              }
            })
          .then(json => {
              this.setState({tutorials:json["hydra:member"]}) 
          })
          .catch((error) => {console.log(error)})
        
    }

    render() 
    {
        console.log('ddd', this.state.tutorials)
        return(this.state.tutorials === null ? <Loading /> : <NewsList tutorials={this.state.tutorials}/>)
    } 
}
