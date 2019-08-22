<?php

/*
Plugin Name: WPBakery Hover Panel Element
Plugin URI: https://mrlast.com/wpbakery-hover-panel-element/
Description: Visual Composer Hover Style
Author: Samson last
Version: 1.0.0
Author URI: https://mrlast.com/
*/


// If this file is called directly, abort

if ( ! defined( 'ABSPATH' ) ) {
    die ('Silly human what are you doing here');
}


// Before VC Init

add_action( 'vc_before_init', 'wpc_vc_before_init_actions' );

function wpc_vc_before_init_actions() {

// Require new custom Element

    include( plugin_dir_path( __FILE__ ) . 'vc-card-hover.php');

}

// Link directory stylesheet

function wpc_community_directory_scripts() {
    wp_enqueue_style( 'wpc_community_directory_stylesheet',  plugin_dir_url( __FILE__ ) . 'style.css' );
}
add_action( 'wp_enqueue_scripts', 'wpc_community_directory_scripts' );