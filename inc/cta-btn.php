<?php
/**
 * This controls the plugin
 * @package  Cta_Btn
 */

class Cta_Btn {

	public function __construct() {

		$this->load_includes();
		$Admin = new Cta_Admin;
		$Public = new Cta_Public;
		$this->load_assets();

	}

	//Include admin and Public files
	public function load_includes() {

		include_once( plugin_dir_path( __FILE__ ) . 'admin/cta-admin.php' );
		include_once( plugin_dir_path( __FILE__ ) . 'public/cta-public.php' );

	}

	//Load Assets
	public function load_assets() {

		add_action( 'wp_enqueue_scripts', array( $this, 'register_assets' ) );

	}

	public function register_assets() {

		wp_enqueue_style( 'font-awesome', '//maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css' );
		wp_enqueue_style( 'cta-style', plugin_dir_url( __FILE__ ) . 'css/cta-style.css', array(), '1.0' );

	}

}