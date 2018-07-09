<?php
/**
 * Define the metabox and field configurations.
 */

if( class_exists('Meta_Boxes') ) {
	return;
}

class Meta_Boxes {

	public function __construct() {

		$this->load_includes();
		$this->load_hooks();
		$this->create_fields();

	}

	public function load_includes() {

		if ( file_exists( plugin_dir_path( __FILE__ ) . 'lib/acf/acf.php' ) ) {
			require_once plugin_dir_path( __FILE__ ) . 'lib/acf/acf.php';
		}

	}

	public function load_hooks() {

		add_filter('acf/settings/path', array( $this, 'new_acf_settings_path') );
		add_filter('acf/settings/dir', array( $this, 'new_acf_settings_dir') );
		add_filter('acf/settings/show_admin', '__return_false' );

	}
	 
	public function new_acf_settings_path( $path ) { 

	    $path = plugin_dir_path( __FILE__ ) . 'lib/acf/';
	    return $path;    

	}
	 
	public function new_acf_settings_dir( $dir ) {

	    $dir = plugin_dir_url( __FILE__ ) . 'lib/acf/';
	    return $dir;

	}

	public function create_fields() {

		// Start CTA Button fields
		$pid = $_GET['post'];
		if( !empty( $pid ) ) {
			$shortcode_paste = '[cta_button id=' . $pid . ']';
		}
		acf_add_local_field_group( array (
			'key'      => 'CTA_fields',
			'title'    => 'CTA Fields',
			'location' => array (
				array (
					array (
						'param'    => 'post_type',
						'operator' => '==',
						'value'    => 'cta',
					),
				),
			),
			'menu_order'            => 0,
			'position'              => 'normal',
			'style'                 => 'default',
			'label_placement'       => 'top',
			'instruction_placement' => 'label',
			'hide_on_screen'        => array('the_content'),
		) );

		acf_add_local_field( array(
			'key'          => 'main_tab',
			'label'        => 'Main',
			'name'         => 'main_tab',
			'type'         => 'tab',
			'parent'       => 'CTA_fields',
			'instructions' => '',
			'required'     => 1,
		) );

		acf_add_local_field( array(
			'key'          => 'cta_label',
			'label'        => 'CTA Button Label',
			'name'         => 'cta_label',
			'type'         => 'text',
			'parent'       => 'CTA_fields',
			'instructions' => $shortcode_paste,
			'required'     => 0
		) );

		acf_add_local_field( array(
			'key'          => 'cta_url',
			'label'        => 'CTA Button URL',
			'name'         => 'cta_url',
			'type'         => 'url',
			'parent'       => 'CTA_fields',
			'instructions' => '',
			'required'     => 1,
		) );

		acf_add_local_field( array(
			'key'          => 'cta_new_tab',
			'label'        => 'Link New Tab?',
			'name'         => 'cta_new_tab',
			'type'         => 'true_false',
			'parent'       => 'CTA_fields',
			'instructions' => '',
			'required'     => 0,
		) );

		acf_add_local_field( array(
			'key'          => 'developer_tab',
			'label'        => 'For Developers',
			'name'         => 'developer_tab',
			'type'         => 'tab',
			'parent'       => 'CTA_fields',
			'instructions' => '',
			'required'     => 1,
		) );

		acf_add_local_field( array(
			'key'          => 'cta_class',
			'label'        => 'CTA Button Class',
			'name'         => 'cta_class',
			'type'         => 'text',
			'parent'       => 'CTA_fields',
			'instructions' => 'For Developers add css class on it put space to add more classes',
			'required'     => 0,
		) );
		// End CTA Button fields
		
	}

}