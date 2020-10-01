import React from 'react'; 
import Title from '../Title/Title';
import RedirectTutorialItem from './RedirectTutorialItem';
import './Tutorial.css';


export function TutorialList(props)
{
    return (
        <div>
            <div className="tutoriels">
                <Title name="Les tutoriels"/>
                <div className="cards-list">
                {props.tutorials.map(tutorial => <RedirectTutorialItem key={tutorial.id} data={tutorial} />)}
                </div>
            </div>
        </div>
    ); 

}

export default TutorialList;
