<?php
/**
 * Render: bloque Hero secundario (edificio).
 *
 * Spec: Figma "Homa-desktop OK" / nodo 116:2011 (Component 3, 1440x874).
 * El recorte (forma label) se mantiene fijo vía mask-image; la <img> dentro
 * hace zoom on hover. El hover sólo se activa al pasar sobre el recorte.
 * TODO: cuando llegue el "+" como capa separada (plus.svg) y la foto limpia
 * (edificio-limpio.png) sustituir edificio.webp aquí.
 * TODO ACF: exponer `video_url` y `imagen` cuando ACF Pro esté activo.
 */

if (!defined('ABSPATH')) {
    exit;
}

/** @var array $attributes */
$align       = $attributes['align'] ?? 'full';
$align_class = ' align' . preg_replace('/[^a-z]/', '', strtolower($align));
$anchor      = !empty($attributes['anchor']) ? ' id="' . esc_attr($attributes['anchor']) . '"' : '';

$img_uri     = FI_THEME_URI . '/assets/img/hero-secundario/balcon.webp';
$video_url   = '#'; // TODO ACF: get_field('video_url')
$cta_label   = 'Ver vídeo';
?>
<section class="hero-secundario<?php echo $align_class; ?>"<?php echo $anchor; ?>>
    <a class="hero-secundario__trigger" href="<?php echo esc_url($video_url); ?>" aria-label="<?php echo esc_attr($cta_label); ?>">
        <img class="hero-secundario__img" src="<?php echo esc_url($img_uri); ?>" alt="" width="1285" height="536" loading="lazy" decoding="async" />
        <span class="hero-secundario__cta"><?php echo esc_html($cta_label); ?></span>
    </a>
</section>
