<?php

/*
	Plugin Name: Girls-Plugin
	Plugin URI: http://time-ismoney.com/
	Description: Girls-Plugin for WordPress
	Version: 1.0.0
	Author: Time is-Money
	Author URI: http://time-ismoney.com/
*/

require_once plugin_dir_path( __FILE__ ) . 'incl/custom-post-type.php'; 
require_once plugin_dir_path( __FILE__ ) . 'incl/metabox.php'; 
require_once plugin_dir_path( __FILE__ ) . 'incl/widget.php'; 
require_once plugin_dir_path( __FILE__ ) . 'incl/insert-girls.php';
require_once plugin_dir_path( __FILE__ ) . 'public/girl-query.php';

wp_enqueue_script( 'girl-ajax', plugins_url( 'public/js/ajax-random-girl.js', __FILE__ ), array('jquery') );
wp_enqueue_style( 'girl', plugins_url('public/css/girls.css', __FILE__ ));

function girls_plugin_activate() {

	girls_plugin_add_posts();
}
register_activation_hook( __FILE__, 'girls_plugin_activate' );


wp_localize_script( 'girl-ajax', 'GirlsRandomAjax', array( 'ajaxurl' => admin_url( 'admin-ajax.php' ) ) );


