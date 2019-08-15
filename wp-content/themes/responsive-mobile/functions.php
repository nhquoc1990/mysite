<?php
/**
 * Main Function
 *
 * Load functions and classes
 *
 * @package      responsive_mobile
 * @license      license.txt
 * @copyright    2014 CyberChimps Inc
 * @since        0.0.1
 *
 * Please do not edit this file. This file is part of the responsive_mobile Framework and all modifications
 * should be made in a child theme.
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

$template_directory = get_template_directory();

/**
 * Basic theme functionality
*/
require $template_directory . '/includes/functions.php';

/**
 * Theme Options
 */
require $template_directory . '/libraries/class-responsive-options.php';
require $template_directory . '/includes/functions-theme-options.php';
require $template_directory . '/includes/functions-theme-options-page.php';
require( $template_directory . '/includes/customizer.php' );
require( $template_directory . '/includes/admin-about.php' );

/**
 * Meta Box Options
 */
require $template_directory . '/libraries/class-meta-box.php';
require $template_directory . '/includes/functions-meta-box.php';

/**
 * Custom template tags for this theme.
 */
require $template_directory . '/includes/functions-template-tags.php';

/**
 * Support THA Theme hooks through Responsives own functions.
 */
require $template_directory . '/core/tha-theme-hooks.php';
//require $template_directory . '/core/functions-demodata.php';
require $template_directory . '/includes/responsive-hooks.php';


/**
 * Support THA post hooks through Responsives own functions.
 */
require $template_directory . '/core/post.php';

/**
 * Theme Upsell
 */
//require $template_directory . '/core/functions-theme-upsell.php';

/**
 * Create header items that hook into header.php
 */
require $template_directory . '/includes/functions-header.php';

/**
 * Implement the Custom Header feature.
 */
require $template_directory . '/includes/functions-custom-header.php';

/**
 * Custom functions that act independently to the theme templates.
 */
require $template_directory . '/includes/functions-extras.php';
require $template_directory . '/includes/functions-extentions.php';
require $template_directory . '/includes/functions-layout.php';
require $template_directory . '/includes/functions-front.php';

/**
 * Register Menus
 */
require $template_directory . '/includes/functions-menu.php';

/**
 * Register Sidebars
 */
require $template_directory . '/includes/functions-sidebar.php';

/**
 * Plugin compatibility
 */
require $template_directory . '/includes/functions-plugins.php';

/**
 * Theme Update
 */
require $template_directory . '/includes/functions-update.php';

/**
 * Plugin dependency
 */
require $template_directory . '/core/functions-install.php';

/**
 * Admin functionality
 */
require $template_directory . '/core/functions-admin.php';

if ( ! defined( 'ELEMENTOR_PARTNER_ID' ) ) {
	define( 'ELEMENTOR_PARTNER_ID', 2126 );
}

// enabling theme support for title tag
function responsivemobile_title_setup()
{
	add_theme_support( 'title-tag' );

	// Add support for full and wide align images.
	add_theme_support( 'align-wide' );
}
add_action( 'after_setup_theme', 'responsivemobile_title_setup' );

function responsive_mobile_customize_register( $wp_customize ) {

   $wp_customize->get_setting( 'blogname' )->transport = 'postMessage';
   $wp_customize->get_setting( 'blogdescription' )->transport = 'postMessage';

   $wp_customize->selective_refresh->add_partial( 'blogname', array(
'selector' => '.site-name a',
) );

	$wp_customize->selective_refresh->add_partial( 'blogdescription', array(
		'selector' => '.site-description',
	) );


	$wp_customize->selective_refresh->add_partial( 'responsive_mobile_theme_options[copyright_textbox]', array(
		'selector' => '.copyright',
	) );

	$wp_customize->selective_refresh->add_partial( 'nav_menu_locations[top-menu]', array(
		'selector' => '.main-nav',
	) );

	$wp_customize->selective_refresh->add_partial( 'responsive_mobile_theme_options[home_headline]', array(
		'selector' => '.featured-title',
	) );

	$wp_customize->selective_refresh->add_partial( 'responsive_mobile_theme_options[home_subheadline]', array(
		'selector' => '.featured-subtitle',
	) );

	$wp_customize->selective_refresh->add_partial( 'responsive_mobile_theme_options[home_content_area]', array(
		'selector' => '.featured-text',
	) );

	$wp_customize->selective_refresh->add_partial( 'responsive_mobile_theme_options[cta_text]', array(
		'selector' => '#call-to-action',
	) );

	$wp_customize->selective_refresh->add_partial( 'responsive_mobile_theme_options[featured_content]', array(
		'selector' => '.featured-image',
	) );

	$wp_customize->selective_refresh->add_partial( 'responsive_mobile_theme_options[callout_headline]', array(
		'selector' => '.callout-title',
	) );

	$wp_customize->selective_refresh->add_partial( 'responsive_mobile_theme_options[callout_content_area]', array(
		'selector' => '.callout-text',
	) );

	$wp_customize->selective_refresh->add_partial( 'responsive_mobile_theme_options[callout_cta_text]', array(
		'selector' => '#callout-cta',
	) );
	$wp_customize->selective_refresh->add_partial( 'responsive_mobile_theme_options[poweredby_link]', array(
		'selector' => '.powered',
	) );

	$wp_customize->selective_refresh->add_partial( 'sidebars_widgets[home-widget-1]', array(
		'selector' => '#home_widget_1',
	) );

	$wp_customize->selective_refresh->add_partial( 'sidebars_widgets[home-widget-2]', array(
		'selector' => '#home_widget_2',
	) );

	$wp_customize->selective_refresh->add_partial( 'sidebars_widgets[home-widget-3]', array(
		'selector' => '#home_widget_3',
	) );

	$wp_customize->selective_refresh->add_partial( 'responsive_mobile_theme_options[team_title]', array(
		'selector' => '.section_title span',
	) );

	$wp_customize->selective_refresh->add_partial( 'responsive_mobile_theme_options[team_val]', array(
		'selector' => '.team_first_row',
	) );

	$wp_customize->selective_refresh->add_partial( 'responsive_mobile_theme_options[team]', array(
		'selector' => '#team_inner_div',
	) );

}

add_action( 'customize_register', 'responsive_mobile_customize_register' );
add_theme_support( 'customize-selective-refresh-widgets' );

include_once( ABSPATH . 'wp-admin/includes/plugin.php' );
if ( !is_plugin_active( 'cyberchimpsoptions/cc-pro-features.php' ) )
	add_action( 'customize_controls_print_footer_scripts', 'responsive_mobile_add_upgrade_button' );

function responsive_mobile_add_upgrade_button() {

	// Get the upgrade link.
	$upgrade_link = esc_url_raw( 'https://cyberchimps.com/store/pro-features/' );
	?>
	<script type="text/javascript">
		jQuery( document ).ready( function( $ ) {
			jQuery( '#customize-info .accordion-section-title' ).append( '<a target="_blank" class="button btn-upgrade" href="<?php echo esc_url( $upgrade_link ); ?>"><?php esc_html_e( 'Upgrade To Pro', 'responsive-mobile' ); ?></a>' );
			jQuery( '#customize-info .btn-upgrade' ).click( function( event ) {
				event.stopPropagation();
			} );
		} );
	</script>
	<style>
		.wp-core-ui .btn-upgrade {
			color: #fff;
			background: none repeat scroll 0 0 #5BC0DE;
			border-color: #CCCCCC;
			box-shadow: 0 1px 0 #5BC0DE inset, 0 1px 0 rgba(0, 0, 0, 0.08);
			float: right;
			//margin-top: -23px;
			margin-top: 15px;
			font-size: 14px;
			height: 30px;
			margin-bottom: 15px;
		}
		.wp-core-ui .btn-upgrade:hover {
			color: #fff;
			background: none repeat scroll 0 0 #39B3D7;
			box-shadow: 0 1px 0 #39B3D7 inset, 0 1px 0 rgba(0, 0, 0, 0.08);
		}
		.wp-core-ui #customize-info .theme-name{
					word-break: break-all;
					padding-right: 120px;
		}
		.wp-full-overlay-sidebar-content #customize-info {background-color: #fff;}
	</style>
	<?php
}

add_action( 'admin_notices', 'responsive_mobile_rating_notice' );
function responsive_mobile_rating_notice()
{
	$check_screen = get_admin_page_title();

	if ( $check_screen == 'Theme Options' )
	{
	?>

    <div class="notice notice-success is-dismissible">
        <b><p>Liked this theme? <a href="https://wordpress.org/support/theme/responsive-mobile/reviews/#new-post" target="_blank">Leave us</a> a ***** rating. Thank you! </p></b>
    </div>
    <?php
	}
}


if( !function_exists('responsive_get_attachment_id_from_url') ) :
function responsive_get_attachment_id_from_url( $attachment_url = '' ) {
	global $wpdb;
	$attachment_id = false;
	// If there is no url, return.
	if ( '' == $attachment_url )
		return;
	// Get the upload directory paths
	$upload_dir_paths = wp_upload_dir();
	// Make sure the upload path base directory exists in the attachment URL, to verify that we're working with a media library image
	if ( false !== strpos( $attachment_url, $upload_dir_paths['baseurl'] ) ) {
		// If this is the URL of an auto-generated thumbnail, get the URL of the original image
		$attachment_url = preg_replace( '/-\d+x\d+(?=\.(jpg|jpeg|png|gif)$)/i', '', $attachment_url );
		// Remove the upload path base directory from the attachment URL
		$attachment_url = str_replace( $upload_dir_paths['baseurl'] . '/', '', $attachment_url );
		// Finally, run a custom database query to get the attachment ID from the modified attachment URL
		$attachment_id = $wpdb->get_var( $wpdb->prepare( "SELECT wposts.ID FROM $wpdb->posts wposts, $wpdb->postmeta wpostmeta WHERE wposts.ID = wpostmeta.post_id AND wpostmeta.meta_key = '_wp_attached_file' AND wpostmeta.meta_value = '%s' AND wposts.post_type = 'attachment'", $attachment_url ) );
	}
	return $attachment_id;
}
endif;
/* ================= Sticky Header Setting  ===========================  */

add_action( 'wp_footer', 'cyberchimps_fixed_menu_onscroll' );
function cyberchimps_fixed_menu_onscroll()
{
    $responsive_options = responsive_mobile_get_options();
    if ( isset( $responsive_options['sticky_header']) && $responsive_options['sticky_header'] == '1') {


	?>
		<script type="text/javascript">
		jQuery(document).ready(function($){
			$(window).scroll(function()  {
			if ($(this).scrollTop() > 0) {
			$('#header_section').addClass("sticky-header");

			}
			else{
			$('#header_section').removeClass("sticky-header");

			}
			});
		});
		</script>
	<?php
	}
}
if( !function_exists('responsive_exclude_post_cat') ) :
function responsive_exclude_post_cat( $query ){
	$cat = get_theme_mod( 'responsive_mobile_exclude_post_cat' );

	if( $cat && ! is_admin() && $query->is_main_query() ){
		$cat = array_diff( array_unique( $cat ), array('') );
		if( $query->is_home() || $query->is_archive() ) {
			$query->set( 'category__not_in', $cat );
			//$query->set( 'cat', '-5,-6,-65,-66' );
		}
	}
}
endif;
add_filter( 'pre_get_posts', 'responsive_exclude_post_cat' );
function responsive_custom_category_widget( $arg ) {
	$cat = get_theme_mod( 'exclude_post_cat' );

	if( $cat ){
		$cat = array_diff( array_unique( $cat ), array('') );
		$arg["exclude"] = $cat;
	}
	return $arg;
}
add_filter( "widget_categories_args", "responsive_custom_category_widget" );
add_filter( "widget_categories_dropdown_args", "responsive_custom_category_widget" );

function responsive_exclude_post_cat_recentpost_widget($array){
	$s = '';
	$i = 1;
	$cat = get_theme_mod( 'exclude_post_cat' );

	if( $cat ){
		$cat = array_diff( array_unique( $cat ), array('') );
		foreach( $cat as $c ){
			$i++;
			$s .= '-'.$c;
			if( count($cat) >= $i )
				$s .= ', ';
		}
	}
	$array['cat']=array($s);
	//$exclude = array( 'cat' => $s );

	return $array;
}
add_filter( "widget_posts_args", "responsive_exclude_post_cat_recentpost_widget" );

function responsive_pro_categorylist_validate( ) {
		// An array of valid results
		$args = array(
				'type'         => 'post',
				'orderby'      => 'name',
				'order'        => 'ASC',
				'hide_empty'   => 1,
				'hierarchical' => 1,
				'taxonomy'     => 'category'
		);
		$option_categories = array();
		$category_lists = get_categories( $args );
		$option_categories[''] = esc_html(__( 'Choose Category', 'responsive-mobile' ));
		foreach( $category_lists as $category ){
			$option_categories[$category->term_id] = $category->name;
		}
		return $option_categories;
	}
	/**
	 *  Enqueue block styles  in editor
	 */
	function responsive_mobile_block_styles() {
		wp_enqueue_style( 'rm-gutenberg-blocks', get_stylesheet_directory_uri() . '/css/gutenberg-blocks.css', array(), '1.0' );
	}
	add_action( 'enqueue_block_editor_assets', 'responsive_mobile_block_styles' );

    function register_my_session(){
        if( ! session_id() ) {
            session_start();
        }
    }
    add_action('init', 'register_my_session');

    function create_header_menu_submenu($item_output, $item, $depth, $args){
        if ($args->theme_location !== "header-menu") {
            return $item_output;
        }
        $output="";
        if ( isset( $args->item_spacing ) && 'discard' === $args->item_spacing ) {
            $t = '';
            $n = '';
        } else {
            $t = "\t";
            $n = "\n";
        }
        $indent = ( $depth ) ? str_repeat( $t, $depth ) : '';

        $classes   = empty( $item->classes ) ? array() : (array) $item->classes;
        $classes[] = 'menu-item-' . $item->ID;

        /**
         * Filters the arguments for a single nav menu item.
         *
         * @since 4.4.0
         *
         * @param stdClass $args  An object of wp_nav_menu() arguments.
         * @param WP_Post  $item  Menu item data object.
         * @param int      $depth Depth of menu item. Used for padding.
         */
        $args = apply_filters( 'nav_menu_item_args', $args, $item, $depth );

        /**
         * Filters the CSS classes applied to a menu item's list item element.
         *
         * @since 3.0.0
         * @since 4.1.0 The `$depth` parameter was added.
         *
         * @param string[] $classes Array of the CSS classes that are applied to the menu item's `<li>` element.
         * @param WP_Post  $item    The current menu item.
         * @param stdClass $args    An object of wp_nav_menu() arguments.
         * @param int      $depth   Depth of menu item. Used for padding.
         */
        $class_names = join( ' ', apply_filters( 'nav_menu_css_class', array_filter( $classes ), $item, $args, $depth ) );
        $class_names = $class_names ? ' class="' . esc_attr( $class_names ) . '"' : '';

        /**
         * Filters the ID applied to a menu item's list item element.
         *
         * @since 3.0.1
         * @since 4.1.0 The `$depth` parameter was added.
         *
         * @param string   $menu_id The ID that is applied to the menu item's `<li>` element.
         * @param WP_Post  $item    The current menu item.
         * @param stdClass $args    An object of wp_nav_menu() arguments.
         * @param int      $depth   Depth of menu item. Used for padding.
         */
        $id = apply_filters( 'nav_menu_item_id', 'menu-item-' . $item->ID, $item, $args, $depth );
        $id = $id ? ' id="' . esc_attr( $id ) . '"' : '';

        $output .= $indent . '<li' . $id . $class_names . '>';

        $atts           = array();
        $atts['title']  = ! empty( $item->attr_title ) ? $item->attr_title : '';
        $atts['target'] = ! empty( $item->target ) ? $item->target : '';
        if ( '_blank' === $item->target && empty( $item->xfn ) ) {
            $atts['rel'] = 'noopener noreferrer';
        } else {
            $atts['rel'] = $item->xfn;
        }
        if($args->theme_location !== "top-menu") {
            $atts['href']         = ! empty( $item->url ) ? $item->url : '';
        }else {
            $atts['href']         = ! empty( $item->url ) ? $item->url . '?top-menu=true' : '';
        }
        $atts['aria-current'] = $item->current ? 'page' : '';
        $atts['class'] ='header-menu-item ';

        /**
         * Filters the HTML attributes applied to a menu item's anchor element.
         *
         * @since 3.6.0
         * @since 4.1.0 The `$depth` parameter was added.
         *
         * @param array $atts {
         *     The HTML attributes applied to the menu item's `<a>` element, empty strings are ignored.
         *
         *     @type string $title        Title attribute.
         *     @type string $target       Target attribute.
         *     @type string $rel          The rel attribute.
         *     @type string $href         The href attribute.
         *     @type string $aria_current The aria-current attribute.
         * }
         * @param WP_Post  $item  The current menu item.
         * @param stdClass $args  An object of wp_nav_menu() arguments.
         * @param int      $depth Depth of menu item. Used for padding.
         */
        $atts = apply_filters( 'nav_menu_link_attributes', $atts, $item, $args, $depth );

        $attributes = '';
        foreach ( $atts as $attr => $value ) {
            if ( ! empty( $value ) ) {
                $value       = ( 'href' === $attr ) ? esc_url( $value ) : esc_attr( $value );
                $attributes .= ' ' . $attr . '="' . $value . '"';
            }
        }

        /** This filter is documented in wp-includes/post-template.php */
        $title = apply_filters( 'the_title', $item->title, $item->ID );

        /**
         * Filters a menu item's title.
         *
         * @since 4.4.0
         *
         * @param string   $title The menu item's title.
         * @param WP_Post  $item  The current menu item.
         * @param stdClass $args  An object of wp_nav_menu() arguments.
         * @param int      $depth Depth of menu item. Used for padding.
         */
        $title = apply_filters( 'nav_menu_item_title', $title, $item, $args, $depth );

        $object_post = get_post($item->object_id);
        $children = get_posts(array("post_type" => "page", "post_status" => "publish", "post_parent" => $object_post->ID ,"order" => "ASC"));

        $item_output  = $args->before;
        $item_output .= '<div class="dropdown">';
        $item_output .= '<div class="dropbtn">';
        $item_output .= '<a' . $attributes . '>';
        $item_output .= $args->link_before . $title . $args->link_after;
        $item_output .= '</a>';
        $item_output .= '</div>';
        $item_output .= '<div class="dropdown-content">';
        foreach ($children as $child){
            $item_output .= '<a href="' . $child->guid . '"> ' . $child->post_title . '</a>';
        }
        $item_output .= '</div>';
        $item_output .= '</div>';
        $item_output .= $args->after;

        /**
         * Filters a menu item's starting output.
         *
         * The menu item's starting output only includes `$args->before`, the opening `<a>`,
         * the menu item's title, the closing `</a>`, and `$args->after`. Currently, there is
         * no filter for modifying the opening and closing `<li>` for a menu item.
         *
         * @since 3.0.0
         *
         * @param string   $item_output The menu item's starting HTML output.
         * @param WP_Post  $item        Menu item data object.
         * @param int      $depth       Depth of menu item. Used for padding.
         * @param stdClass $args        An object of wp_nav_menu() arguments.
         */
        return $item_output;
    }
    add_filter( 'walker_nav_menu_start_el', 'create_header_menu_submenu', 11, 4 );
