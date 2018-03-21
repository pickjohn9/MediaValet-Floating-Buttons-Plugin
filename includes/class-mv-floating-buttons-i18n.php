<?php

/**
 * Define the internationalization functionality
 *
 * Loads and defines the internationalization files for this plugin
 * so that it is ready for translation.
 *
 * @link       https://www.mediavalet.com/
 * @since      1.0.0
 *
 * @package    Mv_Floating_Buttons
 * @subpackage Mv_Floating_Buttons/includes
 */

/**
 * Define the internationalization functionality.
 *
 * Loads and defines the internationalization files for this plugin
 * so that it is ready for translation.
 *
 * @since      1.0.0
 * @package    Mv_Floating_Buttons
 * @subpackage Mv_Floating_Buttons/includes
 * @author     Media Valet - JP <john.pick@mediavalet.com>
 */
class Mv_Floating_Buttons_i18n {


	/**
	 * Load the plugin text domain for translation.
	 *
	 * @since    1.0.0
	 */
	public function load_plugin_textdomain() {

		load_plugin_textdomain(
			'mv-floating-buttons',
			false,
			dirname( dirname( plugin_basename( __FILE__ ) ) ) . '/languages/'
		);

	}



}
