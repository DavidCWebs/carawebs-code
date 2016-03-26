<?php

/**
 * The public-facing functionality of the plugin.
 *
 * @link       http://example.com
 * @since      1.0.0
 *
 * @package    Plugin_Name
 * @subpackage Plugin_Name/public
 */

/**
 * The public-facing functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the admin-specific stylesheet and JavaScript.
 *
 * @package    Plugin_Name
 * @subpackage Plugin_Name/public
 * @author     Your Name <email@example.com>
 */
class Plugin_Name_Public {

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
	 * Register_shortcodes
	 *
	 * @since		1.0.0
	 *
	 */
	public function register_shortcodes() {

		add_shortcode( 'code', array( $this, 'code_shortcode') );
		//add_shortcode( 'anothershortcode', array( $this, 'another_shortcode_function') );

	}

	/**
	 * Define basic shortcode for the address.
	 *
	 * Callback function returning address HTML to the `add_shortcode` hook.
	 *
	 * @since		1.0.0
	 * @param  [type] $atts [description]
	 * @return string Returns the address as a HTML block
	 */
	public static function code_shortcode( $atts, $content ){

		$a = shortcode_atts( array(
		'class'=>'php',
		), $atts );

	  $newcontent = $content;

		return '<pre><code class="' . esc_attr($a['class']) . '">' . $newcontent . '</code></pre>';

	}

	public function remove_autop() {

		remove_filter( 'the_content', 'wpautop' );
		add_filter( 'the_content', 'wpautop' , 12);

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
		 * defined in Plugin_Name_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Plugin_Name_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		if ( is_single() || is_archive() || is_home() ){

			wp_enqueue_style( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'css/styles/atelier-dune.dark.css', array(), $this->version, 'all' );

		}

	}

	/**
	 * Register the stylesheets for the public-facing side of the site.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_scripts() {

		if ( is_single() || is_archive() || is_home() ){

      wp_enqueue_script( 'highlight', plugin_dir_url( __FILE__ ) . 'js/highlight.pack.min.js', '', false );
      wp_enqueue_script( 'highlight-control', plugin_dir_url( __FILE__ ) . 'js/highlight.control.js', '', false );

    }

		//wp_enqueue_script( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'js/carawebs-code-public.js', array( 'jquery' ), $this->version, false );

	}

}
