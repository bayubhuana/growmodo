<?php
/**
 * Grow Modo Theme Functions
 *
 * @package GrowModo
 */

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

/**
 * Theme setup
 */
if ( ! function_exists( 'growmodo_setup' ) ) {
    function growmodo_setup() {
        // Let WordPress handle the <title> tag
        add_theme_support( 'title-tag' );

        // Add support for featured images
        add_theme_support( 'post-thumbnails' );

        // Add support for HTML5 markup
        add_theme_support( 'html5', array( 'search-form', 'comment-form', 'comment-list', 'gallery', 'caption' ) );

        // Add support for custom logo
        add_theme_support( 'custom-logo', array(
            'height'      => 100,
            'width'       => 400,
            'flex-height' => true,
            'flex-width'  => true,
        ) );

        // Register navigation menus
        register_nav_menus( array(
            'primary' => __( 'Primary Menu', 'growmodo' ),
            'footer'  => __( 'Footer Menu', 'growmodo' ),
        ) );
    }
}
add_action( 'after_setup_theme', 'growmodo_setup' );

function growmodo_enqueue_slick() {
    // Slick CSS
    wp_enqueue_style(
        'slick-css',
        'https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css',
        array(),
        '1.8.1'
    );

    // Slick Theme (optional)
    wp_enqueue_style(
        'slick-theme-css',
        'https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick-theme.css',
        array('slick-css'),
        '1.8.1'
    );

    // Slick JS
    wp_enqueue_script(
        'slick-js',
        'https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js',
        array('jquery'),
        '1.8.1',
        true
    );

    // Init script
    wp_enqueue_script(
        'growmodo-slick-init',
        get_template_directory_uri() . '/js/slick-init.js',
        array('slick-js'),
        filemtime(get_template_directory() . '/js/slick-init.js'),
        true
    );
}
add_action('wp_enqueue_scripts', 'growmodo_enqueue_slick');

function growmodo_enqueue_scripts() {
    // Generate a version number based on file modification time
    $theme_version = wp_get_theme()->get( 'Version' );

      // Custom CSS file (with auto timestamp)
    $main_css = get_template_directory() . '/style.css';
    wp_enqueue_style(
        'growmodo-main',
        get_template_directory_uri() . '/style.css',
        array(),
        filemtime( $main_css )
    );

    // Custom JS file (with auto timestamp)
    $main_js = get_template_directory() . '/script.js';
    wp_enqueue_script(
        'growmodo-main',
        get_template_directory_uri() . '/script.js',
        array( 'jquery' ),
        filemtime( $main_js ),
        true
    );
}
add_action( 'wp_enqueue_scripts', 'growmodo_enqueue_scripts' );

/**
 * Register widget areas
 */
function growmodo_widgets_init() {
    register_sidebar( array(
        'name'          => __( 'Sidebar', 'growmodo' ),
        'id'            => 'sidebar-1',
        'description'   => __( 'Add widgets here.', 'growmodo' ),
        'before_widget' => '<section id="%1$s" class="widget %2$s">',
        'after_widget'  => '</section>',
        'before_title'  => '<h2 class="widget-title">',
        'after_title'   => '</h2>',
    ) );
}
add_action( 'widgets_init', 'growmodo_widgets_init' );
