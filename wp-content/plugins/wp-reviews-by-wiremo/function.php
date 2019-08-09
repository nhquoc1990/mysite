<?php
/*

**************************************************************************

Plugin Name: WordPress reviews plugin by Wiremo
Plugin URI: https://wiremo.co/
Description: Wiremo is a convenient customer review plugin aimed to help consumer-centric teams improve their products or services and make their team more effective by listening to their most substantial asset – customers.
Version: 1.2.3
Author: Wiremo
Author URI: https://wiremo.co
License: GPL2
License URI: https://www.gnu.org/licenses/gpl-2.0.html
Text Domain: wiremo

**************************************************************************
 Copyright (C) 2016-2018 Wiremo

WordPress reviews plugin by Wiremo is free software: you can redistribute it and/or modify
it under the terms of the GNU General Public License as published by
the Free Software Foundation, either version 3 of the License, or
(at your option) any later version.

WordPress reviews plugin by Wiremo is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
GNU General Public License for more details.

You should have received a copy of the GNU General Public License
along with this program.  If not, see <http://www.gnu.org/licenses/>.
*/

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

define("WRMR_URLAPP", "https://wapi.wiremo.co");
define("WRMR_URLWIDGET", "https://wapi.wiremo.co/v2/script");
define("WRMR_POSTS_PER_PAGE", 100000);
define("WRMR_LIMIT_REQ", 50);


include dirname( __FILE__ ).'/includes/logs.php';
include dirname( __FILE__ ).'/classes/class-wrmr-ajax.php';
include dirname( __FILE__ ).'/classes/class-wrmr-administrator.php';

$site_id = esc_attr(get_option("wrmr-site-id"));
$api_key = esc_attr(get_option("wrmr-api-key"));
$register_hooks = esc_attr(get_option("wrmr-register-hooks"));

if (isset($site_id) && !empty($site_id) && isset($api_key) && !empty($api_key) && isset($register_hooks) && !empty($register_hooks)) {
    include dirname( __FILE__ ).'/classes/class-wrmr-routes.php';
    include dirname( __FILE__ ).'/classes/class-wrmr-shortcodes.php';
    
    add_action('init', 'wrmr_shortcode_button_init');

    require_once plugin_dir_path( __FILE__ ) . 'src/initBlocks.php';
}

add_filter( 'plugin_action_links_' . plugin_basename(__FILE__), 'wrmr_action_links' );

if(!function_exists("wrmr_action_links")) {
    function wrmr_action_links( $links ) {
        $action_links = array(
            'settings' => '<a href="' . admin_url( 'admin.php?page=wr-settings' ) . '" aria-label="' . esc_attr__( 'View Wiremo settings', 'wiremo' ) . '">' . esc_html__( 'Settings', 'wiremo' ) . '</a>',
        );
        return array_merge( $action_links, $links );
    }
}

function wrmr_shortcode_button_init() {

    //Abort early if the user will never see TinyMCE
    if ( ! current_user_can('edit_posts') && ! current_user_can('edit_pages') && get_user_option('rich_editing') == 'true')
        return;

    //Add a callback to regiser our tinymce plugin
    add_filter("mce_external_plugins", "wrmr_register_tinymce_plugin");

    // Add a callback to add our button to the TinyMCE toolbar
    add_filter('mce_buttons', 'wrmr_add_tinymce_button');
}

//This callback registers our plug-in
function wrmr_register_tinymce_plugin($plugin_array) {
    $plugin_array['wiremo_button'] = plugins_url('assets/js/shortcode.js', __FILE__);
    return $plugin_array;
}

//This callback adds our button to the toolbar
function wrmr_add_tinymce_button($buttons) {
    //Add the button ID to the $button array
    $buttons[] = "wiremo_button";
    return $buttons;
}
