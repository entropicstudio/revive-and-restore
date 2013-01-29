<?php

/**
 * Revive and Restore functions and definitions
 *
 */

// add wordpress editor stylesheet
add_editor_style('css/editor.css');


// adding theme menu support
function register_my_menus() {
    register_nav_menus(
            array(
                'rare-nav-main' => __('Rare Main Nav'),
                'longnow-global' => __('Longnow Global Menu')
            )
    );
}
add_action('init', 'register_my_menus');


// add theme sidebar support
if ( function_exists('register_sidebar') )
    register_sidebar(array(
        'before_widget' => '<div class="section_box">',
        'after_widget' => '</div>',
        'before_title' => '<h3>',
        'after_title' => '</h3>',
    ));



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