<?php 

if( class_exists('Cta_Public') ) {
	return;
}

class Cta_Public {

	public function __construct() {

		$this->register_shortcodes();

	}

	// Register Shortcodes 
	public function register_shortcodes() {

		add_shortcode( 'cta_button', array( $this, 'create_cta_button' ) );

	}

	public function create_cta_button( $atts ) {

		$atts = shortcode_atts(
			array(
				'id' => ''
			), 
			$atts, 'cta_button' );
		
		$id = $atts['id'];

		ob_start();
			if( !empty( $id ) ) {
				if( !empty( get_field('cta_url', $id ) ) ) {
					$label  = get_field('cta_label', $id );
					$url  = get_field('cta_url', $id );
					$classes  = get_field('cta_class', $id );
					$new_tab  = get_field('cta_new_tab', $id );
					include( plugin_dir_path( __DIR__ ) . 'templates/cta-link.php');
				}
			}
		return ob_get_clean();
	}
} 