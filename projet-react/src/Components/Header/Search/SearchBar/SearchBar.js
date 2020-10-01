import React from 'react';
import "./SearchBar.css"


export default class SearchBar extends React.Component {
    constructor(props) {
        super(props)
        this.state = {
            query: '',
            results: {},
            loading: false,
            message: '', 
        };
    }

    handleOnInputChange = ( event ) => {
        const query = event.target.value;
        this.setState({ query: query, loading:true, message: '' });
    };

    render() {
        const { query } = this.state;
      
        return (
            <div className="search-container">
            <div className="search">
                <div className="search-bar">            
                    <input
                        type="text"
                        name="query"
                        value={query}
                        id="search-input"
                        placeholder="Recherche..."
                        onChange={this.handleOnInputChange}
                    />
                </div>
            </div>
            </div>
        )
    }
}
