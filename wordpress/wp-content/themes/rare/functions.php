<?php

/**
 * Revive and Restore functions and definitions
 *
 */

require_once('includes/theme-options.php'); // custom theme options
require_once('includes/continuum-options.php'); // extinction continuum options/settings
require_once('includes/theme-login.php'); // custom login page

// add wordpress editor stylesheet
add_editor_style('css/editor.css');

// Check if page is an ancestor
function is_ancestor($post_id) {
    global $wp_query;
    $ancestors = $wp_query->post->ancestors;
    if ( @in_array($post_id, $ancestors) ) {
        return true;
    } else {
        return false;
    }
}


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

// improved excerpt function
function improved_trim_excerpt($text) {
    global $post;
    if ('' == $text) {
        $text = get_the_content('');
        $text = apply_filters('the_content', $text);
        $text = str_replace('\]\]\>', ']]&gt;', $text);
        $text = preg_replace('@<script[^>]*?>.*?</script>@si', '', $text);
        $text = strip_tags($text, '<p><em><strong>');
        $excerpt_length = 90;
        $words = explode(' ', $text, $excerpt_length + 1);
        if (count($words) > $excerpt_length) {
            array_pop($words);
            array_push($words, '... <a href="'. get_permalink() .'">[Read More]</a>');
            $text = implode(' ', $words);
            $text = force_balance_tags( $text );
        }
    }
    return $text;
}
remove_filter('get_the_excerpt', 'wp_trim_excerpt');
add_filter('get_the_excerpt', 'improved_trim_excerpt');