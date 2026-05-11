<?php
/**
 * Render: bloque Intro compromiso.
 *
 * Spec: Figma "Homa-desktop OK" / textos 116:2012 + 116:2013.
 * - Heading (116:2012) x:734 y:1295 w:630 — "+Ensayos es un compromiso..."
 *   Switzer Regular 48px, line 1, tracking -2px.
 * - Paragraph (116:2013) x:74 y:1476 w:1290 — "Un espacio para poner en valor..."
 *   Switzer Medium 22px, line 1.3, tracking -0.5px.
 * TODO ACF: exponer `heading` y `paragraph` cuando ACF Pro esté activo.
 */

if (!defined('ABSPATH')) {
    exit;
}

/** @var array $attributes */
$align       = $attributes['align'] ?? 'full';
$align_class = ' align' . preg_replace('/[^a-z]/', '', strtolower($align));
$anchor      = !empty($attributes['anchor']) ? ' id="' . esc_attr($attributes['anchor']) . '"' : '';

$heading   = '+Ensayos es un compromiso con el futuro de la investigación clínica en España.';
$paragraph = 'Un espacio para poner en valor el papel de los ensayos clínicos como motor de innovación y esperanza. Una oportunidad para seguir impulsando el talento, la colaboración y el liderazgo científico de nuestro país, generando valor no solo para quienes más lo necesitan, sino también para la industria farmacéutica, las administraciones públicas y el conjunto de la sociedad.';
?>
<section class="intro-compromiso<?php echo $align_class; ?>"<?php echo $anchor; ?>>
    <div class="intro-compromiso__inner">
        <p class="intro-compromiso__heading"><?php echo esc_html($heading); ?></p>
        <p class="intro-compromiso__paragraph"><?php echo esc_html($paragraph); ?></p>
    </div>
</section>
