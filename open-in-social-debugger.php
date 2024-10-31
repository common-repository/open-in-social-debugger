<?php
/**
 * Plugin Name: Open In Social Debugger
 * Plugin URI: https://neurotravel.eu/plugins/
 * Description: Displays a link in the top bar for opening the current page/post in a social debugger.
 * Version: 1.0
 * Author: Ilkka Koski
 * Author URI: https://neurotravel.eu/plugins/
 */

add_action( 'admin_bar_menu', 'open_social_debu', 100 );


function open_social_debu( $admin_bar ) {
	$urli = 'https://developers.facebook.com/tools/debug/?q=' .  get_permalink();
	if (get_post_status() == 'publish' && strpos($url, 'wp-admin') == false) {
    $admin_bar->add_menu( array(
	'id'    => 'open-social-debugger',
	'title' => '<span class="ab-icon"></span><span class="ab-label">Open in Social Debugger</span>',
	'href'  => $urli,
	'meta'  => array(
             'title' => __('Open in Social Debugger'),
	     'target'=>'_blank',
	),
    ));
	}
}

add_action( 'admin_enqueue_scripts', 'open_in_social_debugger_css_admin' );
add_action( 'wp_enqueue_scripts', 'open_in_social_debugger_css_admin' );

	function open_in_social_debugger_css_admin() {
		    wp_register_style( 'open_in_social_debugger', plugin_dir_url( __FILE__ ) . 'open-in-social-debugger.css','','', 'screen' );
		    wp_enqueue_style( 'open_in_social_debugger' );
	}

?>
