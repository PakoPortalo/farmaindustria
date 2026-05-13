<?php
/**
 * Template del home — renderiza los bloques del tema en orden.
 *
 * Los heroes que comparten fondo "Bolas" se agrupan en `.home-hero-stack`
 * para que el bg sea continuo entre módulos (no se ve corte vertical).
 */

get_header();
?>

<main id="main" class="main main--home">
    <div class="home-hero-stack">
        <?php get_template_part('parts/fondo-bolas'); ?>
        <?php
        $hero_blocks = [
            ['blockName' => 'fi/hero-ensayos',    'attrs' => ['align' => 'full'], 'innerBlocks' => [], 'innerHTML' => '', 'innerContent' => []],
            ['blockName' => 'fi/hero-secundario',  'attrs' => ['align' => 'full'], 'innerBlocks' => [], 'innerHTML' => '', 'innerContent' => []],
            ['blockName' => 'fi/intro-compromiso', 'attrs' => ['align' => 'full'], 'innerBlocks' => [], 'innerHTML' => '', 'innerContent' => []],
        ];
        foreach ($hero_blocks as $block) {
            echo render_block($block);
        }
        ?>
    </div>

    <?php
    $secondary_blocks = [
        ['blockName' => 'fi/cinta-ensayos', 'attrs' => ['align' => 'full'], 'innerBlocks' => [], 'innerHTML' => '', 'innerContent' => []],
    ];
    foreach ($secondary_blocks as $block) {
        echo render_block($block);
    }
    ?>

    <div class="home-innovacion-stack">
        <?php
        get_template_part('parts/fondo-pildoras');
        $innovacion_blocks = [
            ['blockName' => 'fi/innovacion-stack', 'attrs' => ['align' => 'full'], 'innerBlocks' => [], 'innerHTML' => '', 'innerContent' => []],
        ];
        foreach ($innovacion_blocks as $block) {
            echo render_block($block);
        }
        ?>
    </div>

    <div class="home-entenderlo-stack">
        <?php
        get_template_part('parts/fondo-bolas');
        $entenderlo_blocks = [
            ['blockName' => 'fi/entenderlo-testimonios', 'attrs' => ['align' => 'full'], 'innerBlocks' => [], 'innerHTML' => '', 'innerContent' => []],
            ['blockName' => 'fi/entenderlo-video',       'attrs' => ['align' => 'full'], 'innerBlocks' => [], 'innerHTML' => '', 'innerContent' => []],
        ];
        foreach ($entenderlo_blocks as $block) {
            echo render_block($block);
        }
        ?>
    </div>

    <?php
    $claves_blocks = [
        ['blockName' => 'fi/claves-cards', 'attrs' => ['align' => 'full'], 'innerBlocks' => [], 'innerHTML' => '', 'innerContent' => []],
    ];
    foreach ($claves_blocks as $block) {
        echo render_block($block);
    }
    ?>

    <?php
    // TODO: añadir aquí el resto de bloques del home conforme se monten:
    // espana-lider, claves-expandido, clave1, banners-cta.
    ?>
</main>

<?php get_footer(); ?>
