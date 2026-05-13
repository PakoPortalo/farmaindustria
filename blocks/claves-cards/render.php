<?php
/**
 * Render: bloque Claves Cards (scroll-driven stack).
 *
 * 11 estados:
 *   i=0  → intro (icono globo + heading + lead).
 *   i=1..10 → tarjeta n entra desde abajo. Estados acumulativos: la última
 *             activa queda visible apilada sobre las previas.
 *
 * Mecánica scroll-driven idéntica a innovacion-stack (sticky 100vh + rAF).
 * TODO ACF: cuando ACF Pro esté activo, exponer `intro` + `claves` repeater.
 */

if (!defined('ABSPATH')) {
    exit;
}

/** @var array $attributes */
$align       = $attributes['align'] ?? 'full';
$align_class = ' align' . preg_replace('/[^a-z]/', '', strtolower($align));
$anchor      = !empty($attributes['anchor']) ? ' id="' . esc_attr($attributes['anchor']) . '"' : '';

$img_dir    = FI_THEME_URI . '/assets/img/claves';
$globo_src  = $img_dir . '/globo.png';
$shape_dir  = $img_dir;

$intro_heading  = 'España, líder mundial<br />en ensayos clínicos';
$intro_lead     = 'La mayoría de los ensayos en España son impulsados por la industria farmacéutica y representan la etapa final de una larga, arriesgada y compleja investigación que puede extenderse de media entre 10 y 12 años. De los 2.491 ensayos autorizados en la UE en los últimos dos años, España participa en 1.136 (45,6%), superando a Francia (978) y Alemania (914).';
$intro_pixeltag = '10 claves';

$claves = [
    [
        'num'   => 1,
        'title' => 'Pioneros en materia de regulación',
        'copy'  => 'Nuestro país fue el primero de Europa en adoptar el Reglamento de Ensayos Clínicos de 2014, con el Real Decreto 1090/2015, lo que supuso la simplificación, agilización y armonización de los procedimientos.',
    ],
];
for ($n = count($claves) + 1; $n <= 10; $n++) {
    $claves[] = [
        'num'   => $n,
        'title' => sprintf('Clave %02d', $n),
        'copy'  => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.',
    ];
}

$states = 1 + count($claves); // 11
?>
<section class="claves-cards<?php echo $align_class; ?>" data-states="<?php echo (int) $states; ?>"<?php echo $anchor; ?>>
    <div class="claves-cards__sticky">

        <div class="claves-cards__bg" aria-hidden="true">
            <?php get_template_part('parts/fondo-bolas', null, ['variant' => 'verde', 'extend' => false]); ?>
        </div>

        <div class="claves-cards__intro" data-i="0">
            <img class="claves-cards__icon" src="<?php echo esc_url($globo_src); ?>" alt="" width="80" height="80" loading="lazy" decoding="async" />
            <div class="claves-cards__intro-text">
                <h2 class="claves-cards__heading"><?php echo wp_kses_post($intro_heading); ?></h2>
                <p class="claves-cards__lead"><?php echo esc_html($intro_lead); ?></p>
            </div>
            <span class="claves-cards__pixeltag" aria-hidden="true"><?php echo esc_html($intro_pixeltag); ?></span>
        </div>

        <ol class="claves-cards__deck">
            <?php foreach ($claves as $idx => $clave) :
                $i       = $idx + 1;
                $num_lbl = str_pad((string) $clave['num'], 2, '0', STR_PAD_LEFT);
            ?>
                <li class="claves-cards__card" data-i="<?php echo (int) $i; ?>" style="--n: <?php echo (int) $i; ?>;">
                    <h3 class="claves-cards__title"><?php echo esc_html($clave['title']); ?></h3>
                    <span class="claves-cards__badge" aria-hidden="true">
                        <span class="claves-cards__num"><?php echo esc_html($num_lbl); ?></span>
                    </span>
                    <p class="claves-cards__copy"><?php echo esc_html($clave['copy']); ?></p>
                </li>
            <?php endforeach; ?>
        </ol>

    </div>
</section>
