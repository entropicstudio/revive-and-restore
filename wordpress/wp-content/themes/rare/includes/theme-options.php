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
        'name'          => __( 'Blog Sidebar' ),
        'id'            => 'blog-sidebar',
        'description' => __( 'Widgets in this area will be shown on blog pages.' ),
        'before_widget' => '<div class="section_box">',
        'after_widget'  => '</div>',
        'before_title'  => '<h3>',
        'after_title'   => '</h3>',
    ));
    
    register_sidebar(array(
        'name'          => __( 'TEDx Sidebar' ),
        'id'            => 'tedx-sidebar',
        'description' => __( 'Widgets in this area will be shown on TEDx pages.' ),
        'before_widget' => '<div class="section_box">',
        'after_widget'  => '</div>',
        'before_title'  => '<h3>',
        'after_title'   => '</h3>',
    ));
    
}



// add theme options
function rare_theme_menu() {

	add_theme_page(
		'Revive and Restore Theme', 	// Browser Page Title
		'RARE Theme Options',			// Menu Label
		'administrator',                // Which users to allow
		'rare_theme_options',           // Menu id
		'rare_theme_display'            // function callback
	);

}
add_action('admin_menu', 'rare_theme_menu');


// options page
function rare_theme_display() { ?>
    test
    <!-- default WordPress 'wrap' container -->  
    <div class="wrap">  
  
        <!-- Add the icon to the page -->  
        <div id="icon-themes" class="icon32"></div>  
        <h2>Revive and Restore Theme Options</h2>  
  
        <!-- Make a call to the WordPress function for rendering errors when settings are saved. -->  
        <?php settings_errors(); ?>  
  
        <!-- Create the form that will be used to render our options -->  
        <form method="post" action="options.php">  
            <?php settings_fields( 'rare_theme_options' ); ?>  
            <?php do_settings_sections( 'rare_theme_options' ); ?>             
            <?php submit_button(); ?>  
        </form>  
  
    </div>
    
<?php	
}

// theme options settings
 
function rare_initialize_theme_options() {
    
    if( false == get_option( 'rare_theme_options' ) ) {    
        add_option( 'rare_theme_options' );  
    } 
    
	// create a options section 
	add_settings_section(
		'rare_theme_settings_section',      // Section ID
		'Theme Options',					// Section Title
		'rare_theme_options_callback',      // Section Description callback
		'rare_theme_options'                // Page to add section
	);

    
	// Fields in this section.
    // Gone painting text
	add_settings_field(	
		'painting_text',						// Field ID
		'Gone Painting Text',					// Field Label
		'rare_painting_text_callback',          // Field options callback
		'rare_theme_options',                   // Page to add field
		'rare_theme_settings_section'
	);
    // mission statement
    add_settings_field(	
		'mission_statement',						
		'RARE Mission Statement',					
		'rare_mission_statement_callback',          
		'rare_theme_options',                       
		'rare_theme_settings_section'
	);
    // premise
    add_settings_field(	
		'premise',						
		'RARE Premise',					
		'rare_premise_callback',          
		'rare_theme_options',                       
		'rare_theme_settings_section'
	);
    
	
	// Register all fields with WordPress
	register_setting(
		'rare_theme_options',
		'rare_theme_options'
	);

	
}
add_action('admin_init', 'rare_initialize_theme_options');


// theme section callbacks

function rare_theme_options_callback() {
	echo '<p>General Options for the Revive and Restore theme.</p>';
} 



// field callbacks

// painting text
function rare_painting_text_callback($args) {
	
    // load options
    $options = get_option('rare_theme_options');  
    $html = wp_editor( $options['painting_text'], 'painting_text', $settings = array('textarea_name' => 'rare_theme_options[painting_text]', 'textarea_rows' => 7) );
	$html .= '<label for="painting_text"> '  . $args[0] . '</label>';
	
	echo $html;
	
}

// mission statement
function rare_mission_statement_callback($args) {
	
    // load options
    $options = get_option('rare_theme_options');  
    $html = wp_editor( $options['mission_statement'], 'mission_statement', $settings = array('textarea_name' => 'rare_theme_options[mission_statement]', 'textarea_rows' => 7) );
	$html .= '<label for="mission_statement"> '  . $args[0] . '</label>'; 
	
	echo $html;
	
}

// premise
function rare_premise_callback($args) {
	
    // load options
    $options = get_option('rare_theme_options');  
    
    $html = wp_editor( $options['premise'], 'premise', $settings = array('textarea_name' => 'rare_theme_options[premise]', 'textarea_rows' => 7) );
    
	$html .= '<label for="premise"> '  . $args[0] . '</label>'; 
	
	echo $html;
	
} 