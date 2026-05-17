<?php
/**
 * Render: bloque Innovación stack (scroll-driven storytelling).
 *
 * Spec: Figma "Homa-desktop OK" / 116:2018 + 116:2015 (Cels).
 * Sección pineada con scroll que avanza 6 estados:
 *   palabra (cortinilla bottom→top) + caption + foto (transición vertical).
 * Las 2 fotos disponibles se repiten ×3 para los 6 estados.
 * TODO ACF: cuando ACF Pro esté activo, exponer `palabras` y `captions` como
 * repeater + `fotos` como gallery.
 */

if (!defined('ABSPATH')) {
    exit;
}

/** @var array $attributes */
$align       = $attributes['align'] ?? 'full';
$align_class = ' align' . preg_replace('/[^a-z]/', '', strtolower($align));
$anchor      = !empty($attributes['anchor']) ? ' id="' . esc_attr($attributes['anchor']) . '"' : '';

$img_dir   = FI_THEME_URI . '/assets/img/innovacion';
$foto_1    = $img_dir . '/foto-1.webp';
$foto_2    = $img_dir . '/foto-2.webp';
$fotos     = [$foto_1, $foto_2, $foto_1, $foto_2, $foto_1, $foto_2];

// 6 palabras como texto nativo (OffBit 101 Bold self-hosted).
$palabras = ['+Innovación', '+Calidad de vida', '+Oportunidades', '+Tratamientos', '+Liderazgo', '+Talento'];

$captions = [
    'Impulsamos la investigación que transforma el conocimiento científico en más soluciones terapéuticas para la salud de las personas.',
    'Buscamos evidencias que permitan alcanzar mejores resultados en su salud y bienestar.',
    'Abrimos nuevas vías de investigación con medicamentos para quienes hoy aún no tienen respuestas.',
    'Aceleramos la investigación para disponer de nuevos y mejores medicamentos para que el avance científico llegue al paciente en el menor tiempo posible.',
    'Trabajamos para que España siga siendo un referente en investigación clínica mundial, a pesar de la fuerte competencia internacional.',
    'Reconocemos y apoyamos a los profesionales y equipos multidisciplinares que hacen posible cada avance científico.',
];

$states = count($palabras);
?>
<section class="innovacion-stack<?php echo $align_class; ?>" data-states="<?php echo (int) $states; ?>"<?php echo $anchor; ?>>
    <div class="innovacion-stack__sticky">
        <div class="innovacion-stack__photos">
            <?php foreach ($fotos as $i => $src) : ?>
                <div class="innovacion-stack__photo" data-i="<?php echo (int) $i; ?>">
                    <img src="<?php echo esc_url($src); ?>" alt="" loading="lazy" decoding="async" />
                </div>
            <?php endforeach; ?>
        </div>

        <div class="innovacion-stack__center">
            <div class="innovacion-stack__words" aria-live="polite">
                <?php foreach ($palabras as $i => $palabra) : ?>
                    <span class="innovacion-stack__word" data-i="<?php echo (int) $i; ?>"><?php echo esc_html($palabra); ?></span>
                <?php endforeach; ?>
            </div>

            <div class="innovacion-stack__captions">
                <?php foreach ($captions as $i => $caption) : ?>
                    <p class="innovacion-stack__caption" data-i="<?php echo (int) $i; ?>"><?php echo esc_html($caption); ?></p>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
</section>
