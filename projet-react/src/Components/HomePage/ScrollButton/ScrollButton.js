import React, {Component} from 'react';
import "./ScrollButton.css";
import ScrollIntoView from 'react-scroll-into-view';
import KeyboardArrowDownIcon from '@material-ui/icons/KeyboardArrowDown';


const scrolldown = <KeyboardArrowDownIcon style={{ fontSize: 60 }} />;

class ScrollButton extends Component {
    render() {
        return (
            <>
                <ScrollIntoView selector="#containerSlide">
                <button>
                 {scrolldown}
                 </button>
                </ScrollIntoView>    
                <div id="containerSlide"></div>
            </>
        );
    }
}

export default ScrollButton;