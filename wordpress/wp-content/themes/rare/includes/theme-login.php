<?php

/**
 * Revive and Restore theme login page
 *
 */


// change logo url on login page to blog home
function change_wp_login_url()  {  
    return get_bloginfo('url');    
}
add_filter('login_headerurl', 'change_wp_login_url');



// Custom Login Logo
function custom_login_logo() {
    echo '<style type="text/css">
        h1 a { background-image:url('.get_bloginfo('template_directory').'/ui/rare-logo.png) !important; background-size: 285px 63px !important; height:63px !important; margin-bottom:15px!important; }
    </style>';
}

add_action('login_head', 'custom_login_logo');



// Login Logo Alt Text 
function change_wp_login_title()  {  
    return get_bloginfo('name');  
}
add_filter('login_headertitle', 'change_wp_login_title');