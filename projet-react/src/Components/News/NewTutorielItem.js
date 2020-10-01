import React from 'react'; 

export default function NewTutorielItem(props)
{
    
    return (
        <div>
            <div class="card">
            <img src={"http://localhost:8000/api/tutorial/"+props.tutorial.id+"/illustration"} alt={props.tutorial.title} />
                <div className="card-body">
                    <h3 className="card-title">{props.tutorial.title}</h3>
                </div>
            </div>
        </div>
    ); 
}

