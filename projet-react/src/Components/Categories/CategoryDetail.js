import React from 'react';
import {Link, Redirect} from "react-router-dom";

export function CategoryDetail ({subCategories}) {
        return (
            <div className="categoryDetail">
                {subCategories.map((subCategory) => <Link className="subCategories" to={"/categorie/"+subCategory.id}>{subCategory.name}</Link>)}
            </div>
        );
    
}

export default CategoryDetail;