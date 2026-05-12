<?php
/**
 * Render: bloque Entenderlo · Testimonios.
 *
 * Spec: Figma "Homa-desktop OK" / 116:2019 (fondo3) + 116:2023 (heading) + 116:2024 (CTA + 3 fotos overlay).
 * - Smiley decorativo encima del heading (nodo 116:2025).
 * - Heading 2 líneas a 120px (Regular + Light/Regular fallback) centrado.
 * - CTA cascos 180px rodeado de texto circular "VER TESTIMONIOS" rotando.
 * - Click revela 3 tarjetas placeholder rotadas (sin imagen, blanco) como overlay.
 * TODO ACF: cuando ACF Pro esté activo, exponer heading, cta_label, testimonios (repeater).
 */

if (!defined('ABSPATH')) {
    exit;
}

/** @var array $attributes */
$align       = $attributes['align'] ?? 'full';
$align_class = ' align' . preg_replace('/[^a-z]/', '', strtolower($align));
$anchor      = !empty($attributes['anchor']) ? ' id="' . esc_attr($attributes['anchor']) . '"' : '';

$img_dir   = FI_THEME_URI . '/assets/img/entenderlo';
$smiley    = $img_dir . '/smiley.svg';
$cascos    = $img_dir . '/cascos.svg';

$cta_label   = 'Ver testimonios';
$ring_text   = 'VER TESTIMONIOS · VER TESTIMONIOS · VER TESTIMONIOS · ';
?>
<section class="entenderlo<?php echo $align_class; ?>"<?php echo $anchor; ?>>
    <div class="entenderlo__inner">
        <img class="entenderlo__smiley" src="<?php echo esc_url($smiley); ?>" alt="" width="91" height="90" loading="lazy" />

        <h2 class="entenderlo__heading">
            <span class="entenderlo__heading-line entenderlo__heading-line--top">La mejor manera de entenderlo:</span>
            <span class="entenderlo__heading-line entenderlo__heading-line--bot">escuchar a quienes lo han vivido.</span>
        </h2>

        <button type="button" class="entenderlo__cta" aria-label="<?php echo esc_attr($cta_label); ?>" aria-expanded="false">
            <span class="entenderlo__cta-ring" aria-hidden="true">
                <svg viewBox="0 0 180 180" width="180" height="180" xmlns="http://www.w3.org/2000/svg">
                    <defs>
                        <!-- Círculo r=78 sobre el que corre el texto. -->
                        <path id="entenderlo-ring-path" d="M 90,90 m -78,0 a 78,78 0 1,1 156,0 a 78,78 0 1,1 -156,0" fill="none"/>
                    </defs>
                    <text class="entenderlo__cta-ring-text">
                        <textPath href="#entenderlo-ring-path" startOffset="0"><?php echo esc_html($ring_text); ?></textPath>
                    </text>
                </svg>
            </span>
            <span class="entenderlo__cta-icon" aria-hidden="true">
                <img src="<?php echo esc_url($cascos); ?>" alt="" width="48" height="48" />
            </span>
        </button>

        <div class="entenderlo__photos" aria-hidden="true">
            <div class="entenderlo__photo entenderlo__photo--left"></div>
            <div class="entenderlo__photo entenderlo__photo--center"></div>
            <div class="entenderlo__photo entenderlo__photo--right"></div>
        </div>
    </div>
</section>
