import React from 'react';
import PropTypes from 'prop-types';
import CategoryItem from './CategoryItem';


export function CategoriesList({categories}) {
    return (
        <ul>
            {categories.map((category) => <CategoryItem key={category.id} category={category} />)}
        </ul>
    );
}

CategoriesList.propTypes = {
    categories: PropTypes.array,
};

export default CategoriesList;