<?php
/**
 * --------------------------
 * Autoload Function And Hook
 * --------------------------
 */


// Actions
add_action('init', 'register_script');
add_action('wp_enqueue_scripts', 'enqueue_style');


// register jquery and style on initialization
function register_script()
{
    // Javascript Lib
    wp_register_script('nip_jquery', get_stylesheet_directory_uri() . '/assets/js/jquery.js', array('jquery'), '3.6.0');
    wp_register_script('nipotoJs', get_stylesheet_directory_uri() . '/assets/js/nipoto.js', false, '1.0.0', 'all');
    wp_localize_script("nipotoJs", "ajax_object", ['ajax_url'=>admin_url("admin-ajax.php")]);
    wp_register_script('nip_bootstrap_js', get_stylesheet_directory_uri() . '/assets/js/bootstrap.bundle.min.js', false, '1.0.0', 'all');
    wp_register_script('slick_js', get_stylesheet_directory_uri() . '/assets/js/slick.js', false, '1.0.0', 'all');
    wp_register_script('moment', get_stylesheet_directory_uri() . '/assets/js/moment.js', false, '1.0.0', 'all');
    wp_register_script('persianNum', get_stylesheet_directory_uri() . '/assets/js/persianNum.jquery-2.min.js', false, '1.0.0', 'all');


    // Stylesheet Lib
    wp_register_style('nipoto', get_stylesheet_directory_uri() . '/assets/css/nipoto.css', true, '1.0.0', 'all');
    wp_register_style('nipoto_header', get_stylesheet_directory_uri() . '/assets/css/header_nipoto.css', true, '1.0.0', 'all');
    wp_register_style('nipoto_footer', get_stylesheet_directory_uri() . '/assets/css/footer_nipoto.css', true, '1.0.0', 'all');
    wp_register_style('nip_bootstrap_css', get_stylesheet_directory_uri() . '/assets/css/bootstrap.min.css', true, '1.0.0', 'all');
    wp_register_style('nip_bootstrap_rtl_css', get_stylesheet_directory_uri() . '/assets/css/bootstrap.rtl.css', true, '1.0.0', 'all');
    wp_register_style('slick_css', get_stylesheet_directory_uri() . '/assets/css/slick.css', true, '1.0.0', 'all');
    wp_register_style('nip_fonts', get_stylesheet_directory_uri() . '/assets/css/fonts.css', true, '1.0.0', 'all');

}

// use the registered jquery and style above
function enqueue_style()
{
    //js
    wp_enqueue_script('nipotoJs');

    wp_enqueue_script('nip_bootstrap_js');
    wp_enqueue_script('slick_js');
    wp_enqueue_script('nip_jquery');
    wp_enqueue_script('moment');
    wp_enqueue_script('persianNum');

    //css
    wp_enqueue_style('nipoto');
    wp_enqueue_style('nipoto_footer');
    wp_enqueue_style('nipoto_header');
    wp_enqueue_style('nip_fonts');
    wp_enqueue_style('nip_bootstrap_css');
    wp_enqueue_style('nip_bootstrap_rtl_css');
    wp_enqueue_style('slick_css');
}
