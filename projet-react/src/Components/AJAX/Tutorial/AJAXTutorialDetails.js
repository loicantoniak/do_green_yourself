import React from 'react'; 
import TutorialDetail from '../../Tutorials/TutorialDetail';
import Loading from '../../HomePage/Loading';

const URL = 'http://localhost:8000/api/tutorials/';

export default class AJAXTutorialDetails extends React.Component
{
    constructor(props) {
        super(props)
        this.state = {
            tutorial: null,
        }
    };

    getUrl() {
        const {id} = this.props;
        return URL + id;
    }


    componentDidMount(){
        fetch(this.getUrl())
          .then(res => res.json())
          .then(json => {
              this.setState({tutorial: json}) 
          });
    }

    render()
    {   
        return(this.state.tutorial === null ? <Loading /> :  <TutorialDetail tutorial={this.state.tutorial}/>)
        ;
    }
}