<?php
/**
 * Template del home — renderiza los bloques del tema en orden.
 *
 * Cada bloque se monta vía render_block() apuntando al bloque registrado
 * en /blocks/<nombre>/. Añadir aquí los nuevos bloques conforme se creen.
 */

get_header();
?>

<main id="main" class="main main--home">
    <?php
    $home_blocks = [
        ['blockName' => 'fi/hero-ensayos', 'attrs' => ['align' => 'full'], 'innerBlocks' => [], 'innerHTML' => '', 'innerContent' => []],
        // TODO: añadir aquí el resto de bloques del home conforme se monten:
        // hero-secundario, quote, banner-intro, cels-testimonios, fondo3,
        // espana-lider, claves-cards, claves-expandido, clave1, banners-cta.
    ];

    foreach ($home_blocks as $block) {
        echo render_block($block);
    }
    ?>
</main>

<?php get_footer(); ?>
