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





// custom image size for candidate species
if ( function_exists( 'add_image_size' ) ) { 
	add_image_size( 'species-thumb', 90, 90, true ); //(cropped)
}



// custom post type for species candidates
function species_post_type() {

	$labels = array(
		'name'                => 'Candidate Species',
		'singular_name'       => 'Species',
		'menu_name'           => 'Species',
		'parent_item_colon'   => 'Parent Species',
		'all_items'           => 'All Species',
		'view_item'           => 'View Species',
		'add_new_item'        => 'Add New Species',
		'add_new'             => 'Add Species',
		'edit_item'           => 'Edit Species',
		'update_item'         => 'Update Species',
		'search_items'        => 'Search Species',
		'not_found'           => 'No Species Found',
		'not_found_in_trash'  => 'No Species Found in the Trash',
	);
	$args = array(
		'label'               => 'species',
		'description'         => 'Candidate Species',
		'labels'              => $labels,
		'supports'            => array( 'title', 'revisions', 'page-attributes', ),
		'hierarchical'        => false,
		'public'              => true,
		'show_ui'             => true,
		'show_in_menu'        => true,
		'show_in_nav_menus'   => true,
		'show_in_admin_bar'   => true,
		'menu_position'       => 20,
		'can_export'          => true,
		'has_archive'         => true,
		'exclude_from_search' => true,
		'publicly_queryable'  => true,
		'capability_type'     => 'page',
	);
	register_post_type( 'species', $args );

}

add_action( 'init', 'species_post_type', 0 );



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
        
        <form method="post" action="options.php">  
            <?php settings_fields( 'rare_species_options' ); ?>  
            <?php do_settings_sections( 'rare_species_options' ); ?>             
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
    if( false == get_option( 'rare_species_options' ) ) {    
        add_option( 'rare_species_options' );  
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
    
    
	// create a options section 
	add_settings_section(
		'rare_species_settings_section',      // Section ID
		'Candidate Species Options',					// Section Title
		'rare_species_options_callback',      // Section Description callback
		'rare_species_options'                // Page to add section
	);    
    // species options
    add_settings_field(	
		'species_intro',						
		'Candidate Species Introduction',					
		'species_intro_callback',          
		'rare_species_options',                       
		'rare_species_settings_section'
	);
    add_settings_field(	
		'section1_heading',						
		'Section 1 Heading',					
		'section1_heading_callback',          
		'rare_species_options',                       
		'rare_species_settings_section'
	);
    add_settings_field(	
		'section1_info',						
		'Section 1 Information',					
		'section1_info_callback',          
		'rare_species_options',                       
		'rare_species_settings_section'
	);
    add_settings_field(	
		'section2_heading',						
		'Section 2 Heading',					
		'section2_heading_callback',          
		'rare_species_options',                       
		'rare_species_settings_section'
	);
    add_settings_field(	
		'section2_info',						
		'Section 2 Information',					
		'section2_info_callback',          
		'rare_species_options',                       
		'rare_species_settings_section'
	);
    add_settings_field(	
		'section3_heading',						
		'Section 3 Heading',					
		'section3_heading_callback',          
		'rare_species_options',                       
		'rare_species_settings_section'
	);
    add_settings_field(	
		'section3_info',						
		'Section 3 Information',					
		'section3_info_callback',          
		'rare_species_options',                       
		'rare_species_settings_section'
	);    
    add_settings_field(	
		'species_scoring_info',						
		'Species Scoring Information',					
		'species_scoring_info_callback',          
		'rare_species_options',                       
		'rare_species_settings_section'
	);
	
	// Register all fields with WordPress
	register_setting(
		'rare_theme_options',
		'rare_theme_options'
	);
    register_setting(
		'rare_species_options',
		'rare_species_options'
	);

	
}
add_action('admin_init', 'rare_initialize_theme_options');


// theme section callbacks

function rare_theme_options_callback() {
	echo '<p>General Options for the Revive and Restore theme.</p>';
} 
function rare_species_options_callback() {
	echo '<p>Options for the Candidate Species pages.</p>';
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




// Candidate Species
function species_intro_callback($args) {
	
    // load options
    $options = get_option('rare_species_options');  
    
    $html = wp_editor( $options['species_intro'], 'species_intro', $settings = array('textarea_name' => 'rare_species_options[species_intro]', 'textarea_rows' => 7) );
    
	$html .= '<label for="species_intro"> '  . $args[0] . '</label>'; 
	
	echo $html;
	
}
function section1_heading_callback($args) {
	
    // load options
    $options = get_option('rare_species_options');  
    $html = '<input style="width: 75%;" type="text" id="section1_heading" name="rare_species_options[section1_heading]" value="' . $options['section1_heading'] . '" />';
	$html .= '<label for="section1_heading"> '  . $args[0] . '</label>';
	
	echo $html;
	
}
// Section 1 information
function section1_info_callback($args) {
	
    // load options
    $options = get_option('rare_species_options');  
    
    $html = wp_editor( $options['section1_info'], 'section1_info', $settings = array('textarea_name' => 'rare_species_options[section1_info]', 'textarea_rows' => 7) );
    
	$html .= '<label for="section1_info"> '  . $args[0] . '</label>'; 
	
	echo $html;
	
}
function section2_heading_callback($args) {
	
    // load options
    $options = get_option('rare_species_options');  
    $html = '<input style="width: 75%;" type="text" id="section2_heading" name="rare_species_options[section2_heading]" value="' . $options['section2_heading'] . '" />';
	$html .= '<label for="section2_heading"> '  . $args[0] . '</label>';
	
	echo $html;
	
}
// Section 2 information
function section2_info_callback($args) {
	
    // load options
    $options = get_option('rare_species_options');  
    
    $html = wp_editor( $options['section2_info'], 'section2_info', $settings = array('textarea_name' => 'rare_species_options[section2_info]', 'textarea_rows' => 7) );
    
	$html .= '<label for="section2_info"> '  . $args[0] . '</label>'; 
	
	echo $html;
	
} 
function section3_heading_callback($args) {
	
    // load options
    $options = get_option('rare_species_options');  
    $html = '<input style="width: 75%;" type="text" id="section3_heading" name="rare_species_options[section3_heading]" value="' . $options['section3_heading'] . '" />';
	$html .= '<label for="section3_heading"> '  . $args[0] . '</label>';
	
	echo $html;
	
}
// Section 3 information
function section3_info_callback($args) {
	
    // load options
    $options = get_option('rare_species_options');  
    
    $html = wp_editor( $options['section3_info'], 'section3_info', $settings = array('textarea_name' => 'rare_species_options[section3_info]', 'textarea_rows' => 7) );
    
	$html .= '<label for="section3_info"> '  . $args[0] . '</label>'; 
	
	echo $html;
	
}
// Species Scoring information
function species_scoring_info_callback($args) {
	
    // load options
    $options = get_option('rare_species_options');  
    
    $html = wp_editor( $options['species_scoring_info'], 'species_scoring_info', $settings = array('textarea_name' => 'rare_species_options[species_scoring_info]', 'textarea_rows' => 7) );
    
	$html .= '<label for="species_scoring_info"> '  . $args[0] . '</label>'; 
	
	echo $html;
	
} 