import React from 'react'; 

export default function EssentialsItem(props)
{
    
    return (
        <div>
            <div class="card">
            <img src={"http://localhost:8000/api/ingredient/"+props.ingredient.id+"/illustration"} alt={props.ingredient.name} />
                <div className="card-body">
                    <h3 className="card-title">{props.ingredient.name}</h3>
                    <p className="card-text">{props.ingredient.description}</p>
                </div>
            </div>
        </div>
    ); 
}

