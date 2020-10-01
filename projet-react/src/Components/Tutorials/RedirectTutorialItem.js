import React from 'react'; 
import TutorialItem from './TutorialItem';
import  {Redirect} from "react-router-dom";


export default class RedirectTutorialItem extends React.Component
{
    constructor(props) {
        super(props)
        this.state = {
            isRedirecting: false,
        }
        this.onSelect = this.onSelect.bind(this);
    };

    onSelect() {
        this.setState({isRedirecting:true})
    }

    render()
    {
        return (
            <div>
                {this.state.isRedirecting ? 
                <Redirect push to={"/tutoriels/"+this.props.data.id} /> : 
                <TutorialItem  
                           onSelected={this.onSelect} 
                           data={this.props.data}/>} 
            </div>
        );
    }
}