<?php
/**
 * Render: bloque Banners (CTA full-width con marquee).
 *
 * Variantes:
 *   - contacto (default): "¿Aún con dudas?" + botón CONTACTAR.
 *
 * Spec Figma: frame 7:868 — 1440×246, padding 79/110, gap 8.
 * BG: linear-gradient 228.65deg, #cbc7ff → #abd8fc.
 * Marquee H1: DM Sans 400 120px, lh 0.9, ls -5px, opacity .1, white.
 * Botón XL: pill r:118px, border 1.7px white, bg rgba(19,5,68,0.1), backdrop-blur ~30px.
 */

if (!defined('ABSPATH')) {
    exit;
}

/** @var array $attributes */
$align       = $attributes['align'] ?? 'full';
$align_class = ' align' . preg_replace('/[^a-z]/', '', strtolower($align));
$anchor      = !empty($attributes['anchor']) ? ' id="' . esc_attr($attributes['anchor']) . '"' : '';
$variant     = !empty($attributes['variant']) ? preg_replace('/[^a-z0-9-]/', '', (string) $attributes['variant']) : 'contacto';

// Copy por variante. TODO ACF: exponer marquee_text, lead, cta_label, cta_href.
$variants = [
    'contacto' => [
        'marquee'   => '¿Aún con dudas?',
        'lead'      => 'Si aún te quedan dudas sobre si podemos ayudarte, cuéntanos tu caso y te llamamos',
        'cta_label' => 'Contactar',
        'cta_href'  => '#contacto',
    ],
];
$data = $variants[$variant] ?? $variants['contacto'];

$arrow_src = FI_THEME_URI . '/assets/img/banners/arrow.svg';

// Duplicamos el marquee 6 veces (3 + 3 dupe) para loop seamless con translateX(-50%).
$marquee_copies = 6;
?>
<section class="banners banners--<?php echo esc_attr($variant); ?><?php echo $align_class; ?>"<?php echo $anchor; ?>>
    <div class="banners__inner">

        <div class="banners__marquee" aria-hidden="true">
            <div class="banners__marquee-track">
                <?php for ($i = 0; $i < $marquee_copies; $i++) : ?>
                    <span class="banners__marquee-text"><?php echo esc_html($data['marquee']); ?></span>
                <?php endfor; ?>
            </div>
        </div>

        <div class="banners__content">
            <p class="banners__lead"><?php echo esc_html($data['lead']); ?></p>

            <a class="banners__cta" href="<?php echo esc_url($data['cta_href']); ?>">
                <span class="banners__cta-label">
                    <span class="banners__cta-text"><?php echo esc_html($data['cta_label']); ?></span>
                    <span class="banners__cta-text" aria-hidden="true"><?php echo esc_html($data['cta_label']); ?></span>
                </span>
                <span class="banners__cta-arrow" aria-hidden="true">
                    <img src="<?php echo esc_url($arrow_src); ?>" alt="" width="30" height="30" loading="lazy" decoding="async" />
                    <img src="<?php echo esc_url($arrow_src); ?>" alt="" width="30" height="30" loading="lazy" decoding="async" />
                </span>
            </a>
        </div>

    </div>
</section>
