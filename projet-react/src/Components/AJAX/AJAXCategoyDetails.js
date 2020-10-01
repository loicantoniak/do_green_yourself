import React from 'react'; 
import CategoryDetail from './CategoryDetail';
import { FontAwesomeIcon } from '@fortawesome/react-fontawesome';
import { faSpinner } from '@fortawesome/free-solid-svg-icons';

const icone = <FontAwesomeIcon icon={faSpinner} size="7x" spin />

//const URL = 'https://iut-info.univ-reims.fr/users/jonquet/albums/public/index.php/albums/';

export default class AJAXCategoryDetails extends React.Component
{
    constructor(props) {
        super(props)
        this.state = {
            category: null,
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
              this.setState({category: json }) 
          });
    }

    render()
    {
        return this.state.category === null ? <div className="icone">{icone}</div> :  <CategoryDetails category={this.state.category}/>;
    }
}