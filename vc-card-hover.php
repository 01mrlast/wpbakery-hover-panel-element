<?php
/**
 * Adds new shortcode "info-box-shortcode" and registers it to
 * the WPBakery Visual Composer plugin
 *
 */
// If this file is called directly, abort
if ( ! defined( 'ABSPATH' ) ) {
    die ('Silly human what are you doing here');
}
if ( ! class_exists( 'vcCardHover' ) ) {
    class vcCardHover {
        /**
         * Main constructor
         *
         */
        public function __construct() {
// Registers the shortcode in WordPress
            add_shortcode( 'info-box-shortcode', array( 'vcCardHover', 'output' ) );
// Map shortcode to Visual Composer
            if ( function_exists( 'vc_lean_map' ) ) {
                vc_lean_map( 'info-box-shortcode', array( 'vcCardHover', 'map' ) );
            }
        }
        /**
         * Map shortcode to VC
         *
         * This is an array of all your settings which become the shortcode attributes ($atts)
         * for the output.
         *
         */
        public static function map() {
            return array(
                'name'        => esc_html__( 'Card Hover', 'text-domain' ),
                'description' => esc_html__( 'Add new Cardhover', 'text-domain' ),
                'base'        => 'vc_infobox',
                'category' => __('WPC Directory', 'text-domain'),
                'icon' => plugin_dir_path( __FILE__ ) . 'assets/img/note.png',
                'params'      => array(
                    array(
                        'type'       => 'attach_image',
                        'holder' => 'img',
                        'heading' => __( 'Image', 'text-domain' ),
                        'param_name' => 'bgimg',
// 'value' => __( 'Default value', 'text-domain' ),
                        'admin_label' => false,
                        'weight' => 0,
                        'group' => 'Cardhover',
                    ),
                    array(
                        'type' => 'dropdown',
                        'holder' => 'h3',
                        'class' => 'title-class',
                        'heading' => __( 'Category Name', 'text-domain' ),
                        'param_name' => 'hovermodel',
                        'value'       => array(
                            'Lily'   => 'effect-lily',
                            'Sadie'   => 'effect-sadie',
                            'Honey' => 'effect-honey',
                            'Layla'  => 'effect-layla',
                            'Zoe'   => 'effect-zoe',
                            'Oscar'   => 'effect-oscar',
                            'Marley' => 'effect-marley',
                            'Ruby'  => 'effect-ruby',
                            'Roxy'   => 'effect-roxy',
                            'Bubba'   => 'effect-bubba',
                            'Romeo' => 'effect-romeo',
                            'Dexter'  => 'effect-dexter',
                            'Sarah'   => 'effect-sarah',
                            'Chico'   => 'effect-chico',
                            'Milo' => 'effect-milo'
                        ),
                        'admin_label' => false,
                        'weight' => 0,
                        'group' => 'Cardhover',
                    ),
                    array(
                        'type' => 'textfield',
                        'holder' => 'h3',
                        'class' => 'title-class',
                        'heading' => __( 'Title', 'text-domain' ),
                        'param_name' => 'title',
                        'value' => __( '', 'text-domain' ),
                         'admin_label' => false,
                         'weight' => 0,
                        'group' => 'Cardhover',
                    ),
                    array(
                        'type' => 'colorpicker',
                        'holder' => 'div',
                        'class' => '',
                        'heading' => __( 'Color Picker Title', 'text-domain' ),
                        'param_name' => 'colorpicker',
                        'value' => __( '', 'text-domain' ),
                        'admin_label' => false,
                        'weight' => 0,
                        'group' => 'Cardhover',
                    ),
                    array(
                        'type' => 'textarea_html',
                        'holder' => 'div',
                        'class' => 'wpc-text-class',
                        'heading' => __( 'Description', 'text-domain' ),
                        'param_name' => 'content',
                        'value' => __( '', 'text-domain' ),
                        'description' => __( 'To add link highlight text or url and click the chain to apply hyperlink', 'text-domain' ),
                         'admin_label' => false,
                         'weight' => 0,
                        'group' => 'Cardhover',
                    ),
                    array(
                        'type' => 'colorpicker',
                        'holder' => 'div',
                        'class' => '',
                        'heading' => __( 'Color Picker Content', 'text-domain' ),
                        'param_name' => 'colorpickerx',
                        'value' => __( '', 'text-domain' ),
                        'admin_label' => false,
                        'weight' => 0,
                        'group' => 'Cardhover',
                    ),

                    array(
                        'type' => 'textfield',
                        'holder' => 'div',
                        'class' => '',
                        'heading' => __( 'Url', 'text-domain' ),
                        'param_name' => 'url',
                        'value' => __( '', 'text-domain' ),
                        'admin_label' => false,
                        'weight' => 0,
                        'group' => 'Cardhover',
                    ),






                ),
            );
        }
        /**
         * Shortcode output
         *
         */
        public static function output( $atts, $content = null ) {
            extract(
                shortcode_atts(
                    array(
                        'bgimg' => 'bgimg',
                        'hovermodel'   => '',
                        'title'   => '',
                        'url'   => '',
                        'colorpicker'   => '',
                        'colorpickerx'   => '',
                    ),
                    $atts
                )
            );
            $img_url = wp_get_attachment_image_src( $bgimg, "large");
// Fill $html var with data
            $html = '<div class="grid">
<a href="' . $url . '"><figure class="' . $hovermodel . '">
<img src="'. $img_url[0] .'" alt="img11">
<figcaption>
<h2 style="color: ' . $colorpicker . '">' . $title . '</h2>
<p style="color: ' . $colorpickerx . '">' . $content . '</p>

</figcaption></a>
</figure>
</div>';
            return $html;
        }
    }
}
new vcCardHover;
