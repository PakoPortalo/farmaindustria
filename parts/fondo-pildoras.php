<?php
/**
 * Template part: fondo decorativo "Pildoras".
 *
 * Análogo a parts/fondo-bolas.php pero con cápsulas/pildoras rotadas
 * sobre bg rosa. Spec: Figma Cels component (1:682) — 1440x914.
 * Estilos en assets/scss/_fondo-pildoras.scss.
 *
 * @var array $args Opcional:
 *   - 'pildoras' => array de [x, y, rotation] (override total)
 */

if (!defined('ABSPATH')) {
    exit;
}

$blob_dir = FI_THEME_URI . '/assets/img/innovacion';

// 40 pildoras del Figma Cels (x, y, rotation deg).
$default_pildoras = [
    [251.85, 310.42, -9.8], [901.64, 381.85, -9.8], [1043.59, 223.25, -9.8],
    [1049.72, -15.08, -9.8], [0, -44, -31.53], [372.39, 319.53, 2.4],
    [1003.65, 581.22, 124.54], [947.2, 541.32, 2.4], [220.81, 585.13, 2.4],
    [333.98, 603.57, -48.99], [592.33, 141.76, 124.53], [607.23, 67.28, 71.34],
    [998.02, 419.52, 71.34], [191.9, -0.16, 146.3], [3.51, 444.93, 71.34],
    [984, 158.41, 71.34], [528.89, 356.04, 92.81], [670.09, 455.01, 145],
    [97.26, 561.47, 145], [849.06, 25.22, 145], [348.99, 66.65, -145.92],
    [1260.82, 641.84, -174.8], [651.66, 404.68, -174.8], [473.5, 521.13, -174.8],
    [405.89, 749.76, -174.8], [1361.06, 1046.38, 163.47], [1138.59, 606.15, -162.6],
    [492.33, 210, -40.46], [640.77, 243.15, -162.6], [1353.75, 388.84, -162.6],
    [1159.27, 350.92, 146.01], [775.88, 740.95, -40.47], [709.35, 890.59, -93.66],
    [423.04, 449.2, -93.66], [1180.67, 955.37, -18.7], [1390.24, 682.06, -93.66],
    [369, 705.05, -93.66], [853.09, 633.93, -72.19], [832.84, 392.68, -20],
    [1413.7, 438.11, -20], [548.73, 761.5, -20], [1008.47, 870.34, 49.08],
];

$pildoras = isset($args['pildoras']) && is_array($args['pildoras']) ? $args['pildoras'] : $default_pildoras;
?>
<div class="fondo-pildoras" aria-hidden="true">
    <div class="fondo-pildoras__base"></div>

    <img class="fondo-pildoras__blob fondo-pildoras__blob--1" src="<?php echo esc_url($blob_dir . '/blob-1.svg'); ?>" alt="" loading="lazy" />
    <img class="fondo-pildoras__blob fondo-pildoras__blob--2" src="<?php echo esc_url($blob_dir . '/blob-2.svg'); ?>" alt="" loading="lazy" />
    <img class="fondo-pildoras__blob fondo-pildoras__blob--3" src="<?php echo esc_url($blob_dir . '/blob-3.svg'); ?>" alt="" loading="lazy" />

    <?php foreach ($pildoras as $i => [$x, $y, $rot]) : ?>
        <span class="fondo-pildoras__pildora" style="--x:<?php echo (float) $x; ?>px;--y:<?php echo (float) $y; ?>px;--rot:<?php echo (float) $rot; ?>deg;--i:<?php echo (int) $i; ?>"></span>
    <?php endforeach; ?>

    <div class="fondo-pildoras__mask"></div>
</div>
