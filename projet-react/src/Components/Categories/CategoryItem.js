import React from 'react';
import CategoryDetail from './CategoryDetail';
import {Redirect} from "react-router-dom";

export class CategoryItem extends React.Component {
    constructor(props) {
        super(props);
        this.state = {display:false};
        this.clickHandle = this.clickHandle.bind(this);
    }

    clickHandle() {
        this.setState(state => ({
            display: !state.display
        }))
    }

    viewDetail() {
        return (this.props.category.subCategories.length ?
        <CategoryDetail subCategories={this.props.category.subCategories}  /> :
        <Redirect to={`/categorie/${this.props.category.id}`} push={true} />);
    }

    render() {
        const display = this.state.display;
        return (
            <div className="categoryItems" onClick={this.clickHandle}>
                <div className="divCategoryIllustration">
                    <img src={"http://127.0.0.1:8000/api/category/"+this.props.category.id+"/illustration"} className="img-thumbnail img-fluid" alt="Illustration de la catégorie" />
                    <div className="categoryContaintSize">
                        <div className="CategoryContaint">
                            {!display
                            ? <div className="categoryNameContaint">
                                <p className="categoryName">{this.props.category.name}</p>
                            </div>
                            : <div className="categoryDetailContaint">
                                {this.viewDetail()}
                            </div>
                            }
                        </div>
                    </div>
                </div>
                
            </div>
        );
    }
}

export default CategoryItem;