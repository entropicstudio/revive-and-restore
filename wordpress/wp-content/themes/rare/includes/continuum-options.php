<?php
/* custom options for the extinction continuum
 */

// add theme options
function rare_continuum_menu() {

	add_theme_page(
		'Extinction Continuum Options', 	// Browser Page Title
		'Extinction Continuum',			// Menu Label
		'administrator',                // Which users to allow
		'rare_continuum_options',           // Menu id
		'rare_continuum_display'            // function callback
	);

}
add_action('admin_menu', 'rare_continuum_menu');

// options page
function rare_continuum_display() { ?>
    
    <!-- default WordPress 'wrap' container -->  
    <div class="wrap">  
  
        <!-- Add the icon to the page -->  
        <div id="icon-themes" class="icon32"></div>  
        <h2>Extinction Continuum Options</h2>  
  
        <!-- Make a call to the WordPress function for rendering errors when settings are saved. -->  
        <?php settings_errors(); ?>  
  
        <!-- Create the form that will be used to render our options -->  
        <form method="post" action="options.php">  
            <?php settings_fields( 'rare_continuum_options' ); ?>  
            <?php do_settings_sections( 'rare_continuum_options' ); ?>             
            <?php submit_button(); ?>  
        </form>
  
    </div>
    
<?php	
}

// theme options settings
 
function rare_initialize_continuum_options() {
    
    if( false == get_option( 'rare_continuum_options' ) ) {    
        add_option( 'rare_continuum_options' );  
    } 
    
	// create a options section 
	add_settings_section(
		'rare_continuum_settings_section',      // Section ID
		'Extinction Continuum Options',					// Section Title
		'rare_continuum_options_callback',      // Section Description callback
		'rare_continuum_options'                // Page to add section
	);
    
    
    // Species Instructions popup
	add_settings_field(	
		'species_instructions_popup',					
		'Species Instructions Popup',					
		'species_instructions_popup_callback',          
		'rare_continuum_options',                   
		'rare_continuum_settings_section'
	);
    
    // Biotech Instructions popup
	add_settings_field(	
		'biotech_instructions_popup',					
		'Biotech Instructions Popup',					
		'biotech_instructions_popup_callback',          
		'rare_continuum_options',                   
		'rare_continuum_settings_section'
	);
    
	// List Item 1
	add_settings_field(	
		'listitem1_heading',					
		'List Item 1 Heading',					
		'listitem1_heading_callback',          
		'rare_continuum_options',                   
		'rare_continuum_settings_section'
	);
    add_settings_field(	
		'listitem1_popup',						
		'List Item 1 Popup',					
		'listitem1_popup_callback',          
		'rare_continuum_options',                       
		'rare_continuum_settings_section'
	);
    add_settings_field(	
		'listitem1_species1',						
		'List Item 1 Giraffe Popup',					
		'listitem1_species1_callback',          
		'rare_continuum_options',                       
		'rare_continuum_settings_section'
	);
    add_settings_field(	
		'listitem1_species2',						
		'List Item 1 Przewalski Popup',					
		'listitem1_species2_callback',          
		'rare_continuum_options',                       
		'rare_continuum_settings_section'
	);
    
    
    
    // List Item 2
    add_settings_field(	
		'listitem2_heading',					
		'List Item 2 Heading',					
		'listitem2_heading_callback',          
		'rare_continuum_options',                   
		'rare_continuum_settings_section'
	);
    add_settings_field(	
		'listitem2_popup',						
		'List Item 2 Popup',					
		'listitem2_popup_callback',          
		'rare_continuum_options',                       
		'rare_continuum_settings_section'
	);
    add_settings_field(	
		'listitem2_species1',						
		'List Item 2 Mammoth Popup',					
		'listitem2_species1_callback',          
		'rare_continuum_options',                       
		'rare_continuum_settings_section'
	);
    add_settings_field(	
		'listitem2_species2',						
		'List Item 2 Pigeon Popup',					
		'listitem2_species2_callback',          
		'rare_continuum_options',                       
		'rare_continuum_settings_section'
	);
    
    
    
    
    
    // List Item 3
    add_settings_field(	
		'listitem3_heading',					
		'List Item 3 Heading',					
		'listitem3_heading_callback',          
		'rare_continuum_options',                   
		'rare_continuum_settings_section'
	);
    add_settings_field(	
		'listitem3_popup',						
		'List Item 3 Popup',					
		'listitem3_popup_callback',          
		'rare_continuum_options',                       
		'rare_continuum_settings_section'
	);
    add_settings_field(	
		'listitem3_species1',						
		'List Item 3 WildCat Popup',					
		'listitem3_species1_callback',          
		'rare_continuum_options',                       
		'rare_continuum_settings_section'
	);
    add_settings_field(	
		'listitem3_species2',						
		'List Item 3 Rhinoceros Popup',					
		'listitem3_species2_callback',          
		'rare_continuum_options',                       
		'rare_continuum_settings_section'
	);
    add_settings_field(	
		'listitem3_species3',						
		'List Item 3 Ferret Popup',					
		'listitem3_species3_callback',          
		'rare_continuum_options',                       
		'rare_continuum_settings_section'
	);
    
    
    
    
    
    
    
    // List Item 4
    add_settings_field(	
		'listitem4_heading',					
		'List Item 4 Heading',					
		'listitem4_heading_callback',          
		'rare_continuum_options',                   
		'rare_continuum_settings_section'
	);
    add_settings_field(	
		'listitem4_popup',						
		'List Item 4 Popup',					
		'listitem4_popup_callback',          
		'rare_continuum_options',                       
		'rare_continuum_settings_section'
	);
    add_settings_field(	
		'listitem4_species1',						
		'List Item 4 Mammoth Popup',					
		'listitem4_species1_callback',          
		'rare_continuum_options',                       
		'rare_continuum_settings_section'
	);
    add_settings_field(	
		'listitem4_species2',						
		'List Item 4 Frogs Popup',					
		'listitem4_species2_callback',          
		'rare_continuum_options',                       
		'rare_continuum_settings_section'
	);
    
    
    
    
    
    
    // List Item 5
    add_settings_field(	
		'listitem5_heading',					
		'List Item 5 Heading',					
		'listitem5_heading_callback',          
		'rare_continuum_options',                   
		'rare_continuum_settings_section'
	);
    add_settings_field(	
		'listitem5_popup',						
		'List Item 5 Popup',					
		'listitem5_popup_callback',          
		'rare_continuum_options',                       
		'rare_continuum_settings_section'
	);
    add_settings_field(	
		'listitem5_species1',						
		'List Item 5 Houbara Popup',					
		'listitem5_species1_callback',          
		'rare_continuum_options',                       
		'rare_continuum_settings_section'
	);
    add_settings_field(	
		'listitem5_species2',						
		'List Item 5 Pigeon Popup',					
		'listitem5_species2_callback',          
		'rare_continuum_options',                       
		'rare_continuum_settings_section'
	);
    
    
    
    
    
    
    // List Item 6
    add_settings_field(	
		'listitem6_heading',					
		'List Item 6 Heading',					
		'listitem6_heading_callback',          
		'rare_continuum_options',                   
		'rare_continuum_settings_section'
	);
    add_settings_field(	
		'listitem6_popup',						
		'List Item 6 Popup',					
		'listitem6_popup_callback',          
		'rare_continuum_options',                       
		'rare_continuum_settings_section'
	);
    add_settings_field(	
		'listitem6_species1',						
		'List Item 6 Ferret Popup',					
		'listitem6_species1_callback',          
		'rare_continuum_options',                       
		'rare_continuum_settings_section'
	);
    add_settings_field(	
		'listitem6_species2',						
		'List Item 6 Bucardo Popup',					
		'listitem6_species2_callback',          
		'rare_continuum_options',                       
		'rare_continuum_settings_section'
	);
    
    
    
    
    
	// Register all fields with WordPress
	register_setting(
		'rare_continuum_options',
		'rare_continuum_options'
	);

	
}
add_action('admin_init', 'rare_initialize_continuum_options');


// theme section callbacks

function rare_continuum_options_callback() {
	echo '<p>Extinction Continuum Options/Settings.</p>';
} 


// field callbacks

function species_instructions_popup_callback($args) {
	
    $options = get_option('rare_continuum_options');  
    $html = '<input style="width: 75%;" type="text" id="species_instructions_popup" name="rare_continuum_options[species_instructions_popup]" value="' . $options['species_instructions_popup'] . '" />';
	$html .= '<label for="species_instructions_popup"> '  . $args[0] . '</label>';
	
	echo $html;
	
}
function biotech_instructions_popup_callback($args) {
	
    $options = get_option('rare_continuum_options');  
    $html = '<input style="width: 75%;" type="text" id="biotech_instructions_popup" name="rare_continuum_options[biotech_instructions_popup]" value="' . $options['biotech_instructions_popup'] . '" />';
	$html .= '<label for="biotech_instructions_popup"> '  . $args[0] . '</label>';
	
	echo $html;
	
}
function listitem1_heading_callback($args) {
	
    $options = get_option('rare_continuum_options');  
    $html = '<input style="width: 75%;" type="text" id="listitem1_heading" name="rare_continuum_options[listitem1_heading]" value="' . $options['listitem1_heading'] . '" />';
	$html .= '<label for="listitem1_heading"> '  . $args[0] . '</label>';
	
	echo $html;
	
}
function listitem1_popup_callback($args) {

    $options = get_option('rare_continuum_options');  
    $html = wp_editor( $options['listitem1_popup'], 'listitem1_popup', $settings = array('textarea_name' => 'rare_continuum_options[listitem1_popup]', 'textarea_rows' => 7) );
	$html .= '<label for="listitem1_popup"> '  . $args[0] . '</label>';
	
	echo $html;
	
}
function listitem1_species1_callback($args) {

    $options = get_option('rare_continuum_options');  
    $html = wp_editor( $options['listitem1_species1'], 'listitem1_species1', $settings = array('textarea_name' => 'rare_continuum_options[listitem1_species1]', 'textarea_rows' => 7) );
	$html .= '<label for="listitem1_species1"> '  . $args[0] . '</label>';
	
	echo $html;
	
}
function listitem1_species2_callback($args) {

    $options = get_option('rare_continuum_options');  
    $html = wp_editor( $options['listitem1_species2'], 'listitem1_species2', $settings = array('textarea_name' => 'rare_continuum_options[listitem1_species2]', 'textarea_rows' => 7) );
	$html .= '<label for="listitem1_species2"> '  . $args[0] . '</label>';
	
	echo $html;
	
}





function listitem2_heading_callback($args) {
	
    $options = get_option('rare_continuum_options');  
    $html = '<input style="width: 75%;" type="text" id="listitem2_heading" name="rare_continuum_options[listitem2_heading]" value="' . $options['listitem2_heading'] . '" />';
	$html .= '<label for="listitem2_heading"> '  . $args[0] . '</label>';
	
	echo $html;
	
}
function listitem2_popup_callback($args) {

    $options = get_option('rare_continuum_options');  
    $html = wp_editor( $options['listitem2_popup'], 'listitem2_popup', $settings = array('textarea_name' => 'rare_continuum_options[listitem2_popup]', 'textarea_rows' => 7) );
	$html .= '<label for="listitem2_popup"> '  . $args[0] . '</label>';
	
	echo $html;
	
}
function listitem2_species1_callback($args) {

    $options = get_option('rare_continuum_options');  
    $html = wp_editor( $options['listitem2_species1'], 'listitem2_species1', $settings = array('textarea_name' => 'rare_continuum_options[listitem2_species1]', 'textarea_rows' => 7) );
	$html .= '<label for="listitem2_species1"> '  . $args[0] . '</label>';
	
	echo $html;
	
}
function listitem2_species2_callback($args) {

    $options = get_option('rare_continuum_options');  
    $html = wp_editor( $options['listitem2_species2'], 'listitem2_species2', $settings = array('textarea_name' => 'rare_continuum_options[listitem2_species2]', 'textarea_rows' => 7) );
	$html .= '<label for="listitem2_species2"> '  . $args[0] . '</label>';
	
	echo $html;
	
}











function listitem3_heading_callback($args) {
	
    $options = get_option('rare_continuum_options');  
    $html = '<input style="width: 75%;" type="text" id="listitem3_heading" name="rare_continuum_options[listitem3_heading]" value="' . $options['listitem3_heading'] . '" />';
	$html .= '<label for="listitem3_heading"> '  . $args[0] . '</label>';
	
	echo $html;
	
}
function listitem3_popup_callback($args) {

    $options = get_option('rare_continuum_options');  
    $html = wp_editor( $options['listitem3_popup'], 'listitem3_popup', $settings = array('textarea_name' => 'rare_continuum_options[listitem3_popup]', 'textarea_rows' => 7) );
	$html .= '<label for="listitem3_popup"> '  . $args[0] . '</label>';
	
	echo $html;
	
}
function listitem3_species1_callback($args) {

    $options = get_option('rare_continuum_options');  
    $html = wp_editor( $options['listitem3_species1'], 'listitem3_species1', $settings = array('textarea_name' => 'rare_continuum_options[listitem3_species1]', 'textarea_rows' => 7) );
	$html .= '<label for="listitem3_species1"> '  . $args[0] . '</label>';
	
	echo $html;
	
}
function listitem3_species2_callback($args) {

    $options = get_option('rare_continuum_options');  
    $html = wp_editor( $options['listitem3_species2'], 'listitem3_species2', $settings = array('textarea_name' => 'rare_continuum_options[listitem3_species2]', 'textarea_rows' => 7) );
	$html .= '<label for="listitem3_species2"> '  . $args[0] . '</label>';
	
	echo $html;
	
}
function listitem3_species3_callback($args) {

    $options = get_option('rare_continuum_options');  
    $html = wp_editor( $options['listitem3_species3'], 'listitem3_species3', $settings = array('textarea_name' => 'rare_continuum_options[listitem3_species3]', 'textarea_rows' => 7) );
	$html .= '<label for="listitem3_species3"> '  . $args[0] . '</label>';
	
	echo $html;
	
}










function listitem4_heading_callback($args) {
	
    $options = get_option('rare_continuum_options');  
    $html = '<input style="width: 75%;" type="text" id="listitem4_heading" name="rare_continuum_options[listitem4_heading]" value="' . $options['listitem4_heading'] . '" />';
	$html .= '<label for="listitem4_heading"> '  . $args[0] . '</label>';
	
	echo $html;
	
}
function listitem4_popup_callback($args) {

    $options = get_option('rare_continuum_options');  
    $html = wp_editor( $options['listitem4_popup'], 'listitem4_popup', $settings = array('textarea_name' => 'rare_continuum_options[listitem4_popup]', 'textarea_rows' => 7) );
	$html .= '<label for="listitem4_popup"> '  . $args[0] . '</label>';
	
	echo $html;
	
}
function listitem4_species1_callback($args) {

    $options = get_option('rare_continuum_options');  
    $html = wp_editor( $options['listitem4_species1'], 'listitem4_species1', $settings = array('textarea_name' => 'rare_continuum_options[listitem4_species1]', 'textarea_rows' => 7) );
	$html .= '<label for="listitem4_species1"> '  . $args[0] . '</label>';
	
	echo $html;
	
}
function listitem4_species2_callback($args) {

    $options = get_option('rare_continuum_options');  
    $html = wp_editor( $options['listitem4_species2'], 'listitem4_species2', $settings = array('textarea_name' => 'rare_continuum_options[listitem4_species2]', 'textarea_rows' => 7) );
	$html .= '<label for="listitem4_species2"> '  . $args[0] . '</label>';
	
	echo $html;
	
}







function listitem5_heading_callback($args) {
	
    $options = get_option('rare_continuum_options');  
    $html = '<input style="width: 75%;" type="text" id="listitem5_heading" name="rare_continuum_options[listitem5_heading]" value="' . $options['listitem5_heading'] . '" />';
	$html .= '<label for="listitem5_heading"> '  . $args[0] . '</label>';
	
	echo $html;
	
}
function listitem5_popup_callback($args) {

    $options = get_option('rare_continuum_options');  
    $html = wp_editor( $options['listitem5_popup'], 'listitem5_popup', $settings = array('textarea_name' => 'rare_continuum_options[listitem5_popup]', 'textarea_rows' => 7) );
	$html .= '<label for="listitem5_popup"> '  . $args[0] . '</label>';
	
	echo $html;
	
}
function listitem5_species1_callback($args) {

    $options = get_option('rare_continuum_options');  
    $html = wp_editor( $options['listitem5_species1'], 'listitem5_species1', $settings = array('textarea_name' => 'rare_continuum_options[listitem5_species1]', 'textarea_rows' => 7) );
	$html .= '<label for="listitem5_species1"> '  . $args[0] . '</label>';
	
	echo $html;
	
}
function listitem5_species2_callback($args) {

    $options = get_option('rare_continuum_options');  
    $html = wp_editor( $options['listitem5_species2'], 'listitem5_species2', $settings = array('textarea_name' => 'rare_continuum_options[listitem5_species2]', 'textarea_rows' => 7) );
	$html .= '<label for="listitem5_species2"> '  . $args[0] . '</label>';
	
	echo $html;
	
}






function listitem6_heading_callback($args) {
	
    $options = get_option('rare_continuum_options');  
    $html = '<input style="width: 75%;" type="text" id="listitem6_heading" name="rare_continuum_options[listitem6_heading]" value="' . $options['listitem6_heading'] . '" />';
	$html .= '<label for="listitem6_heading"> '  . $args[0] . '</label>';
	
	echo $html;
	
}
function listitem6_popup_callback($args) {

    $options = get_option('rare_continuum_options');  
    $html = wp_editor( $options['listitem6_popup'], 'listitem6_popup', $settings = array('textarea_name' => 'rare_continuum_options[listitem6_popup]', 'textarea_rows' => 7) );
	$html .= '<label for="listitem6_popup"> '  . $args[0] . '</label>';
	
	echo $html;
	
}
function listitem6_species1_callback($args) {

    $options = get_option('rare_continuum_options');  
    $html = wp_editor( $options['listitem6_species1'], 'listitem6_species1', $settings = array('textarea_name' => 'rare_continuum_options[listitem6_species1]', 'textarea_rows' => 7) );
	$html .= '<label for="listitem6_species1"> '  . $args[0] . '</label>';
	
	echo $html;
	
}
function listitem6_species2_callback($args) {

    $options = get_option('rare_continuum_options');  
    $html = wp_editor( $options['listitem6_species2'], 'listitem6_species2', $settings = array('textarea_name' => 'rare_continuum_options[listitem6_species2]', 'textarea_rows' => 7) );
	$html .= '<label for="listitem6_species2"> '  . $args[0] . '</label>';
	
	echo $html;
	
}