<?php

/**
 * Revive and Restore functions and definitions
 *
 */

require_once('includes/theme-options.php'); // custom theme options

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

