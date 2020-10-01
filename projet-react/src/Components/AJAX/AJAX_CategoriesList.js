import React from 'react';
import Loading from '../HomePage/Loading';
import CategoriesList from '../Categories/CategoriesList';

export class AJAX_CategoriesList extends React.Component {
    constructor(props) {
        super(props);
        this.state = {
            categories: null,
        }
    }

    componentDidMount() {
        fetch("http://127.0.0.1:8000/api/categories?exists%5BparentCategory%5D=false")
            .then(response => response.json())
            .then(categories => {
                this.setState({categories:categories["hydra:member"]})
            });
    }

    render(){
        return(this.state.categories === null ? <Loading /> : <CategoriesList categories={this.state.categories} />)
    }
}

export default AJAX_CategoriesList;