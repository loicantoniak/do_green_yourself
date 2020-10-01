import React from "react";
import {SocialMediaIconsReact} from 'social-media-icons-react';

const twitter = <SocialMediaIconsReact borderColor="#FBFBFB" borderWidth="5" borderStyle="solid" icon="twitter" iconColor="rgba(0,0,0,1)" backgroundColor="#FBFBFB" iconSize="5" roundness="50%" url="http://twitter.com/" size="50" />
const facebook = <SocialMediaIconsReact borderColor="#FBFBFB" borderWidth="5" borderStyle="solid" icon="facebook" iconColor="rgba(0,0,0,1)" backgroundColor="#FBFBFB" iconSize="5" roundness="50%" url="http://facebook.com/" size="50" />
const instagram = <SocialMediaIconsReact borderColor="#FBFBFB" borderWidth="5" borderStyle="solid" icon="instagram" iconColor="rgba(0,0,0,1)" backgroundColor="#FBFBFB" iconSize="5" roundness="50%" url="https://instagram.com/" size="50" />

export default function SocialIcons(props) 
{
    return (
        <>
            {twitter}
            {facebook}
            {instagram}
        </>
    )
};