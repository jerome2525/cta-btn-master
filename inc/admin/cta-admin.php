<?php 
class Cta_Admin {

	public function __construct() {

		$this->load_includes();
		$this->register_post_type();
		$meta_boxes = new Meta_Boxes;
		$this->register_post_col();

	}

	public function load_includes() {

		include_once( plugin_dir_path( __DIR__ ) . 'lib/CPT.php' );
		include_once( plugin_dir_path( __DIR__ ) . 'meta-boxes.php' );

	}

	public function register_post_type() {

		$cta = new CPT(array(
			'post_type_name' => 'cta',
			'singular' => 'CTA Button',
			'plural' => 'CTA Button',
			'slug' => 'cta'
		));

		$cta->menu_icon( 'dashicons-admin-links' );

	}

	public function register_post_col() {
		add_filter( 'manage_cta_posts_columns', array( $this, 'columns_head_cta' ), 10 );
		add_action( 'manage_cta_posts_custom_column', array( $this, 'columns_content_cta' ), 10, 2 );
	}

	public function columns_head_cta( $defaults ) {
	    $defaults['cta_shortcode_column'] = 'CTA Button Shortcodes';
	    return $defaults;
	}

	public function columns_content_cta( $column_name, $cta_ID ) {
	    if ( $column_name == 'cta_shortcode_column' ) {
	        echo '[cta_button id=' . $cta_ID . ']';
	    }
	}

}