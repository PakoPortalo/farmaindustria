<?php
/**
 * Template part: fondo decorativo "Bolas".
 *
 * Reutilizable entre bloques y wrappers. Cubre el contenedor padre
 * (que debe tener position: relative). Genera ~60 bolas: 30 originales
 * del Figma (y: 0-914) + 30 extras (y: 800-1700) para continuar bg
 * cuando se apila más de una sección.
 *
 * Spec: Figma "Bolas" component (1:457).
 * Estilos en assets/scss/_fondo-bolas.scss.
 *
 * @var array $args Opcional. Acepta:
 *   - 'bolas'   => array de [x, y] (override total)
 *   - 'variant' => string ('bolas' default | 'verde')
 *   - 'extend'  => bool (default true). False = solo las 30 originales (sección sticky 100vh).
 */

if (!defined('ABSPATH')) {
    exit;
}

$bolas_dir = FI_THEME_URI . '/assets/img/hero/bolas';
$variant   = isset($args['variant']) ? preg_replace('/[^a-z0-9_-]/i', '', (string) $args['variant']) : 'bolas';
$extend    = !isset($args['extend']) || (bool) $args['extend'];

$figma_bolas = [
    // Figma — 30 originales (y: 0-914)
    [539, 239], [802, 199], [747, 356], [960, 435], [1151, 295],
    [25, 135], [288, 95], [233, 252], [446, 331], [637, 191],
    [112, 449], [254, 434], [221, 624], [361, 670], [558, 734],
    [952, 404], [707, 511], [721, 346], [495, 324], [347, 509],
    [1475, 371], [1231, 479], [1244, 313], [1018, 292], [870, 476],
    [1310, 90], [1176, 143], [1160, -48], [1013, -57], [806, -68],
];

$extend_bolas = [
    // Continuación (y: 800-1700) — distribución manual para densidad similar
    [100, 820], [350, 800], [620, 850], [880, 830], [1140, 810], [1380, 870],
    [60, 980], [280, 1020], [520, 990], [780, 1050], [1020, 970], [1280, 1010], [1450, 1040],
    [-20, 1150], [180, 1170], [440, 1140], [680, 1200], [930, 1160], [1190, 1180], [1410, 1140],
    [80, 1300], [320, 1330], [580, 1290], [820, 1340], [1080, 1310], [1330, 1330],
    [40, 1480], [290, 1450], [560, 1510], [840, 1470], [1100, 1500], [1370, 1460],
    [200, 1640], [500, 1620], [780, 1670], [1050, 1640], [1320, 1660],
    // Extensión para módulo entenderlo-video (debajo de los testimonios)
    [60, 1820],  [320, 1800], [600, 1860], [870, 1830], [1140, 1820], [1400, 1840],
    [-10, 1980], [240, 1990], [490, 1970], [760, 2010], [1020, 1980], [1290, 2000], [1470, 1960],
    [130, 2150], [400, 2170], [670, 2140], [940, 2180], [1200, 2150], [1430, 2170],
    [30, 2330],  [300, 2310], [570, 2370], [840, 2330], [1110, 2360], [1380, 2320],
];

$default_bolas = $extend ? array_merge($figma_bolas, $extend_bolas) : $figma_bolas;
$bolas         = isset($args['bolas']) && is_array($args['bolas']) ? $args['bolas'] : $default_bolas;

$variant_class = $variant && $variant !== 'bolas' ? ' fondo-bolas--' . $variant : '';
?>
<div class="fondo-bolas<?php echo esc_attr($variant_class); ?>" aria-hidden="true">
    <div class="fondo-bolas__gradient"></div>

    <img class="fondo-bolas__blob fondo-bolas__blob--1" src="<?php echo esc_url($bolas_dir . '/vector-1.svg'); ?>" alt="" loading="lazy" />
    <img class="fondo-bolas__blob fondo-bolas__blob--2" src="<?php echo esc_url($bolas_dir . '/vector-2.svg'); ?>" alt="" loading="lazy" />
    <img class="fondo-bolas__blob fondo-bolas__blob--3" src="<?php echo esc_url($bolas_dir . '/vector-3.svg'); ?>" alt="" loading="lazy" />

    <?php foreach ($bolas as $i => [$x, $y]) : ?>
        <span class="fondo-bolas__bola" style="--x:<?php echo (int) $x; ?>px;--y:<?php echo (int) $y; ?>px;--i:<?php echo (int) $i; ?>"></span>
    <?php endforeach; ?>

    <div class="fondo-bolas__mask"></div>
</div>
