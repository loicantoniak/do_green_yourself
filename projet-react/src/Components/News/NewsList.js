import React from 'react'; 
import RedirectTutorialItem from '../Tutorials/RedirectTutorialItem';
import Title from '../Title/Title';
import '../Title/Title.css';


export default function NewsList(props)
{
    return (
        <div className="news">
            <div className="title">
                <Title name="Les nouveautés"/>
            </div>
            <div className="cards-list">
                {props.tutorials.filter((e,i) => i < 10).map(tutorial => <RedirectTutorialItem key={tutorial.id} data={tutorial} />)}
            </div>
        </div>
    ); 

}

