<?php

/**
 * Get instance of helper
 */
function ut_help() {
  	return UT_Theme_Helper::get_instance();
}

/**
 * Main class of all tehe,e settings
 */
class UT_Theme_Helper {

  	private static $_instance = null;

  	public $guneberg_blocks;
  	public $services;

  	private function __construct() {

  	}

  	protected function __clone() {

  	}

  	static public function get_instance() {

		if ( is_null( self::$_instance ) ) {
			self::$_instance = new self();
		}
		return self::$_instance;
  	}

	/**
	 * Load files, plugins, add hooks and filters and do all magic
	 */
	function init() {

		// load needed files
		$this->import();
		$this->load_classes();
		$this->register_hooks();

		return $this;
	}

	function load_classes() {

		$this->guneberg_blocks = UT_Guneberg_Blocks::get_instance();
		$this->services = UT_Services::get_instance();
	}

	/**
	 * Register all needed hooks
	 */
	public function register_hooks() {

		add_action( 'wp_enqueue_scripts', [ $this, 'load_scripts_n_styles' ] );
		add_action( 'admin_enqueue_scripts', [ $this, 'load_admin_scripts_n_styles' ] );
		add_action( 'after_setup_theme',  [ $this, 'register_menus' ] );
		add_action( 'after_setup_theme',  [ $this, 'add_theme_support' ] );
		// add_action( 'widgets_init', [ $this, 'widgets_init' ] );
		// add_filter( 'show_admin_bar', '__return_false' );
	}

	function register_menus() {

		register_nav_menus( [
			'menu_1' => esc_html__( 'Header', 'unreal-theme' ),
			'menu_2' => esc_html__( 'Footer 1', 'unreal-theme' ),
			'menu_3' => esc_html__( 'Footer 2', 'unreal-theme' ),
			'menu_4' => esc_html__( 'Footer 3', 'unreal-theme' ),
			'menu_5' => esc_html__( 'Footer 4', 'unreal-theme' ),
			'menu_6' => esc_html__( 'Copyright', 'unreal-theme' ),
		] );
	}

	public function add_theme_support() {

		add_theme_support( 'title-tag' );
		add_theme_support( 'post-thumbnails' );
		add_theme_support( 'html5', [
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
		] );
		add_theme_support( 'woocommerce' );
	}

	// public function widgets_init() {
	
		// 	register_sidebar( array(
		// 		'name'          => 'UT Widget Area',
		// 		'id'            => 'ut-widget',
		// 		'before_widget' => '<div class="chw-widget">',
		// 		'after_widget'  => '</div>',
		// 		'before_title'  => '<h2 class="chw-title">',
		// 		'after_title'   => '</h2>',
		// 	) );
		
		// }

	function load_scripts_n_styles() {
		// ========================================= CSS ========================================= //
		wp_enqueue_style( 'ut-style', get_stylesheet_uri() );
		wp_enqueue_style( 'ut-vendor', THEME_URI . '/styles/vendor.css' );
		wp_enqueue_style( 'ut-main', THEME_URI . '/styles/main.css' );
		// ========================================= JS ========================================= //
		//////////////////////////////////////
		wp_deregister_script('jquery-core');
		wp_register_script('jquery-core', 'https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js', false, null, true);
		wp_deregister_script('jquery');
		wp_register_script('jquery', false, ['jquery-core'], null, true);
		//////////////////////////////////////
		wp_enqueue_script( 'ut-vendor', THEME_URI . '/scripts/vendor.js', ['jquery'], date("Ymd"), true );
		wp_enqueue_script( 'ut-main', THEME_URI . '/scripts/main.js', ['jquery'], date("Ymd"), true );
		wp_enqueue_script( 'ut-scripts', THEME_URI . '/scripts/scripts.js', ['jquery'], date("Ymd"), true );
		wp_localize_script( 
			'ut-scripts', 
			'ut_params', [
				'ajax_url' => admin_url( 'admin-ajax.php' ),
				'ajax_nonce' => wp_create_nonce( 'ut_check' ),
			] 
		);

		if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
			wp_enqueue_script( 'comment-reply' );
		}
		// add_filter( 'script_loader_tag', [ $this, 'add_async_defer_attr' ], 10, 3 );
	}

	function load_admin_scripts_n_styles() {

		wp_enqueue_style( 'ut-admin', THEME_URI . '/admin.css' );
	}

	// public function add_async_defer_attr( $tag, $handle, $src ) {

	// 	if ( 'ut-googleapis' === $handle ) {
	// 		return str_replace( ' src', ' async defer src', $tag );
	// 	}

	//   return $tag;
	// }

	public function import() {

		include_once 'helpers.php';
		// include_once 'woo-functions.php';
		// include_once 'disable-editor.php';
		// include_once 'pagination.php';
		// include_once 'walker-nav-menu.php';
		include_once 'class.gutenberg-blocks.php';
		include_once 'class.services.php';
	}

}
