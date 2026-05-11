<?php
/**
 * Render: bloque Hero +ensayos.
 *
 * Spec: Figma "Homa-desktop OK" / nodo 116:2386 (contenido) + fondo "Bolas"
 * compartido (parts/fondo-bolas.php).
 * TODO ACF: cuando ACF Pro esté activo, sustituir por get_field() con el
 * field group `group_hero_ensayos` (logo, line_1, line_2, line_3, highlight_word).
 */

if (!defined('ABSPATH')) {
    exit;
}

/** @var array $attributes */
$align         = $attributes['align'] ?? 'full';
$align_class   = ' align' . preg_replace('/[^a-z]/', '', strtolower($align));
$anchor        = !empty($attributes['anchor']) ? ' id="' . esc_attr($attributes['anchor']) . '"' : '';

$logo_uri      = FI_THEME_URI . '/assets/img/hero/ensayos-logo.svg';
$line_1        = 'Para que la';
$line_2        = 'investigación clínica';
$line_3_before = 'siga yendo a ';
$line_3_mark   = 'más';
?>
<section class="hero-ensayos<?php echo $align_class; ?>"<?php echo $anchor; ?>>
    <div class="hero-ensayos__inner">
        <div class="hero-ensayos__logo">
            <img src="<?php echo esc_url($logo_uri); ?>" alt="" width="1288" height="234" loading="eager" />
        </div>
        <h1 class="hero-ensayos__claim">
            <span class="hero-ensayos__line"><?php echo esc_html($line_1); ?></span>
            <span class="hero-ensayos__line"><?php echo esc_html($line_2); ?></span>
            <span class="hero-ensayos__line">
                <?php echo esc_html($line_3_before); ?><span class="hero-ensayos__mark"><?php echo esc_html($line_3_mark); ?></span>
            </span>
        </h1>
    </div>
</section>
