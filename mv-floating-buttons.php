<?php

/**
 *
 * @link              https://www.mediavalet.com/
 * @since             1.0.0
 * @package           Mv_Floating_Buttons
 *
 * @wordpress-plugin
 * Plugin Name:       Media Valet Floating Buttons
 * Plugin URI:        https://www.mediavalet.com/
 * Description:       Displays the floating buttons on the left side of every page. Developed for creating links to MediaValet's Demo and ROI pages.
 * Version:           1.0.0
 * Author:            Media Valet - JP
 * Author URI:        https://www.mediavalet.com/
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       mv-floating-buttons
 * Domain Path:       /languages
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

/**
 * Currently plugin version.
 * Start at version 1.0.0 and use SemVer - https://semver.org
 * Rename this for your plugin and update it as you release new versions.
 */
define( 'PLUGIN_NAME_VERSION', '1.0.0' );

/**
 * The code that runs during plugin activation.
 * This action is documented in includes/class-mv-floating-buttons-activator.php
 */
function activate_mv_floating_buttons() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-mv-floating-buttons-activator.php';
	Mv_Floating_Buttons_Activator::activate();
}

/**
 * The code that runs during plugin deactivation.
 * This action is documented in includes/class-mv-floating-buttons-deactivator.php
 */
function deactivate_mv_floating_buttons() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-mv-floating-buttons-deactivator.php';
	Mv_Floating_Buttons_Deactivator::deactivate();
}

register_activation_hook( __FILE__, 'activate_mv_floating_buttons' );
register_deactivation_hook( __FILE__, 'deactivate_mv_floating_buttons' );

/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */
require plugin_dir_path( __FILE__ ) . 'includes/class-mv-floating-buttons.php';

/**
 * Begins execution of the plugin.
 *
 *
 * @since    1.0.0
 */

function run_mv_floating_buttons() {

	$plugin = new Mv_Floating_Buttons();
	$plugin->run();

}

run_mv_floating_buttons();

// Function to display floating buttons pushed to footer area
function displayButtons() {

	// Use the 'floatButton' class in the <a> tag sections to create additional floating Icons
	// Icons are imported from Font Awesome version 4.7 - Visit https://fontawesome.com/icons?d=gallery for full list
    echo '<div id="floatButtonContainer" class="flyIn">

						<a class="floatButton fb-green fb-btn1" href="https://www.mediavalet.com/request-live-demo/" target="_blank">
							<span class="float-text">Request a Free Demo</span>
							<span class="float-icon"><i class="fa fa-cloud"></i></span>
						</a>

		    		<a class="floatButton fb-orange fb-btn2" href="https://www.mediavalet.com/digital-asset-management-roi/" target="_blank">
							<span class="float-text">ROI Calculator</span>
							<span class="float-icon fi-roi"><i class="fa fa-line-chart"></i></span>
						</a>

    	  </div>
				<button id="buttonToggleOff"><i class="fa fa-caret-left
"></i></button>

<button id="buttonToggleOn"><i class="fa fa-caret-right
"></i></button>';


}

//Pushes the function to WordPress, displays floating buttons. Action requires theme to use wp_footer in its template
add_action( 'wp_footer', 'displayButtons' );
