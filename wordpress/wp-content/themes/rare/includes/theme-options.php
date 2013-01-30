<?php

/**
 * Revive and Restore theme options
 *
 */

// adding theme menu support
function register_my_menus() {
    
    register_nav_menus( // preset menus
            array(
                'rare-nav-main' => __('Rare Main Nav'),
                'longnow-global' => __('Longnow Global Menu')
            )
    );
    
}
add_action('init', 'register_my_menus');


// add theme sidebar support
if ( function_exists('register_sidebar') ) {
    
    register_sidebar(array(
        'before_widget' => '<div class="section_box">',
        'after_widget' => '</div>',
        'before_title' => '<h3>',
        'after_title' => '</h3>',
    ));
    
}



// add theme options
function rare_theme_menu() {

	add_theme_page(
		'Revive and Restore Theme', 			// The title to be displayed in the browser window for this page.
		'RARE Theme Options',			// The text to be displayed for this menu item
		'administrator',			// Which type of users can see this menu item
		'rare_theme_options',	// The unique ID - that is, the slug - for this menu item
		'rare_theme_display'		// The name of the function to call when rendering this menu's page
	);

}
add_action('admin_menu', 'rare_theme_menu');

function rare_theme_display() { ?>

<!-- default WordPress 'wrap' container -->  
    <div class="wrap">  
  
        <!-- Add the icon to the page -->  
        <div id="icon-themes" class="icon32"></div>  
        <h2>Revive and Restore Theme Options</h2>  
  
        <!-- Make a call to the WordPress function for rendering errors when settings are saved. -->  
        <?php settings_errors(); ?>  
  
        <!-- Create the form that will be used to render our options -->  
        <form method="post" action="options.php">  
            <?php settings_fields( 'rare_general_options' ); ?>  
            <?php do_settings_sections( 'rare_general_options' ); ?>             
            <?php submit_button(); ?>  
        </form>  
  
    </div>
    
<?php	
}

/* ------------------------------------------------------------------------ *
 * Setting Registration
 * ------------------------------------------------------------------------ */ 
 
function rare_initialize_theme_options() {
    
    if( false == get_option( 'rare_general_options' ) ) {    
        add_option( 'rare_general_options' );  
    } 
    
	// First, we register a section. This is necessary since all future options must belong to a 
	add_settings_section(
		'general_settings_section',			// ID used to identify this section and with which to register options
		'General Options',					// Title to be displayed on the administration page
		'rare_general_options_callback',	// Callback used to render the description of the section
		'rare_general_options'                           // Page on which to add this section of options
	);
	
	// Next, we'll introduce the fields for toggling the visibility of content elements.
	add_settings_field(	
		'painting_text',						// ID used to identify the field throughout the theme
		'Gone Painting Text',					// The label to the left of the option interface element
		'rare_painting_text_callback',          // The name of the function responsible for rendering the option interface
		'rare_general_options',                 // The page on which this option will be displayed
		'general_settings_section'
	);

	
	// Finally, we register the fields with WordPress
	
	register_setting(
		'rare_general_options',
		'rare_general_options'
	);

	
}
add_action('admin_init', 'rare_initialize_theme_options');

/* ------------------------------------------------------------------------ *
 * Section Callbacks
 * ------------------------------------------------------------------------ */ 

function rare_general_options_callback() {
	echo '<p>General Options for the Revive and Restore theme.</p>';
} 

/* ------------------------------------------------------------------------ *
 * Field Callbacks
 * ------------------------------------------------------------------------ */ 

function rare_painting_text_callback($args) {
	
    $options = get_option('rare_general_options');  
    
	// Note the ID and the name attribute of the element match that of the ID in the call to add_settings_field
	$html = '<textarea rows="4" cols="80" id="painting_text" name="rare_general_options[painting_text]">' . $options['painting_text'] . '</textarea>'; 
	
	// Here, we'll take the first argument of the array and add it to a label next to the checkbox
	$html .= '<label for="painting_text"> '  . $args[0] . '</label>'; 
	
	echo $html;
	
} 
