import React from 'react';
import { FontAwesomeIcon } from '@fortawesome/react-fontawesome';

const icone = <FontAwesomeIcon icon="spinner" size="6x" spin/>;

export function Loading() {
    return (
        <div className="spinner">
            {icone}
        </div>
    )
}

export default Loading;