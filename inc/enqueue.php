<?php
/**
 * Enqueue scripts y styles desde manifest de Vite
 */

if (!defined('ABSPATH')) {
    exit;
}

function fi_vite_manifest(): array {
    static $manifest = null;
    if ($manifest !== null) {
        return $manifest;
    }
    $path = FI_THEME_DIR . '/assets/dist/.vite/manifest.json';
    if (!file_exists($path)) {
        $manifest = [];
        return $manifest;
    }
    $manifest = json_decode(file_get_contents($path), true) ?: [];
    return $manifest;
}

function fi_vite_asset(string $entry): ?array {
    $manifest = fi_vite_manifest();
    return $manifest[$entry] ?? null;
}

add_action('wp_enqueue_scripts', function () {
    $css_entry = fi_vite_asset('assets/scss/main.scss');
    $js_entry  = fi_vite_asset('assets/js/main.js');

    if ($css_entry && !empty($css_entry['file'])) {
        wp_enqueue_style(
            'fi-main',
            FI_THEME_URI . '/assets/dist/' . $css_entry['file'],
            [],
            null
        );
    }

    if ($js_entry && !empty($js_entry['file'])) {
        wp_enqueue_script(
            'fi-main',
            FI_THEME_URI . '/assets/dist/' . $js_entry['file'],
            [],
            null,
            true
        );
    }

    if (!empty($js_entry['css'])) {
        foreach ($js_entry['css'] as $i => $css_file) {
            wp_enqueue_style(
                'fi-js-css-' . $i,
                FI_THEME_URI . '/assets/dist/' . $css_file,
                [],
                null
            );
        }
    }
});

add_filter('script_loader_tag', function ($tag, $handle) {
    if ($handle !== 'fi-main') {
        return $tag;
    }
    return str_replace(' src=', ' type="module" src=', $tag);
}, 10, 2);
