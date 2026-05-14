<?php
/**
 * Render: bloque Logos Cloud (pre-footer).
 *
 * Sección full-width con la nube de logos Farmaindustria sobre el mismo
 * gradiente lavanda→azul que el banner-CTA. La imagen es PNG con fondo
 * blanco; el blend-mode multiply hace transparente el blanco para que
 * el gradiente atraviese.
 */

if (!defined('ABSPATH')) {
    exit;
}

/** @var array $attributes */
$align       = $attributes['align'] ?? 'full';
$align_class = ' align' . preg_replace('/[^a-z]/', '', strtolower($align));
$anchor      = !empty($attributes['anchor']) ? ' id="' . esc_attr($attributes['anchor']) . '"' : '';

$img_src = FI_THEME_URI . '/assets/img/logos-cloud/farmaindustria-logos.png';
?>
<section class="logos-cloud<?php echo $align_class; ?>"<?php echo $anchor; ?>>
    <div class="logos-cloud__inner">
        <img
            class="logos-cloud__img"
            src="<?php echo esc_url($img_src); ?>"
            alt="Compañías miembro de Farmaindustria"
            width="1138"
            height="399"
            loading="lazy"
            decoding="async"
        />
    </div>
</section>
