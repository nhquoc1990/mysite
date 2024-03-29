<?php                         
/**
 * Online Consulting functions and definitions
 *
 * @package Online Consulting
 */

/**
 * Set the content width based on the theme's design and stylesheet.
 */

if ( ! function_exists( 'online_consulting_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which runs
 * before the init hook. The init hook is too late for some features, such as indicating
 * support post thumbnails.  
 */
function online_consulting_setup() {		
	global $content_width;   
    if ( ! isset( $content_width ) ) {
        $content_width = 680; /* pixels */
    }	

	load_theme_textdomain( 'online-consulting', get_template_directory() . '/languages' );
	add_theme_support( 'automatic-feed-links' );
	add_theme_support('woocommerce');
	add_theme_support('html5');
	add_theme_support( 'post-thumbnails' );	
	add_theme_support( 'title-tag' );	
	add_theme_support( 'custom-logo', array(
		'height'      => 70,
		'width'       => 250,
		'flex-height' => true,
	) );	
	add_theme_support( 'custom-background', array(
		'default-color' => 'ffffff'
	) );
	register_nav_menus( array(
		'primary' => __( 'Primary Menu', 'online-consulting' ),
		'footer' => __( 'Footer Menu', 'online-consulting' ),						
	) );
	add_editor_style( 'editor-style.css' );
} 
endif; // online_consulting_setup
add_action( 'after_setup_theme', 'online_consulting_setup' );
function online_consulting_widgets_init() { 	
	
	register_sidebar( array(
		'name'          => __( 'Blog Sidebar', 'online-consulting' ),
		'description'   => __( 'Appears on blog page sidebar', 'online-consulting' ),
		'id'            => 'sidebar-1',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );
	
	register_sidebar( array(
		'name'          => __( 'Footer Widget 1', 'online-consulting' ),
		'description'   => __( 'Appears on footer', 'online-consulting' ),
		'id'            => 'footer-widget-column-1',
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h5>',
		'after_title'   => '</h5>',
	) );
	
	register_sidebar( array(
		'name'          => __( 'Footer Widget 2', 'online-consulting' ),
		'description'   => __( 'Appears on footer', 'online-consulting' ),
		'id'            => 'footer-widget-column-2',
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h5>',
		'after_title'   => '</h5>',
	) );
	
	register_sidebar( array(
		'name'          => __( 'Footer Widget 3', 'online-consulting' ),
		'description'   => __( 'Appears on footer', 'online-consulting' ),
		'id'            => 'footer-widget-column-3',
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h5>',
		'after_title'   => '</h5>',
	) );
	
	register_sidebar( array(
		'name'          => __( 'Footer Widget 4', 'online-consulting' ),
		'description'   => __( 'Appears on footer', 'online-consulting' ),
		'id'            => 'footer-widget-column-4',
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h5>',
		'after_title'   => '</h5>',
	) );
	
	
}
add_action( 'widgets_init', 'online_consulting_widgets_init' );


function online_consulting_font_url(){
		$font_url = '';		
		/* Translators: If there are any character that are not
		* supported by Assistant, trsnalate this to off, do not
		* translate into your own language.
		*/
		$assistant = _x('on','Assistant:on or off','online-consulting');
		
		    if('off' !== $assistant ){
			    $font_family = array();
			
			if('off' !== $assistant){
				$font_family[] = 'Assistant:300,400,600,800';
			}			
						
			$query_args = array(
				'family'	=> urlencode(implode('|',$font_family)),
			);
			
			$font_url = add_query_arg($query_args,'//fonts.googleapis.com/css');
		}
		
	return $font_url;
	}


function online_consulting_scripts() {
	wp_enqueue_style('online-consulting-font', online_consulting_font_url(), array());
	wp_enqueue_style( 'online-consulting-basic-style', get_stylesheet_uri() );	
	wp_enqueue_style( 'nivo-slider', get_template_directory_uri()."/css/nivo-slider.css" );
	wp_enqueue_style( 'fontawesome-all-style', get_template_directory_uri().'/fontsawesome/css/fontawesome-all.css' );
	wp_enqueue_style( 'online-consulting-responsive', get_template_directory_uri()."/css/responsive.css" );
	wp_enqueue_script( 'jquery-nivo-slider', get_template_directory_uri() . '/js/jquery.nivo.slider.js', array('jquery') );
	wp_enqueue_script( 'online-consulting-editable', get_template_directory_uri() . '/js/editable.js' );
	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'online_consulting_scripts' );

function online_consulting_ie_stylesheet(){
	// Load the Internet Explorer specific stylesheet.
	wp_enqueue_style('online-consulting-ie', get_template_directory_uri().'/css/ie.css', array( 'online-consulting-style' ), '20190312' );
	wp_style_add_data('online-consulting-ie','conditional','lt IE 10');
	
	// Load the Internet Explorer 8 specific stylesheet.
	wp_enqueue_style( 'online-consulting-ie8', get_template_directory_uri() . '/css/ie8.css', array( 'online-consulting-style' ), '20190312' );
	wp_style_add_data( 'online-consulting-ie8', 'conditional', 'lt IE 9' );

	// Load the Internet Explorer 7 specific stylesheet.
	wp_enqueue_style( 'online-consulting-ie7', get_template_directory_uri() . '/css/ie7.css', array( 'online-consulting-style' ), '20190312' );
	wp_style_add_data( 'online-consulting-ie7', 'conditional', 'lt IE 8' );	
	}
add_action('wp_enqueue_scripts','online_consulting_ie_stylesheet');

define('online_consulting_theme_doc','http://www.gracethemesdemo.com/documentation/online-consulting/#homepage-lite','online-consulting');
define('online_consulting_protheme_url','https://gracethemes.com/themes/finance-wordpress-theme/','online-consulting');
define('online_consulting_live_demo','http://www.gracethemesdemo.com/online-consulting/','online-consulting');

if ( ! function_exists( 'online_consulting_the_custom_logo' ) ) :
/**
 * Displays the optional custom logo.
 *
 * Does nothing if the custom logo is not available.
 *
 */
function online_consulting_the_custom_logo() {
	if ( function_exists( 'the_custom_logo' ) ) {
		the_custom_logo();
	}
}
endif;

/**
 * Customize Pro included.
 */
require_once get_template_directory() . '/customize-pro/example-1/class-customize.php';

//Custom Excerpt length.
function online_consulting_excerpt_length( $length ) {
	return 20;
}
add_filter( 'excerpt_length', 'online_consulting_excerpt_length', 999 );

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Custom template for about theme.
 */
if ( is_admin() ) { 
require get_template_directory() . '/inc/about-themes.php';
}

/**
 * Custom functions that act independently of the theme templates.
 */
require get_template_directory() . '/inc/extras.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
require get_template_directory() . '/inc/jetpack.php';