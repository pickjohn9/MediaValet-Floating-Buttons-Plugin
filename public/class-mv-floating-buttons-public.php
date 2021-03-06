<?php

/**
 * The public-facing functionality of the plugin.
 *
 * @link       https://www.mediavalet.com/
 * @since      1.1.0
 *
 * @package    Mv_Floating_Buttons
 * @subpackage Mv_Floating_Buttons/public
 */

/**
 * The public-facing functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the public-facing stylesheet and JavaScript.
 *
 * @package    Mv_Floating_Buttons
 * @subpackage Mv_Floating_Buttons/public
 * @author     Media Valet - JP <john.pick@mediavalet.com>
 */
class Mv_Floating_Buttons_Public {

	/**
	 * The ID of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $plugin_name    The ID of this plugin.
	 */
	private $plugin_name;

	/**
	 * The version of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $version    The current version of this plugin.
	 */
	private $version;

	/**
	 * Initialize the class and set its properties.
	 *
	 * @since    1.0.0
	 * @param      string    $plugin_name       The name of the plugin.
	 * @param      string    $version    The version of this plugin.
	 */
	public function __construct( $plugin_name, $version ) {

		$this->plugin_name = $plugin_name;
		$this->version = $version;

	}

	/**
	 * Register the stylesheets for the public-facing side of the site.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_styles() {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Mv_Floating_Buttons_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Mv_Floating_Buttons_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_style( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'css/mv-floating-buttons-public.css', array(), $this->version, 'all' );

		// Included for use of Font Awesome Icons, can be used in place of images, needs to be encoded as of now (not available in plugin options)
		wp_enqueue_style('font-awesome', '//maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css');

	}

	/**
	 * Register the JavaScript for the public-facing side of the site.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_scripts() {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Mv_Floating_Buttons_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Mv_Floating_Buttons_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_script( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'js/mv-floating-buttons-public.js', array( 'jquery' ), $this->version, false );

	}

}
