import React from 'react'; 
import TutorialList from '../Tutorials/TutorialList';
import Loading from '../HomePage/Loading';
import { withRouter } from 'react-router-dom';


export class RouteCategoryDetail extends React.Component {
    constructor(props){
        super(props)
        this.state = {
            tutorials: null,
        }; 
    }


    componentDidMount(){
      let id = this.props.match.params.id;
        fetch('http://localhost:8000/api/categories/'+id)
          .then(res => {
              if(res.ok) {
                return res.json()
              }
              else {
                throw res
              }
            })
          .then(json => {
              this.setState({tutorials:json["tutorials"]}) 
          })
          .catch((error) => {console.log(error)})
        
    }

    render() 
    {
        return(this.state.tutorials === null ? <Loading /> : <TutorialList tutorials={this.state.tutorials}/>)
    } 
}

export default withRouter(RouteCategoryDetail);