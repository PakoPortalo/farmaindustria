<?php
/**
 * Render: bloque Hero +ensayos.
 *
 * Datos hardcoded a partir del Figma "Homa-desktop OK" / nodo 116:2386
 * + fondo "Bolas" (Frame 1216558812 / 116:2010, 1440x914).
 * TODO ACF: cuando ACF Pro esté activo, sustituir por get_field() con el
 * field group `group_hero_ensayos` (logo, line_1, line_2, line_3, highlight_word).
 */

if (!defined('ABSPATH')) {
    exit;
}

/** @var array $attributes Atributos pasados por WP al render del bloque */
$align         = $attributes['align'] ?? 'full';
$align_class   = ' align' . preg_replace('/[^a-z]/', '', strtolower($align));
$anchor        = !empty($attributes['anchor']) ? ' id="' . esc_attr($attributes['anchor']) . '"' : '';

$logo_uri      = FI_THEME_URI . '/assets/img/hero/ensayos-logo.svg';
$bolas_dir     = FI_THEME_URI . '/assets/img/hero/bolas';
$line_1        = 'Para que la';
$line_2        = 'investigación clínica';
$line_3_before = 'siga yendo a ';
$line_3_mark   = 'más';

// Bolas: posiciones exactas del Figma (30 bolas — Bolas component 1:457).
$bolas = [
    [539, 239], [802, 199], [747, 356], [960, 435], [1151, 295],
    [25, 135], [288, 95], [233, 252], [446, 331], [637, 191],
    [112, 449], [254, 434], [221, 624], [361, 670], [558, 734],
    [952, 404], [707, 511], [721, 346], [495, 324], [347, 509],
    [1475, 371], [1231, 479], [1244, 313], [1018, 292], [870, 476],
    [1310, 90], [1176, 143], [1160, -48], [1013, -57], [806, -68],
];
?>
<section class="hero-ensayos<?php echo $align_class; ?>"<?php echo $anchor; ?>>
    <div class="hero-ensayos__bg" aria-hidden="true">
        <div class="hero-ensayos__gradient"></div>

        <img class="hero-ensayos__blob hero-ensayos__blob--1" src="<?php echo esc_url($bolas_dir . '/vector-1.svg'); ?>" alt="" loading="lazy" />
        <img class="hero-ensayos__blob hero-ensayos__blob--2" src="<?php echo esc_url($bolas_dir . '/vector-2.svg'); ?>" alt="" loading="lazy" />
        <img class="hero-ensayos__blob hero-ensayos__blob--3" src="<?php echo esc_url($bolas_dir . '/vector-3.svg'); ?>" alt="" loading="lazy" />

        <?php foreach ($bolas as $i => [$x, $y]) : ?>
            <span class="hero-ensayos__bola" style="--x:<?php echo (int) $x; ?>px;--y:<?php echo (int) $y; ?>px;--i:<?php echo (int) $i; ?>"></span>
        <?php endforeach; ?>

        <div class="hero-ensayos__mask"></div>
    </div>

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
