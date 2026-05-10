<!doctype html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="profile" href="https://gmpg.org/xfn/11">
    <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<?php wp_body_open(); ?>

<a class="skip-link" href="#main"><?php esc_html_e('Saltar al contenido', 'farmaindustria'); ?></a>

<header class="site-header">
    <div class="container site-header__inner">
        <a class="site-header__brand" href="<?php echo esc_url(home_url('/')); ?>" rel="home">
            <?php bloginfo('name'); ?>
        </a>
        <nav class="site-header__nav" aria-label="<?php esc_attr_e('Menú principal', 'farmaindustria'); ?>">
            <?php
            wp_nav_menu([
                'theme_location' => 'primary',
                'container'      => false,
                'menu_class'     => 'nav-primary',
                'fallback_cb'    => false,
                'depth'          => 2,
            ]);
            ?>
        </nav>
    </div>
</header>
