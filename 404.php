<?php get_header(); ?>

<main id="main" class="main">
    <div class="container">
        <h1><?php esc_html_e('Página no encontrada', 'farmaindustria'); ?></h1>
        <p><?php esc_html_e('Lo sentimos, la página que buscas no existe.', 'farmaindustria'); ?></p>
        <a class="btn" href="<?php echo esc_url(home_url('/')); ?>">
            <?php esc_html_e('Volver al inicio', 'farmaindustria'); ?>
        </a>
    </div>
</main>

<?php get_footer(); ?>
