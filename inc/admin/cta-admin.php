<?php 
class Cta_Admin {

	public function __construct() {

		$this->load_includes();
		$this->register_post_type();
		new Meta_Boxes;
		$this->register_post_col();
		$this->register_rem_view_links();

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

	//Hide All view button,links in the post type admin
	public function register_rem_view_links() {
		add_filter( 'post_row_actions', array( $this, 'remove_view_row_action' ), 10, 1 );
		add_action( 'wp_before_admin_bar_render', array( $this, 'remove_view_button_admin_bar' ) );
		add_action( 'admin_head', array( $this, 'hide_view_button' ) );
	}

	public function remove_view_row_action( $actions ) {

		if( get_post_type() === 'cta' ) {
			unset( $actions['view'] );
			return $actions;
		}
	
	}

	public function remove_view_button_admin_bar() {

		global $wp_admin_bar;
		if( get_post_type() === 'cta') {
			$wp_admin_bar->remove_menu('view');
		}

	}

	public function hide_view_button() {

		$current_screen = get_current_screen();
		if( $current_screen->post_type === 'cta' ) {
			echo '<style>#edit-slug-box, #message a {display: none;}</style>';
		}

	}

}