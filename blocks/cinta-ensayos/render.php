<?php
/**
 * Render: bloque Cinta ensayos (marquee horizontal infinita).
 *
 * Spec: Figma "Homa-desktop OK" / nodo 116:2014 (Frame 1216558813, 1440x233).
 * Bg blanco, 2 líneas horizontales (top y bottom), texto Switzer Regular 120px
 * + logo "+ensayos" pixelado intercalado, scroll horizontal infinito.
 * TODO ACF: exponer `frases` (array de strings) cuando ACF Pro esté activo.
 */

if (!defined('ABSPATH')) {
    exit;
}

/** @var array $attributes */
$align       = $attributes['align'] ?? 'full';
$align_class = ' align' . preg_replace('/[^a-z]/', '', strtolower($align));
$anchor      = !empty($attributes['anchor']) ? ' id="' . esc_attr($attributes['anchor']) . '"' : '';

$logo_uri    = FI_THEME_URI . '/assets/img/cinta/ensayos-logo-pixel.webp';
$frases      = ['es seguir avanzando.', 'es ir a más.'];
?>
<section class="cinta-ensayos<?php echo $align_class; ?>"<?php echo $anchor; ?>>
    <div class="cinta-ensayos__track" aria-hidden="true">
        <?php for ($i = 0; $i < 2; $i++) : // 2 copias para loop seamless ?>
            <div class="cinta-ensayos__item">
                <?php foreach ($frases as $frase) : ?>
                    <img class="cinta-ensayos__logo" src="<?php echo esc_url($logo_uri); ?>" alt="" width="482" height="93" loading="lazy" />
                    <span class="cinta-ensayos__text"><?php echo esc_html($frase); ?></span>
                <?php endforeach; ?>
            </div>
        <?php endfor; ?>
    </div>
    <span class="screen-reader-text"><?php echo esc_html(implode(' ', $frases)); ?></span>
</section>
