<?php
/**
 * oStore functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package oStore
 */

if ( ! function_exists( 'ostore_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	*/
	function ostore_setup() {
		/*
		 * Make theme available for translation.
		 */
		load_theme_textdomain( 'ostore', get_template_directory() . '/languages' );

		// Add default posts and comments RSS feed links to head.
		add_theme_support( 'automatic-feed-links' );

		/*
		 * Let WordPress manage the document title.
		 */
		add_theme_support( 'title-tag' );

		$defaults = array(
			'height'      => 100,
			'width'       => 400,
			'flex-height' => true,
			'flex-width'  => true,
			'header-text' => array( 'site-title', 'site-description' ),
		);
		add_theme_support( 'custom-logo', $defaults );

		/*
		 * Enable support for Post Thumbnails on posts and pages.
		 *
		 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		 */
		add_theme_support( 'post-thumbnails' );

		// This theme uses wp_nav_menu() in one location.
		register_nav_menus( array(
			'menu-1' => esc_html__( 'Primary', 'ostore' )
		) );

		/*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
		add_theme_support( '', array(
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
		) );

		// Set up the WordPress core custom background feature.
		add_theme_support( 'custom-background', apply_filters( 'ostore_custom_background_args', array(
			'default-color' => 'ffffff',
			'default-image' => '',
		) ) );

		// Add theme support for selective refresh for widgets.
		add_theme_support( 'customize-selective-refresh-widgets' );

		/**
		 * Add support for core custom logo.
		 *
		 * @link https://codex.wordpress.org/Theme_Logo
		 */
		add_theme_support( 'custom-logo', array(
			'height'      => 250,
			'width'       => 250,
			'flex-width'  => true,
			'flex-height' => true,
		) );

		/**
		* Editor style.
		*/
		add_editor_style( 'assets/css/editor-style.css' );

		/*Add the Style Size */
		add_image_size( 'ostore-slider-image', 1250, 500, true );
		add_image_size('ostore-slider-widget',990,510,true);
		add_image_size('ostore-blog-image',350,230,true);
		add_image_size('ostore-recent-post',275,170,true);
		add_image_size('ostore-blog',400,250,true);
		add_image_size('ostore-hlp-products',103,103,true);
	}
endif;
add_action( 'after_setup_theme', 'ostore_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function ostore_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'ostore_content_width', 640 );
}
add_action( 'after_setup_theme', 'ostore_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function ostore_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Right Sidebar', 'ostore' ),
		'id'            => 'sidebar-1',
		'description'   => esc_html__( 'Add widgets here.', 'ostore' ),
		'before_widget' => '<section id="%1$s" class="sidebar-widget widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );

	register_sidebar( array(
		'name'          => esc_html__( 'Left Sidebar', 'ostore' ),
		'id'            => 'left-sidebar',
		'description'   => esc_html__( 'Add widgets here.', 'ostore' ),
		'before_widget' => '<section id="%1$s" class="sidebar-widget widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );

	register_sidebar( array(
		'name'          => esc_html__( 'Woocommerce Sidebar', 'ostore' ),
		'id'            => 'woocommerce',
		'description'   => esc_html__( 'Add widgets here.', 'ostore' ),
		'before_widget' => '<section id="%1$s" class="sidebar-widget widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );

	register_sidebar( array(
		'name'			=> esc_html__("Home Page", 'ostore'),
		'id'			=> "home_page",
		'description'	=> esc_html__( "Home page Sections widget area", 'ostore' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );

	register_sidebar( array(
		'name'			=> esc_html__("First Footer Area", 'ostore'),
		'id'			=> "first_footer",
		'description'	=> esc_html__( "First Footer Area", 'ostore' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h4 class="widget-title"><span>',
		'after_title'   => '</span></h4>',
	) );

	register_sidebar( array(
		'name'			=> esc_html__("Second Footer Area", 'ostore'),
		'id'			=> "second_footer",
		'description'	=> esc_html__( "Second Footer widget area", 'ostore' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h4 class="widget-title"><span>',
		'after_title'   => '</span></h4>',
	) );

	register_sidebar( array(
		'name'			=> esc_html__("Third Footer Area", 'ostore'),
		'id'			=> "third_footer",
		'description'	=> esc_html__( "Third Footer Area", 'ostore' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h4 class="widget-title"><span>',
		'after_title'   => '</span></h4>',
	) );

	register_sidebar( array(
		'name'			=> esc_html__("Forth Footer Area", 'ostore'),
		'id'			=> "forth_footer",
		'description'	=> esc_html__( "Forth Footer area", 'ostore' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h4 class="widget-title"><span>',
		'after_title'   => '</span></h4>',
	) );

}
add_action( 'widgets_init', 'ostore_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function ostore_scripts() {
	$osStoreTheme = wp_get_theme();
	$theme_version = $osStoreTheme->get( 'Version' );

	//Google fonts
	$ostore_google_fonts_list = array('Libre+Franklin','Questrial');
	foreach(  $ostore_google_fonts_list as $google_font ){
		wp_enqueue_style( 'google-fonts-'.$google_font, 'http://fonts.googleapis.com/css?family='.$google_font.':300italic,400italic,700italic,400,700,300', false ); 
	}

	
	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
	// css
	wp_enqueue_style( 'bootstrap', get_template_directory_uri() . '/assets/css/bootstrap.min.css', array(), esc_attr( $theme_version ) );
	wp_enqueue_style( 'fontawesome', get_template_directory_uri() . '/assets/font-awesome/css/font-awesome.min.css', array(), esc_attr( $theme_version ) );
	wp_enqueue_style( 'carousel', get_template_directory_uri() . '/assets/css/owl.carousel.css', array(), esc_attr( $theme_version ) );
	wp_enqueue_style( 'nivo-slider', get_template_directory_uri() . '/assets/css/nivo-slider.css', array(), esc_attr( $theme_version ) );
	wp_enqueue_style( 'ostore-style', get_stylesheet_uri() );
	wp_enqueue_style( 'ostore-main-style', get_template_directory_uri() . '/assets/css/ostore-main-style.css', array(), esc_attr( $theme_version ) );
	
	// js
	wp_enqueue_script( 'bootstrap', get_template_directory_uri() . '/assets/js/bootstrap.min.js', array('jquery'), esc_attr( $theme_version ), true );
	wp_enqueue_script( 'carousel', get_template_directory_uri() . '/assets/js/owl.carousel.min.js', array('jquery'), esc_attr( $theme_version ), true );
	wp_enqueue_script( 'jquery.nivo.slider', get_template_directory_uri() . '/assets/js/jquery.nivo.slider.pack.js', array('jquery'), esc_attr( $theme_version ), true );
	wp_enqueue_script( 'countdown', get_template_directory_uri() . '/assets/js/jquery.countdown.js', array('jquery'), esc_attr( $theme_version ), false );
	
	wp_enqueue_script( 'ostore-main', get_template_directory_uri() . '/assets/js/main.js', array('jquery'), esc_attr( $theme_version ), true );
	
	
	wp_enqueue_script( 'ostore-navigation', get_template_directory_uri() . '/assets/js/navigation.js', array(), esc_attr( $theme_version ), true );
	wp_enqueue_script( 'ostore-skip-link-focus-fix', get_template_directory_uri() . '/assets/js/skip-link-focus-fix.js', array(), esc_attr( $theme_version ), true );

	$ostore_theme_layout = get_theme_mod('ostore_layout_style','default');
	
	if( $ostore_theme_layout == 'box-layout' ){

		$custom_css = "
		#page {
			background: white none repeat scroll 0 0;
			margin: 0 auto;
			max-width: 1200px;
			overflow-x: hidden;
			box-shadow: 0 0 10px 0 #999;
		}  
	";
	wp_add_inline_style( 'ostore-main-style', $custom_css );

	}

}
add_action( 'wp_enqueue_scripts', 'ostore_scripts' );

//Admin Css enque
function ostore_custom_wp_admin_style($hook){
	if( $hook != 'widgets.php' ) { return; }

	$osStoreTheme = wp_get_theme();
	$theme_version = $osStoreTheme->get( 'Version' );
    wp_enqueue_style( 'ostore_custom_wp_admin_css', get_template_directory_uri() . '/assets/admin/css/ostore-admin.css', array(), esc_attr( $theme_version ) );
    wp_enqueue_script( 'ostore-admin', get_template_directory_uri() . '/assets/admin/js/main.js', array('jquery'), esc_attr( $theme_version ), true );
	wp_enqueue_script( 'media-js-file', get_template_directory_uri() . '/assets/js/media.js', array('jquery'), esc_attr( $theme_version ), true );

	$custom_css = "
	#widget-list [id*='_tab_widget_'] h3,
	#widget-list [id*='_blog_widget_'] h3,
	#widget-list [id*='_ostore_'] .widget-top, 
	#widget-list [id*='_ostore_'] h3 {
        background: #0074a2;
        color: #fff;
    }    
    ";
    wp_add_inline_style( 'admin-bar', $custom_css );
}
add_action('admin_enqueue_scripts', 'ostore_custom_wp_admin_style');


/**
 * Require init.
**/
require  trailingslashit( get_template_directory() ).'themerelic/init.php';

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Plugins TGM
 */
require get_template_directory() ."/inc/class-tgm-plugin-activation.php";

/**
 * Load Jetpack compatibility file.
 */
if ( defined( 'JETPACK__VERSION' ) ) {
	require get_template_directory() . '/inc/jetpack.php';
}

if ( ! function_exists( 'ostore_is_woocommerce_activated' ) ) {
	function ostore_is_woocommerce_activated() {
		return class_exists( 'woocommerce' ) ? true : false;
	}
}


/**
 * Filter the except length to 20 words.
 */
function ostore_blog_excerpt_length( $length ) {
    if ( is_admin() ) {
        return $length;
    }
    return 40;
}
add_filter( 'excerpt_length', 'ostore_blog_excerpt_length', 999 );


/*woocommerce Product Rating Star */
add_action('woocommerce_after_shop_loop_item', 'ostore_get_star_rating' );
function ostore_get_star_rating()
{
    global $woocommerce, $product;
    $average = $product->get_average_rating();
	
	for( $i = 1; $i<=5; $i++ ) {
		if ($i<=$average){
			echo '<i class="fa fa-star gold" aria-hidden="true"></i>';
		}
		else{ 
			echo '<i class="fa fa-star blank" aria-hidden="true"></i>';
		} 
	} 
}


/**
 * check blog page
 **/
function ostore_is_blog () {
    return ( is_archive() || is_author() || is_category() || is_home() || is_single() || is_tag()) && 'post' == get_post_type();
}

add_action( 'tgmpa_register', 'ostore_register_required_plugins' );
/**
 * Register The Required Plugin 
 */
function ostore_register_required_plugins() {
	/*
	 * Array of plugin arrays. Required keys are name and slug.
	 */
	$plugins = array(

        array(
            'name' => 'WooCommerce',
            'slug' => 'woocommerce',
            'required' => false,
        ),
        array(
            'name' => 'YITH WooCommerce Quick View',
            'slug' => 'yith-woocommerce-quick-view',
            'required' => false,
        ),
        array(
            'name' => 'YITH WooCommerce Compare',
            'slug' => 'yith-woocommerce-compare',
            'required' => false,
        ),
        array(
            'name' => 'YITH WooCommerce Wishlist',
            'slug' => 'yith-woocommerce-wishlist',
            'required' => false,
        ),
        array(
            'name' => 'WooCommerce Grid / List toggle',
            'slug' => 'woocommerce-grid-list-toggle',
            'required' => false,
        ),
        array(
            'name' => 'Easy Google Fonts',
            'slug' => 'easy-google-fonts',
            'required' => false,
		),
		array(
			'name' => esc_attr__( 'One Click Demo Import', 'ostore'),
			'slug' => 'one-click-demo-import',
			'required' => false,
		),

    );

	/*
	 * Array of configuration settings. Amend each line as needed.
	*/
	$config = array(
		'id'           => 'ostore',                 
		'default_path' => '',                      
		'menu'         => 'tgmpa-install-plugins', 
		'has_notices'  => true,                    
		'dismissable'  => true,                    
		'dismiss_msg'  => '',                       
		'is_automatic' => false,                   
		'message'      => '',                      
		
	);

	tgmpa( $plugins, $config );
}
