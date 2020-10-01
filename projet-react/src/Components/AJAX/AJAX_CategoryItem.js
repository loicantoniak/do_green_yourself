import React from 'react';
import CategoryItem from '../Categories/CategoryItem';
import Loading from '../HomePage/Loading';
import { library } from '@fortawesome/fontawesome-svg-core';
import { faPlusSquare, faMinusSquare } from '@fortawesome/free-solid-svg-icons';

library.add(faPlusSquare, faMinusSquare)

export class AJAX_CategoryItem extends React.Component {
    constructor(props) {
        super(props);
        this.state = {
            subCategories: null,
        }
    }

    render(){
        return(this.state.subCategories === null ? <Loading /> : <CategoryItem category={this.props.category} subCategories={this.state.subCategories} />)
    }
}

export default AJAX_CategoryItem;