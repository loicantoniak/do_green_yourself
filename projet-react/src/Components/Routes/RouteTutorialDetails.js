import React from 'react'; 
import AJAXTutorialDetails from '../AJAX/Tutorial/AJAXTutorialDetails';
import { useParams } from "react-router-dom";


export default function Route_TutorialDetails(props) 
{
    const { id } = useParams();
    return (
        <div >
            <AJAXTutorialDetails id={id} />
        </div>
    );

}
