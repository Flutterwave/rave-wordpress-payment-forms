<?php


class Kkd_Pff_Rave {

	protected $loader;
	protected $plugin_name;
	protected $version;

	public function __construct() {

		$this->plugin_name = 'pff-rave';
		$this->version = '1.0.1';

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
		require_once plugin_dir_path( dirname( __FILE__ ) ) . 'includes/custom-class-merchants/merchant-one.php';
		require_once plugin_dir_path( dirname( __FILE__ ) ) . 'includes/custom-class-merchants/merchant-two.php';
		require_once plugin_dir_path( dirname( __FILE__ ) ) . 'includes/custom-class-merchants/merchant-three.php';
		require_once plugin_dir_path( dirname( __FILE__ ) ) . 'includes/custom-class-merchants/merchant-four.php';
		require_once plugin_dir_path( dirname( __FILE__ ) ) . 'includes/custom-class-merchants/merchant-five.php';
		require_once plugin_dir_path( dirname( __FILE__ ) ) . 'includes/custom-class-merchants/merchant-six.php';
		require_once plugin_dir_path( dirname( __FILE__ ) ) . 'includes/custom-class-merchants/merchant-seven.php';
		require_once plugin_dir_path( dirname( __FILE__ ) ) . 'includes/custom-class-merchants/merchant-eight.php';
		require_once plugin_dir_path( dirname( __FILE__ ) ) . 'includes/custom-class-merchants/merchant-nine.php';
		require_once plugin_dir_path( dirname( __FILE__ ) ) . 'includes/custom-class-merchants/merchant-ten.php';
		require_once plugin_dir_path( dirname( __FILE__ ) ) . 'includes/frontend.php';
		
		$this->loader = new Kkd_Pff_Rave_Loader();

	}
	
	private function define_admin_hooks() {

		$plugin_admin = new Kkd_Pff_Rave_Admin( $this->get_plugin_name(), $this->get_version() );

		if(get_option('rave_merchant_accounts') == 'one'){
			$plugin_admin_1 = new MerchantOne( $this->get_plugin_name(), $this->get_version() );

			$this->loader->add_action( 'admin_enqueue_scripts', $plugin_admin_1, 'enqueue_styles' );
			$this->loader->add_action( 'admin_enqueue_scripts', $plugin_admin_1, 'enqueue_scripts' );
		}
		
		if(get_option('rave_merchant_accounts') == 'two'){
			$plugin_admin_1 = new MerchantOne( $this->get_plugin_name(), $this->get_version() );
			$plugin_admin_2 = new MerchantTwo( $this->get_plugin_name(), $this->get_version() );

			$this->loader->add_action( 'admin_enqueue_scripts', $plugin_admin_1, 'enqueue_styles' );
			$this->loader->add_action( 'admin_enqueue_scripts', $plugin_admin_1, 'enqueue_scripts' );
			$this->loader->add_action( 'admin_enqueue_scripts', $plugin_admin_2, 'enqueue_styles' );
			$this->loader->add_action( 'admin_enqueue_scripts', $plugin_admin_2, 'enqueue_scripts' );
		}

		if(get_option('rave_merchant_accounts') == 'three'){
			$plugin_admin_1 = new MerchantOne( $this->get_plugin_name(), $this->get_version() );
			$plugin_admin_2 = new MerchantTwo( $this->get_plugin_name(), $this->get_version() );
			$plugin_admin_3 = new MerchantThree( $this->get_plugin_name(), $this->get_version() );


			$this->loader->add_action( 'admin_enqueue_scripts', $plugin_admin_1, 'enqueue_styles' );
			$this->loader->add_action( 'admin_enqueue_scripts', $plugin_admin_1, 'enqueue_scripts' );
			$this->loader->add_action( 'admin_enqueue_scripts', $plugin_admin_2, 'enqueue_styles' );
			$this->loader->add_action( 'admin_enqueue_scripts', $plugin_admin_2, 'enqueue_scripts' );
			$this->loader->add_action( 'admin_enqueue_scripts', $plugin_admin_3, 'enqueue_styles' );
			$this->loader->add_action( 'admin_enqueue_scripts', $plugin_admin_3, 'enqueue_scripts' );
		}

		if(get_option('rave_merchant_accounts') == 'four'){
			$plugin_admin_1 = new MerchantOne( $this->get_plugin_name(), $this->get_version() );
			$plugin_admin_2 = new MerchantTwo( $this->get_plugin_name(), $this->get_version() );
			$plugin_admin_3 = new MerchantThree( $this->get_plugin_name(), $this->get_version() );
			$plugin_admin_4 = new MerchantFour( $this->get_plugin_name(), $this->get_version() );


			$this->loader->add_action( 'admin_enqueue_scripts', $plugin_admin_1, 'enqueue_styles' );
			$this->loader->add_action( 'admin_enqueue_scripts', $plugin_admin_1, 'enqueue_scripts' );
			$this->loader->add_action( 'admin_enqueue_scripts', $plugin_admin_2, 'enqueue_styles' );
			$this->loader->add_action( 'admin_enqueue_scripts', $plugin_admin_2, 'enqueue_scripts' );
			$this->loader->add_action( 'admin_enqueue_scripts', $plugin_admin_3, 'enqueue_styles' );
			$this->loader->add_action( 'admin_enqueue_scripts', $plugin_admin_3, 'enqueue_scripts' );
			$this->loader->add_action( 'admin_enqueue_scripts', $plugin_admin_4, 'enqueue_styles' );
			$this->loader->add_action( 'admin_enqueue_scripts', $plugin_admin_4, 'enqueue_scripts' );
		}

		if(get_option('rave_merchant_accounts') == 'five'){
			$plugin_admin_1 = new MerchantOne( $this->get_plugin_name(), $this->get_version() );
			$plugin_admin_2 = new MerchantTwo( $this->get_plugin_name(), $this->get_version() );
			$plugin_admin_3 = new MerchantThree( $this->get_plugin_name(), $this->get_version() );
			$plugin_admin_4 = new MerchantFour( $this->get_plugin_name(), $this->get_version() );
			$plugin_admin_5 = new MerchantFive( $this->get_plugin_name(), $this->get_version() );



			$this->loader->add_action( 'admin_enqueue_scripts', $plugin_admin_1, 'enqueue_styles' );
			$this->loader->add_action( 'admin_enqueue_scripts', $plugin_admin_1, 'enqueue_scripts' );
			$this->loader->add_action( 'admin_enqueue_scripts', $plugin_admin_2, 'enqueue_styles' );
			$this->loader->add_action( 'admin_enqueue_scripts', $plugin_admin_2, 'enqueue_scripts' );
			$this->loader->add_action( 'admin_enqueue_scripts', $plugin_admin_3, 'enqueue_styles' );
			$this->loader->add_action( 'admin_enqueue_scripts', $plugin_admin_3, 'enqueue_scripts' );
			$this->loader->add_action( 'admin_enqueue_scripts', $plugin_admin_4, 'enqueue_styles' );
			$this->loader->add_action( 'admin_enqueue_scripts', $plugin_admin_4, 'enqueue_scripts' );
			$this->loader->add_action( 'admin_enqueue_scripts', $plugin_admin_5, 'enqueue_styles' );
			$this->loader->add_action( 'admin_enqueue_scripts', $plugin_admin_5, 'enqueue_scripts' );
		}


		if(get_option('rave_merchant_accounts') == 'six'){
			$plugin_admin_1 = new MerchantOne( $this->get_plugin_name(), $this->get_version() );
			$plugin_admin_2 = new MerchantTwo( $this->get_plugin_name(), $this->get_version() );
			$plugin_admin_3 = new MerchantThree( $this->get_plugin_name(), $this->get_version() );
			$plugin_admin_4 = new MerchantFour( $this->get_plugin_name(), $this->get_version() );
			$plugin_admin_5 = new MerchantFive( $this->get_plugin_name(), $this->get_version() );
			$plugin_admin_6 = new MerchantSix( $this->get_plugin_name(), $this->get_version() );



			$this->loader->add_action( 'admin_enqueue_scripts', $plugin_admin_1, 'enqueue_styles' );
			$this->loader->add_action( 'admin_enqueue_scripts', $plugin_admin_1, 'enqueue_scripts' );
			$this->loader->add_action( 'admin_enqueue_scripts', $plugin_admin_2, 'enqueue_styles' );
			$this->loader->add_action( 'admin_enqueue_scripts', $plugin_admin_2, 'enqueue_scripts' );
			$this->loader->add_action( 'admin_enqueue_scripts', $plugin_admin_3, 'enqueue_styles' );
			$this->loader->add_action( 'admin_enqueue_scripts', $plugin_admin_3, 'enqueue_scripts' );
			$this->loader->add_action( 'admin_enqueue_scripts', $plugin_admin_4, 'enqueue_styles' );
			$this->loader->add_action( 'admin_enqueue_scripts', $plugin_admin_4, 'enqueue_scripts' );
			$this->loader->add_action( 'admin_enqueue_scripts', $plugin_admin_5, 'enqueue_styles' );
			$this->loader->add_action( 'admin_enqueue_scripts', $plugin_admin_5, 'enqueue_scripts' );
			$this->loader->add_action( 'admin_enqueue_scripts', $plugin_admin_6, 'enqueue_styles' );
			$this->loader->add_action( 'admin_enqueue_scripts', $plugin_admin_6, 'enqueue_scripts' );
		}


		if(get_option('rave_merchant_accounts') == 'seven'){
			$plugin_admin_1 = new MerchantOne( $this->get_plugin_name(), $this->get_version() );
			$plugin_admin_2 = new MerchantTwo( $this->get_plugin_name(), $this->get_version() );
			$plugin_admin_3 = new MerchantThree( $this->get_plugin_name(), $this->get_version() );
			$plugin_admin_4 = new MerchantFour( $this->get_plugin_name(), $this->get_version() );
			$plugin_admin_5 = new MerchantFive( $this->get_plugin_name(), $this->get_version() );
			$plugin_admin_6 = new MerchantSix( $this->get_plugin_name(), $this->get_version() );
			$plugin_admin_7 = new MerchantSeven( $this->get_plugin_name(), $this->get_version() );



			$this->loader->add_action( 'admin_enqueue_scripts', $plugin_admin_1, 'enqueue_styles' );
			$this->loader->add_action( 'admin_enqueue_scripts', $plugin_admin_1, 'enqueue_scripts' );
			$this->loader->add_action( 'admin_enqueue_scripts', $plugin_admin_2, 'enqueue_styles' );
			$this->loader->add_action( 'admin_enqueue_scripts', $plugin_admin_2, 'enqueue_scripts' );
			$this->loader->add_action( 'admin_enqueue_scripts', $plugin_admin_3, 'enqueue_styles' );
			$this->loader->add_action( 'admin_enqueue_scripts', $plugin_admin_3, 'enqueue_scripts' );
			$this->loader->add_action( 'admin_enqueue_scripts', $plugin_admin_4, 'enqueue_styles' );
			$this->loader->add_action( 'admin_enqueue_scripts', $plugin_admin_4, 'enqueue_scripts' );
			$this->loader->add_action( 'admin_enqueue_scripts', $plugin_admin_5, 'enqueue_styles' );
			$this->loader->add_action( 'admin_enqueue_scripts', $plugin_admin_5, 'enqueue_scripts' );
			$this->loader->add_action( 'admin_enqueue_scripts', $plugin_admin_6, 'enqueue_styles' );
			$this->loader->add_action( 'admin_enqueue_scripts', $plugin_admin_6, 'enqueue_scripts' );
			$this->loader->add_action( 'admin_enqueue_scripts', $plugin_admin_7, 'enqueue_styles' );
			$this->loader->add_action( 'admin_enqueue_scripts', $plugin_admin_7, 'enqueue_scripts' );
		}

		if(get_option('rave_merchant_accounts') == 'eight'){
			$plugin_admin_1 = new MerchantOne( $this->get_plugin_name(), $this->get_version() );
			$plugin_admin_2 = new MerchantTwo( $this->get_plugin_name(), $this->get_version() );
			$plugin_admin_3 = new MerchantThree( $this->get_plugin_name(), $this->get_version() );
			$plugin_admin_4 = new MerchantFour( $this->get_plugin_name(), $this->get_version() );
			$plugin_admin_5 = new MerchantFive( $this->get_plugin_name(), $this->get_version() );
			$plugin_admin_6 = new MerchantSix( $this->get_plugin_name(), $this->get_version() );
			$plugin_admin_7 = new MerchantSeven( $this->get_plugin_name(), $this->get_version() );
			$plugin_admin_8 = new MerchantEight( $this->get_plugin_name(), $this->get_version() );


			$this->loader->add_action( 'admin_enqueue_scripts', $plugin_admin_1, 'enqueue_styles' );
			$this->loader->add_action( 'admin_enqueue_scripts', $plugin_admin_1, 'enqueue_scripts' );
			$this->loader->add_action( 'admin_enqueue_scripts', $plugin_admin_2, 'enqueue_styles' );
			$this->loader->add_action( 'admin_enqueue_scripts', $plugin_admin_2, 'enqueue_scripts' );
			$this->loader->add_action( 'admin_enqueue_scripts', $plugin_admin_3, 'enqueue_styles' );
			$this->loader->add_action( 'admin_enqueue_scripts', $plugin_admin_3, 'enqueue_scripts' );
			$this->loader->add_action( 'admin_enqueue_scripts', $plugin_admin_4, 'enqueue_styles' );
			$this->loader->add_action( 'admin_enqueue_scripts', $plugin_admin_4, 'enqueue_scripts' );
			$this->loader->add_action( 'admin_enqueue_scripts', $plugin_admin_5, 'enqueue_styles' );
			$this->loader->add_action( 'admin_enqueue_scripts', $plugin_admin_5, 'enqueue_scripts' );
			$this->loader->add_action( 'admin_enqueue_scripts', $plugin_admin_6, 'enqueue_styles' );
			$this->loader->add_action( 'admin_enqueue_scripts', $plugin_admin_6, 'enqueue_scripts' );
			$this->loader->add_action( 'admin_enqueue_scripts', $plugin_admin_7, 'enqueue_styles' );
			$this->loader->add_action( 'admin_enqueue_scripts', $plugin_admin_7, 'enqueue_scripts' );
			$this->loader->add_action( 'admin_enqueue_scripts', $plugin_admin_8, 'enqueue_styles' );
			$this->loader->add_action( 'admin_enqueue_scripts', $plugin_admin_8, 'enqueue_scripts' );
		}

		if(get_option('rave_merchant_accounts') == 'nine'){
			$plugin_admin_1 = new MerchantOne( $this->get_plugin_name(), $this->get_version() );
			$plugin_admin_2 = new MerchantTwo( $this->get_plugin_name(), $this->get_version() );
			$plugin_admin_3 = new MerchantThree( $this->get_plugin_name(), $this->get_version() );
			$plugin_admin_4 = new MerchantFour( $this->get_plugin_name(), $this->get_version() );
			$plugin_admin_5 = new MerchantFive( $this->get_plugin_name(), $this->get_version() );
			$plugin_admin_6 = new MerchantSix( $this->get_plugin_name(), $this->get_version() );
			$plugin_admin_7 = new MerchantSeven( $this->get_plugin_name(), $this->get_version() );
			$plugin_admin_8 = new MerchantEight( $this->get_plugin_name(), $this->get_version() );
			$plugin_admin_9 = new MerchantNine( $this->get_plugin_name(), $this->get_version() );

			$this->loader->add_action( 'admin_enqueue_scripts', $plugin_admin_1, 'enqueue_styles' );
			$this->loader->add_action( 'admin_enqueue_scripts', $plugin_admin_1, 'enqueue_scripts' );
			$this->loader->add_action( 'admin_enqueue_scripts', $plugin_admin_2, 'enqueue_styles' );
			$this->loader->add_action( 'admin_enqueue_scripts', $plugin_admin_2, 'enqueue_scripts' );
			$this->loader->add_action( 'admin_enqueue_scripts', $plugin_admin_3, 'enqueue_styles' );
			$this->loader->add_action( 'admin_enqueue_scripts', $plugin_admin_3, 'enqueue_scripts' );
			$this->loader->add_action( 'admin_enqueue_scripts', $plugin_admin_4, 'enqueue_styles' );
			$this->loader->add_action( 'admin_enqueue_scripts', $plugin_admin_4, 'enqueue_scripts' );
			$this->loader->add_action( 'admin_enqueue_scripts', $plugin_admin_5, 'enqueue_styles' );
			$this->loader->add_action( 'admin_enqueue_scripts', $plugin_admin_5, 'enqueue_scripts' );
			$this->loader->add_action( 'admin_enqueue_scripts', $plugin_admin_6, 'enqueue_styles' );
			$this->loader->add_action( 'admin_enqueue_scripts', $plugin_admin_6, 'enqueue_scripts' );
			$this->loader->add_action( 'admin_enqueue_scripts', $plugin_admin_7, 'enqueue_styles' );
			$this->loader->add_action( 'admin_enqueue_scripts', $plugin_admin_7, 'enqueue_scripts' );
			$this->loader->add_action( 'admin_enqueue_scripts', $plugin_admin_8, 'enqueue_styles' );
			$this->loader->add_action( 'admin_enqueue_scripts', $plugin_admin_8, 'enqueue_scripts' );
			$this->loader->add_action( 'admin_enqueue_scripts', $plugin_admin_9, 'enqueue_styles' );
			$this->loader->add_action( 'admin_enqueue_scripts', $plugin_admin_9, 'enqueue_scripts' );
		}

		if(get_option('rave_merchant_accounts') == 'ten'){
			$plugin_admin_1 = new MerchantOne( $this->get_plugin_name(), $this->get_version() );
			$plugin_admin_2 = new MerchantTwo( $this->get_plugin_name(), $this->get_version() );
			$plugin_admin_3 = new MerchantThree( $this->get_plugin_name(), $this->get_version() );
			$plugin_admin_4 = new MerchantFour( $this->get_plugin_name(), $this->get_version() );
			$plugin_admin_5 = new MerchantFive( $this->get_plugin_name(), $this->get_version() );
			$plugin_admin_6 = new MerchantSix( $this->get_plugin_name(), $this->get_version() );
			$plugin_admin_7 = new MerchantSeven( $this->get_plugin_name(), $this->get_version() );
			$plugin_admin_8 = new MerchantEight( $this->get_plugin_name(), $this->get_version() );
			$plugin_admin_9 = new MerchantNine( $this->get_plugin_name(), $this->get_version() );
			$plugin_admin_10 = new MerchantTen( $this->get_plugin_name(), $this->get_version() );


			$this->loader->add_action( 'admin_enqueue_scripts', $plugin_admin_1, 'enqueue_styles' );
			$this->loader->add_action( 'admin_enqueue_scripts', $plugin_admin_1, 'enqueue_scripts' );
			$this->loader->add_action( 'admin_enqueue_scripts', $plugin_admin_2, 'enqueue_styles' );
			$this->loader->add_action( 'admin_enqueue_scripts', $plugin_admin_2, 'enqueue_scripts' );
			$this->loader->add_action( 'admin_enqueue_scripts', $plugin_admin_3, 'enqueue_styles' );
			$this->loader->add_action( 'admin_enqueue_scripts', $plugin_admin_3, 'enqueue_scripts' );
			$this->loader->add_action( 'admin_enqueue_scripts', $plugin_admin_4, 'enqueue_styles' );
			$this->loader->add_action( 'admin_enqueue_scripts', $plugin_admin_4, 'enqueue_scripts' );
			$this->loader->add_action( 'admin_enqueue_scripts', $plugin_admin_5, 'enqueue_styles' );
			$this->loader->add_action( 'admin_enqueue_scripts', $plugin_admin_5, 'enqueue_scripts' );
			$this->loader->add_action( 'admin_enqueue_scripts', $plugin_admin_6, 'enqueue_styles' );
			$this->loader->add_action( 'admin_enqueue_scripts', $plugin_admin_6, 'enqueue_scripts' );
			$this->loader->add_action( 'admin_enqueue_scripts', $plugin_admin_7, 'enqueue_styles' );
			$this->loader->add_action( 'admin_enqueue_scripts', $plugin_admin_7, 'enqueue_scripts' );
			$this->loader->add_action( 'admin_enqueue_scripts', $plugin_admin_8, 'enqueue_styles' );
			$this->loader->add_action( 'admin_enqueue_scripts', $plugin_admin_8, 'enqueue_scripts' );
			$this->loader->add_action( 'admin_enqueue_scripts', $plugin_admin_9, 'enqueue_styles' );
			$this->loader->add_action( 'admin_enqueue_scripts', $plugin_admin_9, 'enqueue_scripts' );
			$this->loader->add_action( 'admin_enqueue_scripts', $plugin_admin_10, 'enqueue_styles' );
			$this->loader->add_action( 'admin_enqueue_scripts', $plugin_admin_10, 'enqueue_scripts' );
		}
		
		
		

		$this->loader->add_action( 'admin_enqueue_scripts', $plugin_admin, 'enqueue_styles' );
		$this->loader->add_action( 'admin_enqueue_scripts', $plugin_admin, 'enqueue_scripts' );
		

	}

	private function define_public_hooks() {

		$plugin_public = new Kkd_Pff_Rave_Public( $this->get_plugin_name(), $this->get_version());		

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
