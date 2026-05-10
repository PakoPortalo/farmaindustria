<footer class="site-footer">
    <div class="container site-footer__inner">
        <p class="site-footer__copy">
            &copy; <?php echo esc_html(date('Y')); ?> <?php bloginfo('name'); ?>.
            <?php esc_html_e('Todos los derechos reservados.', 'farmaindustria'); ?>
        </p>
        <nav class="site-footer__nav" aria-label="<?php esc_attr_e('Menú footer', 'farmaindustria'); ?>">
            <?php
            wp_nav_menu([
                'theme_location' => 'footer',
                'container'      => false,
                'menu_class'     => 'nav-footer',
                'fallback_cb'    => false,
                'depth'          => 1,
            ]);
            ?>
        </nav>
    </div>
</footer>

<?php wp_footer(); ?>
</body>
</html>
