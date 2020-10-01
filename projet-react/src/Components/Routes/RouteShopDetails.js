import React from 'react'; 
import AJAXShopDetails from '../ShopList/AJAXShopDetails';
import { useParams } from "react-router-dom";


export default function RouteShopDetails(props) 
{
    const { id } = useParams();
    return (
        <div >
            <AJAXShopDetails id={id} />
        </div>
    );

}
