import React from 'react'; 
import Title from '../Title/Title';
import {Link} from "react-router-dom";

export default function TutorialDetail(props) 
{
    const {title, description, tags, date, postUser, steps, needs, id, categories} = props.tutorial;


    return (
        <div className="container tutoriel">
            <Title name={title}/>
            <div className="detailsTuto">
                <img src={"http://127.0.0.1:8000/api/tutorial/"+id+"/illustration"} alt={title} />
                
                <h2>Description</h2>    
                    <p>{description}</p>
                
                <h2>Ingrédients</h2>
                    <div>
                        {needs.map(need => <p>{need.amount} {need.ingredient.unit} {need.ingredient.name}</p>)}
                    </div>
                
                <h2>Étapes</h2>
                    <div> 
                        {steps.map(step => <p>{step.number} {step.text}</p>)}
                    </div>

                    <p className="author">Tutoriel écrit par : {postUser.firstname} {postUser.name} le {date.substring(0,10)}</p>

                    <div className="linkCategory">
                        {categories.map(categorie =><Link to={"/categorie/"+categorie.id}>{categorie.name}</Link>)}
                    </div>
                    
                    <div className="tags"> 
                        <p>Tags :</p>
                        {tags.map(tag => <p>{tag.tag}</p>)}
                    </div>
            </div>
        </div>
        
    );
}
