<?php


class Kkd_Pff_Rave {

	protected $loader;
	protected $plugin_name;
	protected $version;

	public function __construct() {

		$this->plugin_name = 'pff-rave';
		$this->version = '1.0.0';

		$this->load_dependencies();
		$this->define_admin_hooks();
		$this->define_public_hooks();
		add_action( 'init', array( &$this, 'setup_tinymce_plugin' ) );


	}

	function setup_tinymce_plugin() {

			if ( ! current_user_can( 'edit_posts' ) && ! current_user_can( 'edit_pages' ) ) {
					return;
			}
			if ( get_user_option( 'rich_editing' ) !== 'true' ) {
					return;
			}

			add_filter( 'mce_external_plugins', array( &$this, 'add_tinymce_plugin' ) );
			add_filter( 'mce_buttons', array( &$this, 'add_tinymce_toolbar_button' ) );

	}

	function add_tinymce_plugin( $plugin_array ) {

			$plugin_array['custom_class'] = plugin_dir_url( dirname( __FILE__ ) ) . 'assets/js/admin.js';
			return $plugin_array;

	}
	function add_tinymce_toolbar_button( $buttons ) {

			array_push( $buttons, 'custom_class' );
			return $buttons;

	}

	private function load_dependencies() {
		require_once plugin_dir_path( dirname( __FILE__ ) ) . 'includes/rave-loader.php';
		require_once plugin_dir_path( dirname( __FILE__ ) ) . 'includes/admin.php';
		require_once plugin_dir_path( dirname( __FILE__ ) ) . 'includes/frontend.php';
		
		$this->loader = new Kkd_Pff_Rave_Loader();

	}
	private function define_admin_hooks() {

		$plugin_admin = new Kkd_Pff_Rave_Admin( $this->get_plugin_name(), $this->get_version() );

		$this->loader->add_action( 'admin_enqueue_scripts', $plugin_admin, 'enqueue_styles' );
		$this->loader->add_action( 'admin_enqueue_scripts', $plugin_admin, 'enqueue_scripts' );

	}

	private function define_public_hooks() {

		$plugin_public = new Kkd_Pff_Rave_Public( $this->get_plugin_name(), $this->get_version() );

		$this->loader->add_action( 'wp_enqueue_scripts', $plugin_public, 'enqueue_styles' );
		$this->loader->add_action( 'wp_enqueue_scripts', $plugin_public, 'enqueue_scripts' );

	}
	public function run() {
		$this->loader->run();
	}
	public function get_plugin_name() {
		return $this->plugin_name;
	}
	public function get_loader() {
		return $this->loader;
	}
	public function get_version() {
		return $this->version;
	}

}
