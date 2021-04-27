<?php

class DIEX_DiviExtension extends DiviExtension {

	/**
	 * The gettext domain for the extension's translations.
	 *
	 * @since 1.0.0
	 *
	 * @var string
	 */
	public $gettext_domain = 'diex-divi-extension';

	/**
	 * The extension's WP Plugin name.
	 *
	 * @since 1.0.0
	 *
	 * @var string
	 */
	public $name = 'divi-extension';

	/**
	 * The extension's version
	 *
	 * @since 1.0.0
	 *
	 * @var string
	 */
	public $version = '1.0.0';

	/**
	 * DIEX_DiviExtension constructor.
	 *
	 * @param string $name
	 * @param array  $args
	 */
	public function __construct( $name = 'divi-extension', $args = array() ) {
		$this->plugin_dir     = plugin_dir_path( __FILE__ );
		//$this->plugin_dir_url = plugin_dir_url( $this->plugin_dir );
        $this->plugin_dir_url = get_stylesheet_directory_uri() . '/divi-extension/';

		parent::__construct( $name, $args );
	}
}

new DIEX_DiviExtension;