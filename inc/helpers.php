<?php
/**
 * Helpers globales del tema
 */

if (!defined('ABSPATH')) {
    exit;
}

function fi_option(string $key, $default = '') {
    if (!function_exists('get_field')) {
        return $default;
    }
    $value = get_field($key, 'option');
    return $value !== null && $value !== '' ? $value : $default;
}

function fi_svg(string $name): string {
    $path = FI_THEME_DIR . '/assets/img/' . $name . '.svg';
    if (!file_exists($path)) {
        return '';
    }
    return file_get_contents($path);
}
