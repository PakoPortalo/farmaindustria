<?php
/**
 * Render: bloque Entenderlo · Vídeo "¿Qué son los ensayos clínicos?".
 *
 * Spec: Figma "Homa-desktop OK" / 116:2030 (heading) + 116:2031 (Component 2 vídeo).
 * - Heading 60px Switzer Regular, tracking -2px, alineado izquierda (x:170 en design).
 * - Tarjeta de vídeo 1285×536 con foto de fondo (couple riendo) y overlay
 *   "VER VÍDEO" Neue Montreal Medium 16.347px uppercase, blanco, centrado.
 * - TODO ACF: heading_text, video_url (YouTube/Vimeo/MP4), poster, label_cta.
 */

if (!defined('ABSPATH')) {
    exit;
}

/** @var array $attributes */
$align       = $attributes['align'] ?? 'full';
$align_class = ' align' . preg_replace('/[^a-z]/', '', strtolower($align));
$anchor      = !empty($attributes['anchor']) ? ' id="' . esc_attr($attributes['anchor']) . '"' : '';

$img_dir = FI_THEME_URI . '/assets/img/entenderlo';
$poster  = $img_dir . '/que-son-video.webp';

$cta_label = 'Ver vídeo';
?>
<section class="entenderlo-video<?php echo $align_class; ?>"<?php echo $anchor; ?>>
    <div class="entenderlo-video__inner">
        <h2 class="entenderlo-video__heading">
            ¿Qué son los<br />ensayos clínicos?
        </h2>

        <button type="button" class="entenderlo-video__card" aria-label="<?php echo esc_attr($cta_label); ?>">
            <span class="entenderlo-video__media">
                <img class="entenderlo-video__poster" src="<?php echo esc_url($poster); ?>" alt="" width="1285" height="536" loading="lazy" />
            </span>
            <span class="entenderlo-video__cta"><?php echo esc_html($cta_label); ?></span>
        </button>
    </div>
</section>
