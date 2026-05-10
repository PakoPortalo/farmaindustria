<?php
/**
 * Farmaindustria theme bootstrap
 */

if (!defined('ABSPATH')) {
    exit;
}

define('FI_THEME_VERSION', '0.1.0');
define('FI_THEME_DIR', get_stylesheet_directory());
define('FI_THEME_URI', get_stylesheet_directory_uri());

require_once FI_THEME_DIR . '/inc/enqueue.php';
require_once FI_THEME_DIR . '/inc/helpers.php';
require_once FI_THEME_DIR . '/inc/cpt.php';
require_once FI_THEME_DIR . '/inc/acf-blocks.php';

add_action('after_setup_theme', function () {
    add_theme_support('title-tag');
    add_theme_support('post-thumbnails');
    add_theme_support('html5', ['search-form', 'gallery', 'caption', 'style', 'script']);
    add_theme_support('responsive-embeds');
    add_theme_support('align-wide');
    add_theme_support('editor-styles');

    register_nav_menus([
        'primary' => __('Menú principal', 'farmaindustria'),
        'footer'  => __('Menú footer', 'farmaindustria'),
    ]);

    load_theme_textdomain('farmaindustria', FI_THEME_DIR . '/languages');
});

add_filter('acf/settings/save_json', function () {
    return FI_THEME_DIR . '/acf-json';
});

add_filter('acf/settings/load_json', function ($paths) {
    unset($paths[0]);
    $paths[] = FI_THEME_DIR . '/acf-json';
    return $paths;
});

add_action('acf/init', function () {
    if (function_exists('acf_add_options_page')) {
        acf_add_options_page([
            'page_title' => 'Opciones del sitio',
            'menu_title' => 'Opciones',
            'menu_slug'  => 'fi-options',
            'capability' => 'edit_posts',
            'redirect'   => false,
        ]);
    }
});

add_action('init', function () {
    remove_action('wp_head', 'wp_generator');
    remove_action('wp_head', 'wlwmanifest_link');
    remove_action('wp_head', 'rsd_link');
});
