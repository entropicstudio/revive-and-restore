<?php

/**
 * Revive and Restore functions and definitions
 *
 */

require_once('includes/theme-options.php'); // custom theme options
require_once('includes/theme-login.php'); // custom login page

// add wordpress editor stylesheet
add_editor_style('css/editor.css');

// add categories to pages
function page_categories_meta_box() {
    add_meta_box('categorydiv', __('Categories'), 'post_categories_meta_box', 'page', 'side', 'core');
}
add_action('admin_menu', 'page_categories_meta_box');


// Check if page is an ancestor
function is_ancestor($post_id) {
    global $wp_query;
    $ancestors = $wp_query->post->ancestors;
    if ( in_array($post_id, $ancestors) ) {
        return true;
    } else {
        return false;
    }
}


// add category nicenames in body and post class
function category_id_class($classes) {
	global $post;
	foreach((get_the_category($post->ID)) as $category)
		$classes[] = $category->category_nicename;
	return $classes;
}
add_filter('post_class', 'category_id_class');
add_filter('body_class', 'category_id_class');



// remove unneccessary features for subscribers
function rare_admin_bar_render() {
	global $wp_admin_bar;
	$wp_admin_bar->remove_menu('wp-logo');
    $wp_admin_bar->remove_menu('dashboard');
    
}

function rare_hide_dashboard(){
    /* Remove the Help menu, Update nag, Personal Options section */
    echo "\n" . '<style type="text/css" media="screen">#your-profile { display: none; } .update-nag, #contextual-help-wrap, #contextual-help-link-wrap { display: none !important; }</style>';
    echo "\n" . '<script type="text/javascript">jQuery(document).ready(function($) { $(\'form#your-profile > h3:first\').hide(); $(\'form#your-profile > table:first\').hide(); $(\'form#your-profile\').show(); });</script>' . "\n";
    
    remove_menu_page('index.php');		/* Hides Dashboard menu */
    remove_menu_page('separator1');		/* Hides separator under Dashboard menu*/
}


function remove_footer_admin ()  {  
    echo '<span id="footer-thankyou">Revive and Restore. A part of the Longnow Foundation.</span>';  
}  


// hide wordpress menu and dashboard menu from non-admins
if (!current_user_can('manage_options')) {
	add_action( 'wp_before_admin_bar_render', 'rare_admin_bar_render' );
    add_action('admin_head', 'rare_hide_dashboard', 0);
    add_filter('admin_footer_text', 'remove_footer_admin'); 
}