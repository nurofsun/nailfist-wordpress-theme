<div class="hero">
    <div class="hero-body">
        <div class="container">
            <div class="content">
            <?php
                $nailfist_description = get_bloginfo( 'description', 'display' );
                if ( $nailfist_description || is_customize_preview() ) :
            ?>
                <p class="site-description">
                    <?php echo $nailfist_description; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>
                </p>
            <?php endif; ?>
            </div>
        </div>
    </div>
</div><!-- .site-branding -->
