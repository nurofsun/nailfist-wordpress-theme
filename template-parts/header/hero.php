<div 
    class="hero is-medium is-relative <?php if (!get_header_image()): echo 'is-dark'; endif;?>"
    <?php if (get_header_image()):?>
    style="background-image: url(<?php echo esc_url(header_image()); ?>); background-size: cover; background-repeat: no-repeat;"
    <?php endif; ?>>
    <div class="hero-body">
        <div class="is-overlay" style="background-color: rgba(0,0,0,0.6);">
        </div>
        <div class="container">
            <div class="columns is-centered">
                <div class="column is-three-quarters">
                    <div class="content">
                        <?php
                         $nailfist_description = get_bloginfo( 'description', 'display' );
                         if ( $nailfist_description || is_customize_preview() ) :
                         ?>
                         <p 
                            class="site-description 
                            is-size-1 is-size-3-mobile has-text-weight-bold title
                            <?php if (get_header_image()) { echo 'has-text-white'; } ?>
                            ">
                         <?php echo $nailfist_description; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>
                         </p>
                         <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div><!-- .site-branding -->
