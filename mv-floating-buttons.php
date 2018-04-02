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
 * Version:           1.2.0
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


//Pushes the function to WordPress, displays floating buttons. Action requires theme to use wp_footer in its template
add_action( 'wp_footer', 'displayButtons' );


// Function to display floating buttons pushed to footer area
function displayButtons() {

	// Use the 'floatButton' class in the <a> tag sections to create additional floating Icons
	// Icons are imported from Font Awesome version 4.7 - Visit https://fontawesome.com/icons?d=gallery for full list
    echo '
			<fb-button-wrapper">
					<div id="floatButtonContainer" class="flyIn">' .
					constructButton('fb_icon1_link', 'fb_icon1_bgcolor', 'fb_icon1_label', 'icon-img1') . '' .
					constructButton('fb_icon2_link', 'fb_icon2_bgcolor', 'fb_icon2_label', 'icon-img2') .
					'
    	  </div>
			</div>

				<button id="buttonToggleOff" class="flyIn"><i class="fa fa-caret-left
"></i></button>

				<button id="buttonToggleOn"><i class="fa fa-caret-right
				"></i></button>
';
}


// Function for assembling and returning a floating button
function constructButton($link, $color, $label, $img){
		return '<a class="floatButton" href="' . get_option($link) . '" target="_blank" style="background-color: #'. get_option($color) . ';">
									<span class="float-text"> ' . get_option($label) . '</span>
									<span class="float-icon">' . printIcon($img, $width = 35, $height = 35) . '</span>
								</a>';
}


// -------------- Creating Plugin Custom Options for the two icons -------------- //

add_action( 'admin_menu', 'floating_buttons_menu' );

function floating_buttons_menu(){

  $page_title = 'WordPress Floating Button Options';
  $menu_title = 'Floating Button Options';
  $capability = 'manage_options';
  $menu_slug  = 'floating-buttons-options';
  $function   = 'floating_buttons_page';
  $icon_url   = 'dashicons-image-filter';
  $position   = 4;

  add_menu_page( $page_title,
                 $menu_title,
                 $capability,
                 $menu_slug,
                 $function,
                 $icon_url,
                 $position );

  add_action('admin_init', 'update_button_options');
}

function update_button_options(){
		register_setting('fb-label-settings', 'fb_icon1_label');
		register_setting('fb-label-settings', 'fb_icon1_link');
		register_setting('fb-label-settings', 'fb_icon1_img');
		register_setting('fb-label-settings', 'fb_icon1_bgcolor');

		register_setting('fb-label-settings', 'fb_icon2_label');
		register_setting('fb-label-settings', 'fb_icon2_link');
		register_setting('fb-label-settings', 'fb_icon2_img');
		register_setting('fb-label-settings', 'fb_icon2_bgcolor');
}


function floating_buttons_page(){
		?>
		  <h1>Floating Button Options</h1>
			<form id="floatingButtonsOptionsForm" method="post" action="options.php">
	    <?php settings_fields( 'fb-label-settings' ); ?>
	    <?php do_settings_sections( 'fb-label-settings' ); ?>
	    <table class="form-table">
	      <tr valign="top">
	      <th scope="row">Icon 1 Label:</th>
	      <td><input type="text" name="fb_icon1_label" value="<?php echo get_option( 'fb_icon1_label' ); ?>"  class="optionInput"/></td>
				<td rowspan="2">
					<?php jp_image_uploader( 'icon-img1', $width = 115, $height = 115 );?>
				</td>
	      </tr>
				<tr>
				<th scope="row">Icon 1 Link Address:</th>
				<td><input type="text" name="fb_icon1_link" value="<?php echo get_option( 'fb_icon1_link' ); ?>"  class="optionInput"/></td>
				</tr>
	      <tr>
	      <th scope="row">Icon 1 Background Color:</th>
	      <td> <input class="jscolor" name ="fb_icon1_bgcolor" value="<?php echo get_option( 'fb_icon1_bgcolor' ); ?>"> </td>

	      </tr>

				<th scope="row">Icon 2 Label:</th>
	      <td><input type="text" name="fb_icon2_label" value="<?php echo get_option( 'fb_icon2_label' ); ?>"  class="optionInput"/></td>
				<td rowspan="2">
					<?php jp_image_uploader( 'icon-img2', $width = 115, $height = 115 );?>
				</td>
	      </tr>
				<tr>
				<th scope="row">Icon 2 Link Address:</th>
				<td><input type="text" name="fb_icon2_link" value="<?php echo get_option( 'fb_icon2_link' ); ?>"  class="optionInput"/></td>
				</tr>
	      <tr>
	      <th scope="row">Icon 2 Background Color:</th>
	      <td> <input class="jscolor" name ="fb_icon2_bgcolor" value="<?php echo get_option( 'fb_icon2_bgcolor' ); ?>"> </td>

	      </tr>
				<tr>

				</tr>
	    </table>
	    <?php submit_button(); ?>
  	</form>
		<?php
}

//Function to call the display of the Icon on the front end
function printIcon($name, $width, $height) {
	// Set variables
	$options = get_option( 'fb_icon1_img' );
	$default_image = plugins_url('img/demo.png', __FILE__);

	if ( !empty( $options[$name] ) ) {
			$image_attributes = wp_get_attachment_image_src( $options[$name], array( $width, $height ) );
			$src = $image_attributes[0];
			$value = $options[$name];
	} else {
			$src = $default_image;
}

	// Print Icon field
	return '<img data-src="' . $default_image . '" src="' . $src . '" width="' . $width . 'px" height="' . $height . 'px" />';
}

//For Image Icon Upload on the plugin options page
function jp_image_uploader( $name, $width, $height ) {

    // Set variables
    $options = get_option( 'fb_icon1_img' );
    $default_image = plugins_url('img/demo.png', __FILE__);

    if ( !empty( $options[$name] ) ) {
        $image_attributes = wp_get_attachment_image_src( $options[$name], array( $width, $height ) );
        $src = $image_attributes[0];
        $value = $options[$name];
    } else {
        $src = $default_image;
        $value = '';
    }

    $text = __( 'Upload PNG', RSSFI_TEXT );

    // Print HTML field
    echo '
					<div class="upload">
            <img data-src="' . $default_image . '" src="' . $src . '" width="' . $width . 'px" height="' . $height . 'px" />
            <div>
                <input type="hidden" name="fb_icon1_img[' . $name . ']" id="fb_icon1_img[' . $name . ']" value="' . $value . '" />
                <button type="submit" class="upload_image_button button">' . $text . '</button>
                <button type="submit" class="remove_image_button button">&times;</button>
            </div>
        </div>
    ';
}

/**
 * Load scripts and style sheet for settings page
 */
function jp_load_scripts_admin() {
    // WordPress library
    wp_enqueue_media();

}
add_action( 'admin_enqueue_scripts', 'jp_load_scripts_admin' );
