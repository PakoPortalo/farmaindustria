<?php get_header(); ?>

<main class="main">
    <div class="container">
        <?php if (have_posts()) : ?>
            <?php while (have_posts()) : the_post(); ?>
                <article <?php post_class(); ?>>
                    <h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
                    <?php the_excerpt(); ?>
                </article>
            <?php endwhile; ?>
        <?php else : ?>
            <p><?php esc_html_e('No hay contenido.', 'farmaindustria'); ?></p>
        <?php endif; ?>
    </div>
</main>

<?php get_footer(); ?>
