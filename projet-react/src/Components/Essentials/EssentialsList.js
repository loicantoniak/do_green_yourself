import React from 'react'; 
import EssentialsItem from './EssentialsItem';
import Title from '../Title/Title';
import '../Title/Title.css';


export default function EssentialsList(props)
{
    return (
        <div className="essential">
            <div className="title">
                <Title name="Les indispensables"/>
            </div>
            <div className="cards-list">
                {props.ingredients.map(ingredient => <EssentialsItem ingredient={ingredient} key={ingredient.id}/>)}
            </div>
        </div>
    ); 

}

