<?php
/**
 * Render: bloque España, referente mundial en investigación clínica.
 *
 * Bloque final del home con dato destacado (4.224 / 39,7%) y texto contextual.
 * TODO ACF: exponer heading, dato_numero, dato_total, dato_pct y paragraph
 * como campos cuando ACF Pro esté activo.
 */

if (!defined('ABSPATH')) {
    exit;
}

/** @var array $attributes */
$align       = $attributes['align'] ?? 'full';
$align_class = ' align' . preg_replace('/[^a-z]/', '', strtolower($align));
$anchor      = !empty($attributes['anchor']) ? ' id="' . esc_attr($attributes['anchor']) . '"' : '';

$heading   = 'España, referente mundial en investigación clínica';
$paragraph = 'De los 10.643 ensayos autorizados en la UE en los últimos dos años, España participa en 4.224 (39,7%), muy por delante de Francia (4.051) y Alemania (3.426). Es decir, uno de cada tres estudios que se desarrollan en Europa están en nuestro país. En el contexto actual de fuerte incertidumbre global, tensiones geopolíticas, cambios regulatorios y una competencia global cada vez más intensa, es fundamental que los gobiernos hagan una apuesta decidida por la investigación biomédica y con medidas que fortalezcan el ecosistema de innovación en el país y en nuestro continente.';
?>
<section class="espana-lider<?php echo $align_class; ?>"<?php echo $anchor; ?>>
    <div class="espana-lider__inner">
        <h2 class="espana-lider__heading"><?php echo esc_html($heading); ?></h2>

        <ul class="espana-lider__stats" aria-label="Datos clave">
            <li class="espana-lider__stat espana-lider__stat--main">
                <span class="espana-lider__num">4.224</span>
                <span class="espana-lider__label">ensayos en España<br /><span class="espana-lider__pct">39,7% de la UE</span></span>
            </li>
            <li class="espana-lider__stat">
                <span class="espana-lider__num">4.051</span>
                <span class="espana-lider__label">Francia</span>
            </li>
            <li class="espana-lider__stat">
                <span class="espana-lider__num">3.426</span>
                <span class="espana-lider__label">Alemania</span>
            </li>
            <li class="espana-lider__stat">
                <span class="espana-lider__num">10.643</span>
                <span class="espana-lider__label">total UE<br /><span class="espana-lider__pct">últimos 2 años</span></span>
            </li>
        </ul>

        <p class="espana-lider__paragraph"><?php echo esc_html($paragraph); ?></p>
    </div>
</section>
