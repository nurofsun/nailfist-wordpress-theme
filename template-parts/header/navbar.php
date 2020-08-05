<nav class="navbar is-white is-spaced has-shadow" role="navigation" aria-label="main navigation">
    <div class="container">
        <div class="navbar-brand">
        <?php 
        if (has_custom_logo()): 
            the_custom_logo();
        else: ?>
            <a class="navbar-item" href="<?php echo esc_url(home_url('/')); ?>" rel="home"><?php echo bloginfo('name'); ?></a>
        <?php endif; ?>

            <a role="button" class="burger navbar-burger" data-target="primary-menu">
                <span></span>
                <span></span>
                <span></span>
            </a>
        </div>
        <?php
        wp_nav_menu( array(
            'theme_location'    => 'header-menu',
            'depth'             => 2,
            'container'         => 'div',
            'container_class'   => 'navbar-menu',
            'items_wrap'        => '<div id="%1$s" class="%2$s">%3$s</div>',
            'menu_class'        => 'navbar-end',
            'menu_id'           => 'primary-menu',
            'after'             => "</div>",
            'walker'            => new Navwalker()
        ));
        ?>
    </div>
</nav>
