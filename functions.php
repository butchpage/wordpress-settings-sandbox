<?php
/**
 * Setting Registration
 */

/**
 * Initializes the theme options page by registering the Sections, Field, and Settings
 *
 * This function is registered with the 'admin_init' hook.
 */

add_action( 'admin_init', 'sandbox_initialize_theme_options' );

function sandbox_initialize_theme_options() {

	// First we register a section. This is necessary since all future options must belong to one.
	add_settings_section(
		'general_settings_section', 				 // ID used to identify this section and with which to register options.
		'Sandbox Options'                 ,  // Title to be displayed on the admin page
		'sandbox_general_options_callback',  // Callback to be used to render the description of the section.
		'general' 													 // Page on which to add this section of options.
	);

	// Next we will introduce the fields for toggling the visability of content elements.
	add_settings_field(
		'show_header', 										// ID used to identify the field throught the theme.
		'Header',  												// The label to the left of the option interface element.
		'sandbox_toggle_header_callback', // The name of the function responsible for rendering the option interface.
		'general', 												// The page on which this option will be displayed.
		'general_settings_section', 			// The name of the section to which this field belongs.
		array( 														// The array of arguments to pass to the callback. In this case, just the description.
			'Activate this setting to display the header.'
		)
	);

	// Show the content field.
	add_settings_field( 'show_content', 'Content', 'sandbox_toggle_content_callback', 'general', 'general_settings_section', array( 'Activate this section to display the content' ) );

	// Show the footer field.
	add_settings_field( 'show_footer', 'Footer', 'sandbox_toggle_footer_callback', 'general', 'general_settings_section', array( 'Activate this section to display the footer' ) );

	// Finally, we register the fields with WordPress
	register_setting( 'general', 'show_header' );
	register_setting( 'general', 'show_content' );
	register_setting( 'general', 'show_footer' );
} // end sandbox_initialize_theme_options

/**
 * Section Callbacks
 */

/**
 * This function provides a simple description for the General Options page.
 *
 * It is called from the 'sandbox_initialize_theme_options' function by being passed as a parameter
 * in the add_settings_section function.
 */
 function sandbox_general_options_callback() {
 	echo '<p>Select which area of content you wish to display.</p>';
 } // end sandbox_general_options_callback

/**
 * This function renders the interface elements for toggling the visability of the header.
 *
 * It accepts and array of arguments and expects the first element in the array to be the
 * description to be displayed next to the callback.
 */
 function sandbox_toggle_header_callback( $args ) {

 	// Note the ID and the name attribute of the element should match that of the ID in the call to add_settings_field
 	$html = '<input type="checkbox" id="show_header" name="show_header" value="1" ' . checked( 1, get_option( 'show_header' ), false ) . '/>';

 	// Here we will take the first argument of the array and add it to a label next to the checkbox.
 	$html .= '<label for="show_header"> ' . $args[0] . '</lable>';

 	echo $html;
 }// end sandbox_toggle_header_callback

 function sandbox_toggle_content_callback( $args ) {
 	$html = '<input type="checkbox" id="show_content" name="show_content" value="1" ' . checked( 1, get_option( 'show_content'), false) . '/>';
 	$html .= '<label for="show_content"> ' . $args[0] . '</lable>';
 	echo $html;
 } // end sandbox_toggle_content_callback

 function sandbox_toggle_footer_callback( $args ) {
 	$html = '<input type="checkbox" id="show_footer" name="show_footer" value="1" ' . checked( 1, get_option( 'show_footer' ), false ) . '/>';
 	$html .= '<label for="show_footer"> ' . $args[0] . '</label>';
 	echo $html;
 }

/**
 * Create Menu
 */
function sandbox_create_menu_page(){

	add_menu_page(
			'Sandbox Options', 					// The title to be displayed on the corrisponding page fro this menu.
			'Sandbox', 				 					// The text to be displayed for this actual menu item.
			'administrator',   					// Which type of user can see this menu.
			'sandbox',				 					//	The unique ID - that is the slug - for this menu item.
			'sandbox_menu_page_display', // The name of the function to call when rendering the menu for this page.
			''
		);

	add_submenu_page(
			'sandbox', 								// Register this submenu with the menu defined above.
			'Sandbox Options', 				// The text to display in the browser when this menu is active.
			'Options', 								// The text for this menu name.
			'administrator', 					// Which type of user can see this menu item.
			'sandbox_options',        // The unique ID - the slug - for this menu item.
			'sandbox_options_display' // The function used to render the menu for this page to the screen.
		);

} // end sandbox_create_menu_page
add_action( 'admin_menu', 'sandbox_create_menu_page' );

function sandbox_menu_page_display() {
	// Create a header in the default WordPress 'wrap' container
	$html = '<div class="wrap">';
		$html .= '<h2>Sandbox</h2>';
	$html .= '</div>';

	// Send the markup to the browser
	echo $html;

} // end sandbox_menu_page_display

function sandbox_options_display(){
	// Create a header in the default WordPress 'wrap' container
	$html = '<div class="wrap">';
		$html .= '<h2>Sandbox Options</h2>';
	$html .= '</div>';

	// Send the markup to the browser.
	echo $html;
} // end sandbox_options_display





// these are optional examples to add option pages to plugins and theme menu pages.

/**
 * Plugin menu example
 */
function sandbox_example_plugin_menu() {
	add_plugins_page(
		'Sandbox Plugin', // The title to be displayed in the browser window for this page.
		'Sandbox Plugin', // The text to be displayed for this menu item.
		'administrator',  // Which type of users can see this menu item.
		'sandbox_plugin_options', // The unique ID - the slug - for this menu item.
		'sandbox_plugin_display' // The name of the function to call when rendering the page for this menu.
	);

} // end sandbox_example_plugin_menu
add_action( 'admin_menu', 'sandbox_example_plugin_menu' );

function sandbox_plugin_display() {
	// Create the header in the default WordPress 'wrap' container
	$html = '<div class="wrap">';
		$html .= '<h2>Sandbox Pluing Options</h2>';
	$html .= '<p class="description">There are currently no options. This is just for demo purposes.</p>';
	$html .= '</div>';

	// Send the markup to the browser
	echo $html;
} // end sandbox_plugin_display

/**
 * Theme menu example
 */
function sandbox_example_theme_menu() {

	add_theme_page(
		'Sandbox Theme',         // The title to be displayed in the browser window for this page.
		'Sandbox Theme',  			 // The text to be displayed for this menu item.
		'administrator', 				 // Which type of users can see this menu item.
		'sandbox_theme_options', // The unique ID - the slug - for this menu item.
		'sandbox_theme_display'  // The name of the function to call when rendering the page for this menu.
	);
} // end sandbox_example_theme_menu
add_action( 'admin_menu', 'sandbox_example_theme_menu' );

/**
 * Renders a simple page to display for the theme menu defined above.
 */
function sandbox_theme_display() {
	// Create a header in the default WordPress 'wrap' container.
	$html = '<div class="wrap">';
		$html .= '<h2>Sandbox Theme Options</h2>';
		$html .= '<p class="description">There are currently no options. This is just for demo.</p>';
	$html .= '</div>';

	// Send the markup to the browser.
	echo $html;
}// end sandbox_theme_display.

?>