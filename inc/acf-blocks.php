<?php
/**
 * Registro de ACF Blocks
 *
 * Cada bloque vive en /blocks/<nombre>/ con block.json + render.php + style.scss.
 * WP descubre los bloques automáticamente con register_block_type apuntando al directorio.
 */

if (!defined('ABSPATH')) {
    exit;
}

add_action('init', function () {
    $blocks_dir = FI_THEME_DIR . '/blocks';
    if (!is_dir($blocks_dir)) {
        return;
    }

    foreach (glob($blocks_dir . '/*', GLOB_ONLYDIR) as $block_path) {
        if (file_exists($block_path . '/block.json')) {
            register_block_type($block_path);
        }
    }
});
