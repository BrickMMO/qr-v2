<?php

/*
 * Dump data
 * 
 * This code ouputs all form, URL, session, and cookie data
 * if the ENV_DEBUG variable in the .env file is set to true.
 */
if(ENV_DEBUG)
{

if(ENV_LOCAL)
    {
        $links = array(
            'SSO' => 'http://local.sso.brickmmo.com:7777/',
            'Events' => 'http://local.events.brickmmo.com:7777/',
            'QR' => 'http://local.qr.brickmmo.com:7777/',
            'Colours' => 'http://local.colours.brickmmo.com:7777/',
            'Search' => 'http://local.search.brickmmo.com:7777/',
            'Bricksum' => 'http://local.bricksum.brickmmo.com:7777/',
            'List' => 'http://local.list.brickmmo.com:7777/',
            'Applications' => 'http://local.applications.brickmmo.com:7777/',
            'GHitHub' => 'http://local.github.brickmmo.com:7777/',
            'Media' => 'http://local.media.brickmmo.com:7777/',
            'Stores' => 'http://local.stores.brickmmo.com:7777/',
        );
    }
    else
    {
        $links = array(
            'SSO' => 'https://sso.brickmmo.com/',
            'Events' => 'https://events.brickmmo.com/',
            'QR' => 'https://qr.brickmmo.com/',
            'Colours' => 'https://colours.brickmmo.com/',
            'Search' => 'https://search.brickmmo.com/',
            'Bricksum' => 'https://bricksum.brickmmo.com/',
            'List' => 'https://list.brickmmo.com/',
            'Applications' => 'https://applications.brickmmo.com/',
            'GHitHub' => 'https://github.brickmmo.com/',
            'Media' => 'https://media.brickmmo.com/',
            'Stores' => 'https://stores.brickmmo.com/',
        );
    }

    echo '<ul>';
    foreach($links as $name => $url)
    {
        echo '<li><a href="'.$url.'">'.$name.'</a></li>';
    }
    echo '</ul>';
    
    debug_pre($_GET);
    debug_pre($_POST);
    debug_pre($_SESSION);
    debug_pre($_COOKIE);
    // debug_pre(get_defined_constants());

}
