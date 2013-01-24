<?php

/**
 * Revive and Restore functions and definitions
 *
 */

// add wordpress editor stylesheet
add_editor_style('css/editor.css');

// adding menu support

add_action('init', 'register_my_menus');

function register_my_menus() {
    register_nav_menus(
            array(
                'rare-nav-main' => __('Rare Main Nav'),
                'longnow-global' => __('Longnow Global Menu')
            )
    );
}


if ( function_exists('register_sidebar') )
    register_sidebar(array(
        'before_widget' => '<div class="section_box">',
        'after_widget' => '</div>',
        'before_title' => '<h3>',
        'after_title' => '</h3>',
    ));