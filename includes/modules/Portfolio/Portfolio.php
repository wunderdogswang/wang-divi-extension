<?php

class DIEX_Porftolio extends ET_Builder_Module {

	public $slug       = 'diex_portfolio';
	public $vb_support = 'on';

	protected $module_credits = array(
		'module_uri' => '',
		'author'     => '',
		'author_uri' => '',
	);

	public function init() {
		$this->name = esc_html__( 'Portfolio', 'diex-divi-extension' );
	}

	public function get_fields() {
		return [];
	}

	public function render( $attrs, $content = null, $render_slug ) {

		return 'Portfolio';
	}
}

new DIEX_Porftolio;
