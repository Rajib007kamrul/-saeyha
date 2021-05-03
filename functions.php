<?php

if ( ! function_exists( 'saeyha_setup' ) ) {

    function saeyha_setup() {
		load_theme_textdomain( 'saeyha', get_template_directory() . '/languages' );
		
		add_theme_support( 'automatic-feed-links' );
		add_theme_support( 'title-tag' );
		add_theme_support( 'post-thumbnails' );
		

		add_editor_style();
		
		register_nav_menus( array(
			'primary' => esc_html__( 'Primary Menu', 'visgo' ),
			'footer' => esc_html__( 'footer Menu', 'visgo' ),
		) );

		add_theme_support( 'html5', array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
		) );

		add_theme_support( 'custom-logo', array(
		   'flex-width' => false,
		   'height'     => 80,
	   	   'width'      => 250,
		) );

		add_theme_support( 'responsive-embeds' );
		add_theme_support( 'wp-block-styles' );
		add_theme_support( 'align-wide' );

		add_image_size( 'testimonial_image', 140, 46 );

		new Saeyha\Installer();
    }
}

add_action( 'after_setup_theme', 'saeyha_setup' );

if ( ! function_exists( 'saeyha_widgets_init' ) ) {
    
    function saeyha_widgets_init() {
    
    	register_sidebar( array(
			'name'          => esc_html__( 'Sidebar', 'saeyha' ),
			'id'            => 'sidebar-1',
			'description'   => esc_html__('Sidebar Widget', 'saeyha'),
			'before_widget' => '<div id="%1$s" class="card my-4 %2$s">',
			'after_widget'  => '</div>',
			'before_title'  => '<h2 class="card-header">',
			'after_title'   => '</h2>',
		) );

    }
}

add_action( 'widgets_init', 'saeyha_widgets_init' );

if ( ! function_exists( 'saeyha_scripts' ) ) {
   
    function saeyha_scripts() {
   
    	global $wp_query;

    // <!-- all plugins here -->
    // <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/1.20.3/TweenMax.min.js"></script>

    	wp_enqueue_style( 'saeyha_vendor_css', get_template_directory_uri() . '/assets/css/vendor.css');
    	wp_enqueue_style( 'saeyha_main_css', get_template_directory_uri() . '/assets/css/style.css');
    	wp_enqueue_style( 'saeyha_responsive_css', get_template_directory_uri() . '/assets/css/responsive.css');
    	wp_enqueue_style( 'saeyha_style_css', get_template_directory_uri() . '/style.css');

    	wp_enqueue_script( 'jquery' );
		wp_enqueue_script( 'saeyha_vendor_js', get_template_directory_uri() . '/assets/js/vendor.js', ['jquery'],true);
		wp_enqueue_script( 'saeyha_TweenMax_js', get_template_directory_uri() . '/assets/js/TweenMax.min.js', ['jquery'],true);
		wp_enqueue_script( 'saeyha_main_js', get_template_directory_uri() . '/assets/js/main.js',['jquery'],'1.0.0',true);

		
		wp_enqueue_script('comment-reply');

		wp_localize_script( 'saeyha_main_js', 'saeyha',
			array(
				'ajaxurl'        => admin_url( 'admin-ajax.php' ),
				'nonce'          => wp_create_nonce( "saeyha-nonce" ),
				'leftArrow'		 => get_template_directory_uri() . '/assets/img/slider/3.png'
			)
		);
    }
}

add_action( 'wp_enqueue_scripts', 'saeyha_scripts' );


add_action( 'init', 'register_post' );

function register_post() {
	$service_arr = array( 'supports' => array( 'title', 'editor', 'thumbnail' ), 'has_archive' => true );
	$place     = new post_type( 'Services', 'service', $service_arr );

	$slider_arr = array( 'supports' => array( 'title', 'editor', 'thumbnail' ), );
	$slider     = new post_type( 'Testimonial', 'testimonial', $slider_arr );
}


require get_template_directory() . '/inc/customizer.php';
require get_template_directory() . '/inc/custom_post.php';
require get_template_directory() . '/inc/class-contact-list.php';
require get_template_directory() . '/inc/class-ajax.php';
require get_template_directory() . '/inc/custom-meta.php';
require get_template_directory() . '/inc/class-installer.php';
