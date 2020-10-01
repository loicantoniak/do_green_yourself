import React from 'react'; 


export function TutorialItem(props)
{   
    const {onSelected} = props
    const {title, id} = props.data;
    return (
        <div className="card">
            <img 
                onClick={onSelected}
                src={"http://127.0.0.1:8000/api/tutorial/"+id+"/illustration"} 
                alt={title} />
            <div className="card-body">
                <h3 className="card-title">{title}</h3>
            </div>
        </div>
    ); 
}


export default TutorialItem;